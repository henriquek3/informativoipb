<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use OwenIt\Auditing\Contracts\Auditable;

class Igrejas extends Model implements Auditable
{
    use SoftDeletes;
    use \OwenIt\Auditing\Auditable;
    /**
     * @var array
     */
    protected $guarded = [
        'id', 'created_at', 'deleted_at', 'updated_at',
    ];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function usuario()
    {
        return $this->belongsTo("App\User", "user_id");
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function presbiterio()
    {
        return $this->belongsTo("App\Presbiterios", "id_presbiterio");
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function sinodo()
    {
        return $this->belongsTo("App\Sinodos", "id_sinodo");
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function congregacoes()
    {
        return $this->hasMany(\App\IgrejasCongregacoes::class, 'id_igreja');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function cidade()
    {
        return $this->belongsTo(\App\Cidades::class, 'id_cidade');
    }
}
