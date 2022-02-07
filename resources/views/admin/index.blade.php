<!DOCTYPE html>
<html>
<head>
	<title>Lib Sport 2Day</title>

	@include('include.link')
	<style type="text/css">
		body{
			background-color:;
		}
		#rightIndex{
			background-image:url("{{asset('/image/indexBackground.png')}}");
            background-repeat:no-repeat;
            background-size:cover;
		}
	</style>
</head>
<body>

	<div class="container-fluid">
		<div class="row">

			<div class="col-sm-7">
				
				<div class="mt-5" id="rightIndex" style="width:90%; height:500px;">
					
				</div>
			</div>

			<!-- 
				This is the end of the left side and the beginning of the right side
			 -->

			<div class="col-sm-5 indexRight">
				<div class="mt-5">
					<div class="w-75"> 
						<img  src="{{asset('/image/lfa-logo.png')}}" style="width:80px; margin-left:1px;">
					</div>

					
					<div>
						<div class="p-3">
							<h1 style="letter-spacing:5px;">LIB-SPORT 2DAY</h1>
						</div>
					
						<div class="p-4">
							<form method="POST" action="{{ route('login') }}">
                        @csrf

                        <div class="form-group row">

                            <div class="col-sm-8">
                                <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" placeholder="Email" autofocus>

                                @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">

                            <div class="col-sm-8">
                                <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required placeholder="Password" autocomplete="current-password">

                                @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <div class="col-sm-8">
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>

                                    <label class="form-check-label" for="remember">
                                        {{ __('Remember Me') }}
                                    </label>
                                </div>
                            </div>
                        </div>

                        <div class="form-group row mb-0">
                            <div class="col-sm-8">
                                <button type="submit" class="btn btn-success">
                                    {{ __('Login') }}
                                </button>

                                @if (Route::has('password.request'))
                                    <a class="btn btn-link" href="{{ route('password.request') }}">
                                        {{ __('Forgot Your Password?') }}
                                    </a>
                                @endif
                            </div>
                        </div>
                    </form>
						</div>
					</div>
				</div>
				<p class="mt-5" style="color:darkorange;">ORANGE LIBERIA, PROUD SPONSOR OF LFA NATIONAL LEAGUE.</p>
			</div>
		</div>
	</div>	

</body>
</html>