<?php

namespace App\Repositories;

use App\Models\TypeActive;
use InfyOm\Generator\Common\BaseRepository;

/**
 * Class DepartmentRepository
 * @package App\Repositories
 * @version January 9, 2018, 11:49 am -02
 *
 * @method Department findWithoutFail($id, $columns = ['*'])
 * @method Department find($id, $columns = ['*'])
 * @method Department first($columns = ['*'])
*/
class TypeActiveRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'nome',
        'status'
    ];

    /**
     * Configure the Model
     **/
    public function model()
    {
        return TypeActive::class;
    }
}
