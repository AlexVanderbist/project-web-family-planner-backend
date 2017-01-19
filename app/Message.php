<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Message extends Model
{

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'message', 'signature', 'color'
    ];

    protected $dates = [
        'created_at',
        'updated_at',
        'start',
        'end'
    ];

    public function household() {
        return $this->belongsTo(Household::class);
    }
}
