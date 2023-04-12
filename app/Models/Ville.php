<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Ville extends Model
{
    use HasFactory;

    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'villes';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'uid',
        'name',
        'slug',
    ];

    /**
     * Get subcategories
     *
     * @return object
     */
    public function subville()
    {
        return $this->hasMany(Subville::class, 'parent_id');
    }

    /**
     * Get gigs in this Ville
     *
     * @return object
     */
    public function gigs()
    {
        return $this->hasMany(Gig::class, 'ville_id')->withTrashed();
    }
}
