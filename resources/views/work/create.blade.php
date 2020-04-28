@extends('base')
@section('main')
    <div class="row">
        <div class="col-sm-8 offset-sm-2">
            <h3 class="text-center">Cadastro de Mão de Obra</h3>
            <div>
                @if ($errors->any())
                    <div class="alert alert-danger">
                        <ul>
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div><br />
                @endif
                <form method="post" action="{{ route('work.store') }}">
                    @csrf
                    <div class="form-group">
                        <label for="first_name">Nome</label>
                        <input type="text" class="form-control" name="name"/>
                    </div>

                    <div class="form-group">
                        <label for="last_name">CPF/CNPJ</label>
                        <input type="text" class="form-control" name="national_registry"/>
                    </div>

                    <div class="form-group">
                        <label for="email">E-mail</label>
                        <input type="text" class="form-control" name="email"/>
                    </div>
                    <div class="form-group">
                        <label for="country">Telefone(WhatsApp)</label>
                        <input id='phone' type="text" class="form-control" name="phone"/>
                    </div>
                    <div class="form-group">
                        <label for="country">Tipo de Mão de Obra</label>
                        <input type="text" class="form-control" name="work"/>
                    </div>
                    <div class="form-group">
                        <label for="city">Cidade</label>
                        <select class='form-control' id="city_id" name="city_id">
                            @foreach($cities as $city)
                                <option value="{{$city->id}}">{{$city->name}} - {{$city->state}}</option>
                            @endforeach
                        </select>
                    </div>
                    <button type="submit" class="btn btn-primary btn-block">Cadastrar</button>
                </form>
            </div>
            @if(session()->get('success'))
                <div class="alert alert-success">
                    {{ session()->get('success') }}
                </div>
            @endif
        </div>
    </div>
@endsection
