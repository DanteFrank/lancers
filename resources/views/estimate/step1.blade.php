@extends('layouts.app')`
<!-- Select Project -->

@section('styles')
<style> 
    body {
        font-family: 'Roboto', sans-serif;
        overflow: auto;
    }

    h1 {
        margin-top: 5%;
        margin-left: 18%;
        color: #262626;
    }

    h5 {
        font-weight: bold;
        color: #262626;
    }

    p {
        padding-bottom: 40px;
    }

    .box {
        margin-top: 5%;

    }

    .card-body:hover {
        border: 2px solid #0ABAB5;
        box-sizing: border-box;
    }

    .btn-on {
        width: 100%;
        background: gray;
        border: 1px solid rgba(145, 145, 145, 0.4);
        box-sizing: border-box;

        text-align: left;
        color: #091429;
        height: 50px;
    }

    .btn-on:hover {
        color: #E4E4E4;
        background: #0ABAB5 !important;
    }

    .dark {
        margin-top: 40px;
        margin-left: 40%;
        width: 20%;
        height: 60px;
        border: 1px solid gray;
        background: #0ABAB5 !important;
        color: white;
        
    }

    .dark:hover {

        background: #0ABAB5!important;
        color: white;
    }

    #name {
        padding: 10px;
        width: 100%;
        height: 50px;
        font-size: 20px;
        border: 1px solid rgba(145, 145, 145, 0.4);
    }

    #container {
        display: grid;
        grid-template-columns: 1fr 5fr 1fr;

    }

    #container div {
        border: 1px solid black;
        height: 50px;
    }

    #container p {
        justify-content: center;
        margin-top: 15px;
        font-style: normal;
        font-weight: bold;


        color: #323A43;
    }

    #ext {
        justify-content: center;
        border: none;
        background: gray !important;
        color: white;
        width: 100%;
        height: 50px;
    }


    #ext:hover {

        background:  #091429 !important;

    }

    #cnc {
        cursor: pointer;
    }
    
    .dropbtn, .project {
        /* margin-top: 37px; */
        width: 100%;
        height: 50px;
        padding: 10px;
        border: 1px solid rgba(145, 145, 145, 0.4);
        /* box-sizing: border-box; */
    }
    option, select {
        font-size: 20px;
        background: rgba(207, 204, 204, 0.4);
    }
    
    a:hover{cursor: pointer;}




    
    body {
      box-sizing: border-box;
      margin: 0px;
      font-family: ubuntu !important;
    }

    .con-div {
      background-color: #FFFFFF;
      width: 100%;
      margin: auto;
    }

    .top-divs {
      display: flex;
      margin: 0 auto;
      width: 100%;
      background-color: #FFFFFF;
      font-family: Roboto;
    }

    .ctrl-div {
      width: 8%;
      text-align: center;
      border: 1px solid #919191;
    }

    .ctrl-btn {
      width: 100%;
      background-color: #FFFFFF;
      border: none;
    }

    .inv-div {
      width: 60%;
      text-align: center;
      border: 1px solid #919191;
    }

    #inv-btn {
      width: 100%;
      border: none;
      padding: 0.5em;
      font-weight: 500;
      font-size: 28px;
      background-color: #FFFFFF;
    }

    .send-div {
      width: 32%;
      text-align: center;
      border: 1px solid #919191;
    }

    #send-btn {
      width: 100%;
      border: none;
      padding: 0.5em;
      color: #FFF;
      font-size: 28px;
      background-color:  rgba(196, 196, 196, 0.4);
    }

    .cli-info {
      width:75%;
      height:80vh;
      background-color:#FFFFFF;
      margin: auto
    }

    .cli-box {
      display: flex;
      justify-content:space-around;
    }

    .sub-box {
      width: 30%;
      padding: 2em 1em;
      margin: 2em;
      background-color:#FFF;
      text-align:center;
      border: 1px solid #919191;
      border-radius: 2px
    }

    .sub-box:hover {
      border: 3px solid gray;
    }

    .select-project {
      width: 90%;
      padding: 1em;
      border: 1px solid #919191;
    }

    .cli-text {
      padding-top: 1.5em;
    }

    .my-icon {
      width: 100%;
      margin: 0.6em 0;
      color: #c4c4c4;
      background-color: #FFFFFF;
    }

    .what-cli {
      padding: 1.5em 1em !important;
      margin: 0;
      font-size: 42px !important;
      font-weight: bold !important;
      color: #323232;
    }

    .txt {
      margin: 2em 0;
    }
    .column-1 {
        width: 5%;
        border-right: 2px solid rgb(223, 223, 223);
        padding: 1em;
        text-align: center;
        color: black;
        text-decoration: none;
    }
    .column-2 {
        width: 75%;
        text-align: center;
        align-items: center;
        padding: 0.8em;
        color: black;
        text-decoration: none;
        font-size: 1.5em;
        font-weight: bold;
    }
    .column-3 {
        width: 15%;
        border-left: 2px solid rgb(223, 223, 223);
        padding: 0.8em;
        text-align: center;
        background-color: rgba(196, 196, 196, 0.4);
        color: white;
        text-decoration: none;
        font-size: 1.5em;
        font-weight: bold;
    }

    @media screen and (max-width: 500px) {
        .cli-box {
        display: block;
        }

        .sub-box {
        width: 90%;
        margin: 2em 0em;
        }

        option {
        width: 80%;
        }

        .what-cli {
        font-size: 1.3em;
        }
    }
    @media (max-width: 575.98px) {
        .column-1 {
            width: 15%;
            padding: 0;
        }
        .column-2 {
            width: 75%;
            padding-top: 0.6em;
            font-size: 0.9em;
        }
        .column-3 {
            width: 25%;
            padding-top: 0.7em;
            font-size: 0.8em;
        }
        img {
            height: 20px;
            width: 10px;
            padding-top: 0.6em;
        }
    }

    @media (min-width: 576px) and (max-width: 767px) {
        .column-1 {
            width: 10%;
        }
        img {
            height: 15px;
            width: 10px;
        }
    }
    @media (min-width: 768px) and (max-width: 991.98px) {
        .column-1 {
            width: 9%;
        }
    }
</style>
    
@endsection


@section('content')
    <div class="contaner">
            
        <header style="border-bottom: 2px solid rgb(223, 223, 223);">
            <nav style="display: flex; ">
                <a href="#"  @click.prevent="$router.push('/estimate')" class="column-1">
                    <img
                        src="https://res.cloudinary.com/mide358/image/upload/v1570621469/clear_24px_rasbwc.png"
                        alt="navIcon"
                    />
                </a>
                <a href="#" @click.prevent="previous" class="column-1">
                    <img
                        src="https://res.cloudinary.com/mide358/image/upload/c_scale,h_27,w_13/v1570621434/Vector_ag4hnv.png"
                        alt="navIcon"
                    />
                </a>
                <div class="column-2">Create Estimate</div>
                <a href="#" @click.prevent="next" class="column-3">NEXT</a>
            </nav>
        </header>


        <h1 class="">What project are you estimating?</h1>
        <form method="post" action="/estimate/create/step2">
            @csrf
            <div class="row ml-auto mr-auto box justify-content-center">
                <div class="col-sm-4">
                    <div class="card">
                        <div class="card-body">
                            <h5 class="card-title">A previously created project</h5>
                            <p style="padding-bottom: 10px;" class="card-text">Find estimate for a previously created project, by doing so the
                                estimate
                                gets populated with some of the data. 
                            </p>
                            <div class="contents dropdown">
                                <select class="dropbtn" name="old_project" id="projectSelect">
                                    <option selected value="">Select</option>
                                    @foreach($projects as $project)
                                    <option value="{{$project->id}}">{{$project->title}}</option>
                                    @endforeach
                                </select>  
                                <!-- <i class="fa fa-caret-down"></i> -->                            
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-sm-4">
                    <div class="card">
                        <div class="card-body">
                            <h5 class="card-title">A new project</h5>
                            <p class="card-text">Create a new estimate and set up a new project based on the
                                information.
                            </p>
                            <input type="text" name="new_project" id="name" placeholder="Project Name">
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-12">
                <!-- @if(session('success'))<p><span class="alert alert-success">{{session('success')}}</span></p>
                @elseif(session('error'))<p><span class="">{{session('error')}}</span></p> @endif -->
            </div>
            <button type="submit" class="btn dark">NEXT</button>
        </form>
    </div>
@endsection

@section('script')

@endsection