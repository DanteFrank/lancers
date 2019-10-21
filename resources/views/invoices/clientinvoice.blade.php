@extends('layouts.auth')

@push('styles')
  <style>


    /*header*/
    .header {
      grid-column: 2 / -1;
      display: flex;
      flex-flow: row nowrap;
      align-items: center;
      background-color: #ffffff;
      padding-left: 26px;
    }
    .header-nav-item {
      margin: 0px 40px;
      font-size: 1.3rem;
      padding: 30px 0;
      cursor: pointer;
    }
    .header-nav-item-left {border-bottom: 4px solid #009fff;}
    .header-nav-item:hover, .header-nav-item:active {
      border: none;
      border-bottom: 4px solid #009fff;
    }

    /*content*/
    .content {
      grid-column: 2 / -1;
      margin-left: 65px;
    }
    .lanclient-buttons {
      margin-top: 2em;
      display: flex;
      justify-content: space-between;
    }
    .lanclient-buttons>.left>button {
      border: 2px solid #546067; border-radius: 5px; padding: 10px; margin-right: 1.5em; background: #fff; font-size: 16px; font-weight: bold; color: #546067;
    }
    .lanclient-buttons>.left>button:hover {
      background-color: #000000;
      color: #ffffff;
      cursor: pointer;
    }
    .lanclient-buttons>.right>button {
    background-color: #009fff; border: thin; color: #fff; font-family: 'Ubuntu', 'san-serif'; padding: 10px; border-radius: 5px; font-size: 13px; font-weight: bold; margin-right: 2em; width: 170px; border: 2px solid #009fff;
    }
    .lanclient-buttons>.right>button:hover {
      background-color: #0ABAB5;
      border-color: #0ABAB5;
      cursor: pointer;
    }
    .invoice-cont {
      border: 1px solid #ffffff;
      border-radius: 3px;
      box-shadow: 0px 4px 50px rgba(0, 0, 0, 0.03);
      margin: 35px 27px 20px 0;
      padding: 20px;
    }
    .invoice-banner-txt {
      color: #546067;
      font-size: 3rem;
      margin: 0;
    }

    .lanclient-invoice-logo { margin-top: 0; display: flex; justify-content: space-between;
    }
    .right-invy>p { margin-top: 1em; padding: 2px 0;
    }
    .lanclient-invoice-logo>.left-invy-logo { margin-right: 1.5em;
    }

    img.left-invy-logo { height: 50px; }

    .lanclient-billing { margin: 20px 0 0 10px; display: flex; justify-content: space-between;
    }

    p.billing-clhead { color: #a6a6a6 !important; font-size: 18px;
    }

    div.bills-descrip { color: #000; margin-top: 10px;
    }

    div.bills-descrip>p { padding-bottom: 7px; font-size: 18px;
    }

    div.last-child-billing { margin-right: 2em; text-align: right;
    }

    .top-mid-bill-details>p:nth-child(2), .top-last-bill-details>p:nth-child(2) { padding-top: 10px; color: #000; font-size: 18px;
    }

    .bottom-mid-bill-details, .bottom-last-bill-details { margin-top: 2.0em;
    }

    .bottom-mid-bill-details>p:nth-child(2), .bottom-last-bill-details>p:nth-child(2) { color: #000; padding-top: 10px; font-size: 18px;
    }

    .bottom-last-bill-details>p:nth-child(2) { font-weight: 600;
    }

    section.billing-data-table { margin-top: 3em;
    }

    .billing-data-table>table { width: 100%; margin: auto; border-collapse: separate; border-spacing: 0;
    }

    .invoice-cont td {
      text-align: center;
      padding: 15px;
      font-weight: 500;
      font-style: normal;
      opacity: 0.8;
      font-size: 15px;
      border-bottom: 1px solid #a6a6a6;
      font-family: 'Ubuntu', sans-serif;
    }

    tfoot>tr { text-align: right;
    }

    thead { background-color: #009fff; color: #fff; font-size: 14px;
    }

    th:nth-child(1), td:nth-child(1) { text-align: start; padding: 10px;
    }

    #hourly-rateN { text-align: right;
    }

    .light-head { color: #a6a6a6;
    }

    td.no-border-table { border-bottom: none;
    }

    .dbl-border { border-bottom: 2px solid #000;
    }

    .Move{  padding-left: 230px;
    }

    /*media queries for responsiveness*/
    @media(min-width: 1400px){
      .sidebar-content {
        margin-left: 60px;
      }
    }
    @media(max-width: 800px){
      .sidebar-content {
        margin-left: 10px;
      }
    }
    @media(max-width: 500px){
      .main-cont {
        grid-template-columns: 1fr;
      }
      .sidebar {
        display: none;
      }
      .sidebar-content {
        margin-left: 5px;
      }
      .nav-txt {
        font-size: 0.7rem;
      }
      .logo-img {
        height: 20px;
        margin-left: 15px;
      }
      .dropdown-menu {
        width: auto;
      }
      .header {
        padding-left: 0;
        grid-column: 1 / -1;
      }
      .header-nav-item {
        margin: 0 30px;
        font-size: 0.8rem;
      }
      .content {
        margin-left: 10px;
        grid-column: 1 / -1;
      }
      .invoice-cont {
        margin: 30px 20px 10px 0;
      }
      .lanclient-buttons {
        flex-flow: row wrap;
      }
      .lanclient-buttons button {
        margin-top: 10px;
      }
      .left-invy-logo img {
        height: 100px;
        margin-top: 10px;
      }
      .lanclient-billing {
        margin: 10px 0;
      }
      .billing-clhead { font-size: 10px; }
      .bills-description { font-size: 15px !important;}

      .mobile-sidebar {
        position: absolute;
        display: flex;
        height: auto;
        top: 85px;
        left: -60vw;
        z-index: 1;
        transition: left ease-in 500ms;
      }
      .mobile-sidebar.active {
        left: 0;
      }
      .mobile-nav-btn {
        width: 40px;
      }
      .nav-span {
        display: block;
        height: 5px;
        margin: 4px;
        border-radius: 10px;
        background-color: #091429;
      }
      .mobile-nav-btn.active {
        transform: rotate(90deg);
      }
    }
  </style>
@endpush

@section('main-content')
    <div class="main-cont">
      <div class="header">
        <div class="mobile-nav-btn" onclick="bars()" id="nav-btn">
          <span class="nav-span"></span>
          <span class="nav-span"></span>
          <span class="nav-span"></span>
        </div>
        <a href="#"><h4 class="header-nav-item header-nav-item-left">Project Info</h4></a>
        <a href="#"><h4 class="header-nav-item">Documents</h4></a>
      </div>

      <div class="content">

        <div class="lanclient-buttons">
          <div class="left">
            <button type="button">Print</button> <button type="button">Download as PDF</button>
          </div>
            <div class="right">
            <button type="button">Make Payment</button>
          </div>
        </div>

        <div class="invoice-cont">
          <div class="lanclient-invoice-logo">
            <div class="right-invy">
              <h3 class="invoice-banner-txt">Invoice</h3>
              <p><strong>Project:&nbsp;</strong>Branding and Marketing</p>
              <p><strong>Lancer:&nbsp;</strong>Endurance Dan-Jumbo</p>
              <p><strong>Email:&nbsp;</strong>edanjumbo@gmail.com</p>
              <p><strong>Address:&nbsp;</strong>Accra, Ghana</p>
            </div>
            <div class="left-invy-logo">
              <img src="https://res.cloudinary.com/abisalde/image/upload/v1570566026/My_Logo_-_Black.png" alt="Lancer-Logo">
            </div>
          </div>

          <div class="lanclient-billing">
              <div> <p class="billing-clhead">Bill to</p>
                     <div class="bills-descrip"> <p class="bills-description">John Doe</p> <p class="bills-description">johndoe@gmail.com</p>
                             <p>Accra, Ghana</p>
                     </div>
              </div>
                        <div>
                              <div class="top-mid-bill-details"> <p class="billing-clhead">Issue Date</p>
                               <p class="bills-description">18th September 2019</p>
                              </div>
                                     <div class="bottom-mid-bill-details">
                               <p class="billing-clhead">Due Date</p>
                               <p class="bills-description">28th September 2019</p>
                                    </div>
                          </div>

             <div class="last-child-billing">
                     <div class="top-last-bill-details"> <p class="billing-clhead">Hourly Rate</p> <p class="bills-description" id = "hourly-rateN">N/A</p>
                     </div>
                          <div class="bottom-last-bill-details"> <p class="billing-clhead">Amount Due</p> <p class="bills-description">NGN 38, 500</p>
                           </div>
            </div>
          </div>

          <section class="billing-data-table">
            <table>
              <thead class="bg-primary">
                <tr>
                  <th class="remove-borders">Description</th>
                  <th class="remove-borders">Quantity</th>
                  <th class="remove-borders">Rate</th>
                  <th class="remove-borders">Amount</th>
                </tr>
              </thead>
              <tbody>
                <tr>
                  <td>Sed ut perspiciatis unde omnis iste</td>
                  <td>1</td>
                  <td>NGN3500</td>
                  <td>NGN3500</td>
                </tr>
                <tr>
                  <td>Sed ut perspiciatis unde omnis iste</td>
                  <td>10</td>
                  <td>NGN1700</td>
                  <td>NGN17000</td>
                </tr>
                <tr>
                  <td>Sed ut perspiciatis unde omnis iste</td>
                  <td>15</td>
                  <td>NGN1200</td> <td>NGN18000</td>
                </tr>
              </tbody>
              <tfoot>
                <tr>
                  <td colspan="2" class= "no-border-table"></td>
                  <td class= "no-border-table" >Total</td>
                  <td class= "no-border-table" >NGN 38,500</td>
                </tr>
                <tr>
                  <td colspan="2" class= "no-border-table"></td>
                  <td class ="light-head dbl-border">Discount</td>
                  <td class = "dbl-border" >N/A</td> </tr>
                <tr>
                  <td colspan="2" class= "no-border-table"></td>
                  <td class= "no-border-table">Amount Due</td>
                  <td class= "no-border-table">NGN38,500</td>
                </tr>
              </tfoot>
            </table>

          </section>

          <div class="lanclient-footer-tab">
            <p class ="light-head"><strong>Notes</strong></p>
            <p>Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium dolor</p>
            <p>laudantium, totam rem aperiam, eaque ipsa quae ab illo inventore veritatis et quasi</p>
          </div>

        </div>
      </div>
@endsection