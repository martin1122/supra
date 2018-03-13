<?php

namespace App\Repositories;

use App\Helpers\Helpers;
use App\Models\Activitie;
use InfyOm\Generator\Common\BaseRepository;

class ActivitieRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [

    ];


    private $pathFiles = "/attached/";

    /**
     * Configure the Model
     **/
    public function model()
    {
        return Activitie::class;
    }


    public function storeActivitie($request)
    {
        $data = $request->all();
        $helper = new Helpers();
        $data['start_date'] = $helper->formataDataPtBr($data['start_date']);
        $data['end_date'] = $helper->formataDataPtBr($data['end_date']);

        $activitie = $this->create($data);

        if ($request->hasFile('attachedFile')) {
            $helper->saveFile($request, 'attachedFile', $activitie);
        }

        return $activitie;
    }


    public function loadActivitie($id)
    {
        $activitie = $this->findWithoutFail($id);
        $activitie->load(['fileentry' => function ($query) {
            $query->orderBy('created_at', 'desc');
        }, 'aluno' => function ($query) {
            $query->orderBy('nome_aluno', 'asc');
        }]);


        return $activitie;
    }

}
