@extends('layouts.app')`
<!-- Select Client -->

@section('styles')
<style> 
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

    .footer-next {
        width: 200px;
        margin: 0 auto;
    }

    .footer-next button {
        width: 100%;
        height: 100%;
        font-size: 1.5em;
        border: none;
        color: white;
        margin-top: 30px;
        margin-bottom: 30px;
        padding: 10px 50px;
    }
    a:hover{cursor: pointer;}
</style>
@endsection


@section('content')<div class="con-div">
<div class="max-con">
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
            <div class="column-2">Client</div>
            <a href="#" @click.prevent="next" class="column-3">NEXT</a>
        </nav>
    </header>

    <div class="cli-info">
        <div>
            <p class="what-cli">What Client is it for?</p>
        </div>
        <form method="post" action="/estimate/create/step4" id="form">
            @csrf
            <div class="cli-box" style="color: #919191">
                <div class="sub-box">
                <p class="txt">An already existing Client</p>
                <select name="client" class="select-project" style="color: #919191">
                    <option value="new" selected>Select Project</option>
                    @foreach($clients as $client)
                    <option value="{{$client->id}}">{{$client->name}}</option>
                    @endforeach
                </select>
                </div>
                <a class="sub-box" onClick="next(event)">
                    <p class="cli-text">A new Client</p>
                </a>
            </div>
            
            <div class="footer-next">
                <button type="submit">NEXT</button>
            </div>
            </form>
    </div>
</div>

</div>
@endsection

@section('script')
<script>
    function next(e){
        let form = document.querySelector('#form');
        form.submit();
    }
</script>
@endsection