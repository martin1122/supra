<?php

Route::get('/', function () {
    return view('welcome');
});


Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');


Route::get(
    'alunos/getBasicData',
    'AlunosController@getBasicData'
)->name('alunos.getBasicData');

Route::get(
    'pessoas/getBasicData',
    'PessoaController@getBasicData'
)->name('pessoas.getBasicData');



Route::get(
    'pessoas/getInfoUser/{idPessoa}',
    'PessoaController@getInfoUser'
)->name('pessoas.getInfoUser');

Route::get(
    'alunos/getInfoUser/{idAluno}',
    'AlunosController@getInfoUser'
)->name('alunos.getInfoUser');


Route::post(
    'pessoas/emailMain',
    'PessoaController@mainEmailPessoaAjax'
)->name('pessoa.emailMain');

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

Route::resource('emails', 'EmailController');

Route::resource('healthInformations', 'HealthInformationsController');

Route::get('matricula', 'MatriculaController@index')->name('matricula.index');
Route::post('matricula', 'MatriculaController@store')->name('matricula.store');

Route::resource('classrooms', 'ClassroomController');

Route::resource('schoolsubject', 'SchoolSubjectController');

Route::get(
    'roles/getAjax',
    'RoleController@dataAjax'
)->name('roles.getAjaxSelect2');

Route::resource('roles', 'RoleController');

Route::get(
    'departments/getAjax',
    'DepartmentController@dataAjax'
)->name('departments.getAjaxSelect2');

Route::resource('departments', 'DepartmentController');

Route::resource('user/management', 'UserManagementController');