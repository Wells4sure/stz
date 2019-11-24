<?php

namespace App;

use Spatie\Sluggable\HasSlug;
use Spatie\Sluggable\SlugOptions;
use Illuminate\Database\Eloquent\Model;

class Bus extends Model
{
    use HasSlug;
    /**
     * Get the options for generating the slug.
     */
    public function getSlugOptions() : SlugOptions
    {
        return SlugOptions::create()
            ->generateSlugsFrom('reg')
            ->saveSlugsTo('slug');
    }

    protected $fillable =['reg','num_seats','operator_id'];

    /**
     * Bus belongs to operator
     */
    public function operator()
    {
        return $this->belongsTo('\App\Operator');
    }
        
    /**
     * Bus has a route.
     */
    public function bus_routes()
    {
        return $this->hasMany('App\BusRoute');
    }

}
