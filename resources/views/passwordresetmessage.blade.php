@extends('layouts.app')


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
          font-size: 16px;
          font-family: 'Ubuntu';
          text-align: center;

        }

  </style>
@endsection

@section('content')
<div class="logo"> <a href="https://lancers.app/">Lan<span>c</span>ers </a></div><br>  

    <div class="container">
        <div class="row">

            <div class="col-sm-3"></div>

            <div class="col-sm-6">
                <div class="box">
                    <div class="box2">
                        <h2> Password Succesfully Reset!</h2>
                        <div class="text1"> <p>You will now be redirected to your dashboard</p> </div>
                        <div class="text2"> <p>Click here if you aren't redirected in the next<br>few seconds</p></div>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection
