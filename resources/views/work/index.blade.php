@extends('base')

<div class="col-sm-12">
    @if(session()->get('success'))
        <div class="alert alert-success">
            {{ session()->get('success') }}
        </div>
    @endif
</div>

@section('main')
    <div class="row">
        <div class="col-sm-12">
            <h2 class="text-center">Mão de Obra</h2>
            <table class="table table-striped">
                <thead>
                <tr>
                    <td>ID</td>
                    <td>Nome</td>
                    <td>Email</td>
                    <td>Telefone</td>
                    <td>Tipo MO</td>
                    <td>Cidade</td>
                    <td>Estado</td>
                    <td colspan = 2>Ações</td>
                </tr>
                </thead>
                <tbody>
                @foreach($persons as $person)
                    <tr>
                        <td>{{$person->id}}</td>
                        <td>{{$person->name}} </td>
                        <td>{{$person->email}}</td>
                        <td>{{$person->phone}}</td>
                        <td>{{$person->work}}</td>
                        <td>{{$person->cities[0]->name}}</td>
                        <td>{{$person->cities[0]->state}}</td>
                        <td>
                            <a href="{{ route('work.edit',$person->id)}}" class="btn btn-primary">Editar</a>
                        </td>
                        <td>
                            <form action="{{ route('work.destroy', $person->id)}}" method="post">
                                @csrf
                                @method('DELETE')
                                <button class="btn btn-danger" type="submit">Excluir</button>
                            </form>
                        </td>
                    </tr>
                @endforeach
                </tbody>
            </table>
            <div>
            </div>
        </div>
    </div>
    <div>
        <a style="margin: 19px;" href="{{ route('work.create')}}" class="btn btn-primary">Cadastro</a>
    </div>

@endsection
