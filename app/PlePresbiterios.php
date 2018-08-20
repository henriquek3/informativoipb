<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class PlePresbiterios extends Model
{
    use SoftDeletes;
    /**
     * @var array
     */
    protected $guarded = [
        'id', 'created_at', 'deleted_at', 'updated_at',
    ];


    //protected $fillable = [];

    public function usuario()
    {
        return $this->belongsTo("App\User", "user_id", "id");
    }
}
