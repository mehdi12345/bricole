<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Subville extends Model
{
    use HasFactory;

    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'subvilles';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'uid',
        'parent_id',
        'name',

    ];

    /**
     * Get subcategory parent
     *
     * @return object
     */
    public function parent()
    {
        return $this->belongsTo(Ville::class, 'parent_id');
    }
}
