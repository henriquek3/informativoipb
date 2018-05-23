<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class RelMinistros extends Model
{
    use SoftDeletes;
    protected $table = "relatorios_ministros";
    /**
     * @var array
     */
    protected $guarded = [
        'id', 'created_at', 'deleted_at', 'updated_at', 'id_sinodo', 'id_presbiterio', 'id_presbitero', 'ordenacao_data', 'dedicacao_ministerio',
    ];

    public function usuario()
    {
        return $this->belongsTo("App\User", "user_id", "id");
    }
}
