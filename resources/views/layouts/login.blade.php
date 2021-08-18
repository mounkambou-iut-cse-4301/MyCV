@extends('layouts/master',['title'=>'Connexion'])

@section('content')
<div style="background-color:#737491;">
    <main class="page-wrapper d-flex flex-column">
        <!-- Navbar (Floating dark)-->
        @include('layouts/_navbar')
        <!-- Page content-->
        <section class="container d-flex justify-content-center align-items-center pt-7 pb-4" style="flex: 1 0 auto;">
            <div class="signin-form mt-3">
                <div class="signin-form-inner">
                    <!-- Sign in view-->
                    <div class="view show">
                        <h1 class="h2 text-center">Connexion</h1>
                        <p class="fs-ms text-muted mb-4 text-center">Connectez-vous à votre compte en utilisant l'e-mail et le mot de passe fournis lors de l'inscription.</p>
                        <form class="needs-validation" action="{{route('login')}}" method="post">
                            @if(Session::get('fail'))
                            <div class="alert alert-danger">
                                {{Session::get('fail')}}
                            </div>
                            @endif
                            @csrf
                            <div class="mb-3">
                                <input class="form-control" type="email" placeholder="Email" name="email"
                                    value="{{old('email')}}">
                                <span class="text-danger">@error('email'){{$message}} @enderror</span>
                            </div>
                            <div class="input-group mb-3">
                                <div class="password-toggle w-100">
                                    <input class="form-control" name="password" type="password" placeholder="Mot de pass">
                                    <label class="password-toggle-btn" aria-label="Show/hide password">
                                        <input class="password-toggle-check" type="checkbox"><span
                                            class="password-toggle-indicator"></span>
                                    </label>
                                    <span class="text-danger">@error('password'){{$message}} @enderror</span>
                                </div>
                            </div>
                            <div class="d-flex justify-content-between align-items-center mb-3 pb-1">
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" id="keep-signed-2">
                                    <label class="form-check-label" for="keep-signed-2">Keep me signed in</label>
                                </div><a class="nav-link-style fs-ms" href="password-recovery.html">Forgot password?</a>
                            </div>
                            <button class="btn btn-primary d-block w-100" type="submit">Connexion</button>
                            <p class="fs-sm pt-3 mb-0 text-center">Vous n'avez pas de compte ? <a
                                    href="{{route('register')}}" class='fw-medium'>S'inscrire</a></p>
                        </form>
                    </div>
                    <div class="border-top text-center mt-4 pt-4">
                        <p class="fs-sm fw-medium text-heading">Ou connectez vous avec</p><a
                            class="btn-social bs-facebook bs-outline bs-lg mx-1 mb-2" href="#"><i
                                class="ai-facebook"></i></a><a class="btn-social bs-twitter bs-outline bs-lg mx-1 mb-2"
                            href="#"><i class="ai-twitter"></i></a><a
                            class="btn-social bs-instagram bs-outline bs-lg mx-1 mb-2" href="#"><i
                                class="ai-instagram"></i></a><a class="btn-social bs-google bs-outline bs-lg mx-1 mb-2"
                            href="#"><i class="ai-google"></i></a>
                    </div>
                </div>
            </div>
        </section>
    </main>
</div>
@endsection