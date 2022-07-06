@section('title', 'Doctors | Navadristi Eye Hospital, Ithari')
@section('doctors','active')
@include('inc.header')
@include('inc.nav')
<!-- === Second page  -->

<div class="sec_page">
    <div class="breadcrum">
      <div class="container">
        <div class="bread">
          <ul>
            <li>Home</li>
            /
            <li>Doctor </li>
          </ul>
        </div>
        <h1 class="sec_page_title">{{ $doctors->name }}</h1>
      </div>
    </div>
    <!-- second page body -->
    <div class="sec_page_body py-5">
      <div class="container">
        <div class="row">
            <div class="col-md-4">
                <img class="mw-100" src="{{ asset('uploads/doctor/'.$doctors->image) }}" alt="">
            </div>
            <div class="col-md-8">
                <h4 class=""> {{ $doctors->name }} </h4>
                <hr>
                <b> Education :</b>
                <p class="">{{ $doctors->education }}</p>
                <b> Specialization :</b>
                <p class="">{{ $doctors->specialization }}</p>
                <b> About :</b>
                <p class="">{!! $doctors->description !!}</p>
                <b> Professional Experience :</b>
                <p class="">{!! $doctors->professional_experience !!}</p>
                <b> Experties :</b>
                <p class="">{!! $doctors->expertise !!}</p>
                <b> Experience </b>
                <p class="">{{ $doctors->experience }}</p>
                {{-- <b> Socail Media </b> --}}
                
            </div>

        </div>
      </div>
    </div>
  </div>


@include('inc.footer')
