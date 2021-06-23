<?php

namespace App;

use App\Children;
use Illuminate\Database\Eloquent\Model;

class Entry extends Model
{
    //
    public $timestamps = false;

    public function children()
    {
        return $this->belongsTo(Children::class);
    }
}
