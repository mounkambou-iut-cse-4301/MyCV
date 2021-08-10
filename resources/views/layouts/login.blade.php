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
                        <h1 class="h2 text-center">Sign in</h1>
                        <p class="fs-ms text-muted mb-4 text-center">Sign in to your account using email and password
                            provided during registration.</p>
                        <form class="needs-validation" novalidate>
                            <div class="input-group mb-3"><i
                                    class="ai-mail position-absolute top-50 start-0 translate-middle-y ms-3"></i>
                                <input class="form-control rounded" type="email" placeholder="Email" required>
                            </div>
                            <div class="input-group mb-3"><i
                                    class="ai-lock position-absolute top-50 start-0 translate-middle-y ms-3"></i>
                                <div class="password-toggle w-100">
                                    <input class="form-control" type="password" placeholder="Password" required>
                                    <label class="password-toggle-btn" aria-label="Show/hide password">
                                        <input class="password-toggle-check" type="checkbox"><span
                                            class="password-toggle-indicator"></span>
                                    </label>
                                </div>
                            </div>
                            <div class="d-flex justify-content-between align-items-center mb-3 pb-1">
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" id="keep-signed-2">
                                    <label class="form-check-label" for="keep-signed-2">Keep me signed in</label>
                                </div><a class="nav-link-style fs-ms" href="password-recovery.html">Forgot password?</a>
                            </div>
                            <button class="btn btn-primary d-block w-100" type="submit">Sign in</button>
                            <p class="fs-sm pt-3 mb-0 text-center">Don't have an account? <a href='/register' class='fw-medium'
                                    >Sign up</a></p>
                        </form>
                    </div>
                    <div class="border-top text-center mt-4 pt-4">
                        <p class="fs-sm fw-medium text-heading">Or sign in with</p><a
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