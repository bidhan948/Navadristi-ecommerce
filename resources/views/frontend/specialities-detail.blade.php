

@section('title', 'Specialities | Navadristi Eye Hospital, Ithari')
@section('specialities','active')
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
                <li>Specilities</li>
              </ul>
            </div>
            <h1 class="sec_page_title">{{  $specialities->name }}</h1>
          </div>
        </div>
        <!-- second page body -->
        <div class="sec_page_body spec_page py-5">
          <div class="container">
            <div class="row">
                <h2> {{ $specialities->name }}</h2>
                <div class="imgbox">
                    <img class="w-30" src="{{ asset('uploads/specialities/'.$specialities->image) }}" alt="">
                </div>
                <div class="mt-4">
                    <p>
                       {!! $specialities->description !!}
                    </p>
                </div>
                <div class="mt-4">
                    <h4> Symptoms </h4>
                    <p>
                        {!! $specialities->symptoms !!}
                    </p>
                </div>
                <div class="mt-4">
                    <h4> Treatment Options </h4>
                    <p>
                        {!! $specialities->treatment_options !!}
                    </p>
                </div>
            </div>
  
           
          </div>
        </div>
      </div>

@include('inc.footer')
