<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Igrejas extends Model
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
        return $this->belongsTo("App\User", "user_id");
    }

    public function presbiterio()
    {
        return $this->belongsTo("App\Presbiterios","id_presbiterio");
    }

    public function sinodo()
    {
        return $this->belongsTo("App\Sinodos","id_sinodo");
    }

    public function congregacoes()
    {
        return $this->hasMany(\App\IgrejasCongregacoes::class, 'id_igreja');
    }
}
