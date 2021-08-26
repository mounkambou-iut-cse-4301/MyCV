@extends('layouts/master',['title'=>'Prix et distinctions honorifiques'])

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
                            @include('layouts\_card_image')
                            <form action="{{route('permis_conduire')}}" method="post">
                                <div class="row">
                                    <h3
                                        class="d-block bg-secondary fs-sm fw-semibold text-muted mb-0 px-4 py-3 text-md-center mb-2">
                                        Permis de conduire
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

                                    <div class="col-sm-6">
                                        <div class="mb-3 pb-1">
                                            <label class="form-label px-0" for="account-permis">Permis</label>
                                            <select class="form-select" id="account-permis" required name="permis">
                                                <option value>Sélectioner Permis</option>
                                                <option value="Motocyclettes">Motocyclettes</option>
                                                <option value="Voitures">Voitures</option>
                                                <option value="Camions">Camions</option>
                                                <option value="Autres">Autres</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-sm-6">
                                        <div class="mb-3 pb-1">
                                            <label class="form-label px-0" for="account-niveau">Categorie</label>
                                            <select class="form-select" id="account-niveau" required name="niveau">
                                                <option value>Sélectioner niveau</option>
                                                <option value="AM">AM</option>
                                                <option value="A1">A1</option>
                                                <option value="A2">A2</option>
                                                <option value="A">A</option>
                                                <option value="B1">B1</option>
                                                <option value="B">B</option>
                                                <option value="BE">BE</option>
                                                <option value="C1">C1</option>
                                                <option value="C1E">C1E</option>
                                                <option value="C">C</option>
                                                <option value="CE">CE</option>
                                                <option value="D1">D1</option>
                                                <option value="D1E">D1E</option>
                                                <option value="D">D</option>
                                                <option value="DE">DE</option>
                                            </select>
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
                                            {{$inf->permis}}
                                            </td>
                                            <td class="py-3 align-middle">{{$inf->niveau}}</td>
                                            <td class="py-3 align-middle"><a class="nav-link-style text-danger" href="/delete_permis_conduire/{{$inf->id}}"
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