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
         
          <li class="menu-item">
            <a class="text-capitalize @yield('package')"  href="{{ route('package.list') }}"> Packages  </a>
          </li>
          <li class="menu-item">
            <a class="text-capitalize @yield('contact')" href="{{ url('/contact') }}"> Contact </a>
          </li>
        </ul>
        
      </div>
      <div class="menu-btn"></div>
    </div>
  </nav>

{{-- Socail Link  --}}

<ul class="social_link">
  @foreach ($about as $item)
  <li class="social_item facebook"> <a href="{{ $item->fb_url }}" target="_blank"> <i class="fa-brands fa-facebook-f"> </i> </a></li>
  <li class="social_item twitter"> <a href="{{ $item->tw_url }}" target="_blank"> <i class="fa-brands fa-twitter"></i></li>
  <li  class="social_item instagram"> <a href="{{ $item->in_url }}" target="_blank"> <i class="fa-brands fa-instagram"></i> </a></li>
  <li class="social_item viber">  <a href="viber://add?number={{ $item->v_link}}" target="_blank"> <i class="fa-brands fa-viber"></i> </a></li>
  <li class="social_item whatsapp"> <a href="https://api.whatsapp.com/send?phone={{ $item->w_link}}" target="_blank"> <i class="fa-brands fa-whatsapp"></i> </a></li>
  @endforeach
</ul>