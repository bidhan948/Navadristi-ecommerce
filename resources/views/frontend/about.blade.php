

@section('title', 'About | Navadristi Eye Hospital, Ithari')
@section('about','active')
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
            <li>About Us</li>
          </ul>
        </div>
        <h1 class="sec_page_title">About Us</h1>
      </div>
    </div>
</div>
    <!-- second page body -->
    <div class="sec_page_body py-5">
      <div class="container">
        <div class="about ">
          {{-- {!! $about->description !!} --}}
          @foreach ($about as $item)
            <p> {!!  $item->description !!}</p>
          @endforeach
        </div>

      </div>
    </div>

@include('inc.footer')
