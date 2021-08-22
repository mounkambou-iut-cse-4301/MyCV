@extends('layouts/master',['title'=>'Éducation et formation'])

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
                               <div class="d-block d-sm-flex align-items-center"> 
                                   @if(getImage())
                                    <img
                                        class="d-block rounded-circle mx-sm-0 mx-auto mb-3 mb-sm-0"
                                        src="{{asset('storage/images/'.getImage())}}" alt="{{getName()}}" width="50" >
                                    @endif
                                    <div class="ps-sm-3 text-center text-sm-start">
                                        <div class="p mb-0 fs-ms text-muted fw-bolder">{{getName()}}</div>
                                    </div>
                                </div>
                            </div>
                            <form action="{{route('education_formation')}}" method="post">
                                <div class="row">
                                    <h3
                                        class="d-block bg-secondary fs-sm fw-semibold text-muted mb-0 px-4 py-3 text-md-center mb-2">
                                        Éducation et formation
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
                                        <div class="mb-3 pb-1">
                                            <label class="form-label px-0" for="account-fn">Intitulé de la qualification délivrée<sup
                                                    class="text-danger ms-1">*</sup></label>
                                            <input class="form-control" name="qualification" type="text" id="account-fn">
                                        </div>
                                    </div>
                                    <div class="col-sm-12">
                                        <div class="mb-3 pb-1">
                                            <label class="form-label px-0" for="account-ln">Orgasnismes d'éducation et de formation</label>
                                            <input class="form-control" name="organisme" type="text" id="account-ln" >
                                        </div>
                                    </div>
                                    <div class="col-sm-12">
                                        <div class="mb-3 pb-1">
                                            <label class="form-label px-0" for="account-ln">Adresse</label>
                                            <input class="form-control" name="adresse" type="text" id="account-ln" >
                                        </div>
                                    </div>
                                    <div class="col-sm-6">
                                        <div class="mb-3 pb-1">
                                            <label class="form-label px-0" for="account-zip">Code Postal</label>
                                            <input class="form-control" name="code_postal" type="text" id="account-zip">
                                        </div>
                                    </div>
                                    <div class="col-sm-6">
                                        <div class="mb-3 pb-1">
                                            <label class="form-label px-0" for="account-address">Pays</label>
                                            <input class="form-control" type="text" id="account-address"
                                            name="pays">
                                        </div>
                                    </div>
                                    <div class="col-sm-12">
                                        <div class="mb-3 pb-1">
                                            <label class="form-label px-0" for="site_web">Site web</label>
                                            <input class="form-control"  name="site_web" type="text" id="site_web">
                                        </div>
                                    </div>
                                    <div class="col-sm-6">
                                        <div class="mb-3 pb-1">
                                            <label class="form-label px-0" for="date">De</label>
                                            <input class="form-control" name="debut_date"  type="date" id="date">
                                        </div>
                                    </div>
                                    <div class="col-sm-6">
                                        <div class="mb-3 pb-1">
                                            <label class="form-label px-0" for="date">Au</label>
                                            <input class="form-control" name="fin_date" type="date" id="date">
                                        </div>
                                    </div>
                                    <div class="col-12">
                                        <hr class="mt-2 mb-4">
                                        <div class="d-flex flex-wrap justify-content-end align-items-center">
                                            <button class="btn btn-primary mt-3 mt-sm-0" type="submit"><i
                                                    class="ai-save fs-lg me-2"></i>Enregistrer</button>
                                        </div>
                                    </div>
                                </div>
                            </form>
                            <div class="table-responsive fs-md mt-5">
                                <table class="table table-hover mb-0">
                                    <tbody>
                                        @foreach($info as $inf)
                                        <tr>
                                            <td class="py-3 align-middle">
                                                <span class="fw-bold">{{$inf->qualification}}</span><br>
                                                <span >{{$inf->organisme}},{{$inf->ville}}-{{$inf->pays}}</span>
                                                <a href="{{$inf->site_web}}" target="_blank">{{$inf->site_web}}</a>

                                            </td>
                                            <td class="py-3 align-middle">{{$inf->debut_date}}-{{$inf->fin_date}}</td>
                                            <td class="py-3 align-middle"><a class="nav-link-style text-danger" href="/delete_edu_form/{{$inf->id}}"
                                                    data-bs-toggle="tooltip" title="Remove">
                                                    <div class="ai-trash-2"></div>
                                                </a></td>
                                        </tr>
                                        @endforeach

                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </main>
</div>
@endsection