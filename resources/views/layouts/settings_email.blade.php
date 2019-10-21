@extends('layouts.app')

@section('styles')
		<style>
			body {
				font-family: "Open Sans", sans-serif;
				font-size: 12px;
			}
			h3 {
					font-family: 'Open Sans', sans-serif;
            font-weight: bold;
            font-size: 18px;
        }
			.head-text {
				font-size: 18px;
				font-weight: bold;
			}
			.small-head-text {
				font-size: 14px;
				font-weight: bold;
			}
			.email-con,
			.message-con {
				border: 1px solid #c4c4c4;
			}
			textarea {
				width: 100%;
				height: 100%;
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

			.radio {
  margin: 0.5rem;
}
.radio input[type="radio"] {
  position: absolute;
  opacity: 0;
}
.radio input[type="radio"] + .radio-label:before {
  content: '';
  background: #f4f4f4;
  border-radius: 100%;
  border: 1px solid #b4b4b4;
  display: inline-block;
  width: 1.4em;
  height: 1.4em;
  position: relative;
  top: -0.2em;
  margin-right: 1em;
  vertical-align: top;
  cursor: pointer;
  text-align: center;
  transition: all 250ms ease;
}
.radio input[type="radio"]:checked + .radio-label:before {
  background-color: #000000;
  box-shadow: inset 0 0 0 4px #f4f4f4;
}
.radio input[type="radio"]:focus + .radio-label:before {
  outline: none;
  border-color: #000000;
}
.radio input[type="radio"]:disabled + .radio-label:before {
  box-shadow: inset 0 0 0 4px #f4f4f4;
  border-color: #b4b4b4;
  background: #b4b4b4;
}
.radio input[type="radio"] + .radio-label:empty:before {
  margin-right: 0;
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
									<a href="settings-profile.html" class="nav-option py-3">Profile Settings</a>
									<a href="settings-email.html" class="nav-option active-nav py-3"
										>Email Notifications</a>
									<a href="" class="nav-option py-3">Subscription</a>
								</div>
							</div>
						</div>

			</nav>
		</div>
	</div>


    @yield('main-content')



@endsection
