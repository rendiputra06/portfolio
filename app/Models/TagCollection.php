<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\MorphOne;
use Illuminate\Database\Eloquent\Relations\HasMany;

class TagCollection extends Model
{
    use HasFactory;

    protected $fillable = [
        'title',
        'description',
    ];

    /**
     * Get the section that owns this content.
     */
    public function section(): MorphOne
    {
        return $this->morphOne(Section::class, 'content');
    }

    /**
     * Get the tags for this collection.
     */
    public function tags(): HasMany
    {
        return $this->hasMany(Tag::class);
    }
}
