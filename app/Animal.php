<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Animal extends Model
{
    public function AnimalSpieceIs()
    {
        return $this->belongsTo('App\Specie', 'specie_id', 'id');
    }
    public function AnimalManagerIs()
    {
        return $this->belongsTo('App\Manager', 'manager_id', 'id');
    }
}
