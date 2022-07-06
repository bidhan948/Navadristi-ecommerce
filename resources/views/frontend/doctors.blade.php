

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
            <li> Doctors </li>
          </ul>
        </div>
        <h1 class="sec_page_title">Doctors  </h1>
      </div>
    </div>
    <!-- second page body -->
    <div class="sec_page_body py-5">
      <div class="container">
        <div class="row">
            @foreach ($news as $item)
            <div class="col-md-4 mb-3">
                <!-- doctor 1 -->
                <div class="doctor_card">
                    <div class="content mb-4">
                        <div class="imgBox">
                            <img src="{{ asset('uploads/doctor/'.$item->image) }}" alt="" />
                        </div>

                        <div class="contentBox">
                            <h3>{{ $item->name }}</h3>
                            <h4> {{ $item->education }}</h4>
                            <div class="mt-3"><a href="{{ route('doctors-detail',$item->id) }}" class="doctor-cat"> View more</a></div>
                        </div>
                    </div>

                    {{-- Social link --}}
                    {{-- <ul class="sci">
                        <li style="--i: 1">
                            <a href="" target="_blank">
                            <i class="fa-brands fa-facebook-f"></i>
                            </a>
                        </li>
                        <li style="--i: 2">
                            <a href="" target="_blank">
                            <i class="fa-brands fa-twitter"></i>
                            </a>
                        </li>
                        <li style="--i: 3">
                            <a href="" target="_blank">
                            <i class="fa-brands fa-instagram"></i>
                            </a>
                        </li>
                    </ul> --}}
                </div>
              
            </div>
            @endforeach

        </div>
      </div>
    </div>
  </div>


@include('inc.footer')
