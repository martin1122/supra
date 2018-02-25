<?php

namespace App\Http\Controllers;

use App\YearClass;
use function foo\func;
use Illuminate\Http\Request;
use App\Repositories\YearClassRepository;
use Carbon\Carbon;
use Yajra\DataTables\DataTables;

class YearClassController extends Controller
{

    private $yearClassRepository;


    public function __construct(YearClassRepository $yearClassRepo)
    {
        $this->yearClassRepository = $yearClassRepo;
    }

    public function index()
    {
        return view('yearClass.index');
    }


    public function getBasicData()
    {

        $yearClass = YearClass::select(['id', 'classroom_id', 'activeTime', 'startTime', 'endTime']);

        return Datatables::of($yearClass)
            ->editColumn('classroom_id', function ($yearClass) {
                return $yearClass->classroom->nome_sala;
            })
            ->editColumn('startTime', function ($yearClass) {
                $startTime = Carbon::parse($yearClass->startTime);
                $endTime = Carbon::parse($yearClass->endTime);

                $diferenca = $startTime->diffInHours($endTime);

                return $startTime->format('h:i A') . ' ás ' . $endTime->format('h:i A') . ' - ' . $diferenca . 'h';
            })
            ->editColumn('activeTime', function ($yearClass) {

                $activeTime = Carbon::parse($yearClass->activeTime);

                $diferenca = Carbon::now()->diffInMonths($activeTime);
                return $activeTime->format('M-Y') . ' Encerra em ' . $diferenca . ' Meses';
            })
            ->addColumn('link', function ($yearClass) {
                return '
                <a href="/class/' . $yearClass->id . '' . '" class="btn btn-default btn-xs"><i class="glyphicon glyphicon-eye-open"></i></a>
                <a href="/class/' . $yearClass->id . '/edit' . '" class="btn btn-default btn-xs"><i class="glyphicon glyphicon-edit"></i></a>
                ';
            })
            ->rawColumns(['link', 'funcionamento'])
            ->make(true);
    }

    public function create()
    {
        return view('yearClass.create');
    }


    public function store(Request $request)
    {

        $input = $request->all();
        $input['activeTime'] = '01-' . $input['activeTime'];
        $input['activeTime'] = Carbon::createFromFormat('d-m-Y', $input['activeTime'])->format('Y-m-d');
        $yearClass = $this->yearClassRepository->create($input);
        return dd($yearClass);
    }
}