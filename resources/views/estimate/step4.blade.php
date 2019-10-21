@extends('layouts.app')`
<!-- client Info -->

@section('styles')
    <link rel="stylesheet" type="text/css" href="{{asset('css/add_client.css')}}" />
<style> 
    * {
        margin: 0;
        padding: 0;
        box-sizing: border-box;
        font-family: Ubuntu;
    }

    .container-fluid {
        margin: 0;
        padding: 0;
    }

    button:hover{
        opacity: .5;
    }
    .header {
        width: 100%;
        padding: 0;
        margin: 0;
        border: none;
        border-bottom: 2px solid #E5E5E5;
    }

    .header_content {
        background-color: white;
        height: 100%;
        float: left;
        padding: 0;
        font-size: 3.0rem;
    }
    .header_content button {
        width: 100%;
        height: 100%;
        background-color: white;
        border: 1px solid #E5E5E5;
        font-weight: lighter;
        color: #E5E5E5;
    }

    .header_control button {
        width: 50%;
        padding: 0;
        font-size: .8em;
    }

    .client {
        font-weight: bold;
        padding-top: 0px;
        color: black;
        border: 1px solid #E5E5E5;
    }

    .next{
        color: white;
        background-color: #E5E5E5;
        width: 100%;
        font-family: ubuntu;
        font-size: 2rem;
    }


    main {
        clear: both;
        width: 80%;
        margin: 0 auto;
        padding: 25px 0;
    }

    main .content {
        border: 1px solid #E5E5E5;
        padding: 20px;
    }

    main .content h4 {
        font-weight: bold;
    }

    .content h5 {
        font-weight: bolder;
    }

    .content h2, h4, h5 {
        margin-bottom: 20px;
    }

    .content .form-group {
        display: grid;
        grid-template-columns: 1fr 2fr;
        box-sizing: border-box;
    }

    
    .content .form-group span {
        display: grid;
        grid-template-columns: 1fr 1fr;
    }

    .form-group label {
        font-weight: lighter;
    }

    .form-group span input {
        width: 80%;
    }

    .form-group input {
        margin-bottom: 15px;
        width: 90%;
        padding: 0 10px;
    }
    
    .country {
        height: 29px;
        overflow: hidden;
        width: 80%;
    } 

    main section:last-child{
        width: 200px;
        margin: 0 auto;         
        margin-top: 30px;        
        font-size: 2rem;
    }

    main  section > button {
        border: none;
        width: 100%;
        padding: 10px 20px;
        margin: 0 auto;
        background-color: #E5E5E5;
        color: white;
    }

    @media screen and (min-width: 900px){
        main {
            width: 60%;
        }
        .content .form-group {
            grid-template-columns: 1fr 3fr;
        }  
        .country {
            height: 29px;
            overflow: hidden;
            width: 80%;
        }
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
<div class="container-fluid">
    
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
            <div class="column-2">client</div>
            <a href="#" @click.prevent="next" class="column-3">NEXT</a>
        </nav>
    </header>

    <main>
        <h2>Client Information</h2>
        <br>
        <form method="post" action="/estimate/create/step5" id="form">
            @csrf
            <h2>Client Information</h2><br>
            @if(session('success'))<br> <h6><span class="alert alert-success">{{session('success')}}</span></h6>
            @elseif(session('error'))<br> <h6><span class="">{{session('error')}}</span></h6> @endif
            <section class="content">
                <h4>Business Information</h4>
                <div class="form-group">
                    <label for="company_name">Company name</label>
                    <input type="text" name="name" required id="Cname" placeholder="e.g Sunshine Studio">
                </div>

                <h5>Business Address</h5>
                <div>
                    <div class="form-group">
                        <label for="Str_Num">Street & Number</label>
                        <span>
                            <input required type="text" name="street" id="street" placeholder="Street">
                            <input required type="number" name="street_number" id="number" placeholder="Number">
                        </span>
                        
                        <label for="city_Zcode">City & Zip Code</label>
                        <span>
                            <input required type="text" name="city" id="city" placeholder="City">
                            <input required type="number" name="zipcode" id="Zcode" placeholder="Zip code">
                        </span>

                        <label for="Country_state">Country & State</label>
                        <span>
                            <select required name="country_id" class="country">
                                <option value="" selected>Country</option>
                                @foreach($countries as $country)
                                <option value="{{$country->id}}">{{$country->name}}</option>
                                @endforeach
                            </select>

                            <select required name="state_id" class="country">
                                <option value="" selected>Select State</option>
                            </select>
                            <!-- <input required type="text" name="state" id="state" placeholder="state"> -->
                        </span>
                    </div>

                    <h5>Contact Information</h5>
                    <span id="contacts"></span>
                    <h5><a onClick="addContact()">Add other contacts &nbsp; +</a></h5>
                </div>
            </section>
            <section>
                <button type="submit">Next</button>
            </section>
        </form>
    </main>
</div>
@endsection

@section('script')

@section('script')
<script type="text/javascript">
    let count = 1;
    function addContact(){
        let element = document.querySelector('#contacts')
        let newElement = document.createElement('div');
        newElement.classList.add('form-group');
        newElement.innerHTML = `
            <label for="company_name_${count}">Contact name</label>
            <input type="text" name="contact[${count}]['name']" id="contact_name${count}" placeholder="e.g Ben Davies">
            
            <label for="company_email">Contact email</label>
            <input type="email" name="contact[${count}]['email']" id="email_${count}" placeholder="e.g email@domain.com">
        `;
        element.appendChild(newElement);
        count+=1;
    }

    $(document).ready(function() {
    $('select[name="country_id"]').on('change', function() {
        let countryID = $(this).val();
            if(countryID) {
            $.ajax({
                url: '/states/'+encodeURI(countryID),
                type: "GET",
                dataType: "json",
                success:function(data) {
                    $('select[name="state_id"]').empty();
                    $('select[name="state_id"]').append('<option selected value="">Select State</option>');
                    $.each(data.data, function(key, value) {
                        $('select[name="state_id"]').append('<option value="'+ value.id +'">'+ value.name +'</option>');
                    });
                }
            });
            }else{
                $('select[name="state"]').empty();
            }
        });
    });
</script>
@endsection