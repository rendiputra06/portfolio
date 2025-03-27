<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\MorphOne;
use Illuminate\Database\Eloquent\Relations\HasMany;

class DataTable extends Model
{
    use HasFactory;

    protected $fillable = [
        'title',
        'description',
        'columns',
    ];

    protected $casts = [
        'columns' => 'array',
    ];

    /**
     * Get the section that owns this content.
     */
    public function section(): MorphOne
    {
        return $this->morphOne(Section::class, 'content');
    }

    /**
     * Get the rows for this table.
     */
    public function rows(): HasMany
    {
        return $this->hasMany(TableRow::class);
    }
}
