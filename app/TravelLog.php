<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class TravelLog extends Model
{
    protected $fillable = ['carman_id', 'start_x', 'start_y', 'destination_x', 'destination_y', 'travel'];

    public function carman()
    {
        return $this->hasOne('App\Carman');
    }
    
}
