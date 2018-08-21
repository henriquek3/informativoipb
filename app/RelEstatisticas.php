<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class RelEstatisticas extends Model
{
    use SoftDeletes;
    protected $table = "relatorios_estatisticas";
    /**
     * @var array
     */
    protected $guarded = [
        'id', 'created_at', 'deleted_at', 'updated_at', 'id_sinodo', 'id_presbiterio', 'ect_professores',
    ];

    public function usuario()
    {
        return $this->belongsTo("App\User", "user_id", "id");
    }
}
