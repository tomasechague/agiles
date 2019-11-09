@extends('layouts.app')

		<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
		<script src="https://maps.googleapis.com/maps/api/js?v=3.exp&libraries=places&key=AIzaSyDwN7PlWL-aT8SEffUlBY_54apCfewJF9A"></script>

		<script>
		var searchInput = 'address';

		$(document).ready(function () {
			var autocomplete;
			autocomplete = new google.maps.places.Autocomplete((document.getElementById(searchInput)), {
				types: ['geocode'],
			});
			
			google.maps.event.addListener(autocomplete, 'place_changed', function () {
				var near_place = autocomplete.getPlace();
				document.getElementById('lat').value = near_place.geometry.location.lat();
				document.getElementById('lng').value = near_place.geometry.location.lng();
				
				document.getElementById('latitude_view').innerHTML = near_place.geometry.location.lat();
				document.getElementById('longitude_view').innerHTML = near_place.geometry.location.lng();
			});
		});
		
		$(document).on('change', '#'+searchInput, function () {
		document.getElementById('latitude_input').value = '';
		document.getElementById('longitude_input').value = '';
		
		document.getElementById('latitude_view').innerHTML = '';
		document.getElementById('longitude_view').innerHTML = '';
	});	

	</script>

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Register Teacher') }}</div>

                <div class="card-body">
                    <form method="POST" action="{{ route('registerTeacher') }}">
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
                                <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email">

                                @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="lesson" class="col-md-4 col-form-label text-md-right">Lesson</label>

                            <div class="col-md-6">
                                <input id="lesson" type="lesson" class="form-control @error('lesson') is-invalid @enderror" name="lesson" value="{{ old('lesson') }}" required autocomplete="lesson">

                                @error('lesson')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="phone" class="col-md-4 col-form-label text-md-right">Phone</label>

                            <div class="col-md-6">
                                <input id="phone" type="phone" class="form-control @error('phone') is-invalid @enderror" name="phone" value="{{ old('phone') }}" required autocomplete="phone">

                                @error('phone')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="address" class="col-md-4 col-form-label text-md-right">Address</label>

                            <div class="col-md-6" class="alert alert-info">

                                <input id="address" placeholder="Type address..." type="address" class="form-control @error('address') is-invalid @enderror" name="address" value="{{ old('address') }}" required autocomplete="address">

                                @error('address')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>	
					
                        </div>
						
						<div class="form-group row" style="display: none;">
                            <label for="lat" class="col-md-4 col-form-label text-md-right">lat</label>

                            <div class="col-md-6" class="alert alert-info">

                                <input id="lat" type="lat" class="form-control @error('lat') is-invalid @enderror" name="lat" value="{{ old('lat') }}" required autocomplete="lat">

                                @error('lat')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>	
					
                        </div>
						
						<div class="form-group row" style="display: none;">
                            <label for="lng" class="col-md-4 col-form-label text-md-right">lng</label>

                            <div class="col-md-6" class="alert alert-info">

                                <input id="lng" type="lng" class="form-control @error('lng') is-invalid @enderror" name="lng" value="{{ old('lng') }}" required autocomplete="lng">

                                @error('lng')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>	
					
                        </div>

                        <div class="form-group row">
                            <label for="country" class="col-md-4 col-form-label text-md-right">Country</label>

                            <div class="col-md-6">
                                <input id="country" type="country" class="form-control @error('country') is-invalid @enderror" name="country" value="{{ old('country') }}" required autocomplete="country">

                                @error('country')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="province" class="col-md-4 col-form-label text-md-right">Province</label>

                            <div class="col-md-6">
                                <input id="province" type="province" class="form-control @error('province') is-invalid @enderror" name="province" value="{{ old('province') }}" required autocomplete="province">

                                @error('province')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="postCode" class="col-md-4 col-form-label text-md-right">Postal Code</label>

                            <div class="col-md-6">
                                <input id="postCode" type="postCode" class="form-control @error('postCode') is-invalid @enderror" name="postCode" value="{{ old('postCode') }}" required autocomplete="postCode">

                                @error('postCode')
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
