<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * Class Letter
 * @package App
 */
class Letter extends Model
{

    use SoftDeletes;

    /**
     * Define fillable fields
     * @var array
     */
    protected $fillable = [
        'subject',
        'content',
        'status_id'
    ];

    /**
     * Get recipients relation
     *
     * @return BelongsToMany
     */
    public function recipients() : BelongsToMany
    {
        return $this->belongsToMany(Recipient::class, 'letter_recipients');
    }

}
