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
                            <div class="row">
                                <div class="col-sm-6">
                                    <div class="mb-3 pb-1">
                                        <label class="form-label px-0" for="account-fn">First Name</label>
                                        <input class="form-control" type="text" id="account-fn" value="Amanda">
                                    </div>
                                </div>
                                <div class="col-sm-6">
                                    <div class="mb-3 pb-1">
                                        <label class="form-label px-0" for="account-ln">Last Name</label>
                                        <input class="form-control" type="text" id="account-ln" value="Wilson">
                                    </div>
                                </div>
                                <div class="col-sm-6">
                                    <div class="mb-3 pb-1">
                                        <label class="form-label px-0" for="account-email">Email address</label>
                                        <input class="form-control" type="text" id="account-email"
                                            value="a.wilson@example.com">
                                    </div>
                                </div>
                                <div class="col-sm-6">
                                    <div class="mb-3 pb-1">
                                        <label class="form-label px-0" for="account-username">Username</label>
                                        <div class="input-group"><span class="input-group-text">@</span>
                                            <input class="form-control" type="text" id="account-username"
                                                value="amanda_w">
                                        </div>
                                    </div>
                                </div>
                                <div class="col-sm-6">
                                    <div class="mb-3 pb-1">
                                        <label class="form-label px-0" for="account-country">Country</label>
                                        <select class="form-select" id="account-country">
                                            <option value>Select country</option>
                                            <option value="Argentina">Argentina</option>
                                            <option value="Belgium">Belgium</option>
                                            <option value="France">France</option>
                                            <option value="Germany">Germany</option>
                                            <option value="Madagascar">Madagascar</option>
                                            <option value="Spain">Spain</option>
                                            <option value="UK">United Kingdom</option>
                                            <option value="USA" selected>USA</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-sm-6">
                                    <div class="mb-3 pb-1">
                                        <label class="form-label px-0" for="account-city">City</label>
                                        <input class="form-control" type="text" id="account-city" value="New York">
                                    </div>
                                </div>
                                <div class="col-sm-6">
                                    <div class="mb-3 pb-1">
                                        <label class="form-label px-0" for="account-address">Address Line</label>
                                        <input class="form-control" type="text" id="account-address"
                                            value="Some Cool Street, 22/1">
                                    </div>
                                </div>
                                <div class="col-sm-6">
                                    <div class="mb-3 pb-1">
                                        <label class="form-label px-0" for="account-zip">ZIP Code</label>
                                        <input class="form-control" type="text" id="account-zip">
                                    </div>
                                </div>
                                <div class="col-12">
                                    <hr class="mt-2 mb-4">
                                    <div class="d-flex flex-wrap justify-content-between align-items-center">
                                        <div class="form-check d-block">
                                            <input class="form-check-input" type="checkbox" id="show-email" checked>
                                            <label class="form-check-label" for="show-email">Show my email to registered
                                                users</label>
                                        </div>
                                        <button class="btn btn-primary mt-3 mt-sm-0" type="button"><i
                                                class="ai-save fs-lg me-2"></i>Save changes</button>
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