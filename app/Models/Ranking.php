<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Builder;

class Ranking extends Model
{
    use HasFactory;

    /**
     * Use PascalCase for tables
     *
     * @var string
     */
    protected $table = 'Rankings';

    /**
     * The attributes that should be mutated to dates
     *
     * @var array
     */
    protected $dates = [
        'Date',
    ];
}
