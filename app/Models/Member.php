<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Member extends Model
{
    use HasFactory;
    /**
     * Use PascalCase for tables
     *
     * @var string
     */
    protected $table = 'Members';

    /**
     * Primary Key - use name
     *
     * @var string
     */
    protected $primaryKey = 'Email';

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
     * Get Member name
     *
     * @param string $value
     * @return string
     */
    public function getNameAttribute($value): string
    {
        return ucwords($value);
    }

    /**
     * Get Member email
     *
     * @param string $value
     * @return string
     */
    public function getEmailAttribute($value): string
    {
        return $value;
    }

    /**
     * Get Member password
     *
     * @param string $value
     * @return string
     */
    public function getPasswordAttribute($value): string
    {
        return $value;
    }
}
