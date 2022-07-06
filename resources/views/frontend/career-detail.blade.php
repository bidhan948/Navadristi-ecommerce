@section('title', 'Career | Navadristi Eye Hospital, Ithari')
@section('career', 'active')
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
                    <li>Career</li>
                </ul>
            </div>
            <h1 class="sec_page_title">{{ $career->title }}</h1>
        </div>
    </div>
    <!-- second page body -->
    <div class="sec_page_body spec_page py-5">
        <div class="container">
            <div class="row">
                <h2> {{ $career->title }}</h2>
                <div class="imgbox">
                    <img class="w-100 py-2" src="{{ asset('public/uploads/career/' . $career->image) }}" alt="">
                </div>
                <div class="career_item_detail">
                    <p>
                    <h5> Position : {{ $career->position->name }} </h5>
                    </p>
                    <p> <b> No. of vacancy: </b><br> {{ $career->vacancy_no }} </p>
                    <p> <b> Education Qualification : </b><br>
                        {{ $career->education_qualification }}
                    </p>
                    <p> <b> Experience : </b> <br>{{ $career->experience }}</p>
                    <div class="">
                        <p> <b> Job Description : </b> </p>
                        {!! $career->job_description !!}
                    </div>
                    <p> <b> Deadline : </b> <br>{{ $career->deadline }} </p>
                    <br>
                    @if ($errors->any())
                        <div class="alert alert-danger">
                            <ul>
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif
                    @if (session('status'))
                        <div class="alert alert-success">{{ session('status') }}</div>
                    @endif


                    @if ($career->deadline >= now())
                        <button class="btn btn-primary js-open-popup" data-target="custom-popup">Apply Now</button>
                    @endif
                    
                    
                    <!-- Button trigger modal -->
                    <div class="custom-popup js-custom-popup" id="custom-popup" data-popup="custom-popup">
                        <div class="custom-popup__holder js-custom-popup-holder"><span
                                class="custom-popup__close js-close-popup"></span>
                            {{-- <div class="custom-popup__title">Apply Now </div> --}}
                            <div class="custom-popup__content">
                                <form class="custom-validation" action="{{ route('job-apply') }}" method="POST"
                                    enctype="multipart/form-data">
                                    @csrf
                                    <div class="row">
                                        <div class="col">
                                            <label for="name" class="label_for">Name </label>
                                            <input type="text" class="form-control" placeholder="Name" name="name"
                                                value="{{ old('name') }}">
                                            @error('name')
                                                <h6 class="alert alert-success">
                                                    {{ $message }}
                                                </h6>
                                            @enderror

                                        </div>
                                        <div class="col">
                                            <label for="name" class="label_for">Mobile </label>
                                            <input type="number" class="form-control" name="phone_no"
                                                value="{{ old('phone_no') }}" placeholder="Mobile number">
                                            @error('number')
                                                <h6 class="alert alert-success">
                                                    {{ $message }}
                                                </h6>
                                            @enderror
                                        </div>

                                    </div>

                                    <div class="row mt-2">
                                        <div class="col">
                                            <label for="name" class="label_for">Email </label>
                                            <input type="email" class="form-control" name="email"
                                                value="{{ old('email') }}" placeholder="Email address">
                                            @error('email')
                                                <h6 class="alert alert-success">
                                                    {{ $message }}
                                                </h6>
                                            @enderror
                                        </div>
                                        <div class="col">
                                            <label for="name" class="label_for">Position </label>
                                            <input type="text" class="form-control"
                                                value="{{ $career->position->name }}" name="position"
                                                placeholder="Position" readonly>
                                            @error('position')
                                                <h6 class="alert alert-success">
                                                    {{ $message }}
                                                </h6>
                                            @enderror
                                        </div>

                                    </div>
                                    <div class="row mt-2">
                                        <div class="col">
                                            <label for="file" class="label_for">Resume </label>
                                            <input type="file" class="form-control" placeholder="" name="cv"
                                                value="{{ old('cv') }}">
                                            @error('file')
                                                <h6 class="alert alert-success">
                                                    {{ $message }}
                                                </h6>
                                            @enderror
                                        </div>

                                    </div>
                                    <input type="hidden" name="position_id" value="{{ $career->position->id }}">
                                    <br>
                                    {{-- <button class="btn btn-primary">Apply </button> --}}
                                    <button type="submit" class="btn btn-primary waves-effect waves-light mr-1">
                                        Submit
                                    </button>
                                </form>
                            </div>
                            <div class="custom-popup__footer"></div>
                        </div>
                    </div>



                </div>




            </div>


        </div>
    </div>
</div>

@include('inc.footer')
