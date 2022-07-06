<!-- === Nav === -->
<nav>
    <div class="container">
      <div class="navigation">
        <ul class="menu">
          <div class="close-btn"></div>

          <li class="menu-item">
            <a class="text-capitalize @yield('home')" href="{{ url('/') }}"> Home </a>
          </li>
          <li class="menu-item">
            <a class="text-capitalize @yield('about') " href="{{ url('/about') }}"> About </a>
          </li>
          <li class="menu-item">
            <a class="text-capitalize @yield('service') " href="{{ url('/services') }}"> Services </a>
          </li>
          <li class="menu-item">
            <a class="text-capitalize @yield('specialities')"  href="{{ url('/specialities') }}">
              Specialities
            </a>
          </li>
          <li class="menu-item">
            <a class="text-capitalize @yield('doctors')" href="{{ url('/doctors') }}"> Doctors </a>
          </li>
          <li class="menu-item">
            <a class="text-capitalize @yield('careers')" href="{{ url('/careers') }}"> Career </a>
          </li>
          <li class="menu-item">
                    <a class="text-capitalize @yield('publication')" href="{{ url('/publication') }}">
                        Publication
                    </a>
                </li>
          <li class="menu-item">
            <a class="text-capitalize @yield('gallery')" href="{{ url('/gallery') }}"> Gallery </a>
          </li>
         
          {{-- <li class="menu-item">
            <a class="text-capitalize" href="{{ route('news-event') }}"> News </a>
          </li> --}}
          <li class="menu-item">
            <a class="text-capitalize @yield('contact')" href="{{ url('/contact') }}"> Contact </a>
          </li>
        </ul>
        <div class="social__icons">
             @foreach ($about as $item)
            <a href="{{ $item->fb_url }}" target="_blank"> <i class="fa-brands fa-facebook-f"></i> </a>
            <a href="{{ $item->tw_url }}" target="_blank"> <i class="fa-brands fa-twitter"></i> </a>
            <a href="{{ $item->in_url }}" target="_blank"> <i class="fa-brands fa-instagram"></i> </a>
            <a href="viber://add?number={{ $item->v_link}}" target="blank"><i class="fa-brands fa-viber"></i></a>
            <a target="_blank" href="https://api.whatsapp.com/send?phone={{ $item->w_link}}"><i class="fa-brands fa-whatsapp"></i></a>
        
          @endforeach
        </div>
      </div>
      <div class="menu-btn"></div>
    </div>
  </nav>
