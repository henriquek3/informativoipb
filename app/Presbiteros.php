<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use OwenIt\Auditing\Contracts\Auditable;

class Presbiteros extends Model implements Auditable
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
     * @return string
     */
    public function status_civil()
    {
        switch ($this->estado_civil) {
            case 1:
                return 'Casado';
                break;
            case 2:
                return 'Solteiro';
                break;
            case 3:
                return 'Viúvo';
                break;
            case 4:
                return 'Separado';
                break;
            default:
                return '--';
        }
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function usuario()
    {
        return $this->belongsTo("App\User", "user_id", "id");
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function igreja()
    {
        return $this->belongsTo("App\Igrejas", 'id_igreja', "id");
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function endereco_estado()
    {
        return $this->belongsTo("App\Estados", "endereco_id_estado", "id");
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function endereco_cidade()
    {
        return $this->belongsTo("App\Cidades", "endereco_id_cidade", "id");
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function nascimento_estado()
    {
        return $this->belongsTo("App\Estados", "nascimento_id_estado", "id");
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function nascimento_cidade()
    {
        return $this->belongsTo("App\Cidades", "nascimento_id_cidade", "id");
    }
}
