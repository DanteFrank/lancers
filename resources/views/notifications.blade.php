@extends('layouts.auth')
@section('styles.sub')
<style>
.user {
	width: 50px;
	height: 50px;
	background-color: #FFFFFF;
	color: #000000;
	border: 1px solid;
	border-radius: 50px;
	text-align: center;
	padding: 15px 15px;
	margin: 7px;
	text-decoration: none;
	
}

h1 {
	font-family: sans-serif;
	font-style: normal;
	font-weight: bold;
	font-size: 18px;
	margin-bottom: 20px;
	margin-top: 24px;
    margin-left: 30px;
}


.notification-box img {
	margin: 10px;
	margin-left: 20px;
	margin-right: -10px;
    padding: 14px;
}

.notification-box {
	border: 1px solid #C4C4C4;
	margin-bottom: 15px;
	margin-right: 20px;
    margin-left: 30px;
}


b {
	font-family: sans-serif;
	font-style: normal;
	font-weight: bold;
	font-size: 14px;
	
}


span {
	font-family: sans-serif;
	font-style: normal;
	font-weight: normal;
	font-size: 14px;
	line-height: 2
}

p {
	font-family: sans-serif;
	font-style: normal;
	font-weight: normal;
	font-size: 12px;
	margin-bottom: 0px;
}

</style>
@endsection


@section('main-content')
<h1>NOTIFICATIONS</h1>
<div class="notification-box">
    <div class="d-flex bd-highlight">
        <div class="p-2 flex-shrink-1 bd-highlight">
            <img src="https://res.cloudinary.com/ros4eva/image/upload/v1570747847/Vector_c4lyp5.png">
        </div>
        <div class="p-2 w-100 bd-highlight">
            <b>A new invoice was created</b><br>
            <span>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
            tempor incididunt ut labore et dolore magna aliqua.</span>
            <p>Today 10:21AM</p>
        </div>
    </div>
</div>
@endsection


@section('others')
    <button class="btn btn-secondary text-white rounded-circle" id="add-something">
        <i class="fas fa-plus"></i>
    </button>
@endsection