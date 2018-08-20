<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class RelConselhos extends Model
{
    use SoftDeletes;

    protected $table = "relatorios_conselhos";
    /**
     * @var array
     */
    protected $guarded = [
        'id', 'id_sinodo', 'id_presbiterio', 'created_at', 'deleted_at', 'updated_at', 'sa_id_oficiais_vencimento',
    ];

    public function usuario()
    {
        return $this->belongsTo("App\User", "user_id", "id");
    }
}
