

@section('title', 'Gallery | Navadristi Eye Hospital, Ithari')
@section('gallery','active')
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
            <li>Gallery</li>
          </ul>
        </div>
       
        <h1 class="sec_page_title">{{ $gallery->title }}</h1>
      </div>
    </div>
    <!-- second page body -->
    <div class="sec_page_body py-5">
      <div class="container">
        <div class="row">
            <div class="col">
              <h2 class=""> {{ $gallery->title }} </h2>
                <div class="sub_gallery_item">
                  @foreach ($gallery->programPhotos as $key => $value)

                  <div class="sub_gallery_item_img">
                  <a class="gimg" href="{{ asset('uploads/gallery/'.$value->image) }}"><img src="{{ asset('uploads/gallery/'.$value->image) }}" alt="Gallery Image"></a>
                      {{-- <img src="{{ asset('uploads/gallery/'.$value->image) }}" alt=""> --}}
                    </div>
                  @endforeach
                    
                </div>
            </div>

        </div>
      </div>

     
    </div>
  </div>


@include('inc.footer')
