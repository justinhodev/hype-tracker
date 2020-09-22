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
     * Primary Key - see schema
     *
     * @var string
     */
    protected $primaryKey = ['Platform', 'Date', 'SneakerName'];

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

    // ========================================================================
    // override default Model.php because it cannot have composite primary keys
    // implementation from https://stackoverflow.com/questions/430/86722/composite-primary-key-with-eloquent
    // remove when Laravel implements this upstead (laravel/ideas @issue #1699)

    protected function getKeyForSaveQuery()
    {
        $primaryKeyForSaveQuery = array(count($this->primaryKey));

        foreach ($this->primaryKey as $i => pKey) {
            $primaryKeyForSaveQuery[$i] = isset($this->original[$this->getKeyName()[$i]])
                ? $this->original[$this->getKeyName()[$i]]
                : $this->getAttribute($this->getKeyName()[$i]);
        }

        return $primaryKeyForSaveQuery;
    }

    /**
     * Set the keys for a save update query
     *
     * @param \Illuminate\Database\Eloquent\Builder $query
     * @return \Illuminate\Database\Eloquent\Builder
     */
    protected function setKeysForSaveQuery(Builder $query)
    {
        foreach ($this->primaryKey as $i => $pKey) {
            $query->where($this->getKeyName()[$i], '=', $this->getKeyForSaveQuery()[$i]);
        }

        return $query;
    }

    // ===========================================================================
}
