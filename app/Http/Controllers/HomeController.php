<?php

namespace App\Http\Controllers;

use DateTime;
use App\Entry;
use App\Release;
use App\Children;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index() 
    {
        return view('home/home');
    }
    
    public function entry() 
    {
        $children = Children::where('code', request('code'))->first();
        $childrenAge = '';

        if (!$children)
        {
            return view('children/error', ['boolean' => 'error', 'error' => "Mauvais code"]);
        }

        $childrenRelations = $children->entries;
        if ($children != null) {
            $date1 = $children->birth;
            $date2 = date('Y-m-d');
            $d1=new DateTime($date2); 
            $d2=new DateTime($date1);                                  
            $Months = $d2->diff($d1); 
            $childrenAge = (($Months->y) * 12) + ($Months->m);
        }

        date_default_timezone_set('Europe/Paris');
        $date = date('Y-m-d\TH:i:s');
        foreach ($childrenRelations as $relation) 
        {
            if ($relation->entry) {
                $time = strtotime($relation->entry);
                if ($votedToday = (date('Y-m-d', $time) == date('Y-m-d')) == 1 && $children) {
                    return view('children/error', ['boolean' => 'entry']);
                }
            }
        }
        return view('children/entry', ['children' => $children, 'age' => $childrenAge, 'date' => $date]);
    }

    public function entrySave(Request $request) 
    {
        $children = Children::where('code', request('code'))->first();
        $entry = new Entry();
        $entry->children_id = $children->id;
        $entry->entry = request('date');

        $entry->save();
        return redirect('/');
    }

    public function departure() 
    {
        $children = Children::where('code', request('code'))->first();
        $childrenAge = '';

        if (!$children)
        {
            return view('children/error', ['boolean' => 'error', 'error' => "Mauvais code"]);
        }

        $childrenRelations = $children->releases;
        $childrenRelationsEntries = $children->entries;
        $dateEntry = '';
        $array = array('');
    
        if ($children != null) {
            $date1 = $children->birth;
            $date2 = date('Y-m-d');
            $d1=new DateTime($date2); 
            $d2=new DateTime($date1);                                  
            $Months = $d2->diff($d1); 
            $childrenAge = (($Months->y) * 12) + ($Months->m);
        }

        date_default_timezone_set('Europe/Paris');
        $date = date('Y-m-d\TH:i:s');

        foreach ($childrenRelationsEntries as $relation) 
        {
            if ($relation->entry && $children) {
                $time = strtotime($relation->entry);
                $votedToday = (date('Y-m-d', $time) == date('Y-m-d'));
                array_push($array, $votedToday);
            }
        }

        //Check si l'enfant est rentrée aujourd'hui/ou rentrée tout court
        if (count(array_keys($array, 1)) == 0)
        {
            return view('children/error', ['boolean' => 'error', 'error' => "Votre enfant n'est pas encore rentré"]);
        }

        foreach ($childrenRelations as $relation) 
        {
            if ($relation->release) {
                $time = strtotime($relation->release);
                if ($votedToday = (date('Y-m-d', $time) == date('Y-m-d')) == 1 && $children) {
                    return view('children/error', ['boolean' => 'release']);
                }
            }
        }
        return view('children/departure', ['children' => $children, 'age' => $childrenAge, 'date' => $date, 'dateEntry' => $dateEntry]);
    }

    public function departureSave(Request $request) 
    {
        $children = Children::where('code', request('code'))->first();
        $release = new Release();
        $release->children_id = $children->id;
        $release->release = request('date');

        $release->save();
        return redirect('/');
    }
}
