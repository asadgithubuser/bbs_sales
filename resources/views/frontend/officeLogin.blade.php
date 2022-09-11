@extends('frontend.layout.master')
    @section('content')

           <div class="container w-75">
            <div class="row secondary_sc_content px-2 py-4">  
    
              <div class="col-xl-9 col-lg-9 col-md-12 col-sm-12 col-xs-12">
                <div class="row">
                    <div class="col-xl-3 col-lg-3 col-md-3 col-sm-0 col-xs-0"></div>
                    <div class="col-xl-6 col-lg-6 col-md-6 col-sm-12 col-xs-12 pb-4 subs_div">
                        @include('frontend.partials.message')
                        <h3>Office Login</h3>
                        <hr>
                        <form action="{{route('login')}}" method="post">
                            @csrf
    
                            <div class="form-group">
                                <label for="username">{{ __('Email or Phone Number') }}</label>
    
                                <input name="username" type="username" class="form-control @error('username') is-invalid @enderror" id="username" value="{{old('username')}}" placeholder="Email or Phone" required autocomplete="username" autofocus>
    
                                @error('username')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
    
                            </div>
    
                            <div class="form-group">
                                <label for="password">{{ __('Password') }}</label>
    
                                <input name="password" type="password" class="form-control @error('password') is-invalid @enderror" id="password" placeholder="Password" required autocomplete="current-password">
    
                                @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
    
                            </div>

                            
    
                            <div class="form-group">
    
                                <label for="remember">{{ __('Remember Me') }}</label>
    
                                <input name="remember" type="checkbox" id="remember" {{ old('remember') ? 'checked' : '' }} style="margin-left: 10px;">
    
                            </div>
    
                            <button type="submit" class="btn btn-primary" style="cursor: pointer">{{ __('Login') }}</button>
    
                            @if (Route::has('password.request'))
                                <a class="btn btn-link" href="{{ route('password.request') }}">
                                    {{ __('Forgot Your Password?') }}
                                </a>
                            @endif
    
                        </form>
                    </div>
                    <div class="col-xl-3 col-lg-3 col-md-3 col-sm-0 col-xs-0"></div>
    
                  </div>
              
           </div>

    @endsection
