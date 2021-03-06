<?php

namespace App\Models;

use Eloquent as Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * Class Role
 * @package App\Models
 * @version January 8, 2018, 9:03 pm -02
 *
 * @property \Illuminate\Database\Eloquent\Collection alunoEmail
 * @property \Illuminate\Database\Eloquent\Collection alunolocation
 * @property \Illuminate\Database\Eloquent\Collection alunoEscola
 * @property \Illuminate\Database\Eloquent\Collection alunoPessoa
 * @property \Illuminate\Database\Eloquent\Collection alunophone
 * @property \Illuminate\Database\Eloquent\Collection pessoaEmail
 * @property \Illuminate\Database\Eloquent\Collection pessoalocation
 * @property \Illuminate\Database\Eloquent\Collection pessoaphone
 * @property \Illuminate\Database\Eloquent\Collection usuarioPessoas
 * @property string nome
 * @property boolean status
 */
class Role extends Model
{
    use SoftDeletes;

    public $table = 'employee_roles';
    
    const CREATED_AT = 'created_at';
    const UPDATED_AT = 'updated_at';


    protected $dates = ['deleted_at'];


    public $fillable = [
        'nome',
        'status'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'id' => 'integer',
        'nome' => 'string',
        'status' => 'boolean'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        'nome' => 'required|min:3|max:255',
        'status' => 'required',
    ];

    public function pessoa()
    {
        return $this->belongsToMany('App\Models\Pessoa');
    }

    
}
