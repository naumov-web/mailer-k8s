<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * Class Recipient
 * @package App
 */
class Recipient extends Model
{

    use SoftDeletes;

    /**
     * Define fillable fields
     * @var array
     */
    protected $fillable = [
        'email',
        'name',
        'surname'
    ];

}
