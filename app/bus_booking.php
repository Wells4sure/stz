<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class bus_booking extends Model
{
    protected $guarded = [];

    public function bus()
    {
        return $this->belongsTo('App\Bus', 'bus_id');
    }    
    
    public function route()
    {
        return $this->belongsTo('App\Route', 'route_id');
    }

}
