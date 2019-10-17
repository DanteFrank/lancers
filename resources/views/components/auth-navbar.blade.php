<nav class="navbar navbar-expand-lg navbar-light border-top nav-2 mt-5 col-12 row mx-0 p-0">
  <a class="navbar-brand col-12 col-lg-2 mx-0 border-right text-center" href="#">
    <img class="mt-2" src="images/Lancers.png" alt="">
  </a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent"
    aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>
  <div class="col-12 col-lg-5 nav-search">
    <div class="form-group mb-0">
      <input type="email" class="form-control col-10 mx-auto mt-2" id="" aria-describedby="" placeholder="
        Search
        ">
    </div>
  </div>
  <div class="collapse navbar-collapse col-12 col-lg-5" id="navbarSupportedContent">
    <ul class="navbar-nav ml-auto mr-5">
      <li class="nav-item mx-2">
        <a class="nav-link border-right mt-2 support-link" href="#">
          <img src="images/help.png" alt="">
        </a>
      </li>

      <li class="nav-item mx-2">
        <a class="nav-link border-right mt-2 notif-link" href="#">
          <img src="images/alarm-clock.png" alt="">
        </a>
      </li>
      <li class="nav-item mx-2">
        <a class="nav-link border-right mt-2 notif-link" href="#">
          <img src="images/notification.png" alt="">
        </a>
      </li>
      <li class="nav-item mx-2 user-nav dropdown">
        <a class="nav-link" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true"
          aria-expanded="false">
          <div class="user-initials pt-1">
            <span class="ml-1">AU</span>
          </div>
        </a>
        <div class="dropdown-menu" aria-labelledby="navbarDropdown">
          <a class="dropdown-item" href="#">Settings</a>
          <a class="dropdown-item" href="#">Profile</a>
          <div class="dropdown-divider"></div>
          <a class="dropdown-item" href="#">Logout</a>
        </div>
      </li>
    </ul>
  </div>
</nav>

@push('styles')
    <style>
    .navbar-brand {
      background: #091429;
      height: 10vh;
    }

    .nav-1 {
      min-height: 10vh;
      font-family: 'Ubuntu', sans-serif;
      border-bottom: 1px solid lightgrey;
      box-shadow: 0 2px 16px 0 rgba(0, 0, 0, 0.2);
    }

    .nav-2 {
      min-height: 10vh;
      font-family: 'Ubuntu', sans-serif;
      border-bottom: 1px solid lightgrey;
      box-shadow: 0 2px 16px 0 rgba(0, 0, 0, 0.2);
    }

    .navbar-brand img {
      height: 4.5vh;
    }

    .nav-page-header {
      height: 10vh;
    }

    .nav-page-header p {
      font-weight: bold;
      font-size: 14px;
    }

    .support-link img {
      height: 20px;
    }

    .support-link span {
      font-size: 14px;
    }

    .notif-link img {
      height: 20px;
    }

    .user-nav img {
      height: 30px;
      width: 30px;
      border-radius: 50%;
    }

    .user-nav .user-name {
      font-size: 14px;
    }

    .nav-item .nav-link {
      color: black !important;
    }

    .nav-item .nav-link:hover {
      color: #091429 !important;
    }

    .nav-search {
      height: 10vh;
    }

    .user-initials {
      height: 40px;
      width: 40px;
      border: 1px solid black;
      border-radius: 50%;
    }

    .user-initials span {
      font-size: 20px;
      font-weight: bold;
    }

    @media only screen and (max-width: 992px) {
      .navbar-collapse {
        flex-direction: row;
      }
      .nav-search input{
        margin-left: 20px !important;
      }
    }
  </style>
@endpush