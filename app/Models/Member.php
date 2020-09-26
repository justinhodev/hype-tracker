<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class Member extends Model
{
    use HasFactory;
    /**
     * Use PascalCase for tables.
     *
     * @var string
     */
    protected $table = 'Members';

    /**
     * Get Member name.
     *
     * @param string $value
     * @return string
     */
    public function getNameAttribute($value): string
    {
        return ucwords($value);
    }

    /**
     * Set Member name.
     *
     * @param string $value
     * @return void
     */
    public function setNameAttribute($value): void
    {
        $this->attributes['Name'] = strtolower($value);
    }

    /**
     * Get all sneakers for a user.
     *
     * @return BelongsToMany
     */
    public function sneakers(): BelongsToMany
    {
        return $this->belongsToMany('App\Models\Sneaker', 'Watchlists', 'MemberId', 'SneakerId');
    }
}
