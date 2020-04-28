@extends('layouts.app')

@section('content')
    <style>
        html body{background-color: #eaecf1;margin: 0;padding: 0}
        .donationBox{
            width: 1200px;
            max-width: 95%;
            margin: 0 auto;
            padding: 40px 0;
        }
        .donationBox *{
            box-sizing: border-box;
        }
        .donationText{
            font-size:25px;margin: 0 0 10px;
        }
        .btnBox{
            padding: 30px 0 0;
        }
        .btnGroupBox{
            padding: 5px 0;
            text-align: center;
        }
        .btnGroupBox a{
            display: inline-block;
            text-decoration: none;
            color: initial;
            width: 100%;
            max-width: 220px;
            padding: 40px 0;
            background-color: #fff;
            box-shadow: 0px 3px 8px rgba(0,0,0,0.3);
        }
        .btnGroupBox a:first-child{float: left;}
        .btnGroupBox a:last-child{float: right;}
        @media(max-width:710px){
            .donationBox{
                width: auto;
                max-width: 100%;
                padding: 50px 20px;
            }
        }
        @media(max-width:710px){
            .donationText{
                text-align: center;
            }
            .btnBox .btnGroupBox a{
                float: inherit;
                display: block;
                margin:0 auto 20px;
                max-width: 120px;
            }

        }
    </style>
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-11">
                <div class="card">
                    <div class="card-header">Dashboard</div>
                    <div class="card-body">
                        @if (session('status'))
                            <div class="alert alert-success" role="alert">
                                {{ session('status') }}
                            </div>
                        @endif

                            <h2 class="donationText">{{$city}}</h2>
                            <div class="btnBox">
                                <h2 class="donationText">Doadores</h2>
                                <div class="btnGroupBox">
                                    <a class="donationText" href="{{route('donators.index')}}" title="DOAÇÕES">DOAÇÕES</a>
                                    <a class="donationText" href="{{route('providers.index')}}" title="FORNECEDORES">FORNECEDORES</a>
                                    <a class="donationText" href="{{route('logistic.index')}}" title="LOGISTICA">LOGISTICA</a>
                                    <a class="donationText" href="{{route('work.index')}}" title="MÃO DE OBRA">MÃO DE OBRA</a>
                                </div>
                                <h2 class="donationText">Recebem Doação</h2>
                                <div class="btnGroupBox">
                                    <a class="donationText" href="{{route('entities.index')}}" title="ENTIDADES">ENTIDADES</a>
{{--                                    <a class="donationText" href="" title="CLÍNICAS">CLÍNICAS</a>--}}
{{--                                    <a class="donationText" href="" title="OUTROS">OUTROS</a>--}}
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
