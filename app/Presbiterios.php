<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Support\Facades\Auth;

class Presbiterios extends Model
{
    use SoftDeletes;

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
        return $this->belongsTo("App\User","user_id","id");
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function sinodo()
    {
        return $this->belongsTo("App\Sinodos", "id_sinodo", "id");
    }

    public function igrejas()
    {
        return $this->hasMany(\App\Igrejas::class, 'id_presbiterio');
    }

    /**
     * @param $query
     * @return mixed
     */
    /*public function scopeSinodos($query)
    {
        return $query->where('user_id', Auth::user()->id);
    }*/

    /**
     * Caso tiver que invocar uma função, transformar em atributo
     *
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
}
