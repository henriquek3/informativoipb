<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Cidades extends Model
{
    public function estado()
    {
        return $this->belongsTo("App\Estados", "id_estado", "id");
    }
}
