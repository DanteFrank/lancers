@extends('layouts.app')


@section('styles')
<style>
        body {
            font-family: 'Ubuntu', sans-serif;
            font-weight: 200;
        }
        
        h1 {
            font-family: 'Ubuntu', sans-serif;
            font-weight: 300;
            font-size: 72px;
        }
        
        h4 {
            font-family: 'Ubuntu', sans-serif;
            font-weight: 300;
            font-size: 32px;
        }
        
        .pass-changed {
            border: thin #c4c4c4 solid;
            border-radius: 6px 6px 6px 6px;
        }
        
        a {
            color: #000;
        }
        
        a:hover {
            text-decoration: none;
            color: #000;
        }
        
        .btn-success {
            background-color: #0ABAB5;
            border: thin #0ABAB5 solid;
        }
        
        .btn-success:hover {
            background-color: #0ABAB5;
            border: thin #0ABAB5 solid;
        }
        .p-last {
            line-height: 0.5px;
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
@endsection

@section('script')
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.4.1/jquery.slim.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.15.0/umd/popper.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.3.1/js/bootstrap.min.js"></script>
    <script>
            const login = document.querySelector("#loginform");
            const password = document.querySelector("#password").value;
            const email = document.querySelector("#email").value;
            // const passwordMessage = document.querySelector("#pmessage");
        
            login.addEventListener("submit", function(e) {
                e.preventDefault();
                // passReg = /(?=.*\d)(?=.*[a-z])(?=.*[A-Z])\w{6,}/;
                emailReg = /^(([^<>()\[\]\.,;:\s@\"]+(\.[^<>()\[\]\.,;:\s@\"]+)*)|(\".+\"))@(([^<>()[\]\.,;:\s@\"]+\.)+[^<>()[\]\.,;:\s@\"]{2,})$/i;
                const passwordMessage = document.querySelector("#pmessage");
                const emailMessage = document.querySelector("#emessage");
        
        let validatePassword =function(){
        
        
            
            passwordMessage.textContent = null;
                    passwordMessage.textContent = null;
            let p = document.createElement(`p`);
            p.classList.add("alert", "alert-warning");
            p.textContent = "Please enter valid password. Letters and digits Only";
            passwordMessage.appendChild(p);
            console.log(p);
        
            setTimeout(function () {
                passwordMessage.remove();
            }, 4000);
                } 
        
        let validateEmail = function(){
            emailMessage.textContent = null;
            let p = document.createElement(`p`);
            p.classList.add("alert", "alert-danger");
            p.textContent = "Please enter a valid email";
            emailMessage.appendChild(p);
            console.log(p);
        
            setTimeout(function () {
                emailMessage.innerHTML = "";
            }, 4000);
        }
        
        
                
                if (email === ""){
                   validateEmail()
                }
        
                 if (password === "" ) {
                    validatePassword()
                }
        
               
            });
           
        </script>
@endsection