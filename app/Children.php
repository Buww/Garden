<?php

namespace App;

use App\Entry;
use App\Release;
use Illuminate\Database\Eloquent\Model;

class Children extends Model
{
    //
    public function entries()
    {
        return $this->hasMany(Entry::class);
    }

    public function releases()
    {
        return $this->hasMany(Release::class);
    }
}
