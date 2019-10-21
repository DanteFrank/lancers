@extends('layouts.app')

@section('styles')
	  <style>
        body {
					font-family: 'Roboto', sans-serif;
            font-weight: 200;
						font-size:14px;
        }

        h1 {
						font-family: 'Open Sans', sans-serif;
            font-weight: Bold;
            font-size: 24px;
        }

        h3 {
					font-family: 'Open Sans', sans-serif;
            font-weight: bold;
            font-size: 18px;
        }

        .form-container{
            width: 70%;
            margin-left: 200px;
        }

        .profile_form, .company-details-form {
            border: 1px solid #c4c4c4;
        }

        .names,
        .title_text,
        .newpassword
        .coy-details,
        .coy-details-2,
        .coy-contact{
            width: 100%;
            overflow: hidden;
        }

        .firstname,
        .lastname,
        .title,
        .email,
        .newPass,
        .conPass,
        .coy-details-name,
        .coy-details-email,
        .coy-currency,
        .coy-contact-state,
        .coy-contact-country,
        .coy-time-zone{
            width: 49%;
        }

        .firstname,
        .title,
        .newPass,
        .coy-details-name,
        .coy-currency,
        .coy-contact-country,
        .caret-angles {
            float: left;
        }

        .lastname,
        .email,
        .conPass,
        .coy-details-email,
        .coy-contact-state,
        .coy-time-zone,
        .caret-title {
            float: right;
        }

        label {
            display: block;

        }

        .company-details-form{
            margin-bottom: 100px;
        }

        .form_title{
            text-transform: uppercase;
            margin-left: 470px;
        }

        .caret h6{
            font-weight: bold;
            padding: 15px;
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

        .mybtn, .btn-company-details{
            margin-left: 200px;
            margin-top: 10px;
        }

        form#loginform button {
            background: #0ABAB5;
            border: 0px
        }

        div.floatright a,
        div.floatright p {
            font-size: 16px;
        }

        .error {
            background-color: red;
        }

        .msg{
            color: red;
            padding: 5px 5px;
        }

        /* .password-section {
            display: none;
            transform: scale(1.0);
            transition: visibility 0s linear 0s, opacity 0.25s 0s, transform 0.25s;
        } */

        .show-angle-down{
            display: none;
        }
				input, select{
					font-family: Roboto;
					font-style: normal;
					font-weight: bold!important;
					font-size: 14px!important;
				}
				label{
					font-weight: bold;
				}
				.green-btn {
				font-size: 16px;
				padding: 5px 20px;
				background-color: #0abab5;
				color: #ffffff;
				border: none;
				border-radius: 6px;
			}
			.side-nav {
				box-shadow: 0px 4px 4px rgba(0, 0, 0, 0.25);
				padding-bottom: 200px;
			}
			.logo-con {
				background-color: #000000;
			}
			.logo {
				font-family: "Pacifico", cursive;
				color: #ffffff;
				font-size: 36px;
			}
			.logo span {
				color: #0abab5;
			}
			.nav-option {
				font-family: Open Sans;
				font-style: normal;
				font-weight: bold;
				font-size: 18px;
				color: #4f4f4f;
				text-align: left;
			}
			.active-nav {
				color: #0abab5;
			}
			a:hover {
				text-decoration: none;
				color: #0abab5;
			}
			form{
				min-height:100px;
			}
        @media (max-width: 616px) {

            .form-container{
                width: 100%;
                margin-left: 0px;
            }
            .profile_form {
                width: 90%;
                margin: 0 auto;
            }

             .mybtn,
             .btn-company-details{
            margin-left: 0px;
        }

        .firstname,
        .title,
        .newPass,
        .lastname,
        .email,
        .conPass,
        .coy-details-email,
        .coy-contact-state,
        .coy-time-zone,
        .caret-titl,
        .coy-details-name,
        .coy-currency,
        .coy-contact-country,
        .caret-angles {
            float: none;
            width: 100%;
        }

        .form_title{
            text-transform: uppercase;
            margin-left: 30px;
            margin-bottom: 0px;
            padding-bottom: 0px;
        }

}



.kc-nav-box{
	height:80px;
	box-shadow: 0px 4px 4px rgba(0, 0, 0, 0.25);
}
.kc-a-u{
	height:50px;
	width:50px;
	border:1px solid black;
	border-radius:50%;
}


@media only screen and (max-width: 1024px) {
    .kc-a-u{
			height:50px;
	width:50px;
	border:1px solid black;
	border-radius:50%;
    }

}
@media only screen and (max-width: 999px) {
	.v-nav-index{
					z-index: 5;
					border:1px solid #c4c4c4;
					background-color: #ffffff;
	}
	form{
				height:100%;
				min-height:100%;
			}
			.kc-unlist-item{
				justify-content: center;
			}
}

@media only screen and (max-width: 768px) {
    .kc-unlist-item{
        flex-direction:row;
				width:90%;
				margin:0 5%!important;
    }

}
@media only screen and (max-width: 768px) {
    .kc-a-u{
			height:50px;
	width:50px;
	border:1px solid black;
	border-radius:50%;
        margin-left:2vh;
    }

}

@media only screen and (max-width: 414px) {
    .kc-a-u{
			height:50px;
	width:50px;
	border:1px solid black;
	border-radius:50%;
        margin-left:2vh;
    }

}

@media only screen and (max-width: 375px) {
    .kc-unlist-item{
        flex-direction:row;
    }

}
@media only screen and (max-width: 375px) {
    .kc-a-u{
			height:50px;
	width:50px;
	border:1px solid black;
	border-radius:50%;
        margin-left:2vh;
    }

}
@media only screen and (max-width: 360px) {
    .kc-unlist-item{
        flex-direction:row;
    }

}

@media only screen and (max-width: 360px) {
    .kc-a-u{
			height:50px;
	width:50px;
	border:1px solid black;
	border-radius:50%;
        margin-left:2vh;
    }

}
@media only screen and (max-width: 320px) {
    .kc-a-u{
			height:50px;
	width:50px;
	border:1px solid black;
	border-radius:50%;
        margin-left:2vh;
    }
}
    </style>
@endsection


@section('content')

   	<div style="background:#ffffff;" class="col-12 border kc-nav-box">
		<div class="row">
			<nav class="navbar col-12 navbar-expand-lg navbar-light  border-bottom kc-nav-box">
					<a class="navbar-brand" href="/dashboard">
					<img src="{{ asset('images/Shape.svg') }}" class="mr-3">
					DASHBOARD</a>
				    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
				    <span class="navbar-toggler-icon"></span>
			        </button>

			  		<div class="row collapse navbar-collapse mx-0 px-0 v-nav-index" id="navbarSupportedContent">
			  			<form class="form-inline my-2 my-lg-0 ml-auto col-lg-6 col-sm-12">
					      <input class="form-control mr-sm-2 col-12" type="search" placeholder="Search" aria-label="Search">
				    	</form>
					    <ul class="navbar-nav ml-0 kc-unlist-item">
						  <li class="nav-item active border-right">
						        <a class="nav-link mt-2 mr-3" href="#">
						        	<img src="{{ asset('images/help.svg') }}">
						        </a>
						    </li>
						    <li class="nav-item border-right">
						        <a class="nav-link mt-2 mx-3" href="#">
						        	<img src="{{ asset('images/alarm-clock.svg') }}">
						        </a>
						    </li>

						     <li class="nav-item border-right">
						         <a class="nav-link mt-2 mx-3" href="#">
						         	<img src="{{ asset('images/Vector.svg') }}">
						         </a>
						    </li>

						    <li class="nav-item">
						         <a class="nav-link" href="#" tabindex="-1" aria-disabled="true">
						         	<div class="kc-a-u d-flex align-items-center justify-content-center">
						         		<h3 style="color:black;" class="text-center mt-2">AU</h3>
						         	</div>
						         </a>
						    </li>
							</ul>
							<div class="d-lg-none" style="width:100%">
								<div class="d-flex flex-column align-items-center	">
									<a href="settings-profile.html" class="nav-option py-3 active-nav">Profile Settings</a>
									<a href="settings-email.html" class="nav-option py-3"
										>Email Notifications</a>
									<a href="/subscriptions" class="nav-option py-3">Subscription</a>
								</div>
							</div>
						</div>

			</nav>
		</div>
	</div>


    @yield('main-content')



@endsection
