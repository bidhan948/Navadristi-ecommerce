

@section('title', 'Careers | Navadristi Eye Hospital, Ithari')
@section('careers','active')
@include('inc.header')
@include('inc.nav')

<div class="sec_page">
    <div class="breadcrum">
      <div class="container">
        <div class="bread">
          <ul>
            <li>Home</li>
            /
            <li>Careers</li>
          </ul>
        </div>
        <h1 class="sec_page_title">Careers</h1>
      </div>
    </div>
    <!-- second page body -->
    <div class="sec_page_body py-5">
      <div class="container">
        <div class="about-text">
          Nava Dristi Eye Hospital was established with a mission of making available to every individual, the best of eye care solutions irrespective of their awareness, knowledge and financial levels and for this purpose to create a pool of trained and skilled eye care professionals whose skills and knowledge levels are at par with the best in the world.
        </div>
        {{-- Career --}}
        <div class="career py-5">
          <div class="row">
            <h2 class="text-center text-primary mb-3"> Jobs </h2>
            @if ($career->count() == 0)
                    <div class="text-danger text-center"> No Vacancy available now. </div>
                @else
            
            @foreach ($career as $item)
            <div class="col-md-4 mt-3">
                                <div class="card job_vacancy ">
                                    <img alt="Card image cap" class="card-img-top img-fluid"
                                        src="{{ asset('public/uploads/career/' . $item->image) }}" />

                                    <div class="job_vacancy_info px-1">
                                        <h4 class="title pt-2 px-2"><a href="{{ route('career-detail', $item->id) }}">
                                                {{ $item->title }} </a> </h4>

                                        <p> Position : <span> {{ $item->position->name }} </span></p>
                                        <p> No. of vacancy: {{ $item->vacancy_no }}</p>

                                        <p>
                                            {!! $item->description !!}
                                        </p>
                                        <br>
                                        <a class="btn btn-primary"
                                            href="{{ route('career-detail', $item->id) }}">Apply Now </a>
                                    </div>
                                </div>
                            </div>
            @endforeach
            @endif
            
          </div>
        </div>

        {{-- contact us --}}
        <div class="contact-info card my-3" style="background: #d5e8f6; padding:2rem">
            <div class="career-contact-section">
                <div class="career-contact-info">
                <h4 class="text-uppercase"> Contact Us</h4>
                <!--<hr>-->
              <h6> Nava Dristi Eye Hospital Pvt Ltd.</h6>
              <br>
              <h6>
                Corporate Office, 
              </h6>
              <p>
                   Itahari-4, Sunsari
              </p>
            
           
                <b> Phone: </b> <p> +977-025-581381,<br> &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; 9862633964</p>
                <b> E-mail : </b> <p> navadristieye@gmail.com </p>
              </p>
            </div>
            
            <!-- Contact Info VD upload Sectio -->
            <div class="upload-cv-section">
                <h6 class="text-center text-primary">
                Drop Your CV here <br>  We Will consider your profille for future Jobs
              </h6>
              @if (session('status'))
                <h6 class="alert alert-success">
                    {{ session('status') }}
                </h6>
                @endif
               <form action="{{ route('add-cv') }}" method="POST" enctype="multipart/form-data"
                            class="drop-cv-form row">
                            @csrf
                            <div class="form-group col-md-12">
                                <label>Full name</label>
                                <div>
                                    <input type="text" name="name" class="" required placeholder="Name"
                                        value="{{ old('name') }}" />
                                    @if ($errors->has('name'))
                                        <h6 class="alert alert-danger">{{ $errors->first('name') }}</h6>
                                    @endif
                                </div>
                            </div>

                            <div class="form-group col-md-6">
                                <label>Phone No. </label>
                                <div>
                                    <input type="text" name="phone" class="" required
                                        placeholder="Phone number" value="{{ old('phone') }}" />
                                    @if ($errors->has('phone'))
                                        <h6 class="alert alert-danger">{{ $errors->first('phone') }}</h6>
                                    @endif
                                </div>
                            </div>

                            <div class="form-group col-md-6">
                                <label>Email</label>
                                <div>
                                    <input type="text" name="email" class="" required
                                        placeholder="Email address" value="" />
                                    @if ($errors->has('email'))
                                        <h6 class="alert alert-danger">{{ $errors->first('email') }}</h6>
                                    @endif
                                </div>
                            </div>


                            <div class="form-group col-md-12">
                                <label>Position </label>
                                <div>
                                    <select name="position" id="">
                                        <option value=""> --- Select Position --- </option>

                                        @foreach ($position as $item)
                                            <option value="{{ $item->id }}">{{ $item->name }}</option>
                                        @endforeach
                                    </select>
                                    {{-- <input type="text" name="title" class="" required
                                        placeholder="Position  " value="" /> --}}
                                    @if ($errors->has('title'))
                                        <h6 class="alert alert-danger">{{ $errors->first('title') }}</h6>
                                    @endif
                                </div>
                            </div>

                            <div class="form-group col-md-12 mt-3">
                                <!--<label for="resume">CV</label>-->
                                <!--<input type="file" name="name" class="form-control-file" id="cv-file" onchange="pressed()">-->
                                <!--<input type="button" id="cv-upload-btn" value="Browse CV" onclick="document.getElementById('cv-file').click();" />-->
                                <!--   <input type="file" style="display:none;" id="cv-file" name="file"/>-->
                                <!--<span> Browse CV </span>-->

                                <div class="file-upload-wrapper" data-text="Select your file!">
                                    <input name="cv" type="file" class="file-upload-field" value="">

                                    @if ($errors->has('name'))
                                        <h6 class="alert alert-danger">{{ $errors->first('name') }}</h6>
                                    @endif
                                </div>


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

                                <div class="form-group mb-0 mt-4">
                                    <div>
                                        <button type="submit" class="apply-btn waves-effect waves-light mr-1">
                                            Submit
                                        </button>

                                    </div>
                                </div>
                        </form>
            </div>
            </div>

          
          
        </div>
      </div>
    </div>
  </div>


@include('inc.footer')
