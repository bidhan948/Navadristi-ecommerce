@section('title', 'Register')
@extends('layouts.app')

@section('content')
    <div class="account-pages my-5 pt-sm-5">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-md-8 col-lg-6 col-xl-5">
                    <div class="card overflow-hidden">
                        <div class="bg-soft-primary">
                            <div class="row">
                            </div>
                        </div>
                        <div class="card-body pt-0">
                            <div class="text-center rounded-circle mt-3">
                                <img src="{{ asset('images/default.png') }}" alt="" class="" height="80">
                            </div>

                            <div class="p-2">
                                <form class="form-horizontal" action="{{ route('user.registerSubmit') }}" method="POST">
                                    @csrf
                                    <div class="form-group">
                                        <label for="name">{{ __('Name') }}</label>
                                        <input type="text" class="form-control @error('name') is-invalid @enderror"
                                            id="name" placeholder="Enter name" name="name"
                                            value="{{ old('name') }}" required autocomplete="name" autofocus>

                                        @error('name')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                    <div class="form-group">
                                        <label for="email" name="email">{{ __('Email Address') }}</label>
                                        <input type="email" class="form-control @error('email') is-invalid @enderror"
                                            id="email" placeholder="Enter email" name="email"
                                            value="{{ old('email') }}" required autocomplete="email" autofocus>

                                        @error('email')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>

                                    <div class="form-group">
                                        <label for="address">{{ __('Address') }}</label>
                                        <input type="text" class="form-control @error('address') is-invalid @enderror"
                                            id="address" placeholder="Enter address" name="address"
                                            value="{{ old('address') }}" required autocomplete="address" autofocus>

                                        @error('address')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                    <div class="form-group">
                                        <label for="contact_no">{{ __('Contact no') }}</label>
                                        <input type="text" class="form-control @error('contact_no') is-invalid @enderror"
                                            id="contact_no" placeholder="Enter contact no" name="contact_no"
                                            value="{{ old('contact_no') }}" required autocomplete="contact_no" autofocus>
                                        @error('contact_no')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>

                                    <div class="form-group">
                                        <label for="password">{{ __('Password') }}</label>
                                        <input id="password" type="password"
                                            class="form-control @error('password') is-invalid @enderror" name="password"
                                            required autocomplete="current-password">

                                        @error('password')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>

                                    <div class="form-group">
                                        <label for="password_confirmation">{{ __('Confirm password') }}</label>
                                        <input id="password_confirmation" type="password" class="form-control "
                                            name="password_confirmation" required autocomplete="current-password">
                                        @error('password_confirmation')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                    <div class="mt-3">
                                        <button class="btn btn-primary btn-block waves-effect waves-light"
                                            type="submit">{{ __('Register') }}</button>
                                    </div>
                                </form>
                            </div>

                        </div>
                    </div>
                    <div class="mt-5 text-center">
                        <p> © Copyright
                            <script>
                                document.write(new Date().getFullYear())
                            </script>. All Rights Reserved. Develop by
                            <a href="https://sarathitechnosoft.com.np/" target="_blank">Sarathi Technosoft</a>
                        </p>
                    </div>

                </div>
            </div>
        </div>
    </div>
@endsection
