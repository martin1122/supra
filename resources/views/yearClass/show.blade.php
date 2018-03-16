@extends('layouts.app')

@section('css')
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <meta name="id-class" content="{{ $class->id }}">
@endsection

@section('content')
    <section class="content-header">

    </section>
    <div class="contnt">
        <div class="row">
            <div class="col-lg-8">
                <div class="box">
                    <div class="box-header with-border">
                        <div class="box-tools pull-right">

                            <div class="btn-group">


                            </div>

                        </div>
                        <div class="box-title" style="overflow: hidden">
                            @include('yearClass.header')

                        </div>
                    </div>
                </div>

                <div class="box">
                    <div class="box-header with-border">
                        <div class="box-tools pull-right">
                            <div class="btn-group">
                                <a data-toggle="collapse" href="#collapseAluno" aria-expanded="false"
                                   aria-controls="collapseAluno">
                                    Adicionar Aluno
                                </a>
                            </div>
                        </div>
                        Alunos
                    </div>
                    <div class="box-body">
                        <div class="row">

                            @include('yearClass.add_alunos')


                        </div>
                    </div>
                    <div class="box-body">


                        @include('yearClass.alunos_table')
                    </div>
                </div>
            </div>
            <div class="col-lg-4">
                @include('yearClass.classroom_activities')

            </div>
        </div>
    </div>

    <!-- Modal remover aluno -->
    <div class="modal fade" id="unsync" tabindex="-1" role="dialog" aria-hidden="true">
        <div class="modal-dialog modal-sm" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title"><strong>Desvincular aluno?</strong></h5>
                </div>
                <div class="modal-body text-center">

                    <div class="alert alert-warning">
                        <i id="alertDelete" class="fa fa-exclamation" style="font-size:80px; color: #333;"></i>
                        <p></p>
                        <strong>Atenção!</strong> Você realmente deseja remover esse aluno?
                    </div>

                    <p></p>
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancelar</button>
                    <button id="unsyncButton" type="button" value="" class="btn btn-warning">Desvincular</button>
                </div>

            </div>
        </div>
    </div>

    <!-- Modal add activities-->


    <div class="modal fade " id="activitiesModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
         aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel"><i class="fa fa-file-text-o"></i> &nbsp; Nova
                        atividade</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                {!! Form::open(['route' => 'activitie.store', 'files' => true, 'id' => 'activitiesClass', 'data-toggle' => 'validator', 'autocomplete' => 'off']) !!}

                <input name="yearClass_id" type="hidden" value="{{$class->id}}">

                <div class="modal-body">
                    <div class="row">
                        <div class="col-lg-12">
                            <div class="form-group">
                                <label for="title" class="form-control-label">Titulo:</label>
                                <input name="title" type="text" class="form-control" id="recipient-name"
                                       required="required">
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-lg-6">
                            <div class="form-group">
                                <label for="start_date" class="form-control-label">Data inicío:</label>
                                <input name="start_date" type="text" class="form-control date" id="recipient-name"
                                       required="required">
                            </div>
                        </div>
                        <div class="col-lg-6">
                            <div class="form-group">
                                <label for="end_date" class="form-control-label">Data fim:</label>
                                <input name="end_date" type="text" class="form-control date" id="recipient-name"
                                       required="required">
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-lg-12">
                            <div class="form-group">
                                <label for="attachedFile" class="form-control-label">Anexar atividade:</label>
                                <input name="attachedFile[]" type="file" multiple>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-lg-12">
                            <div class="form-group">
                                <label for="description" class="form-control-label">Descrição:</label>
                                <textarea name="description" class="form-control" id="message-text"></textarea>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancelar</button>
                    {!! Form::submit('Criar', ['class' => 'btn btn-primary']) !!}
                </div>
                {!! Form::close() !!}

            </div>
        </div>
    </div>

    <div class="modal fade" id="activitiesInfoModal" tabindex="-1" role="dialog" aria-labelledby="activitiesInfoModal"
         aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <div class="box-tools pull-right">
                        <button id="removeActivities" type="button" class="btn btn-box-tool" aria-expanded="false" data-toggle="tooltip" data-placement="right" title="" data-original-title="Excluir atividade">
                            <i class="fa fa-trash" style="font-size: 20px; color: #cb2027;"></i>
                        </button>
                    </div>
                    <h4 class="modal-title" id="title"></h4>
                    <h5 id="dates"></h5>
                    <div class="row">
                        <div class="col-lg-6">
                            <select name="activitieAluno" id="activitieAluno" class="form-control"
                                    required="required"></select>
                        </div>
                        <div class="col-lg-3">
                            <input type="text" id="media" name="media" class="form-control" required="required"
                                   placeholder="Média" ata-affixes-stay="true" data-suffix="%" data-thousands="."
                                   data-decimal="," maxlength="7">
                        </div>
                        <div class="col-lg-3">
                            <input type="button" value="Incluir" class="btn btn-primary">
                        </div>
                    </div>
                </div>
                <div class="modal-body">
                    <div class="box box-success collapsed-box">
                        <div class="box-header with-border">
                            <h3 class="box-title">Arquivos Anexados</h3>
                            <div class="box-tools pull-right">
                                <button type="button" class="btn btn-box-tool" data-widget="collapse"
                                        aria-expanded="false">
                                    <i class="fa fa-plus"></i>
                                </button>
                            </div>
                        </div>
                        <div class="box-body collapse">
                            <table class="table table-responsive" id="listDocs">
                                <thead>
                                <tr>
                                    <th>Nome</th>
                                    <th style="text-align: center">Data</th>
                                    <th style="text-align: center">Formato</th>
                                    <th style="text-align: center">Ação</th>
                                </tr>
                                </thead>
                                <tbody>

                                </tbody>
                            </table>
                        </div>
                    </div>

                    <div class="box box-primary" id="listAlunos">
                        <table class="table table-striped table-responsive">
                            <thead>
                            <tr>
                                <th>Aluno</th>
                                <th>Nota</th>
                                <th class="text-center">Ações</th>
                            </tr>
                            </thead>
                            <tbody>

                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection

@section('scripts')
    <script src="{{asset('/js/features/yearClass.js')}}"></script>
    <script src="{{asset('/js/features/activities.js')}}"></script>

@endsection