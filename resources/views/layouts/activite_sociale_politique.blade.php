@extends('layouts/master',['title'=>'Activités sociales et politiques'])

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
                            <form action="">
                                <div class="row">
                                    <h3
                                        class="d-block bg-secondary fs-sm fw-semibold text-muted mb-0 px-4 py-3 text-md-center mb-2">
                                        Activités sociales et politiques
                                    </h3>
                                    <div class="col-sm-12">
                                        <div class="mb-3 pb-1">
                                            <label class="form-label px-0" for="account-fn">Titre<sup
                                                    class="text-danger ms-1">*</sup></label>
                                            <input class="form-control" type="text" id="account-fn">
                                        </div>
                                    </div>
                                    <div class="col-sm-12">
                                        <div class="mb-3 pb-1">
                                            <label class="form-label px-0" for="account-ln">Lieu</label>
                                            <input class="form-control" type="text" id="account-ln" >
                                        </div>
                                    </div>
                                    
                                    <div class="col-sm-6">
                                        <div class="mb-3 pb-1">
                                            <label class="form-label px-0" for="date">De</label>
                                            <input class="form-control" type="date" id="date" value="21/202/1999">
                                        </div>
                                    </div>
                                    <div class="col-sm-6">
                                        <div class="mb-3 pb-1">
                                            <label class="form-label px-0" for="date">Jusqu'au</label>
                                            <input class="form-control" type="date" id="date" value="21/202/1999">
                                        </div>
                                    </div>
                                    <div class="col-sm-12">
                                        <div class="mb-3 pb-1">
                                            <label class="form-label" for="cont-message">Description</label>
                                            <textarea class="form-control" placeholder="Saisir ici la description..." id="cont-message" rows="5"
                                                required></textarea>
                                        </div>
                                    </div>
                                    <div class="col-sm-12">
                                        <div class="mb-3 pb-1">
                                            <label class="form-label px-0" for="account-ln">Lien vers le fichier ou la vidéo</label>
                                            <input class="form-control" type="text" id="account-ln" >
                                        </div>
                                    </div>
                                    <div class="col-12">
                                        <hr class="mt-2 mb-4">
                                        <div class="d-flex flex-wrap justify-content-end align-items-center">
                                            <button class="btn btn-primary mt-3 mt-sm-0" type="button"><i
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