<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Presbiterios extends Model
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
        return $this->belongsTo("App\User","user_id","id");
    }

    public function sinodo()
    {
        return $this->belongsTo("App\Sinodos", "id_sinodo", "id");
    }
}
