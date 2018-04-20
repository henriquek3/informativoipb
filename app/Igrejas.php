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

    public function presbiterio()
    {
        return $this->belongsTo("App\Presbiterios","id_presbiterio","id");
    }
}
