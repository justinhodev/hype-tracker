<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Sneaker extends Model
{
    use HasFactory;

    /**
     * Use PascalCase for tables.
     *
     * @var string
     */
    protected $table = 'Sneakers';

    /**
     * The attributes that should be cast.
     *
     * @var array
     */
    protected $casts = [
        'Price' => 'decimal:2',
    ];

    /**
     * Get Sneaker name.
     *
     * @param string $value
     * @return string
     */
    public function getNameAttribute($value): string
    {
        return ucwords($value);
    }

    /**
     * Get Sneaker brand.
     *
     * @param string $value
     * @return string
     */
    public function getBrandAttribute($value): string
    {
        return ucwords($value);
    }

    /**
     * Set Sneaker name.
     *
     * @param string $value
     * @return void
     */
    public function setNameAttribute($value): void
    {
        $this->attributes['Name'] = strtolower($value);
    }

    /**
     * Set Sneaker brand.
     *
     * @param string $value
     * @return void
     */
    public function setBrandAttribute($value): void
    {
        $this->attributes['Brand'] = strtolower($value);
    }

    /**
     * Get all Rankings for a Sneaker.
     *
     * @return HasMany
     */
    public function rankings(): HasMany
    {
        return $this->hasMany('App\Models\Ranking', 'SneakerId', 'id');
    }
}
