@extends('layouts.app')`


@section('styles')
    <link rel="stylesheet" type="text/css" href="{{asset('css/add_client.css')}}" />
    <style> a:hover{cursor: pointer;}</style>
@endsection


@section('content')
<div class="container-fluid">
    <header class="header ">
        <div class="header_content col-xs-2 header_control"> <button class="col-xs-6">&times;</button>
            <button class="col-xs-6">&lt;</button></div>
        <div class="header_content client col-xs-8"><article class="text-center">Client</article></div>
        <div class="header_content col-xs-2"><button class="next">Add Client</button></div>
    </header>

    <main>
        
        <form method="post" action="/client/add">
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
                <button>Add Client</button>
            </section>
        </form>
    </main>
</div>
@endsection

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