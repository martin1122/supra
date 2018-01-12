<?php

Route::get('/', function () {
    return view('welcome');
});


Auth::routes();

Route::get('/home', 'HomeController@index');


Route::get(
    'alunos/getInfoUser/{idPessoa}',
    'PessoaController@getInfoUser'
)->name('pessoas.getInfoUser');


Route::post(
    'pessoas/storeAjax',
    'PessoaController@storeAjax'
)->name('pessoa.storeAjax');

Route::resource('pessoas', 'PessoaController');

Route::get(
    'alunos/getAjax',
    'PessoaController@dataAjax'
)->name('alunos.getAjaxSelect2');

Route::post(
    'alunos/responsaveis/{responsavel}',
    'AlunosController@updateResponsaveis'
)->name('alunos.updateResponsaveis');

Route::post(
    'alunos/responsaveis/{responsavel}/desvincular',
    'AlunosController@desvincularAluno'
)->name('alunos.desvincularAluno');

Route::resource('alunos', 'AlunosController');

Route::resource("salas", 'SalaController');

Route::resource('emails', 'EmailController');

Route::resource('dadosMedicos', 'DadosMedicosController');

Route::get('matricula', 'MatriculaController@index')->name('matricula.index');
Route::post('matricula', 'MatriculaController@store')->name('matricula.store');

Route::resource('salas', 'SalaController');

Route::resource('salas', 'SalaController');

Route::resource('materias', 'MateriaController');

Route::get(
    'roles/getAjax',
    'RoleController@dataAjax'
)->name('roles.getAjaxSelect2');

Route::resource('roles', 'RoleController');

Route::get(
    'setores/getAjax',
    'SetorController@dataAjax'
)->name('setores.getAjaxSelect2');

Route::resource('setores', 'SetorController');