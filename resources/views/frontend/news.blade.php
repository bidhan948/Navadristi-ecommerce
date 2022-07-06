

@section('title', 'News | Navadristi Eye Hospital, Ithari')
@include('inc.header')
@section('news','active')
@include('inc.nav')
<!-- === Second page  -->

<div class="sec_page">
    <div class="breadcrum">
      <div class="container">
        <div class="bread">
          <ul>
            <li>Home</li>
            /
            <li>News & Event</li>
          </ul>
        </div>
        <h1 class="sec_page_title">News & Event </h1>
      </div>
    </div>
    <!-- second page body -->
    <div class="sec_page_body py-5">
      <div class="container">
        <div class="row news_list">
            @foreach ($news as $item)
            <div class="col-md-4 mb-5">
               
                
                <div class="card px-3 pt-2 item">
                  <div class="news_list_img">
                    <img class="mt-2" src="{{ asset('uploads/news/'.$item->image) }}" alt="">
                  </div>
                  <h1 class="limit-title mt-3"> <a href="{{ route('news-detail',$item->id) }}"> {{ $item->title }} </a> </h1>
                  <span class="date mt-2"> {{ $item->created_at }}</span>
                  <!--<p class="mt-3 limit-description">{!! Str::limit($item->description, 50) !!}</p>-->
                </div>
            </div>
            @endforeach
            
            <div class="paginate"> {{ $news->links() }}</div>

        </div>
      </div>
    </div>
  </div>


@include('inc.footer')
