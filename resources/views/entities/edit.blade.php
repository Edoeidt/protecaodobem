@extends('base')
@section('main')
    <div class="row">
        <div class="col-sm-8 offset-sm-2">
            <h2 class="text-center">Atualizar Entidades</h2>

            @if ($errors->any())
                <div class="alert alert-danger">
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
                <br />
            @endif
            {{dd($person)}}
{{--            <form method="post" action="{{ route('entities.update', $person->id) }}">--}}
{{--                @method('PATCH')    --}}
{{--                @csrf--}}
{{--                <div class="form-group">--}}

{{--                    <label for="first_name">Nome</label>--}}
{{--                    <input type="text" class="form-control" name="name" value={{ $person->name }} />--}}
{{--                </div>--}}
{{--                <div class="form-group">--}}
{{--                    <label for="email">E-mail</label>--}}
{{--                    <input type="text" class="form-control" name="email" value={{ $person->email }} />--}}
{{--                </div>--}}
{{--                <div class="form-group">--}}
{{--                    <label for="city">Cidade</label>--}}
{{--                    <input type="text" class="form-control" name="city" value={{ $person->cities[0]->name }} />--}}
{{--                </div>--}}
{{--                <div class="form-group">--}}
{{--                    <label for="country">Estado</label>--}}
{{--                    <input type="text" class="form-control" name="state" value={{ $person->cities[0]->state}} />--}}
{{--                </div>--}}
{{--                <div class="form-group">--}}
{{--                    <label for="job_title">Telefone</label>--}}
{{--                    <input type="text" class="form-control" name="phone" value={{ $person->phone}} />--}}
{{--                </div>--}}
{{--                <button type="submit" class="btn btn-primary">Atualizar</button>--}}
{{--            </form>--}}
        </div>
    </div>
@endsection
