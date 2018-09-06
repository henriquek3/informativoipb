<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use OwenIt\Auditing\Contracts\Auditable;

class RelEstatisticas extends Model implements Auditable
{
    use SoftDeletes;
    use \OwenIt\Auditing\Auditable;

    /**
     * @var string
     */
    protected $table = "relatorios_estatisticas";
    /**
     * @var array
     */
    protected $guarded = [
        'id', 'created_at', 'deleted_at', 'updated_at', 'id_presbitero'
    ];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function usuario()
    {
        return $this->belongsTo("App\User", "user_id", "id");
    }
}
