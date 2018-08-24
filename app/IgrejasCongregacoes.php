<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class IgrejasCongregacoes extends Model
{
    use SoftDeletes;

    protected $guarded = [
        'id', 'created_at', 'deleted_at', 'updated_at', 'cnpj',
    ];

    public function usuario()
    {
        return $this->belongsTo("App\User", "user_id");
    }

    public function igreja()
    {
        return $this->belongsTo("App\Igrejas", 'id_igreja');
    }
}
