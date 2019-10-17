@extends('layouts.authinvoice')

@section('main-content')
<style>

    *{
        box-sizing: border-box;
    }
    table {
        border-spacing: 5px;
    }

    td,
    th {
        width: 46vw;
        margin: 0 auto;
        padding: 0 0 10px;
        text-align: left;
    }
    td:first-child,
    th:first-child {
        padding-left: 20px;
    }
    td:last-child,
    th:last-child {
        margin-right: .5rem;
        text-align: right;
    }
thead, .table-date {
        max-width: 100%;
        font-family: Ubuntu;
        font-weight: bold;
        font-size: 14px;
        line-height: 28px;
        color: #A6A6A6;
}
tbody, .bold {

        font-family: Ubuntu;
        font-size: .97rem;
        font-weight: 500;
        line-height: 1.5;
        color: #212529;
     }
     .table-responsive {
    display: table;
    width: 100%;
    overflow-x: unset;
    padding-right: .5rem;
    -webkit-overflow-scrolling: touch;
}
.note h5 {
    font-family: Ubuntu;
    font-weight: bold;
    font-size: 14px;
    color: #A6A6A6;
}
     .tableAmount {
        font-weight: 900;
        font-size: 1.05rem;
     }
     .invoice-main {
      width: 100%;
     }
    .invoice-container {
        position: relative;
        top: 3rem;
        width: 52.5vw;
        margin-left: 4rem;
        padding-right: 2rem!important;
        background: #FFFFFF;
        border: 1px solid #C4C4C4;
        box-sizing: border-box;
        margin-bottom: 2rem;
    }
    .invoice-body {
        position: relative;
        width: 55.5vw;
    }
.invoice-table {
  padding-bottom: 2rem;
  padding-left: 1rem;
}
.removeBorder  {
    padding: .75rem;
    vertical-align: top;
    border-top: none !important;
}
.thickLine {
    padding: .75rem;
    vertical-align: top;
    border-top: 3px solid #000 !important;
}
    .logo-img {
        width: 7.5rem;
        float: right;
    }
    h1 {
        color: rgb#546067;
        font-size: 4rem;
        font-family: 'Ubuntu', sans-serif;
        font-style: normal;
        font-weight: bold;
        color: #546067;
    }
    p {
        margin-bottom: .5rem;
      }

body {
    overflow-x: hidden;
}
#sidebar-wrapper {
  height: 90vh;
  width: 40vh;
  box-shadow: 0px 4px 4px rgba(0, 0, 0, 0.25)!important;
  -webkit-transition: margin .25s ease-out;
  -moz-transition: margin .25s ease-out;
  -o-transition: margin .25s ease-out;
  transition: margin .25s ease-out;
}
img {
      width: .85rem;
      margin-right: .5rem;
      margin-left: 1.8rem;
}
.imgSvg {
    padding-left: unset;
      margin-right: .2rem;
      margin-left: 1.8rem;
  }
.bg-dark {
  background: #091429 !important;
  font-size: .75rem;
  color: #fff;
}
.colorC {
  color: #00F9FF;
}
.colorC2 {
  color: #0ABAB5;
}
.navbar {
    position: relative;
    display: -ms-flexbox;
    display: flex;
    -ms-flex-wrap: wrap;
    flex-wrap: wrap;
    -ms-flex-align: center;
    align-items: center;
    -ms-flex-pack: justify;
    justify-content: space-between;
    padding: .5rem 0;
}
a.bg-dark:focus, a.bg-dark:hover, button.bg-dark:focus, button.bg-dark:hover {
    background-color: #c1c1c1!important;
}
.list-group-item-action:focus, .list-group-item-action:hover {
    color: #091429;
}
.list-group-item {
    padding: 1.275rem 1.25rem;
    margin-bottom: -1px;
    background-color: #c1c1c1;
    border: unset;
    font-family: 'Open Sans', sans-serif;
    font-weight: 700;
    letter-spacing: .9px;
}
#sidebar-wrapper .sidebar-heading {
  padding: 0.975rem 3.3rem;
  font-size: 1.5rem;
  font-family: 'Pacifico', cursive;
}
.dropdown-menu {
    position: relative;
    width: 100%;
    min-width: unset;
    padding: 0;
    margin: 0;
    border-radius: 0;
    border: none;
    background:#212531;
    background: linear-gradient(to right bottom, #2f3441 50%, #212531 50%);
    color: #fff;
    box-shadow: none;
}
.dropdown-menu.show {
    top: 0;
}
.dropdown-item {
    display: block;
    width: 100%;
    padding: .25rem 1.5rem;
    clear: both;
    font-weight: 300;
    color: #fff;
}
svg {
  padding-left: .5rem;
  padding-bottom: .2rem;
}
#page-content-wrapper {
  min-width: 100%;
}

#wrapper.toggled #sidebar-wrapper {
  margin-left: 0;
}
/*navBar*/
.bg-light {
    background-color: unset!important;
    box-shadow: 0px 2px 2px rgba(0, 0, 0, 0.25);
}
.navbar-light .navbar-nav .nav-link {
    margin-left: 1.5vw;
    font-family: 'Ubuntu', sans-serif;
    font-weight: 500;
    color: #000;
}
.navbar-light .navbar-nav .active>.nav-link, .navbar-light .navbar-nav .nav-link.active, .navbar-light .navbar-nav .nav-link.show, .navbar-light .navbar-nav .show>.nav-link {
    color: #0ABAB5;
}
.btn-outline-dark {
        font-family: Ubuntu;
        font-weight: bold;
        font-size: 14px;
}
.btn.bg {
    color: #fff;
    background-color: #0ABAB5;
}
@media (max-width: 992px) {    
#sidebar-wrapper {
  height: 80vw;
}
    td,
    th {
        padding: 0 0 7px !important;
    }
    td:last-child,
    th:last-child {
        margin-right: .3rem;
    }
thead, .table-date {
        font-size: 12px;
        line-height: 14px;
}
.col-6.mb-4 {
    padding-left: 0;
}
.table td, .table th {
    padding:0;
}
tbody, .bold {
        font-size: .82rem;
        line-height: 1.5;
     }
     .tableAmount {
        font-weight: 900;
        font-size: .9rem;
     }
     .invoice-main {
      width: 100%;
     }
    .invoice-container {
        position: relative;
        top: 3rem;
        width: 54vw;
        margin-left: 4.5rem;
        margin-bottom: 2rem;
    }
.invoice-table {
  padding-left: 0;
}
.thickLine {
    border-top: 2px solid #000 !important;
}
    .logo-img {
        width: 4.5rem;
        float: right;
    }

.btn-outline-dark {

        font-family: Ubuntu;
        font-weight: bold;
        font-size: 12px;
}
    h1 {
        font-size: 20px;
    }
    p {
        margin-bottom: .2rem;
        font-size: .7rem;
      }
.footer-text{
    font-family: Ubuntu;
    font-style: normal;
    font-weight: normal;
    font-size: 1rem;
    }
    @media (max-width: 991px) {
        .nav-item.ml-3 {
            margin-left: 0!important;
        }
    }
}
@media (max-width: 768px) {
  #sidebar-wrapper {
    margin-left: 0;
    height: 76vw;
    width: 20vh;
  }

  #page-content-wrapper {
    min-width: 0;
    width: 100%;
  }

img {
      width: .65rem;
      margin-right: .5rem;
      margin-left: .2rem;
}
.imgSvg {
      margin-right: .2rem;
      margin-left: .2rem;
  }
  .list-group-item {
    padding: 1.275rem 1.25rem;
    margin-bottom: -1px;
    font-size: .7rem;
    letter-spacing: .4px;
}
#sidebar-wrapper .sidebar-heading {
  padding: 0.975rem 2.3rem;
  font-size: 1.15rem;
}
.btn-outline-dark {
        font-size: 10px;
    padding: .275rem .5rem;
}
.btn-outline-dark.ml-4 {
    margin-left: .5rem!important;
}
h1 {
        font-size: 16px;
    }
    p {
        margin-bottom: .2rem;
        font-size: .5rem;
      }
      .logo-img {
    width: 4rem;
}
thead, .table-date {
        font-size: 9px;
        line-height: 12px;
}
tbody, .bold {
        font-size: .72rem;
        line-height: 1;
     }
      td,
    th {
        width: 21vw;
    }
     .tableAmount {
        font-weight: 600;
        font-size: .75rem;
     }
     .navbar-light .navbar-nav .nav-link {
        font-size: .7rem;
}
.dropdown-item {
    font-size: .75rem;
    }
}
@media (max-width: 576px) {
    .invoice-body.ml-4 div {
        /* display: none; */
        display: flex;
        flex-direction: column;
    }
    
    .invoice-body.ml-4 button {
      display: block !important;
      margin: 0.3rem auto;
      width: 100%;
    }
    #sidebar-wrapper {
    width: 15vh;
    height: 92vw;
  }
img {
      width: .65rem;
      margin-right: .1rem;
      margin-left: .8rem;
}
.imgSvg {
      margin-right: .1rem;
      margin-left: .8rem;
  }
  .list-group-item {
    padding: 1.275rem 1rem;
    font-size: .55rem;
    letter-spacing: .2px;
}
#sidebar-wrapper .sidebar-heading {
  padding: 0.975rem 2.1rem;
  font-size: .9rem;
}
.invoice-container {
    width: 68vw;
    margin-left: .9rem;
    margin-bottom: 2rem;
}
h1 {
        font-size: 14px;
    }
      .logo-img {
    width: 4rem;
}
thead, .table-date {
        font-size: 8px;
        line-height: 12px;
}
tbody, .bold {
        font-size: .62rem;
        line-height: 1;
     }
      td,
    th {
        width: 28vw;
    }
     .tableAmount {
        font-weight: 600;
        font-size: .75rem;
     }
     .navbar-light .navbar-nav .nav-link {
        font-size: .55rem;
}
.dropdown-item {
    font-size: .55rem;
    }
}
@media (max-width: 450px) {
    #sidebar-wrapper {
        display: none;
    }    
      td,
    th {
        width: 38vw;
    }
.invoice-container {
    width: 92vw;
    margin-left: .9rem;
    margin-bottom: 2rem;
}
}


#group4 {
	position: absolute;
	left: 10.77%;
right: 50.73%;
top: 45.51%;
bottom: 40.42%;
}

#invoice{
	position: absolute;
left: 30.15%;
right: 33.85%;
top: 45.51%;
bottom: 52.05%;
color: #FFFFFF;
}

#group5 {
	position: absolute;
	left: 10.77%;
right: 30.97%;
top: 54.98%;
bottom: 34.21%;
}

#contract{
	position: absolute;
	left: 30.15%;
right: 28.46%;
top: 54.98%;
bottom: 42.58%;
color: #FFFFFF;
}

#group6 {
	position: absolute;
	left: 10.77%;
right: 50.92%;
top: 64.45%;
bottom: 77%;
}

#proposal{
	position: absolute;
	left: 30.15%;
right: 25%;
top: 64.45%;
bottom: 33.11%;
color: #FFFFFF;
}

.header-con {
	position: absolute;
	left: 0%;
top: 0%;
bottom: 91.9%;
background: #FFFFFF;
}

.link {
	font-family: Ubuntu;
font-style: normal;
font-weight: bold;
font-size: 20px;
line-height: 34px;
color: #000000;
opacity: 0.8;
}

#pro {
	position: absolute;
width: 164px;
height: 34px;
left: 325px;
top: 44px;
}

#cli {
	position: absolute;
width: 147px;
height: 34px;
left: 539px;
top: 44px;
}

#set {
	position: absolute;
width: 116px;
height: 34px;
left: 741px;
top: 44px;
}

#tools {
	position: absolute;
width: 252px;
height: 34px;
left: 912px;
top: 44px;
}

.box1 {
	position: absolute;
width: 78px;
height: 35px;
left: 970px;
top: 140px;
box-sizing: border-box;
}

#edit {
	position: absolute;
width: 60px;
height: 28px;
left: 5px;
top: 3px;
font-family: Ubuntu;
font-style: normal;
font-weight: bold;
font-size: 18px;
line-height: 28px;
color: #546067;
}

button {
	border: 3px solid #546067;
    border-radius: 10px;
    padding: 20px;
    background-color: white;
    cursor: pointer;
}

.box2 {
	position: absolute;
width: 83px;
height: 45px;
left: 1060px;
top: 140px;
box-sizing: border-box;
border-radius: 10px;
}

#delete {
	position: absolute;
width: 78px;
height: 28px;
left: 3px;
top: 3px;
font-family: Ubuntu;
font-style: normal;
font-weight: bold;
font-size: 18px;
line-height: 28px;
color: #546067;
}

.client-info {
	position: absolute;
width: 953px;
height: 781px;
left: 300px;
top: 200px;
}

#contact {
	position: absolute;
width: 176px;
height: 55px;
left: 25px;
top: 20px;
font-family: Ubuntu;
font-style: normal;
font-weight: bold;
font-size: 25px;
line-height: 50px;
color: #000000;
}

.name {
	position: absolute;
width: 130px;
height: 85px;
left: 20px;
top: 50px;
font-family: Ubuntu;
font-style: normal;
font-weight: 500;
font-size: 18px;
}

#nme {
	position: absolute;
width: 81px;
height: 34px;
left: 8px;
top: 20px;
line-height: 34px;
color: #A6A6A6;
}

#john {
	position: absolute;
width: 130px;
height: 35px;
left: 8px;
top: 55px;
line-height: 35px;
color: #000000;
}

#add {
	font-family: Ubuntu;
font-style: normal;
font-weight: normal;
font-size: 18px;
}

#mail {
	position: absolute;
width: 192px;
height: 34px;
left: 300px;
top: 20px;
line-height: 34px;
color: #A6A6A6;
}

#gmail {
	position: absolute;
width: 287px;
height: 35px;
left: 300px;
top: 55px;
line-height: 35px;
color: #000000;
}

#numb {
	font-family: Ubuntu;
font-style: normal;
font-weight: normal;
font-size: 18px;
}

#phone {
	position: absolute;
width: 205px;
height: 34px;
left: 700px;
top: 20px;
line-height: 34px;
color: #A6A6A6;
}

#number {
	position: absolute;
width: 238px;
height: 35px;
left: 680px;
top: 55px;
line-height: 35px;
color: #000000;
}

#billing {
	position: absolute;
width: 250px;
height: 55px;
left: 25px;
top: 190px;
font-family: Ubuntu;
font-style: normal;
font-weight: bold;
font-size: 25px;
line-height: 55px;
color: #000000;
}

.curr {
	position: absolute;
width: 122px;
height: 85px;
left: 20px;
top: 220px;
font-family: Ubuntu;
font-style: normal;
font-size: 18px;
}

#currency {
	position: absolute;
width: 122px;
height: 34px;
left: 8px;
top: 20px;
line-height: 34px;
color: #A6A6A6;
font-weight: normal;
}

#ngn {
	position: absolute;
width: 64px;
height: 35px;
left: 8px;
top: 55px;
line-height: 35px;
color: #000000;
font-weight: bold;
}

#home {
	font-family: Ubuntu;
font-style: normal;
font-size: 18px;
}

#address {
	position: absolute;
width: 192px;
height: 34px;
left: 300px;
top: 20px;
line-height: 34px;
color: #A6A6A6;
font-weight: normal;
}

#lorem {
	position: absolute;
width: 287px;
height: 35px;
left: 300px;
top: 55px;
line-height: 35px;
color: #000000;
font-weight: bold;
}

#place {
	font-family: Ubuntu;
font-style: normal;
font-size: 18px;
}

#city {
	position: absolute;
width: 205px;
height: 34px;
left: 790px;
top: 20px;
line-height: 34px;
color: #A6A6A6;
font-weight: normal;
}

#abuja {
	position: absolute;
width: 238px;
height: 35px;
left: 780px;
top: 55px;
line-height: 35px;
color: #000000;
font-weight: bold;
}

.cde {
	position: absolute;
width: 120px;
height: 85px;
left: 20px;
top: 310px;
font-family: Ubuntu;
font-style: normal;
font-size: 18px;
}

#zip {
	position: absolute;
width: 120px;
height: 34px;
left: 8px;
top: 20px;
font-weight: normal;
line-height: 34px;
color: #A6A6A6;
}

#code {
	position: absolute;
	width: 51px;
height: 35px;
left: 8px;
top: 55px;
font-weight: bold;
line-height: 35px;
color: #000000;
}

#count {
	font-family: Ubuntu;
font-style: normal;
font-size: 18px;
}

#country {
	position: absolute;
width: 110px;
height: 34px;
left: 300px;
top: 20px;
line-height: 34px;
color: #A6A6A6;
font-weight: normal;
}

#nigeria {
	position: absolute;
width: 99px;
height: 35px;
left: 300px;
top: 55px;
font-weight: bold;
line-height: 35px;
color: #000000;
}

#st {
	font-family: Ubuntu;
font-style: normal;
font-size: 18px;
}

#state {
	position: absolute;
width: 73px;
height: 34px;
left: 785px;
top: 20px;
font-weight: normal;
line-height: 34px;
color: #A6A6A6;
}

#abj {
	position: absolute;
width: 79px;
height: 35px;
left: 780px;
top: 55px;
font-weight: bold;
line-height: 35px;
color: #000000;
}

#more {
	position: absolute;
width: 118px;
height: 55px;
left: 25px;
top: 450px;
font-family: Ubuntu;
font-style: normal;
font-weight: bold;
font-size: 25px;
line-height: 55px;
color: #000000;
}

#na {
	position: absolute;
width: 52px;
height: 34px;
left: 25px;
top: 500px;
font-family: Ubuntu;
font-style: normal;
font-weight: normal;
font-size: 18px;
line-height: 34px;
color: #A6A6A6;
}
</style>

<div class="container">
   
    <button class="box1">
    <div id="edit">Edit</div>
    </button>
    <button class= "box2">
    <div id="delete">Delete</div>
    </button>
</section>

<section class="client-info">
        <div id="contact">Contact</div>

    <div class="name">
        <div id="nme">Name</div>
        <div id="john">John Doe</div>
        
        <div id= "add">
        <div id="mail">Email Address</div>
        <div id="gmail">Johndoe@gmail.com</div>
        </div>
        
        <div id="numb">
        <div id="phone">Phone Number</div>
        <div id="number">+2348064528518</div>
        </div>
    </div>

        <div id="billing">Billing Information</div>
    
    <div class="curr">
        <div id="currency">Currency</div>
        <div id="ngn">NGN</div>
        
        <div id= "home">
        <div id="address">Address</div>
        <div id="lorem">Lorem Ipsum Dolor Set</div>
        </div>
        
        <div id="place">
        <div id="city">City</div>
        <div id="abuja">Abuja</div>
        </div>
    </div>

    <div class="cde">
        <div id="zip">Zip Code</div>
        <div id="code">234</div>
        
        <div id= "count">
        <div id="country">Country</div>
        <div id="nigeria">Nigeria</div>
        </div>
        
        <div id="st">
        <div id="state">State</div>
        <div id="abj">Abuja</div>
        </div>
    </div>

    <div id="more">More</div>
    <div id="na">N/A</div>
</section>
</div> 

@endsection