<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Tag extends Model
{
    use HasFactory;

    protected $fillable = [
        'tag_collection_id',
        'name',
        'color',
    ];

    /**
     * Get the collection that owns this tag.
     */
    public function tagCollection(): BelongsTo
    {
        return $this->belongsTo(TagCollection::class);
    }
}
