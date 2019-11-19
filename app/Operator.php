<?php

namespace App;

use Spatie\Sluggable\HasSlug;
use Spatie\Sluggable\SlugOptions;
use Illuminate\Database\Eloquent\Model;

class Operator extends Model
{
    use HasSlug;
    /**
     * Get the options for generating the slug.
     */
    public function getSlugOptions() : SlugOptions
    {
        return SlugOptions::create()
            ->generateSlugsFrom('name')
            ->saveSlugsTo('slug');
    }

    protected $fillable =['name','logo','phone','email','address', 'active'];

    /**
     * Operator belongs to user
     */
    public function user()
    {
        return $this->belongsTo('\App\User');
    }

}
