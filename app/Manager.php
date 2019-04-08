<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Manager extends Model
{
    public function ManagerSpieceIs()
    {
        return $this->belongsTo('App\Specie', 'specie_id', 'id');
    }
}
