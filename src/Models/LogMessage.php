<?php

namespace Yoeriboven\LaravelLogDb\Models;

use Illuminate\Database\Eloquent\Casts\AsArrayObject;
use Illuminate\Database\Eloquent\Model;

class LogMessage extends Model
{
    /**
     * The attributes that aren't mass assignable.
     *
     * @var array
     */
    protected $guarded = [];

    /**
     * Indicates if the model should be timestamped.
     *
     * @var bool
     */
    public $timestamps = false;

    /**
     * The attributes that should be cast.
     *
     * @var array
     */
    protected $casts = [
        'context' => AsArrayObject::class,
        'extra' => AsArrayObject::class,
    ];

    public function __construct(array $attributes = [])
    {
        parent::__construct($attributes);

        $connection = config('logging.channels.db.connection') ?? config('database.default');

        $this->setConnection($connection);
    }
}
