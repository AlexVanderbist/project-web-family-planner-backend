<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Screen extends Model
{

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'code', 'type', 'household_id'
    ];

    public function household() {
        return $this->belongsTo(Household::class);
    }
}
