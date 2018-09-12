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

    public function setCnpjAttribute($value)
    {
        if (empty($value)) {
            $this->attributes['cnpj'] = NULL;
        } else {
            $this->attributes['cnpj'] = $value;
        }
    }

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

    public function relatorioEstatistica()
    {
        return $this->hasMany(\App\RelEstatisticas::class, 'id_igreja')->where('ano', '=', Date('Y'));
    }

    public function relatorioConselho()
    {
        return $this->hasMany(\App\RelConselhos::class, 'id_igreja')->where('ano', '=', Date('Y'));
    }

    public function relatorioMinistro()
    {
        return $this->hasMany(\App\RelMinistros::class, 'id_igreja')->where('ano', '=', Date('Y'));
    }

    public function statusRelatorio()
    {
        $relEstatistica = $this->has('relatorioEstatistica')->exists();
        $relConselho = $this->has('relatorioConselho')->exists();
        $relMinistro = $this->has('relatorioMinistro')->exists();
        $response['estatistica'] = $relEstatistica;
        $response['conselho'] = $relConselho;
        $response['ministro'] = $relMinistro;
        return $response;
    }
}
