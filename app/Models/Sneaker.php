<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Sneaker extends Model
{
    use HasFactory;

    /**
     * Use PascalCase for tables
     *
     * @var string
     */
    protected $table = 'Sneakers';

    /**
     * Primary Key - use name
     *
     * @var string
     */
    protected $primaryKey = 'Name';

    /**
     * Change PK type to string
     *
     * @var string
     */
    protected $keyType = 'string';

    /**
     * Stop auto-increment for non-int PK
     *
     * @var bool
     */
    public $incrementing = false;

    /**
     * Get Sneaker name
     *
     * @param string $value
     * @return string
     */
    public function getNameAttribute($value): string
    {
        return ucwords($value);
    }

    /**
     * Get Sneaker price
     *
     * @param int $value
     * @return int
     */
    public function getPriceAttribute($value): int
    {
        return $value;
    }

    /**
     * Get Sneaker brand
     *
     * @param string $value
     * @return string
     */
    public function getBrandAttribute($value): string
    {
        return ucwords($value);

    }

    /**
     * Set Sneaker name
     *
     * @param string $value
     * @return void
     */
    public function setNameAttribute($value): void
    {
        $this->attributes['Name'] = strtolower($value);
    }

    /**
     * Set Sneaker price
     *
     * @param int $value
     * @return int
     */
    public function setPriceAttribute($value): void
    {
        $this->attributes['Price'] = $value;
    }

    /**
     * Set Sneaker brand
     *
     * @param string $value
     * @return void
     */
    public function setBrandAttribute($value): void
    {
        $this->attributes['Brand'] = $value;
    }
}
