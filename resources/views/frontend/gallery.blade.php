

@section('title', 'Gallery | Navadristi Eye Hospital, Ithari')
@section('gallery','active')
@include('inc.header')
@include('inc.nav')

<div class="sec_page">
    <div class="breadcrum">
      <div class="container">
        <div class="bread">
          <ul>
            <li>Home</li>
            /
            <li>Gallery</li>
          </ul>
        </div>
        <h1 class="sec_page_title">Gallery</h1>
      </div>
    </div>  
    <!-- second page body -->
    <div class="sec_page_body py-5">
      <div class="container gallery_container">
        <div class="row">
          {{-- gallery item --}}
          @if (count($gallery) == 0)
              <div class="text-danger text-center"> No Gallery available now.  </div>
            @else
          @foreach ($gallery as $item)
            
          <div class="col-md-4 text-center">
            <div class="gallery_item">
              <div class="gallery_img_box">
                <a href="{{ route('sub-gallery',$item->id) }}" class="features_image">
                  @foreach ($item->programPhotos as $value)
                  <img src="{{ asset('public/uploads/gallery/'.$value->image) }}" alt="">
                  @break
                  @endforeach
                  
                </a>
              </div>
              <h5> {{ $item->title }} </h5>
            <p> {{ count($item->programPhotos) }} Photos</p>
            </div>
            
          </div> 
          {{-- // end gallery  --}}
          @endforeach
          @endif

          
        </div>
      </div>
    </div>
  </div>

</div>
@include('inc.footer')
