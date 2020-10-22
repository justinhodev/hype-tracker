<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Ranking extends Model
{
    use HasFactory;

    /**
     * Use PascalCase for tables.
     *
     * @var string
     */
    protected $table = 'rankings';

    /**
     * The attributes that should be mutated to dates.
     *
     * @var array
     */
    protected $dates = [
        'date',
    ];

    /**
     * Get Sneaker that owns the Ranking.
     *
     * @return BelongsTo
     */
    public function sneaker(): BelongsTo
    {
        return $this->belongsTo('App\Models\Sneaker');
    }
}
