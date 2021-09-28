@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Register') }}</div>

                <div class="card-body">
                    <form method="POST" action="{{ route('register') }}">
                        @csrf

                        <div class="form-group row">
                            <label for="name" class="col-md-4 col-form-label text-md-right">{{ __('Name') }}</label>

                            <div class="col-md-6">
                                <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" required autocomplete="name" autofocus>

                                @error('name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="email" class="col-md-4 col-form-label text-md-right">{{ __('E-Mail Address') }}</label>

                            <div class="col-md-6">
                                <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" 
                                name="email" value="{{ old('email') }}" required autocomplete="email">

                                @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                                             <div class="form-group row">
                            <label for="birthday" class="col-md-4 col-form-label text-md-right">{{ __('birthday') }}</label>

                            <div class="col-md-6">
                                <input id="birthday" type="date" class="form-control @error('birthday') is-invalid @enderror" 
                                name="birthday" value="{{ old('birthday') }}" required autocomplete="birthday" autofocus>

                                @error('birthday')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="profile_image_url" class="col-md-4 col-form-label text-md-right">{{ __('profile_image_url') }}</label>

                            <div class="col-md-6">
                                <input id="profile_image_url" type="file" class="form-control @error('profile_image_url') is-invalid @enderror" name="profile_image_url" value="{{ old('profile_image_url') }}" required autocomplete="profile_image_url">

                                @error('profile_image_url')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>   
                        
                        <div class="form-group row">
                            <label for="sex" class="col-md-4 col-form-label text-md-right">{{ __('sex') }}</label>

                            <div class="col-md-6">
                                <input id="sex" type="text" class="form-control @error('sex') is-invalid @enderror" name="sex" value="{{ old('sex') }}" required autocomplete="sex">

                                @error('sex')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>   
                        
                        
                         <div class="form-group row">
                            <label for="u_country_id" class="col-md-4 col-form-label text-md-right">{{ __('u_country_id') }}</label>

                            <div class="col-md-6">
                                <input id="u_country_id" type="text" class="form-control @error('u_country_id') is-invalid @enderror" name="u_country_id" value="{{ old('u_country_id') }}" required autocomplete="u_country_id">

                                @error('u_country_id')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>   
                        
                        <div class="form-group row">
                            <label for="u_prefecture_id" class="col-md-4 col-form-label text-md-right">{{ __('u_prefecture_id') }}</label>

                            <div class="col-md-6">
                                <input id="u_prefecture_id" type="text" class="form-control @error('u_prefecture_id') is-invalid @enderror" name="u_prefecture_id" value="{{ old('u_prefecture_id') }}" required autocomplete="u_prefecture_id">

                                @error('u_prefecture_id')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div> 
                        
                        
                        <div class="form-group row">
                            <label for="u_district" class="col-md-4 col-form-label text-md-right">{{ __('u_district') }}</label>

                            <div class="col-md-6">
                                <input id="u_district" type="text" class="form-control @error('u_district') is-invalid @enderror" name="u_district" value="{{ old('u_district') }}" required autocomplete="u_district">

                                @error('u_district')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>   
    
                        
                        <div class="form-group row">
                            <label for="profile_text" class="col-md-4 col-form-label text-md-right">{{ __('profile_text') }}</label>

                            <div class="col-md-6">
                                <input id="profile_text" type="text" class="form-control @error('profile_text') is-invalid @enderror" name="profile_text" value="{{ old('profile_text') }}" required autocomplete="profile_text">

                                @error('profile_text')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>   

                        <div class="form-group row">
                            <label for="password" class="col-md-4 col-form-label text-md-right">{{ __('Password') }}</label>

                            <div class="col-md-6">
                                <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="new-password">

                                @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="password-confirm" class="col-md-4 col-form-label text-md-right">{{ __('Confirm Password') }}</label>

                            <div class="col-md-6">
                                <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required autocomplete="new-password">
                            </div>
                        </div>

                        <div class="form-group row mb-0">
                            <div class="col-md-6 offset-md-4">
                                <button type="submit" class="btn btn-primary">
                                    {{ __('Register') }}
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
