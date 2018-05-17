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
        'id', 'created_at', 'deleted_at', 'updated_at', 'num_dependentes', 'telefone_igreja', 'id_igreja', 'nacionalidade', 'tipo',
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
}
