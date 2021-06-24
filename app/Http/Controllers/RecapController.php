<?php

namespace App\Http\Controllers;

use DateTime;
use App\Children;
use Illuminate\Http\Request;

class RecapController extends Controller
{
    public function index() 
    {
        return view('recap/recap');
    }

    private function time_to_decimal($time) {
        $timeArr = explode(':', $time);
        $decTime = ($timeArr[0]*60) + ($timeArr[1]) + ($timeArr[2]/60);
     
        return $decTime;
    }

    private function invoice($time)
    {
        $total = new DateTime('00:00');
        for ($i = 0; $i != floor($time); ++$i)
        {
            $total->modify('+30 minutes');
        }
        return $total->format("h:i");
    }

    public function find()
    {
        $children = Children::where('code', request('code'))->first();
        error_log($children);
        if (!$children)
        {
            return view('children/error', ['boolean' => 'error', 'error' => "Mauvais code"]);
        }

        $childrenEntries = $children->entries;
        $childrenReleases = $children->releases;
        $childrenAge = '';
        $childrenLog = array('');
        $totalInvoice = 0;

        if ($children != null) {
            $date1 = $children->birth;
            $date2 = date('Y-m-d');
            $d1=new DateTime($date2); 
            $d2=new DateTime($date1);                                  
            $Months = $d2->diff($d1); 
            $childrenAge = (($Months->y) * 12) + ($Months->m);
        }

        //Rend plus facile l'utilisation des donneés, une autres solution seraient de créer une seul table pour les entrées et les sorties.
        for ($i = 0; $i != count($childrenEntries->toArray()); $i++)
        {
            $entry = DateTime::createFromFormat("H:i:s", substr($childrenEntries->toArray()[$i]['entry'], 11, 8));
            $arrival = DateTime::createFromFormat("H:i:s", $children->arrival); 

            $release = DateTime::createFromFormat("H:i:s", substr($childrenReleases->toArray()[$i]['release'], 11, 8));
            $departure = DateTime::createFromFormat("H:i:s", $children->departure); 

            $e = new DateTime('00:00');
            $f = clone $e;

            if ($entry < $arrival) {
            $e->add($entry->diff($arrival));
            }

            if (($release > $departure) == 1) {
                $e->add($departure->diff($release));
            }

            $invoice = $this->invoice(($this->time_to_decimal($f->diff($e)->format("%H:%I:%s")) / 30));
            $totalInvoice += strtotime($invoice);
            array_push($childrenLog , $childrenEntries->toArray()[$i]['entry'] . ' ' . $childrenReleases->toArray()[$i]['release'] . '+' . $invoice  );        
        }

        return view('recap/recapChildrenInformation', ['children' =>$children, 'age' => $childrenAge, 'entries' => $childrenLog, 'total' => date('h:i', $totalInvoice)]);
    }
}
