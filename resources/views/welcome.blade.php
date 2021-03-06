@extends('layout.login')

@section('head')
    <title>Login - SIG</title>
@endsection

@section('content')
    <div class="container sm:px-10">
        <div class="block xl:grid grid-cols-2 gap-4">
            <!-- BEGIN: Login Info -->
            <div class="hidden xl:flex flex-col min-h-screen">
                <a href="{{ route('welcome') }}" class="-intro-x flex items-center pt-5">
                    <img alt="Rubick Tailwind HTML Admin Template" class="w-6" src="{{ asset('dist/images/logo.svg') }}">
                    <span class="text-white text-lg ml-3">
                        SIG<span class="font-medium">v3</span>
                    </span>
                </a>
                <div class="my-auto">
                    <img alt="Rubick Tailwind HTML Admin Template" class="-intro-x w-1/2 -mt-16"
                        src="{{ asset('dist/images/pge.svg') }}">
                    <!--
                                        <div class="-intro-x text-white font-medium text-4xl leading-tight mt-10">A few more clicks to <br> sign
                                            in to your account.</div>
                                        <div class="-intro-x mt-5 text-lg text-white text-opacity-70 dark:text-gray-500">Manage all your
                                            e-commerce accounts in one place</div>
                                        -->
                </div>
            </div>
            <!-- END: Login Info -->
            <!-- BEGIN: Login Form -->
            <div class="h-screen xl:h-auto flex py-5 xl:py-0 my-10 xl:my-0">
                <div
                    class="my-auto mx-auto xl:ml-20 bg-white dark:bg-dark-1 xl:bg-transparent px-5 sm:px-8 py-8 xl:p-0 rounded-md shadow-md xl:shadow-none w-full sm:w-3/4 lg:w-2/4 xl:w-auto">
                    <h2 class="intro-x font-bold text-2xl xl:text-3xl text-center xl:text-left mt-8">Registro</h2>
                    @include('layout.partials.errors')
                    @include('layout.partials.flashMessage')
                    <div class="intro-x mt-5 xl:mt-8 text-center xl:text-left">
                        <a class="btn btn-outline-secondary py-3 px-4 w-full xl:w-80 mt-3 xl:mt-2 align-top"
                            href="{{ route('form.person') }}">Registrarse J??venes</a>
                        <a class="btn btn-outline-secondary py-3 px-4 w-full xl:w-80 mt-3 xl:mt-2 align-top"
                            href="{{ route('form.institution') }}">Registrarse Empresa</a>
                    </div>
                    <h2 class="intro-x font-bold text-2xl xl:text-3xl text-center xl:text-left mt-8">Iniciar Sesi??n</h2>
                    <form action="{{ route('auth.login') }}" method="POST">
                        @method('POST')
                        <div class="intro-x mt-8">
                            @csrf
                            <input id="email" type="text"
                                class="intro-x login__input form-control py-3 px-4 border-gray-300 block"
                                placeholder="Email" name="email" value="{{ old('email') }}">
                            <div id="error-email" class="login__input-error w-5/6 text-theme-6 mt-2"></div>
                            <input id="password" type="password"
                                class="intro-x login__input form-control py-3 px-4 border-gray-300 block mt-4"
                                placeholder="Password" name="password">
                            <div id="error-password" class="login__input-error w-5/6 text-theme-6 mt-2"></div>

                        </div>
                        <div class="intro-x mt-5 xl:mt-8 text-center xl:text-left">
                            <button type="submit"
                                class="btn btn-primary py-3 px-4 w-full xl:w-32 xl:mr-3 align-top">Iniciar</button>
                        </div>
                    </form>

                    
                </div>
            </div>
            <!-- END: Login Form -->
        </div>
    </div>
@endsection
