<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>@yield('title')</title>

    <!-- Style Include  -->
    <link rel="stylesheet" href="{{ asset('css/bootstrap.min.css') }}">
    <link rel="stylesheet"  href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" >
    {{-- <link rel="stylesheet" href="{{ asset('css/fontawesome.min.css') }}"> --}}
    
    <link rel="stylesheet" href="{{ asset('css/owl.carousel.min.css') }}">
    <link rel="stylesheet" href="{{ asset('css/owl.theme.default.min.css') }}">
    <link rel="stylesheet" href="{{ asset('css/main.css') }}">
    {{-- Magnific Pop CSs --}}
  <link rel="stylesheet" href="{{ asset('css/magnific-popup.css') }}">

  </head>

  <body>

 <!-- === header === -->
 <header>
    <div class="container">
      <div class="row">
        <div class="col-md-4 col-lg-4 col-sm-12 brand_logo">
          <a href="{{ url('/')}}"><img class="" src="{{ asset('images/logo.png') }}" alt="" /></a>
        </div>
        <div class="col-md-8 col-lg-8 col-sm-12 top_info">
          <div class="top_info_item address">
            <div class="icon">
              <i class="fa-solid fa-location-dot"></i>
            </div>
            <div class="info">
              <div>Milan chowk, Purba Line, Itahari-4</div>
              <div class="title">Near BudhiKhola</div>
            </div>
          </div>

          <div class="top_info_item">
            <div class="icon">
              <i class="fa-regular fa-clock"></i>
            </div>
            <div class="info">
              <div>Sun - Fri : 8:00 - 4:00 </div>
              <div>Sat : 8:00 - 12:00</div>
            </div>
          </div>
          <div class="top_info_item">
            <!-- <div class="icon">
              <i class="fa-regular fa-clock"></i>
            </div> -->
            <div class="info appointment">
              <button><a href="{{ url('/appointment') }}"> Fix an Appointment </a></button>
            </div>
          </div>
        </div>
      </div>
    </div>
  </header>
