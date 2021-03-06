<dl class="dl-horizontal">


@if(!empty($pessoa->nome))
    <!-- Nome Field -->

        @if($pessoa->tipoPessoa->id == 5)
            <dt>{!! Form::label('nomeFantasia', 'Nome Fantasia:') !!}</dt>
        @else
            <dt>{!! Form::label('nome', 'Nome:') !!}</dt>
        @endif

        <dd>{!! $pessoa->nome !!}</dd>

    @endif

    @if(!empty($pessoa->cpf_cnpj))
    <!-- Cpf Cnpj Field -->
        <dt>{!! Form::label('cpf_cnpj', strlen($pessoa->cpf_cnpj) != 14 ? "CNPJ:":"CPF:") !!}</dt>
        <dd>{!! $pessoa->cpf_cnpj !!}</dd>
    @endif

    @if(!empty($pessoa->gender->nome))
    <!-- Sexo Field -->
        <dt>{!! Form::label('sexo', 'Gênero:') !!}</dt>
        <dd>{!! $pessoa->gender->nome !!}</dd>
    @endif

    @if(!empty($pessoa->rg))
    <!-- Rg Field -->
        <dt>{!! Form::label('rg', 'RG:') !!}</dt>
        <dd>{!! $pessoa->rg !!}</dd>
    @endif

    @if(!empty($pessoa->dataNascimento))
    <!-- Datanascimento Field -->
        <dt>{!! Form::label('dataNascimento', 'Nascimento:') !!}</dt>
        <dd>{!! $pessoa->dataNascimento->format('d/m/Y') !!}</dd>
    @endif

    @if(count($pessoa->email) != 0)
        <dt> {!! Form::label('email', count($pessoa->email) > 1 ?'E-mails:':'E-mail:') !!}</dt>
        @foreach($pessoa->email as $email)
            <dd>{!! $email->email !!}</dd>
        @endforeach
    @endif

    @if(count($pessoa->phone) != 0)
        <dt> {!! Form::label('phone', count($pessoa->phone) > 1 ?'Telefones:':'Telefone:') !!}</dt>

        @foreach($pessoa->phone as $phone)
            <dd>{!! $phone->number !!}</dd>
        @endforeach
    @endif


    @if(!empty($pessoa->getFamilySituation->nome))
    <!-- familySituation Field -->
        <dt>{!! Form::label('familySituation', 'Estado Civil:') !!}</dt>
        <dd>{!! $pessoa->getFamilySituation->nome !!}</dd>
    @endif

    @if(!empty($pessoa->razaoSocial))
    <!-- Razaosocial Field -->
        <dt>{!! Form::label('razaoSocial', 'Razão Social:') !!}</dt>
        <dd>{!! $pessoa->razaoSocial !!}</dd>
    @endif

    @if(!empty($pessoa->nomeFantasia))
    <!-- Nomefantasia Field -->
        <dt>{!! Form::label('nomeFantasia', 'Nome Fantasia:') !!}</dt>
        <dd>{!! $pessoa->nomeFantasia !!}</dd>
    @endif

    @if(!empty($pessoa->inscricaoEstadual))
    <!-- Inscricaoestadual Field -->
        <dt>{!! Form::label('inscricaoEstadual', 'Inscrição Estadual:') !!}</dt>
        <dd>{!! $pessoa->inscricaoEstadual !!}</dd>
    @endif

    @if(!empty($pessoa->getCitizenship->nome))
    <!-- Citizenship Field -->
        <dt>{!! Form::label('citizenship', 'Nacionalidade:') !!}</dt>
        <dd>{!! $pessoa->getCitizenship->nome !!}</dd>
    @endif

    @if(!empty($pessoa->status))
    <!-- Status Field -->
        <dt>{!! Form::label('status', 'Status:') !!}</dt>
        <dd>{!! $pessoa->status ? "Ativo":"Inativo"!!}</dd>
    @endif

    @if(count($pessoa->roles) != 0)
    <!-- roles Field -->
        <dt> {!! Form::label('role', count($pessoa->roles) > 1 ?'Funções:':'Função') !!}</dt>
        @foreach($pessoa->roles as $role)
            <dd> {{$role->nome}} <span
                        class="label label-info">{{$role['pivot']->flg_principal ? "Principal":""}}</span></dd>
        @endforeach
    @endif

    @if(count($pessoa->departments) != 0)
    <!-- roles Field -->
        <dt> {!! Form::label('departments', count($pessoa->departments) > 1 ?'Departamentos:':'Departamento:') !!}</dt>
        @foreach($pessoa->departments as $department)
            <dd>{{$department->nome}} <span
                        class="label label-info">{{$department['pivot']->flg_principal ? "Principal":""}}</span></dd>
        @endforeach
    @endif


    @if(!empty($pessoa->tipoPessoa->nome))
    <!-- Tipo Pessoas Id Field -->
        <dt>{!! Form::label('tipo_pessoas_id', 'Categoria:') !!}</dt>
        <dd>{!! $pessoa->tipoPessoa->nome !!}</dd>
    @endif

    @if(!empty($pessoa->created_at))
    <!-- Created At Field -->
        <dt>{!! Form::label('created_at', 'Criado em:') !!}</dt>
        <dd>{!! $pessoa->created_at->format('d/m/Y') !!}</dd>
    @endif

    @if(!empty($pessoa->updated_at))
    <!-- Updated At Field -->
        <dt>{!! Form::label('updated_at', 'Atualizado em:') !!}</dt>
        <dd>{!! $pessoa->updated_at->format('d/m/Y') !!}</dd>
    @endif

    @if(!empty($pessoa->deleted_at))
    <!-- Deleted At Field -->
        <dt>{!! Form::label('deleted_at', 'Deletado em:') !!}</dt>
        <dd>{!! $pessoa->deleted_at->format('d/m/Y') !!}</dd>
    @endif
</dl>