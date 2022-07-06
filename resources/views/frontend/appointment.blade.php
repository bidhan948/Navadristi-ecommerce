

@section('title', 'Appointment | Navadristi Eye Hospital, Ithari')
@section('appointment','active')
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
                <li>Appointment</li>
              </ul>
            </div>
            <h1 class="sec_page_title">Appointment</h1>
          </div>
        </div>
        <!-- second page body -->
        <div class="sec_page_body appointment_page py-5">
          <div class="container">
            <h4>Fix an Appointment</h4>
            <p>Find a doctor, make an appointment, and prepare for your visit.</p>
          </div>
          <div class="container mt-5">
            <div class="row">
              <div class="col-md-9">
                <h4 class="sub-title">We are here to help</h4>
                <h2 class="title">Find an Eye Doctor. </h2>
                <p>
                  Please fill in your details below and we will contact you as
                  soon as possible.
                </p>
                <div class="mt-4">
                  <form action="{{route('appointment-submit')}}" method="POST">
                      @csrf
                    <div class="form-row row">
                      <div class="col-md-5 mb-3">
                        <label for="validationDefault01">Full name </label>
                        <input
                          type="text"
                          class="form-control"
                          id="validationDefault01"
                          placeholder="Full name"
                          name="name"
                          value=""
                          required
                        />
                      </div>
                      <div class="col-md-5 mb-3">
                        <label for="validationDefault02">Contact Number</label>
                        <input
                          type="text"
                          class="form-control"
                          id="validationDefault02"
                          name="number"
                          placeholder="Contact Number"
                          value=""
                          required
                        />
                      </div>
  
                      <div class="col-md-5 mb-3">
                        <label for="validationDefault02">State </label>
                        <input
                          type="text"
                          class="form-control"
                          id="validationDefault02"
                          name="state"
                          placeholder="State"
                          value=""
                          required
                        />
                      </div>
                      <div class="col-md-5 mb-3">
                        <label for="validationDefault02">City</label>
                        <input
                          type="text"
                          class="form-control"
                          id="validationDefault02"
                          placeholder="City "
                          name="city"
                          value=""
                          required
                        />
                      </div>
                      <div class="col-md-10 mb-3">
                        <label for="validationDefault02">Message </label>
                        <textarea
                          name=""
                          class="form-control"
                          id=""
                          cols="30"
                          name="message"
                          rows="10"
                          placeholder="Message "
                        ></textarea>
                      </div>
                    </div>
                    <button>Submit</button>
                  </form>
                </div>
              </div>
              <div class="col-md-3 appointment_sidebar">
                  <div class="card py-4 px-4">
                    <!--<h2 class="heading">24*7 Eyecare helpline</h2>-->
                    <h4 class="text-center"> 24*7 Eyecare helpline </h4>
                    <hr>
                    <b> Phone No.:</b>
                    <span>
                        977-025-581381, 9862633964
                    </span>
                    <br>
                    <b> Email : </b>
                    <span> navadristieye@gmail.com </span>
                    <br>
                    <br>
                    <i style="font-size:14px"> Tahnk you for your continuous support and faith on Us !!</i>
                  </div>
              </div>
            </div>
          </div>
        </div>
      </div>


@include('inc.footer')
