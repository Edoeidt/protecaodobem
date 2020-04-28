@extends('base')

@if ($message = Session::get('success'))
    <div class="alert alert-success alert-block">
        <button type="button" class="close" data-dismiss="alert">×</button>
        <strong>{{ $message }}</strong>
    </div>
@endif

@section('main')
    <div class="row">
        <div class="col-sm-12">
            <h2 class="text-center">Doadores</h2>
            <table class="table table-striped">
                <thead>
                <tr>
                    <td>ID</td>
                    <td>Nome</td>
                    <td>Email</td>
                    <td>Telefone</td>
                    <td>Cidade</td>
                    <td>Estado</td>
                    <td>Doação</td>
                    <td>Concluído</td>
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
                        <td>
                            @if(isset($person->cities[0]))
                                {{$person->cities[0]->name}}
                            @endif
                        </td>
                        <td>
                            @if(isset($person->cities[0]))
                                {{$person->cities[0]->state}}
                            @endif
                        </td>
                        <td></td>
                        <td></td><td>
                            <a href="{{ route('donators.edit',$person->id)}}" class="btn btn-primary">Editar</a>
                        </td>
                        <td>
                            <form action="{{ route('donators.destroy', $person->id)}}" method="post">
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
        <a style="margin: 19px;" href="{{ route('donators.create')}}" class="btn btn-primary">Cadastro</a>
    </div>

@endsection
