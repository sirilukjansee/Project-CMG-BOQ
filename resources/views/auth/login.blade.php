<!DOCTYPE html>
<html lang="en" class="light">
    <!-- BEGIN: Head -->
    <head>
        <meta charset="utf-8">
        <link href="{{asset('public/logo/logo-color1.jpg')}}" rel="shortcut icon">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="description" content="Icewall admin is super flexible, powerful, clean & modern responsive tailwind admin template with unlimited possibilities.">
        <meta name="keywords" content="admin template, Icewall Admin Template, dashboard template, flat admin template, responsive admin template, web app">
        <meta name="author" content="LEFT4CODE">
        <title>CMG-BOQ</title>
        <!-- BEGIN: CSS Assets-->
        <link rel="stylesheet" href="{{ asset('public/dist/css/app.css')}}" />
        <!-- END: CSS Assets-->
    </head>
    <!-- END: Head -->
    <body class="login">
        <div class="container sm:px-10">
            <div class="block xl:grid grid-cols-2 gap-4">
                <!-- BEGIN: Login Info -->
                <div class="hidden xl:flex flex-col min-h-screen">
                    <a href="" class="-intro-x flex items-center pt-5">
                        <img alt="Midone - HTML Admin Template" class="w-6" src="{{ asset('public/dist/images/logo.svg')}}">
                        <span class="text-white text-lg ml-3"> CMG </span>
                    </a>
                    <div class="my-auto">
                        <img alt="Midone - HTML Admin Template" class="-intro-x w-1/2 -mt-16" src="{{ asset('public/logo/CMG.png')}}">
                        <div class="-intro-x text-white font-medium text-4xl leading-tight mt-10">
                            Central Marketing Group <br> (CMG)

                        </div>
                        {{-- <div class="-intro-x mt-5 text-lg text-white text-opacity-70 dark:text-slate-400">Manage all your e-commerce accounts in one place</div> --}}
                    </div>
                </div>
                <!-- END: Login Info -->
                <!-- BEGIN: Login Form -->

                <div class="h-screen xl:h-auto flex py-5 xl:py-0 my-10 xl:my-0">
                    <div class="my-auto mx-auto xl:ml-20 bg-white dark:bg-darkmode-600 xl:bg-transparent px-5 sm:px-8 py-8 xl:p-0 rounded-md shadow-md xl:shadow-none w-full sm:w-3/4 lg:w-2/4 xl:w-auto">
                        <h2 class="intro-x font-bold text-2xl xl:text-3xl text-center xl:text-left">
                            Login
                        </h2>
                        <form method="POST" action="{{ route('login') }}">
                        @csrf
                        <div class="intro-x mt-2 text-slate-400 xl:hidden text-center">A few more clicks to sign in to your account. Manage all your e-commerce accounts in one place</div>
                        <div class="intro-x mt-8">
                            <input id="email" type="email" class="intro-x login__input form-control py-3 px-4 block @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}"
                             placeholder="Email" required autocomplete="email" autofocus>

                             @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror

                            <input id="password" type="password" class="intro-x login__input form-control py-3 px-4 block mt-4 @error('password') is-invalid @enderror"
                            name="password" required autocomplete="current-password" placeholder="Password">

                            @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                        </div>
                        {{-- <div class="intro-x flex text-slate-600 dark:text-slate-500 text-xs sm:text-sm mt-4">
                            <div class="flex items-center mr-auto">
                                <input id="remember-me" type="checkbox" class="form-check-input border mr-2">
                                <label class="cursor-pointer select-none" for="remember-me">Remember me</label>
                            </div>
                            <a href="">Forgot Password?</a>
                        </div> --}}
                        <div class="intro-x mt-5 xl:mt-8 text-center xl:text-left">
                            <button class="btn btn-primary py-3 px-4 w-full xl:w-32 xl:mr-3 align-top">Login</button>
                            {{-- <button class="btn btn-outline-secondary py-3 px-4 w-full xl:w-32 mt-3 xl:mt-0 align-top">Register</button> --}}
                        </div>
                        {{-- <div class="intro-x mt-10 xl:mt-24 text-slate-600 dark:text-slate-500 text-center xl:text-left"> By signin up, you agree to our <a class="text-primary dark:text-slate-200" href="">Terms and Conditions</a> & <a class="text-primary dark:text-slate-200" href="">Privacy Policy</a> </div> --}}
                        </form>
                    </div>
                </div>

                <!-- END: Login Form -->
            </div>
        </div>
        <!-- BEGIN: JS Assets-->
        <script src="{{ asset('public/dist/js/app.js')}}"></script>
        <!-- END: JS Assets-->
    </body>
</html>
