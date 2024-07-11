<!DOCTYPE html>
<html lang="en">
<head>
    <title>Login KELANA</title>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Favicon -->
    <link rel="icon" type="image/png" href="{{ asset('images/icons/favicon.ico') }}"/>
    
    <!-- Bootstrap -->
    <link rel="stylesheet" type="text/css" href="{{ asset('vendor/bootstrap/css/bootstrap.min.css') }}">
    
    <!-- Font Awesome -->
    <link rel="stylesheet" type="text/css" href="{{ asset('fonts/font-awesome-4.7.0/css/font-awesome.min.css') }}">
    
    <!-- Linearicons -->
    <link rel="stylesheet" type="text/css" href="{{ asset('fonts/Linearicons-Free-v1.0.0/icon-font.min.css') }}">
    
    <!-- Animate CSS -->
    <link rel="stylesheet" type="text/css" href="{{ asset('vendor/animate/animate.css') }}">
    
    <!-- Hamburgers -->
    <link rel="stylesheet" type="text/css" href="{{ asset('vendor/css-hamburgers/hamburgers.min.css') }}">
    
    <!-- Animsition -->
    <link rel="stylesheet" type="text/css" href="{{ asset('vendor/animsition/css/animsition.min.css') }}">
    
    <!-- Select2 -->
    <link rel="stylesheet" type="text/css" href="{{ asset('vendor/select2/select2.min.css') }}">
    
    <!-- Daterangepicker -->
    <link rel="stylesheet" type="text/css" href="{{ asset('vendor/daterangepicker/daterangepicker.css') }}">
    
    <!-- Custom CSS -->
    <link rel="stylesheet" type="text/css" href="{{ asset('css/util.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('css/main.css') }}">
</head>
<body style="background-color: #666666;">
    <div class="limiter">
        <div class="container-login100">
            <div class="wrap-login100">
                <form method="POST" action="{{ route('login') }}" class="login100-form validate-form">
                    @csrf

                    <span class="login100-form-title p-b-43">
                        Login Akun
                    </span>

                    <!-- Email Address -->
                    <div class="wrap-input100 validate-input" data-validate="Valid email is required: ex@abc.xyz">
                        <input class="input100" type="text" name="email" :value="old('email')" required autofocus>
                        <span class="focus-input100"></span>
                        <span class="label-input100">Email</span>
                        <x-input-error :messages="$errors->get('email')" class="mt-2" />
                    </div>

                    <!-- Password -->
                    <div class="wrap-input100 validate-input" data-validate="Password is required">
                        <input class="input100" type="password" name="password" required autocomplete="current-password">
                        <span class="focus-input100"></span>
                        <span class="label-input100">Password</span>
                        <x-input-error :messages="$errors->get('password')" class="mt-2" />
                    </div>

                    <!-- Remember Me -->
                    <div class="block mt-4">
                        <label for="remember_me" class="inline-flex items-center">
                            <input id="remember_me" type="checkbox" class="rounded dark:bg-gray-900 border-gray-300 dark:border-gray-700 text-indigo-600 shadow-sm focus:ring-indigo-500 dark:focus:ring-indigo-600 dark:focus:ring-offset-gray-800" name="remember">
                            <span class="ms-2 text-sm text-gray-600 dark:text-gray-400">{{ __('Remember me') }}</span>
                        </label>
                    </div>

                    <div class="flex items-center justify-end mt-4">
                        
                        <button class="login100-form-btn" style="background-color: #EF981A;">
                            {{ __('Log in') }}
                        </button>
                        @if (Route::has('password.request'))
                            <a class="underline text-sm text-gray-600 dark:text-gray-400 hover:text-gray-900 dark:hover:text-gray-100 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500 dark:focus:ring-offset-gray-800" href="{{ route('password.request') }}">
                                {{ __('Forgot your password?') }}
                            </a>
                        @endif
                    </div>
                </form>

                <div class="login100-more">
        <div class="text-container">
            <h1>KELANA</h1>
        </div>
        <div class="image-container">
            <img src="{{ asset('images/M8_26.png') }}" alt="Example Image">
        </div>
    </div>
             
                
            </div>
        </div>
    </div>

    <!-- jQuery -->
    <script src="{{ asset('vendor/jquery/jquery-3.2.1.min.js') }}"></script>
    <style>
        .image-container {
            text-align: center; /* Center align the image */
        }
        .image-container img {
            max-width: 60%; /* Image width follows screen width */
            height: auto;    /* Maintain aspect ratio */
        }
        .text-container {
            position: absolute;
            top: 50px;       /* Margin top 50px */
            left: 100px;     /* Margin left 100px */
            color: white;
            font-weight: bold; /* Teks menjadi tebal (bold) */
        }
        
    </style>
    <!-- Animsition -->
    <script src="{{ asset('vendor/animsition/js/animsition.min.js') }}"></script>
    
    <!-- Bootstrap -->
    <script src="{{ asset('vendor/bootstrap/js/popper.js') }}"></script>
    <script src="{{ asset('vendor/bootstrap/js/bootstrap.min.js') }}"></script>
    
    <!-- Select2 -->
    <script src="{{ asset('vendor/select2/select2.min.js') }}"></script>
    
    <!-- Daterangepicker -->
    <script src="{{ asset('vendor/daterangepicker/moment.min.js') }}"></script>
    <script src="{{ asset('vendor/daterangepicker/daterangepicker.js') }}"></script>
    
    <!-- Countdown -->
    <script src="{{ asset('vendor/countdowntime/countdowntime.js') }}"></script>
    
    <!-- Custom JS -->
    <script src="{{ asset('js/main.js') }}"></script>
</body>
</html>
