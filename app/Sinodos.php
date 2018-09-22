<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use OwenIt\Auditing\Contracts\Auditable;

class Sinodos extends Model implements Auditable
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
        return $this->belongsTo("App\User", "user_id", "id");
    }

    /**
     * @return string
     */
    public function nome_regiao()
    {
        switch ($this->regiao) {
            case 1:
                return 'Norte';
                break;
            case 2:
                return 'Nordeste';
                break;
            case 3:
                return 'Centro-Oeste';
                break;
            case 4:
                return 'Sudeste';
                break;
            case 5:
                return 'Sul';
                break;
            default:
                return '--';
        }
    }

    /**
     * Get the user's full name.
     *
     * @return string
     */
    public function getUsuarioAuditoriaAttribute()
    {
        return \App\User::find($this->user_id)->nome;
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function presbiterios()
    {
        return $this->hasMany(\App\Presbiterios::class, 'id_sinodo');
    }
}
