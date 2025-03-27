<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\MorphOne;

class ProfileCard extends Model
{
    use HasFactory;

    protected $fillable = [
        'front_degree',
        'name',
        'back_degree',
        'title',
        'image',
        'email',
        'website',
        'address',
        'specialization',
    ];

    /**
     * Get the section that owns this content.
     */
    public function section(): MorphOne
    {
        return $this->morphOne(Section::class, 'content');
    }
}
