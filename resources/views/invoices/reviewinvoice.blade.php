@extends('layouts.app')

@section('title', 'Review Invoice')

@section('content')
      <div class="pageBackground">
        <!-- This is the navbar for small screens -->
        <header class="container-a menuForSmallScreens">
            <div class="box-1 save-close" style="max-width: 50px">
                <i class="fa fa-times" aria-hidden="true"></i>
            </div>
            <div class="box-2 go-back" style="max-width: 50px">
                <i class="fa fa-chevron-left" aria-hidden="true"></i>
            </div>

            <div class="box-3 save-close">
                Save
            </div>
            <div class="box-4">
                Invoice
            </div>
            <div class="box-5">
                <form method="POST" action="/invoices/send">
                    @csrf
                    <input type="text" style="display: none;" name="invoice" value="{{$invoice->id}}">
                    <a href="#"><button class="sendInvoice">SEND</button></a>
                </form>
            </div>
        </header>

        <!-- This is the navbar for large screens -->
        <header class="container-a menuForLargeScreens">
            <!-- <header> -->
            <div class="box-1 save-close" style="max-width: 50px">
                <i class="fa fa-times" aria-hidden="true"></i>
            </div>
            <div class="box-2 go-back" style="max-width: 50px">
                <i class="fa fa-chevron-left" aria-hidden="true"></i>
            </div>

            <div class="box-3 save-close" style="max-width: 150px">
                Save and Close
            </div>
            <div class="box-4">
                Invoice
            </div>
            <div class="box-5" style="max-width: 150px">
                <form method="POST" action="/invoices/send">
                    @csrf
                    <input type="text" style="display: none;" name="invoice" value="{{$invoice->id}}">
                    <a href="#"><button class="sendInvoice">SEND INVOICE</button></a>
                </form>
            </div>
        </header>
        <main>
            <div class=" container mainContent">
{{--                 <section>
                    <div class="row topMenu">
                        <button type="button" class="btn btn-sm editInvoice "><i class="fa fa-pencil"
                                aria-hidden="true"></i>&nbsp;EDIT INVOICE</button>
                        <div class="ml-auto">
                            <a class="invoiceSettings" href=""></a>
                            <p>
                                <i class="fas fa-cog"></i> Invoice Settings
                            </p>
                        </div>
                    </div>
                </section> --}}

                <section class="mainContentBelowLogo">
                    <section>

                        <div class="addressAndPayment row">
                            <div class="card addressCard" style="font-weight: normal">
                                <div style="font-weight: bold">{{$invoice->project->client->name}}</div>
                                {{$invoice->project->client->city}}, {{getState($invoice->project->client->state_id)}}<br>
                                {{getCountry($invoice->project->client->country_id)}}
                            </div>

                            <div class="card payment ml-auto">
                                <div style="font-size: 0.8em; color: #B1B1B1">Amount Due</div>

                                <div class="Amount" style="font-size: 2em; font-weight: bold">₦{{number_format((float)$invoice->amount, 2)}}<span
                                        style="font-size: 0.5em">NGN</span></div>

                                <div>
                                    <div class="issueDate float-left">
                                        <div style="font-size: 0.8em; color: #B1B1B1">Issued <p
                                                style="font-size: 1.2em; color: black">{{dateSlash($invoice->created_at)}}</p>
                                        </div>
                                    </div>

                                    <div class="dueDate float-left">
                                        <div style="font-size: 0.8em; color: #B1B1B1">Due<p
                                                style="font-size: 1.2em; color: black">Upon completion</p>
                                        </div>
                                    </div>
                                </div>

                                <button type="button" class="btn btn-primary paymentButton" style="background: #0ABAB5;" disabled>Pay with
                                    Flutterwave</button>
                            </div>
                        </div>

                    </section>

                    <section class="invoiceDetails row">
                        <div class=" table-card" style="margin-top: 10px">
                            <div class="">
                                Invoice <span style="font-weight: bold; font-size: 0.6em; color: #B1B1B1">No. {{strtotime($invoice->created_at)}}</span>
                                <p class="serviceRendered" style="margin-top: 10px">{{$invoice->project->name}}</p>
                            </div>
                            <div class="tableSection" style="font-size: 0.8em; width: 100%; overflow-x: scroll">
                                <table class="table">
                                    <thead>
                                        <tr style="border-top-style: hidden">
                                            <th style="width: 70%">Description</th>
                                            <th scope="col">Qty</th>
                                            <th scope="col">Price</th>
                                            <th scope="col">Amount</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr scope="row">
                                            <td style="font-weight:normal">Man Hours</td>
                                            <td style="font-weight:normal">{{$invoice->estimate->time}}</td>
                                            <td style="font-weight:normal">₦{{number_format((float)$invoice->estimate->price_per_hour, 2)}}</td>
                                            <td style="font-weight:normal">₦{{number_format((float)($invoice->estimate->price_per_hour * $invoice->estimate->time), 2)}}</td>
                                        </tr>
                                        @if($invoice->estimate->equipment_cost !== null)
                                            <tr scope="row">
                                                <td style="font-weight:normal">Equipment cost</td>
                                                <td style="font-weight:normal">1</td>
                                                <td style="font-weight:normal">₦{{number_format((float)$invoice->estimate->equipment_cost, 2)}}</td>
                                                <td style="font-weight:normal">₦{{number_format((float)$invoice->estimate->equipment_cost, 2)}}</td>
                                            </tr>
                                        @endif

                                        @if($invoice->estimate->sub_contractors_cost !== null)
                                            <tr scope="row">
                                                <td style="font-weight:normal; text-transform: capitalize;" >{{$invoice->estimate->sub_contractors}}</td>
                                                <td style="font-weight:normal">1</td>
                                                <td style="font-weight:normal">₦{{number_format((float)$invoice->estimate->sub_contractors_cost, 2)}}</td>
                                                <td style="font-weight:normal">₦{{number_format((float)$invoice->estimate->sub_contractors_cost, 2)}}</td>
                                            </tr>
                                        @endif

                                        <tr scope="row">
                                            <td></td>
                                            <td></td>
                                            <td style="font-weight:bold">Total
                                            </td>
                                            <td style="font-weight:normal">₦{{number_format((float)$invoice->amount, 2)}}
                                            </td>
                                        </tr>
                                    </tbody>
                                </table>
                                <div style="min-height: 50px"></div>
                            </div>
                            <hr>
                            <span style="font-size: 0.8em;">{{auth()->user()->name}}</span>
                            <div style="margin-bottom: 40px"></div>
                        </div>
                    </section>

                    <section class="footer"></section>
                </section>
            </div>
        </main>

        <footer>
            <div class="bottomSpace"></div>
        </footer>
    </div>
@endsection

@section('script')
    <script type="text/javascript">
        $(".save-close").click(() => {
            window.location.href = "/invoices";
        });

        $(".go-back").click(() => {
            window.history.back();
        });
    </script>
@endsection

@section('styles')
    <style>
        @import url('https://fonts.googleapis.com/css?family=Ubuntu&display=swap');

        * {
            font-family: 'Ubuntu', sans-serif;
            font-weight: bold;
            margin: 0;
        }

        body {
            background-color: #F2F3F3;
            ;
        }

        .container-a {
            display: flex;
            background: white;
            font-size: 0.8em !important;
            max-height: 60px;
        }

        .container-a>div {
            border: 1px solid #ccc;
            padding: 10px;
            text-align: center;
            font-size: 1rem;
        }

        .box-1 {
            color: #C4C4C4;
            flex-flow: column wrap;
            flex-grow: 1;
            color: #C4C4C4;
        }

        .container-a>.box-2 {
            flex: 1;
            color: #C4C4C4;

        }

        .container-a>.box-3 {
            flex: 2;
            cursor: pointer;

        }

        .container-a>.box-4 {
            flex: 4;

        }

        .box-1:hover,
        .box-2:hover,
        .box-3:hover {
            background: #0ABAB5;
            transition: all 0.3s ease 0s;
            border-color: #0ABAB5;
            color: white;
            cursor: pointer;

        }

        .container-a>.box-5 {
            flex: 2;
            background: #0ABAB5;
            cursor: pointer;
            border: none;
        }

        .container-a>.box-5:hover {
            background: rgb(5, 128, 123);
            transition: all 0.3s ease 0s;
        }

        .sendInvoice {
            color: white;
            border: none;
            background: none;
            height: 100%;
            cursor: pointer;
        }

        img:hover {
            color: white;
        }

        .card {
            border: 0px
        }

        .mainContent {
            margin-left: 20px;
            margin-right: 20px;
            margin: auto;
            margin-top: 100px;
            max-width: 550px;
            position: relative;
            background: #FFFFFF;
            /* Secondary blue */

            border: 5px solid #0ABAB5;
            box-sizing: border-box;
        }

        .mainContentBelowLogo {
            margin-left: 20px;
            margin-right: 20px;
            margin-top: 200px;
        }

        .topMenu {
            margin-left: auto;
            margin-right: auto;
            margin-top: 15px
        }

        .editInvoice {
            background-color: #00FFA3;
            color: #333333;
            font-weight: 700;
            border: none;
            border-radius: 0%;
            font-size: 0.8rem;
            padding-top: 10px;
            padding-bottom: 10px;
            max-width: 200px;
        }

        .editInvoice:hover {
            background-color: #03E493;
            color: #333333;
        }

        .invoiceSettings {
            color: #B1B1B1;
            font-size: 0.8em;
        }

        .invoiceSettings p {
            margin-top: auto;
            margin-bottom: auto;
        }

        .addressAndPayment {
            margin: auto;
            font-size: 0.8em;
            margin-top: 30px;
        }

        .address {
            width: 99px;
            height: 77px;
            margin: auto;

        }

        .payment {
            max-width: 300px;
            font-weight: bold;
        }

        .issueDate {
            margin-right: 30px;
        }

        .paymentButton {
            font-style: normal;
            font-weight: bold;
            font-size: 1em;
            border: 0px;
            border-radius: 0px;
            line-height: 32px;
            text-align: center;
            background-color: #0ABAB5;
            color: #FFFFFF;
            padding: 2px;
        }

        .invoiceDetails {
            margin-left: auto;
            margin-right: auto;
        }


        th,
        td {
            padding-left: 0px !important;
            padding-right: 28px !important;
        }

        .table-card {
            width: 100%;
        }

        .card-body {
            margin: 0px;
            padding: 0px !important;
            width: 100%
        }

        .bottomSpace {
            margin-bottom: 50px;
        }

        .address {
            margin-right: 30px;
        }

        .menuForSmallScreens {
            display: none;
        }

        /* Media Queries to make things look better on mobile devices including switching the navbar to a more mobile friendly version */
        @media only screen and (max-width: 600px) {
            .mainContent {
                margin-top: 50px;
            }

            .addressCard {
                display: none;
            }

            .addressAndPayment.row {
                padding: 0% !important;
            }

            .payment {
                margin-left: auto !important;
                margin-right: auto !important;
                margin-bottom: 20px !important;
                width: 100% !important;
                max-width: 100% !important;

            }

            .menuForLargeScreens {
                display: none;
            }

            .menuForSmallScreens {
                display: flex;
            }
        }
    </style>
@endsection