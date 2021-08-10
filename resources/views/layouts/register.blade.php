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
                    <!-- Sign up view-->
                    <div class="view show">
                        <h1 class="h2 text-center">Sign up</h1>
                        <p class="fs-ms text-muted mb-4 text-center">Registration takes less than a minute but gives you
                            full control over your orders.</p>
                        <form class="needs-validation" novalidate>
                            <div class="mb-3">
                                <input class="form-control" type="text" placeholder="Full name" required>
                            </div>
                            <div class="mb-3">
                                <input class="form-control" type="text" placeholder="Email" required>
                            </div>
                            <div class="input-group mb-3">
                                <div class="password-toggle w-100">
                                    <input class="form-control" type="password" placeholder="Password" required>
                                    <label class="password-toggle-btn" aria-label="Show/hide password">
                                        <input class="password-toggle-check" type="checkbox"><span
                                            class="password-toggle-indicator"></span>
                                    </label>
                                </div>
                            </div>
                            <div class="input-group mb-3">
                                <div class="password-toggle w-100">
                                    <input class="form-control" type="password" placeholder="Confirm password" required>
                                    <label class="password-toggle-btn" aria-label="Show/hide password">
                                        <input class="password-toggle-check" type="checkbox"><span
                                            class="password-toggle-indicator"></span>
                                    </label>
                                </div>
                            </div>
                            <button class="btn btn-primary d-block w-100" type="submit">Sign up</button>
                            <p class="fs-sm pt-3 mb-0 text-center">Already have an account? <a href='/login'
                                    class='fw-medium' >Sign in</a></p>
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