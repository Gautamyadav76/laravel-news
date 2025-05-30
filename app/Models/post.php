<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class post extends Model
{

    function catInfo()
    {


        return $this->belongsTo('App\Models\Category', 'category', 'id');
    }
}
