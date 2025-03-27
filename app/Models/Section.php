<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\MorphTo;

class Section extends Model
{
    use HasFactory;

    protected $fillable = [
        'title',
        'description',
        'position',
        'is_active',
        'content_type',
        'content_id',
    ];

    protected $casts = [
        'is_active' => 'boolean',
        'position' => 'integer',
    ];

    /**
     * Get the content model.
     */
    public function content(): MorphTo
    {
        return $this->morphTo();
    }
}
