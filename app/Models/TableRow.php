<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class TableRow extends Model
{
    use HasFactory;

    protected $fillable = [
        'data_table_id',
        'values',
    ];

    protected $casts = [
        'values' => 'array',
    ];

    /**
     * Get the table that owns this row.
     */
    public function dataTable(): BelongsTo
    {
        return $this->belongsTo(DataTable::class);
    }
}
