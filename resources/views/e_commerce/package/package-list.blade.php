@section('title', 'Package | Navadristi Eye Hospital, Ithari')
@section('package', 'active')
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
                    <li>Our Package </li>
                </ul>
            </div>
            <h1 class="sec_page_title">Our Package</h1>
        </div>
    </div>
</div>

<div class="sec_page_body py-5">
    <div class="container">
        <div class="row">
            {{-- <h2> Our Package</h2> --}}
        </div>
        <div class="row mt-4 our_package">
            @foreach ($packages as $package)
                {{-- package item --}}
                <div class="col-md-4 mb-5">
                    <div class="package_item">
                        <h3> {{ $package->name . ' (' . $package->Package->name . ')' }} </h3>
                        <h2 class="price"> ${{ $package->price }}</h2>
                        <div>
                            {!! $package->description !!}
                        </div>
                        <div class="by_btn">
                            <a href="{{route('package.checkout',$package->token)}}"> Buy Now </a>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
</div>




@include('inc.footer')
