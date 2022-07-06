@section('title', 'Publication | Navadristi Eye Hospital, Itahari')
@section('publication', 'active')
@include('inc.header')
@include('inc.nav')

<div class="sec_page">
    <div class="breadcrum">
        <div class="container">
            <div class="bread">
                <ul>
                    <li>Home</li>
                    /
                    <li>Publication</li>
                </ul>
            </div>
            <h1 class="sec_page_title">{{ $publication->title }} </h1>
        </div>
    </div>
    <!-- second page body -->
    <div class="sec_page_body py-5">
        <div class="container">
            <div class="row">

                <div class="col">
                    <h2> {{ $publication->title }}</h2>
                    <div class="imgbox">
                        <img class="mw-100"
                            src="{{ asset('uploads/publication/' . $publication->cover_img) }}" alt="">
                    </div>
                    <div class="">
                        <div class="auth"><i> Author : <span> {{ $publication->auth_name }}</span> </i>
                        </div>
                        <div class="p-date"> <i> Published Year : <span>
                                    {{ $publication->public_year }}</span> </i></div>
                        <div class="mt-4">

                            <p>
                                {!! $publication->description !!}
                            </p>
                        </div>
                        <div class="">
                            <a class="btn btn-primary"
                                href="{{ asset('uploads/publication/' . $publication->file) }}">
                                Download <span> <i class="fa-solid fa-download"></i> </span></a>

                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>


    @include('inc.footer')
