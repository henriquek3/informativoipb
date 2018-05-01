<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class IgrejasCongregacoes extends Model
{
    use SoftDeletes;

    protected $guarded = [
        'id', 'created_at', 'deleted_at', 'updated_at',
    ];

    public function usuario()
    {
        return $this->belongsTo("App\User", "user_id", "id");
    }

    public function igreja()
    {
        return $this->belongsTo("App\Igrejas", 'id_igreja', "id");
    }
}
