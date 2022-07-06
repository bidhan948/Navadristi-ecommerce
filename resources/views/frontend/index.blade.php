
@section('title', 'Home | Navadristi Eye Hospital, Ithari')
@section('home','active')
@include('inc.header')
@include('inc.nav')

{{-- content start  --}}

<div id="banner">
    <div class="owl-carousel banner owl-theme">
       @foreach ($slider as $item)
                <div class="item" style="
            background-image: linear-gradient(
                to right,
                rgb(23 61 98 / 20%),
                rgb(23 61 98 / 20%)
              ),
              url('{{ asset('uploads/slider/'. $item->image ) }}');
          ">
                   
                </div>
            
        @endforeach
   
    </div>
</div>
</div>


  <!-- Book Appointment -->
  <section class="book_appointment py-4">
      <div class="container py-3">
          <div class="row">
              <div class="col-md-6">
                  <h1>24*7 Eye Care Helpline </h1>
              </div>
              <div class="col-md-6 text-end">
                  <div class="phone-n">
                      <h4> +977 9862 633 964  </h4>
      <span> 24 Hours Emergency Services</span>
      </div>
              </div>
          </div>
      </div>

  </section>

  <!-- about section -->
    <section id="about__section">
        <div class="mycontainer">
            <div class="container">
                @foreach ($about as $item)
                    <div class="row">
                        <div class="col-lg-5 col-md-5 col-sm-12">
                            <div class="about_img">
                                <img src="{{ asset('uploads/about/' . $item->image) }}" alt="">
                            </div>
                        </div>
                        <div class="col-lg-7 col-md-7 col-sm-12">
                            <div class="about_des">
                                <h2> Welcome to Nava Dristi Eye Hospital </h2>
                                {{-- <h6 class="mb-3"> {{ $item->title }} </h6> --}}
                                <div class="des limit-about">
                                    {!! $item->description !!}
                                </div>
                                <div class="mt-3">

                                    <a class="cat read_btn" href="{{ url('/about') }}"> <span> Read more </span>
                                        <i class="fa-solid fa-arrow-right"></i> </a>


                                    <div class="video">
                                        <a id="play-video" class="video-play-button cat video_btn" href="#">
                                            <!--<span> </span>-->
                                            Watch Video <span> <i class="fa-solid fa-circle-play"></i> </span>

                                        </a>

                                        <div id="video-overlay" class="video-overlay">
                                            <a class="video-overlay-close">&times;</a>
                                        </div>
                                    </div>



                                </div>

                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </section>
  

  

  <!-- === Service Section === -->
  <section id="services">
    <div class="container">
      <h1 class="">Our <span> Specialities  </span></h1>
      <div class="separator">
        <div class="dot"></div>
        <div class="dot"></div>
        <div class="dot"></div>
    </div>
      <div class="owl-carousel services owl-theme pt-4">

        @foreach ($specialities as $item )
        <div class="item">
            <div class="service">
              <div class="service_item">
                <div class="imgBox">
                  @if($item->icon)
                    <img src="{{ asset('uploads/specialities/'.$item->icon) }}" alt="Images" />
                  @else
                      <img src="{{ asset('images/default.png') }}" />
                  @endif

                </div>
                <h2>{{ $item->name }}</h2>
                <p class="limit-service">
                {!! $item->description !!}
                </p>
                <a href="{{ route('specialities-detail',$item->id) }}"> Read More <i class="fa-solid fa-arrow-right"></i></a>
              </div>
            </div>
          </div>

        @endforeach


      </div>
    </div>
  </section>



  {{-- Message from Chair Man Section --}}
  <section id="message_from">
    <div class="container">
     @foreach ($message as $item)
     <div class="message_from">
      <div class="message_detail">
        <div class="row d-flex align-items-center">
          <div class="col-md-5">
            <div class="message_from_img">
              @if($item->photo)
                <img src="{{ asset('uploads/message/'.$item->photo) }}" alt="Images" />
              @else
                  <img src="{{ asset('images/default.png') }}" />
              @endif
            </div>
          </div>
          <div class="col-md-7">
            <div class="message_from_detail">
              <h4 class="name"> {{ $item->name }} </h4>
              <div class="position"> {{ $item->position }} </div>
              <div class="mt-3 limit-message des">
                  {!! $item->message !!}
              </div>
              <button class="message_from_cat mt-3" data-bs-toggle="modal"
                data-bs-target="#exampleModal99">
                <span> View More </span> <i class="fa-solid fa-arrow-right"></i>
            </button>
            </div>
          </div>
        </div>
        
        
      </div>
      <div class="">

        <!-- Modal -->
        <div class="modal fade" id="exampleModal99" tabindex="-1"
          aria-labelledby="exampleModalLabel" aria-hidden="true">
          <div class="modal-dialog modal-xl">
              <div class="modal-content">
                  <div class="modal-header">
                    <h6> Message from the {{ $item->position }}  </h6>
                      <button type="button" class="btn-close" data-bs-dismiss="modal"
                          aria-label="Close"></button>
                  </div>
                  <div class="modal-body pb-4">
                      <div class="message_from_popup">
                          <div class="row">
                            <div class="col-md-4 left_box">
                              <div class="imgbox">
                                @if($item->photo)
                                  <img class="mw-100" src="{{ asset('uploads/message/'.$item->photo) }}" alt="Images" />
                                @else
                                    <img src="{{ asset('images/default.png') }}" />
                                @endif
                                {{-- <img src="{{ asset('images/profile.png') }}" alt=""> --}}
                              </div>
                            </div>
                            <div class="col-md-8 right_box">
                              <h4> {{  $item->name }}  </h4>
                              <div class="message_from_position"> {{ $item->position }} </div>
                              <p class="mt-4 pr-4">
                               {{-- {{ $item->message }} --}}
                                {!!  $item->message !!}
                              </p>
                            
                            </div>
                          </div>
                          
                         
                      </div>
                  </div>
              </div>
          </div>
      </div>
      {{-- end pop --}}
      </div>
    </div>
     @endforeach
    </div>
  
</section>
  
  
    <!-- News and Events   -->
    <section class="carousel_se_02 news__events">
      <div class="container-fluid">
        <div class="container">
          <div class="row">
            <div class="col-sm-12 text-center wow fadeInUp">
              <h2> News / Update / Highlight </h2>
              <div class="separator">
                <div class="dot"></div>
                <div class="dot"></div>
                <div class="dot"></div>
            </div>
            </div>
            <div class="col-md-12 pt-0">
              <div class="owl-carousel news_events owl-theme">
          
                @foreach ($news as $key => $item)
                @if($key < 3)
                <div class="item">
                  <div class="col-sm-12 wow fadeInUp delay-1">
                    <div class="news_inner_section">
                      <div class="news-img hover15">
                        <img
                        src="{{ asset('uploads/news/'.$item->image) }}"
                          class="img-fluid pic-1"
                        />
                      </div>
                      <div class="inner_info">
                          <span class="date"> {{ $item->created_at }}</span>
                        <h1>
                          <a href="{{ route('news-detail',$item->id) }}">
                          <span class="limit-title">  {{ $item->title }} </span>
                          </a>

                        </h1>
                        
                        <div class="news-des">
               
                        <!--{!! Str::limit($item->description, 50) !!}-->
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
                @endif
               
                @endforeach


      

              </div>
            </div>
          <div class="view_all text-center">
              <a href="{{ route('news-event') }}"> View all </a>
          </div>
          </div>

        </div>
      </div>
    </section>


    <!-- ==== Testimonials ====== -->
    <div id="testimonials">
      <div class="container">
        <h1>Patients<span> Say About Us </span></h1>
        <div class="separator">
          <div class="dot"></div>
          <div class="dot"></div>
          <div class="dot"></div>
      </div>
        <div class="row">
          <div class="col-md-12">
            <div id="testimonial-slider" class="owl-carousel">
              <!--  ////////////////////////////////////////////////////////  -->
              @foreach ($testimonial as $item)
              <div
                  class="testimonial-item equal-height style-6"
                  style="height: 254px"
              >
                  <div class="test_info">
                  <div class="testimonial-image cell-left">
                      <img
                        src="{{ asset('uploads/testimonial/'.$item->image) }}"
                          class="img-fluid pic-1"
                        />
                  </div>
                  <div class="cell-right">
                      <div class="testimonial-name">{{ $item->name }}</div>
                      <div class="testimonial-job">{{ $item->position }}</div>
                  </div>
                  </div>
                  <div class="testimonial-content quote">
                  <i class="fa fa-quote-left"> </i>
                      {!! $item->description !!}
                  </div>
              </div>
              @endforeach



            </div>
          </div>
        </div>
      </div>
    </div>
  {{-- end content  --}}


@include('inc.footer')
