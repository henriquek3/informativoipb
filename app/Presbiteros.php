<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Presbiteros extends Model
{
    use SoftDeletes;
    /**
     * @var array
     */
    protected $guarded = [
        'id', 'created_at', 'deleted_at', 'updated_at',
    ];


    public function usuario()
    {
        return $this->belongsTo("App\User", "user_id", "id");
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function igreja()
    {
        return $this->belongsTo("App\Igrejas",'id_igreja',"id");
    }
    public function endereco_estado()
    {
        return $this->belongsTo("App\Estados", "endereco_id_estado", "id");
    }
    public function endereco_cidade()
    {
        return $this->belongsTo("App\Cidades", "endereco_id_cidade", "id");
    }
    public function nascimento_estado()
    {
        return $this->belongsTo("App\Estados", "nascimento_id_estado", "id");
    }
    public function nascimento_cidade()
    {
        return $this->belongsTo("App\Cidades", "nascimento_id_cidade", "id");
    }
}
