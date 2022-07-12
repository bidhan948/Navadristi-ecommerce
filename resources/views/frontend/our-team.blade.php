

@section('title', 'Our Team | Navadristi Eye Hospital, Ithari')
@section('team','active')
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
            <li>Our Team</li>
          </ul>
        </div>
        <h1 class="sec_page_title">Our Team </h1>
      </div>
    </div>
</div>
    <!-- second page body -->
    <div class="sec_page_body py-5">
      <div class="container">
        <div class="board_director">
          <h1>Board of Directors</h1>
          <div class="row d-flex justify-content-center">
            <!-- board member  -->
            @foreach ($board as $item)

            <div class="col-md-3">
              <div class="board_member_item">
                <div class="member_img">
                  <img src="{{ asset('uploads/director/'.$item->image) }}" alt="" />
                </div>
                <h2 class="member_name">{{ $item->name }}</h2>
                <div class="member_position">{{ $item->position }}</div>
                {{-- !-- Button trigger modal --> --}}
                <button class="board-member-cat" data-bs-toggle="modal"
                    data-bs-target="#exampleModalb{{ $item->id }}">
                    View More
                </button>
                <!-- Modal -->
                <div class="modal fade" id="exampleModalb{{ $item->id }}" tabindex="-1"
                  aria-labelledby="exampleModalLabel" aria-hidden="true">
                  <div class="modal-dialog modal-xl">
                      <div class="modal-content">
                          <div class="modal-header">
                            <h6> {{ $item->name }} </h6>
                              <button type="button" class="btn-close" data-bs-dismiss="modal"
                                  aria-label="Close"></button>
                          </div>
                          <div class="modal-body pb-4">
                              <div class="board_member_detail_popup">
                                  <div class="row">
                                    <div class="col-md-4 left_box">
                                      <div class="imgbox">
                                        <img class="w-100" src="{{ asset('uploads/director/'.$item->image) }}" alt="">
                                      </div>
                                    </div>
                                    <div class="col-md-8 right_box">
                                      <h4> {{ $item->name }}</h4>
                                      <div class="member_position">{{ $item->position }}</div>
                                      <p class="mt-4 pr-4">
                                        {{ $item->description }}

                                      </p>
                                      <div class="social_link pb-5">
                                        <a href="{{ $item->fb_url }}" target="_blank "> 
                                          <i class="fa-brands fa-facebook-f"></i>
                                        </a>
                                        <a href="{{ $item->tw_url }}" target="_blank ">
                                          <i class="fa-brands fa-twitter"></i>
                                        </a>
                                        <a href="{{ $item->in_url }}" target="_blank ">
                                          <i class="fa-brands fa-instagram"></i>
                                        </a>
                                      </div>
                                    </div>
                                  </div>
                                  
                                 
                              </div>
                          </div>
                      </div>
                  </div>
              </div>
              </div>
            </div>
            @endforeach

          </div>
        </div>



        {{-- team Member section --}}
        <div id="team_member">
          <h1>Our Team </h1>
          <div class="row d-flex justify-content-center">
            <!-- board member  -->
            @foreach ($team as $item)

            <div class="col-md-3 mt-4">
              <div class="team_member_item">
                <div class="team_member_img">
                  <img src="{{ asset('uploads/team/'.$item->image) }}" alt="" />
                </div>
                <h2 class="team_member_name">{{ $item->name }}</h2>
                <div class="team_member_position">{{ $item->position }}</div>
                {{-- !-- Button trigger modal --> --}}
                <button class="team_member_cat" data-bs-toggle="modal"
                    data-bs-target="#exampleModal{{ $item->id }}">
                    View More
                </button>
                <!-- Modal -->
                <div class="modal fade" id="exampleModal{{ $item->id }}" tabindex="-1"
                  aria-labelledby="exampleModalLabel" aria-hidden="true">
                  <div class="modal-dialog modal-xl">
                      <div class="modal-content">
                          <div class="modal-header">
                            <h6> {{ $item->name }} </h6>
                              <button type="button" class="btn-close" data-bs-dismiss="modal"
                                  aria-label="Close"></button>
                          </div>
                          <div class="modal-body pb-4">
                              <div class="team_member_detail_popup">
                                  <div class="row">
                                    <div class="col-md-4 left_box">
                                      <div class="imgbox">
                                        <img class="w-100" src="{{ asset('uploads/team/'.$item->image) }}" alt="">
                                      </div>
                                    </div>
                                    <div class="col-md-8 right_box">
                                      <h4> {{ $item->name }}</h4>
                                      <div class="team_member_position">{{ $item->position }}</div>
                                      <p class="mt-4 pr-4">
                                        {!! $item->description !!}

                                      </p>
                                      <div class="social_link pb-5">
                                        <a href="{{ $item->fb_url }}" target="_blank "> 
                                          <i class="fa-brands fa-facebook-f"></i>
                                        </a>
                                        <a href="{{ $item->tw_url }}" target="_blank ">
                                          <i class="fa-brands fa-twitter"></i>
                                        </a>
                                        <a href="{{ $item->in_url }}" target="_blank ">
                                          <i class="fa-brands fa-instagram"></i>
                                        </a>
                                      </div>
                                    </div>
                                  </div>
                                  
                                 
                              </div>
                          </div>
                      </div>
                  </div>
              </div>
              </div>
            </div>
            @endforeach




            <!-- board member  -->

          </div>
        </div>
      </div>
    </div>

@include('inc.footer')
