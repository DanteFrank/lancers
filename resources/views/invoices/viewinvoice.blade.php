@extends('layouts.auth')

@push('styles')
<style>
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

    thead,
    .table-date {
        max-width: 100%;
        font-family: Ubuntu;
        font-weight: bold;
        font-size: 14px;
        line-height: 28px;
        color: #A6A6A6;
    }

    tbody,
    .bold {

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
        padding-right: 2rem !important;
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

    .removeBorder {
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

    #page-content-wrapper {
        min-width: 100%;
    }

    #wrapper.toggled #sidebar-wrapper {
        margin-left: 0;
    }

    /*navBar*/
    .bg-light {
        background-color: unset !important;
        box-shadow: 0px 2px 2px rgba(0, 0, 0, 0.25);
    }

    .navbar-light .navbar-nav .nav-link {
        margin-left: 1.5vw;
        font-family: 'Ubuntu', sans-serif;
        font-weight: 500;
        color: #000;
    }

    .navbar-light .navbar-nav .active>.nav-link,
    .navbar-light .navbar-nav .nav-link.active,
    .navbar-light .navbar-nav .nav-link.show,
    .navbar-light .navbar-nav .show>.nav-link {
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

        td,
        th {
            padding: 0 0 7px !important;
        }

        td:last-child,
        th:last-child {
            margin-right: .3rem;
        }

        thead,
        .table-date {
            font-size: 12px;
            line-height: 14px;
        }

        .col-6.mb-4 {
            padding-left: 0;
        }

        .table td,
        .table th {
            padding: 0;
        }

        tbody,
        .bold {
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

        .footer-text {
            font-family: Ubuntu;
            font-style: normal;
            font-weight: normal;
            font-size: 1rem;
        }

        @media (max-width: 991px) {
            .nav-item.ml-3 {
                margin-left: 0 !important;
            }
        }
    }

    @media (max-width: 768px) {
        
        #page-content-wrapper {
            min-width: 0;
            width: 100%;
        }

        .btn-outline-dark {
            font-size: 10px;
            padding: .275rem .5rem;
        }

        .btn-outline-dark.ml-4 {
            margin-left: .5rem !important;
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

        thead,
        .table-date {
            font-size: 9px;
            line-height: 12px;
        }

        tbody,
        .bold {
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
        .invoice-body.ml-4 {
            display: none;
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

        thead,
        .table-date {
            font-size: 8px;
            line-height: 12px;
        }

        tbody,
        .bold {
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


</style>
@endpush


@section('main-content')
<nav class="navbar navbar-expand-lg navbar-light bg-light border-bottom">

    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent"
        aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>

    <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <ul class="navbar-nav ml-left mt-2 mt-lg-0">
            <li class="nav-item ml-3 active">
                <a class="nav-link " href="#">Project Info <span class="sr-only">(current)</span></a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="#">Link</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="#">Client Info</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="#">Settings</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="#">Tools & Resources</a>
            </li>
        </ul>
    </div>
</nav>
<section class="invoice-body m-auto">
    <div class="container">
        <div class="mt-5 px-3">
{{--             <button type="button" class="btn btn-outline-dark ">Print</button>
            <a href="{{URL::to('/invoice/pdf')}}" class="btn btn-outline-dark ml-4">Download as PDF </a>
            <button type="button" class="btn btn-outline-dark ml-auto">Edit</button>
            <button type="button" class="btn btn-secondary ml-4">Other actions</button> --}}
            <a href="{{URL::to('/invoices/'.$invoice->invoice->id.'/getpdf')}}" class="btn btn-secondary ml-4 float-right">Download as PDF </a>
            <div class="clearfix"></div>
        </div>
    </div>
</section>

<section class="invoice-main">
    <div class="container m-auto invoice-container shadow">
        <section id="showcase ">
            <div class="row container pt-3 ">
                <div class="col-6 mb-4">
                    <h1> Invoice </h1>
                    <address >
                        <p> <b>Project:</b> {{$invoice->title}}</p>
                        <p> <b>Lancer:</b> {{auth()->user()->name}}</p>
                        <p> <b>Email:</b> {{auth()->user()->email}}</p>
                        {{-- <p> <b>Address:</b> Accra, Ghana</p> --}}
                    </address>
                </div>

                <div class="col-6">
                    <img src="https://res.cloudinary.com/samtech/image/upload/v1570725037/My_Logo_-_Black.png"
                        class="img-fluid logo-img">
                </div>
            </div>
            <table class="table-responsive" style="width: 100%">
                <thead>
                    <tr>
                        <th> Bill to</th>
                        <th> Issue Date </th>
                        <th> Hourly Rate</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td><span >{{$invoice->client->name}}</span> </td>
                        <td><span >{{dateSlash($invoice->invoice->issue_date ?? $invoice->invoice->created_at)}}</span></td>
                        <td> N/A</td>
                    </tr>
                    <tr>
                        <td><span >{{$invoice->client->email}}</span></td>
                        <td></td>
                        <td></td>
                    </tr>
                    <tr>
                        <td><span >{{getState($invoice->client->state_id)}}, {{getCountry($invoice->client->country_id)}}</span> </td>
                        <th class="table-date"> Due Date</th>
                        <th class="table-date"> Amount Due</th>
                    </tr>
                    <tr>
                        <td></td>
                        <td><span >Upon completion</span> </td>
                        <td><span  class="tableAmount">NGN {{number_format((float)$invoice->invoice->amount, 2)}}</span> </td>
                    </tr>
                </tbody>
            </table>

            <section class="invoice-description mt-4  ">

                <table class="table table-responsive container " style="width: 100%">
                    <thead class="thead bg-dark" style="color: white;">
                        <tr>
                            <th scope="col" class="">Description</th>
                            <th> </th>
                            <th></th>
                            <th></th>
                            <th scope="col">Quantity </th>

                            <th></th>

                            <th scope="col">Rate </th>


                            <th></th>
                            <th scope="col">Amount</th>

                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td colspan="4">Man Hours</td>
                            <td>{{$invoice->invoice->time}}</td>
                            <td></td>
                            <td>NGN{{number_format((float)$invoice->estimate->price_per_hour, 2)}}</td>
                            <td></td>
                            <td>NGN{{number_format((float)($invoice->estimate->price_per_hour * $invoice->estimate->time), 2)}}</td>
                        </tr>
                        <tr>
                            <td colspan="4">Equipment Cost</td>
                            <td>1</td>
                            <td></td>
                            <td>NGN{{number_format((float)$invoice->estimate->equipment_cost, 2)}}</td>
                            <td></td>
                            <td>NGN{{number_format((float)$invoice->estimate->equipment_cost, 2)}}</td>
                        </tr>
                        <tr>
                            <td colspan="4" style="text-transform: capitalize;">{{$invoice->estimate->sub_contractors}}</td>

                            <td>15</td>
                            <td></td>
                            <td>NGN{{number_format((float)$invoice->estimate->sub_contractors_cost, 2)}}</td>
                            <td></td>
                            <td>NGN{{number_format((float)$invoice->estimate->sub_contractors_cost, 2)}}</td>
                        </tr>
                        <tr>
                            <td colspan="4"></td>
                            <td></td>
                            <td></td>
                            <td>Total</td>
                            <td></td>
                            <td>NGN{{number_format((float)$invoice->invoice->amount, 2)}}</td>
                        </tr>
                    </tbody>
                    <tfoot>
                        <tr>

                            <td class="removeBorder" colspan="4"></td>
                            <td class="removeBorder"></td>
                            <td class="removeBorder table-date" colspan="2" style="text-align: right;">Discount</td>
                            <td class="removeBorder"></td>
                            <td class="removeBorder bold">N/A</td>
                        </tr>
                        <tr>
                            <td class="removeBorder" colspan="4"></td>
                            <td class="removeBorder"></td>
                            <td class="thickLine bold" colspan="2" style="text-align: right;">Amount Due</td>
                            <td class="thickLine"></td>
                            <td class="thickLine bold">NGN{{number_format((float)$invoice->invoice->amount, 2)}}</td>
                        </tr>
                    </tfoot>
                </table>
            </section>
            <p style="margin-bottom: 25px;"></p>

    </div>
</section>
    <p style="margin-bottom: 100px;"></p>
@endsection
