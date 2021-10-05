<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Welcome</title>

    <!-- css -->
    <link rel="stylesheet" type="text/css" href="{{URL::asset('style/style.css')}}">
    <!-- Fonts -->
    <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap" rel="stylesheet">

    <style>
            body {
                font-family: 'Nunito', sans-serif;
            }
    </style>

</head>
<body class="container">

            <div class="content">
                <div class="welcome">
                    <div class="wel back">
                        <h1 class="back">Welcome Back!</h1>
                        <p class="back">se é a primeira vez que você acessou clique no botão a baixo</p>
                        <a href="{{ route('login') }}" class="btn back">Login</a>
                    </div>
                </div>
                <div class="register">
                    <h1 class="titulo"> Criar Conta </h1>
                    <div class="reg">
                        <x-auth-validation-errors class="mb-4" :errors="$errors" />

                        <form method="POST" action="{{ route('register') }}">
                            @csrf

                            <!-- Name -->
                            <div class="name backR">

                                <x-input id="name" class="Input backR" type="text" name="name" :value="old('name')" placeholder="nome" required autofocus />
                            </div>

                            <!-- Email Address -->
                            <div  class="email backR">

                                <x-input id="email" class="Input backR" type="email" name="email" :value="old('email')" placeholder="Email" required />
                            </div>

                            <!-- Password -->
                            <div  class="password backR">
                                <x-input id="password" class="Input backR"
                                                type="password"
                                                name="password"
                                                placeholder="Senha"
                                                required autocomplete="new-password" />
                            </div>

                            <!-- Confirm Password -->
                            <div  class="confirm backR">
                                <x-input class="backR" id="password_confirmation" class="Input backR"
                                                type="password"
                                                placeholder="password"
                                                name="password_confirmation" required />
                            </div>

                            <!-- Botão -->
                            <div class="btnRegister backR">
                                <x-button class="btnSubmit"> Submit </x-button>
                            </div>

                        </form>

                    </div>

                </div>
            </div>
</body>
</html>
