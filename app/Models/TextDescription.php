<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\MorphOne;

class TextDescription extends Model
{
    use HasFactory;

    protected $fillable = [
        'heading',
        'content',
    ];

    /**
     * Get the section that owns this content.
     */
    public function section(): MorphOne
    {
        return $this->morphOne(Section::class, 'content');
    }
}
