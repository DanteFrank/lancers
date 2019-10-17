@extends('layouts.app')

@section('title')
   Password Reset
@stop

@section('styles')

<style>
    body{
        background-color: #ffffff;
        width: 100%;
        height: 100%;
        overflow-x: hidden;
    }
    
    .logo{
        font-size: 36px;
        font-family: 'pacifico', Ubuntu;
        display: block;
        text-align: left;
        padding-left: 40px;
        margin-top: 20px;
        }

        .logo a{
        text-decoration: none;
        color:#000;
        }

        .logo span {
        color: #0abab5;
        }

        .box2{
        padding: 30px;
        max-width: 580px;
        margin: auto;
        background-color: #ffffff;
        border: 1px solid #C4C4C4;
        border-radius: 6px;
        }

        .box2 h2 {
            color: #000000;
            text-align: center;
            font-size: 32px;
            font-family: 'Ubuntu';
            margin-bottom: 13px;
            margin-top: 18px;
            padding-top: 8px;
            line-height: 37px;
    }

    .text1{
        font-size: 18px;
        font-family: 'Ubuntu';
        text-align: center;

    }

    .text2{
        font-size: 18px;
        font-family: 'Ubuntu';
        text-align: center;

    }



</style>
@endsection

@section('content')
    <div class="container">
        <div class="clearfix mt-3">
            <div class="float-left">
                <a href="" class="navbar-brand"><img src="https://res.cloudinary.com/sgnolebagabriel/image/upload/v1570531368/Lancers_evgrmc.png" alt="logo"></a>
            </div>
            <div class="float-right">

            </div>
        </div>

        <div class="col-md-6 offset-md-3 text-center pass-changed mt-5 pt-3 pb-3">
            <h4><b>Password successfully reset!</b></h4>
            <p>You will now be redirected to your dashboard</p>
            <p>Click <a href="#">here</a> if you haven't been redirected in the next</p>
            <p class="p-last">few seconds.</p>

        </div>

    </div>
@stop