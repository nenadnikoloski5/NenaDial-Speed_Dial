<!DOCTYPE html>
<html lang="en">
<head>
	<title>Login V5</title>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">

	<link rel="stylesheet" type="text/css" href="css/app.css">
    	<link rel="stylesheet" type="text/css" href="css/style.css">

    <style>
    
        .p-t-31 {
            text-align: center;
    margin-top: 20px;
        }

        .wrap-input100{
            width: 65%;
    margin: auto;
        }

        .container-login100-form-btn{
width: 50%;
    margin: auto;
    margin-top: 20px;
    margin-bottom: 20px;
        }


        .w-full{
            margin: 5px;
    font-weight: bold;
        }


        .errorsUl{
            text-align: center;
    background: red;
    width: 50%;
    margin: auto;
        }
    
     </style>

<!--===============================================================================================-->
</head>
<body>
	
	<div class="limiter">
		<div class="container-login100" style="background-image: url('assets/images/bg-01.jpg');">
			<div class="wrap-login100 p-l-110 p-r-110 p-t-62 p-b-33">
				<form action="{{ route('login') }}"  method="POST" class="login100-form validate-form flex-sb flex-w">
                @csrf
					<span class="login100-form-title p-b-53">
						Login
					</span>

				 @if ($errors->any())
    <ul class="errorsUl">  
    @foreach($errors->all() as $error)
        <li> {{$error}}  </li>
    
    
    @endforeach
    </ul>
    @endif
					
					<div class="p-t-31 p-b-9">
						<span class="txt1">
							Email
						</span>
					</div>

               



					<div class="wrap-input100 validate-input">
<div >



                                <input  class="input100" id="email" type="text"  name="email" value="{{ old('email') }}" required autofocus>

                                @if ($errors->has('email'))
                                
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('email') }}</strong>
                                    </span>
                                @endif
                            </div>						<span class="focus-input100"></span>
					</div>
					
				

                    <div class="p-t-31 p-b-9">
						<span class="txt1">
							Password
						</span>
					</div>
					<div class="wrap-input100 validate-input">
<div >
                                <input class="input100" id="password" type="password"  name="password" value="{{ old('password') }}" required>

                                @if ($errors->has('password'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('password') }}</strong>
                                    </span>
                                @endif
                            </div>						<span class="focus-input100"></span>
					</div>

                   

					

					<div class="container-login100-form-btn m-t-17">
						<button type="submit" class="login100-form-btn">
							Sign In
						</button>
					</div>

					<div class="w-full text-center p-t-55">
                    <a href="register" class="txt2 bo1">
					
							Not a member?
						

						
							Sign up now
						</a>
					</div>
				</form>
			</div>
		</div>
	</div>
	



</body>
</html>
