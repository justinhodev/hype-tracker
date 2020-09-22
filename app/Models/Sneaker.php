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
}
