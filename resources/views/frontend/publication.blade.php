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
            <h1 class="sec_page_title">Publication </h1>
        </div>
    </div>
    <!-- second page body -->
    <div class="sec_page_body py-5">
        <div class="container">
            <div class="row">
                <!--<h2> Publications</h2>-->
            </div>
            <div class="row">
                @if ($publication->count() == 0)
                    <div class="text-danger text-center"> No Publications available now. </div>
                @else
                    @foreach ($publication as $item)
                        <div class="col-md-6 col-lg-4 mt-4">
                            <div class="card publication_item">
                                <img alt="Card image cap" class="card-img-top img-fluid"
                                    src="{{ asset('uploads/publication/' . $item->cover_img) }}" />
                                <div class="card-block py-2 px-2">
                                    <div class="auth">Author : <span> {{ $item->auth_name }}</span></div>
                                    <h4 class="card-title"><a href="{{ route('publication-detail', $item->id) }}">
                                            {{ $item->title }} </a></h4>
                                    <div class="p-date "> Published Year : <span>
                                            {{ $item->public_year }}</span>
                                    </div>

                                    <div class="card-text limit-description">
                                        {!! $item->description !!}

                                    </div>
                                </div>
                            </div>
                        </div>
                    @endforeach
                @endif
            </div>
        </div>
    </div>
</div>


@include('inc.footer')
