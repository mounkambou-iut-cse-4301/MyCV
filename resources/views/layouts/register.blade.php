@extends('layouts/master',['title'=>"S'inscrire"])

@section('content')
<div style="background-color:#737491;">
    <main class="page-wrapper d-flex flex-column">
        <!-- Navbar (Floating dark)-->
        @include('layouts/_navbar')
        <!-- Page content-->
        <section class="container d-flex justify-content-center align-items-center pt-7 pb-4" style="flex: 1 0 auto;">
            <div class="signin-form mt-3">
                <div class="signin-form-inner">
                    <!-- Sign up view-->
                    <div class="view show">
                        <h1 class="h2 text-center">S'inscrire</h1>
                        <p class="fs-ms text-muted mb-4 text-center">L'inscription prend moins d'une minute mais vous
                            donne un contrôle total sur vos commandes.</p>
                        <form class="needs-validation" action="{{route('register')}}" method="post">
                            @if(Session::get('success'))
                            <div class="alert alert-success">
                                {{Session::get('success')}}
                            </div>
                            @endif
                            @if(Session::get('fail'))
                            <div class="alert alert-danger">
                                {{Session::get('fail')}}
                            </div>
                            @endif
                            @csrf
                            <div class="mb-3">
                                <input class="form-control" type="text" placeholder="Nom Complet" name="name"
                                    value="{{old('name')}}">
                                <span class="text-danger">@error('name'){{$message}} @enderror</span>
                            </div>
                            <div class="mb-3">
                                <input class="form-control" type="email" placeholder="Email" name="email"
                                    value="{{old('email')}}">
                                <span class="text-danger">@error('email'){{$message}} @enderror</span>
                            </div>
                            <div class="input-group mb-3">
                                <div class="password-toggle w-100">
                                    <input class="form-control" type="password" name="password"
                                        placeholder="Mot de pass">
                                    <label class="password-toggle-btn" aria-label="Show/hide password">
                                        <input class="password-toggle-check" type="checkbox"><span
                                            class="password-toggle-indicator"></span>
                                    </label>
                                </div>
                                <span class="text-danger">@error('password'){{$message}} @enderror</span>
                            </div>
                            <div class="input-group mb-3">
                                <div class="password-toggle w-100">
                                    <input class="form-control" type="password" name="confirm_password"
                                        placeholder="Confirmez le mot de pass">
                                    <label class="password-toggle-btn" aria-label="Show/hide password">
                                        <input class="password-toggle-check" type="checkbox"><span
                                            class="password-toggle-indicator"></span>
                                    </label>
                                </div>
                                <span class="text-danger">@error('confirm_password'){{$message}} @enderror</span>
                            </div>
                            <button class="btn btn-primary d-block w-100" type="submit">S'inscrire</button>
                            <p class="fs-sm pt-3 mb-0 text-center">Avez-vous déjà un compte ? <a
                                    href="{{route('login')}}" class='fw-medium'>Connexion</a></p>
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