@extends('layouts/master',['title'=>'Dashboard'])

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
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </main>
</div>
@endsection