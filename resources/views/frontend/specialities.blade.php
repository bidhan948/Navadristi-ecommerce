

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
            <h1 class="sec_page_title">Specilities</h1>
          </div>
        </div>
        <!-- second page body -->
        <div class="sec_page_body spec_page py-5">
          <div class="container">
            <!-- Item one  -->
            @foreach ($specialities as $speciality)
              <div class="row spec_item">
                <div class="col-md-3 ">
                  <div class="spec_item_left">
                    <div class="imgBox">
                      @if($speciality->image)
                      <img src="{{ asset('uploads/specialities/'.$speciality->image) }}" alt="Images" />
                    @else
                        <img src="{{ asset('images/default.png') }}" />
                    @endif
                    </div>
                  </div> 
                </div>
                <div class="col-md-9 spec_item_right">
                  <h4>{{ $speciality->name }}</h4>
                  <p>
                    {!!  $speciality->description !!}
                  </p>
                  <div class="cat">
                    <a href="{{ route('specialities-detail',$speciality->id) }}"> View More <i class="fa-solid fa-arrow-right"></i></a>
                  </div>
                </div>
              </div>

              
            @endforeach

            {{-- item 1 --}}
           
            
  
           
          </div>
        </div>
      </div>

@include('inc.footer')
