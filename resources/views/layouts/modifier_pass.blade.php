@extends('layouts/master',['title'=>'Modifiez votre mot de pass'])

@section('content')

<div style="background-color:#f7f7fc;">

    <main class="page-wrapper">
        <!-- Navbar (Floating light)-->
        @include('layouts/_navbar')
        <!-- Page content-->
        <!-- Slanted background-->
        <div class="position-relative bg-gradient" style="height: 480px;">
            <div class="shape shape-bottom shape-slant bg-secondary d-none d-lg-block">
                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 3000 260">
                    <polygon fill="currentColor" points="0,257 0,260 3000,260 3000,0"></polygon>
                </svg>
            </div>
        </div>
        <!-- Page content-->
        <div class="container position-relative zindex-5 pb-4 mb-md-3" style="margin-top: -350px;">
            <div class="row">
                @include('layouts\_sidebar')
                <!-- Content-->
                <div class="col-lg-8">
                    <div class="d-flex flex-column h-100 bg-light rounded-3 shadow-lg p-4">
                        <div class="py-2 p-md-3">
                            <!-- Title + Delete link-->
                            <div
                                class="d-sm-flex align-items-center justify-content-between pb-4 text-center text-sm-start">
                                <h1 class="h3 mb-2 text-nowrap">Profile info</h1>
                            </div>
                            <!-- Content-->
                            <div class="bg-secondary rounded-3 p-4 mb-4">
                                <div class="d-block d-sm-flex align-items-center"><img
                                        class="d-block rounded-circle mx-sm-0 mx-auto mb-3 mb-sm-0"
                                        src="img/dashboard/avatar/main.jpg" alt="Amanda Wilson" width="110">
                                    <div class="ps-sm-3 text-center text-sm-start">
                                        <div class="p mb-0 fs-ms text-muted fw-bolder">Hello Amanda Wilson.</div>
                                    </div>
                                </div>
                            </div>
                            <form action="{{route('modifier_pass')}}" method="post">
                                <div class="row">
                                    <h3
                                        class="d-block bg-secondary fs-sm fw-semibold text-muted mb-0 px-4 py-3 text-md-center mb-2">
                                        Modifiez votre mot de pass
                                    </h3>
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
                                    <div class="col-sm-12">
                                        <div class="input-group mb-3"><i
                                                class="ai-lock position-absolute top-50 start-0 translate-middle-y ms-3"></i>
                                            <div class="password-toggle w-100">
                                                <input class="form-control" type="password"
                                                    placeholder="Entrez votre mot de pass" name="pass1" required>
                                                <label class="password-toggle-btn" aria-label="Show/hide password">
                                                    <input class="password-toggle-check" type="checkbox"><span
                                                        class="password-toggle-indicator"></span>
                                                </label>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-sm-12">
                                        <div class="input-group mb-3"><i
                                                class="ai-lock position-absolute top-50 start-0 translate-middle-y ms-3"></i>
                                            <div class="password-toggle w-100">
                                                <input class="form-control" type="password"
                                                    placeholder="Nouveau mot de pass" name="pass2" required>
                                                <label class="password-toggle-btn" aria-label="Show/hide password">
                                                    <input class="password-toggle-check" type="checkbox"><span
                                                        class="password-toggle-indicator"></span>
                                                </label>
                                                <span class="text-danger">@error('pass2'){{$message}} @enderror</span>

                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-sm-12">
                                        <div class="input-group mb-3"><i
                                                class="ai-lock position-absolute top-50 start-0 translate-middle-y ms-3"></i>
                                            <div class="password-toggle w-100">
                                                <input class="form-control" type="password"
                                                    placeholder="Confirmez le mot de pass" name="pass3" required>
                                                <label class="password-toggle-btn" aria-label="Show/hide password">
                                                    <input class="password-toggle-check" type="checkbox"><span
                                                        class="password-toggle-indicator"></span>
                                                </label>
                                                <span class="text-danger">@error('pass3'){{$message}} @enderror</span>

                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-12">
                                        <hr class="mt-2 mb-4">
                                        <div class="d-flex flex-wrap justify-content-between align-items-center">
                                        <div class="form-check d-block">
                                                <a href="/dashboard"><button class="btn btn-secondary mt-3 mt-sm-0"
                                                        type="button">Annuler</button></a>
                                            </div>
                                            <button class="btn btn-primary mt-3 mt-sm-0" type="submit"><i
                                                    class="ai-save fs-lg me-2"></i>Enregistrer</button>
                                        </div>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </main>
</div>
@endsection