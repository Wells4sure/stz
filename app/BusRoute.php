<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class BusRoute extends Model
{
    protected $guarded = [];

    /**
     * Get the buses for the route.
     */
    public function bus()
    {
        return $this->belongsTo('App\Bus');
    }

    /**
     * Get the routes for the bus.
     */
    public function route()
    {
        return $this->belongsTo('App\Route');
    }
}
