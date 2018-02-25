<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class YearClass extends Model
{

    use SoftDeletes;

    public $table = 'yearClass';

    const CREATED_AT = 'created_at';
    const UPDATED_AT = 'updated_at';


    protected $dates = [
        'deleted_at',
    ];

    public $fillable = [
        'classroom_id',
        'activeTime',
        'startTime',
        'endTime'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        'classroom_id' => 'required',
        'activeTime' => 'required',
        'startTime' => 'required',
        'endTime' => 'required',
    ];


    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     **/
    public function classroom()
    {
        return $this->hasOne(
            \App\Models\Classroom::class,
            'id',
            'classroom_id'
        )->select('id', 'nome_sala');
    }
}