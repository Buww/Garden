<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Release extends Model
{
    //
    public $timestamps = false;

    public function children()
    {
        return $this->belongsTo(Children::class);
    }
}
