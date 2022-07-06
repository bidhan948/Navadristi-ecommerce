

@section('title', 'News | Navadristi Eye Hospital, Ithari')
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
            <li>News</li>
          </ul>
        </div>
        <h1 class="sec_page_title">{{ $news->title }}</h1>
      </div>
    </div>
    <!-- second page body -->
    <div class="sec_page_body py-5">
      <div class="container">
        <div class="row">
            <div class="col">
                <h2 class=""> {{ $news->title }} </h2>
                <img class="mw-100" src="{{ asset('uploads/news/'.$news->image) }}" alt="">
                <p class="mt-4">{!! $news->description !!}</p>
            </div>

        </div>
      </div>
    </div>
  </div>


@include('inc.footer')
