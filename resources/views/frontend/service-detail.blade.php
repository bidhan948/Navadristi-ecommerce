@section('title', 'Services | Navadristi Eye Hospital, Ithari')
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
                    <li>Services</li>
                </ul>
            </div>
            <h1 class="sec_page_title">{{ $service->title }}</h1>
        </div>
    </div>
    <!-- second page body -->
    <div class="sec_page_body py-5">
        <div class="container">
            <div class="row">
                <div class="col">
                    <h2 class=""> {{ $service->title }} </h2>
                    <img class="mw-100" src="{{ asset('uploads/service/' . $service->image) }}" alt="">
                    <div class="mt-4">{!! $service->description !!}</div>
                </div>

            </div>
        </div>
    </div>
</div>


@include('inc.footer')
