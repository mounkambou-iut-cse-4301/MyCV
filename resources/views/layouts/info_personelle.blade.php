@extends('layouts/master',['title'=>'Informations personelles'])

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
                            <form action="{{route('info_personelle')}}" method="post" enctype="multipart/form-data">
                                @csrf
                                <div class="row">
                                    <h3
                                        class="d-block bg-secondary fs-sm fw-semibold text-muted mb-0 px-4 py-3 text-md-center mb-2">
                                        Informations personelles
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

                                    @if($state==0)
                                    <div class="col-sm-6">
                                        <div class="mb-3 pb-1">
                                            <label class="form-label px-0" for="account-fn">Prénom(s)<sup
                                                    class="text-danger ms-1">*</sup></label>
                                            <input class="form-control" type="text" name="prenom" id="account-fn"
                                                required>
                                        </div>
                                    </div>
                                    <div class="col-sm-6">
                                        <div class="mb-3 pb-1">
                                            <label class="form-label px-0" for="account-ln">Nom<sup
                                                    class="text-danger ms-1">*</sup></label>
                                            <input class="form-control" name="nom" type="text" id="account-ln" required>
                                        </div>
                                    </div>
                                    <div class="col-sm-12">
                                        <div class="mb-3 pb-1">
                                            <label class="form-label px-0" for="account-ln">Metier<sup
                                                    class="text-danger ms-1">*</sup></label>
                                            <input class="form-control" type="text" name="metier" id="account-ln"
                                                required>
                                        </div>
                                    </div>
                                    <div class="col-sm-12">
                                        <div class="mb-3 pb-1">
                                            <label class="form-label" for="cont-message">Je me présente</label>
                                            <textarea class="form-control" name="description" id="cont-message"
                                                rows="5"></textarea>
                                        </div>
                                    </div>
                                    <div class="col-sm-6">
                                        <div class="mb-3 pb-1">
                                            <label class="form-label px-0" for="date">Date de naissance<sup
                                                    class="text-danger ms-1">*</sup></label>
                                            <input class="form-control" name="date_naissance" type="date" id="date"
                                                required>
                                        </div>
                                    </div>
                                    <div class="col-sm-6">
                                        <div class="mb-3 pb-1">
                                            <label class="form-label px-0" for="account-country">Sexe<sup
                                                    class="text-danger ms-1">*</sup></label>
                                            <select name="sexe" class="form-select" id="account-country" required>
                                                <option value>Sélectiner dans la liste</option>
                                                <option value="Masculin">Masculin</option>
                                                <option value="Feminin">Feminin</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-sm-6">
                                        <div class="mb-3 pb-1">
                                            <label class="form-label px-0" for="Nationalité">Nationalité<sup
                                                    class="text-danger ms-1">*</sup></label>
                                            <input class="form-control" name="nationalite" type="text" id="Nationalité"
                                                required>
                                        </div>
                                    </div>
                                    <div class="col-sm-6">
                                        <div class="mb-3 pb-1">

                                            <label for="formFile" class="form-label">Ajouter une photo</label>
                                            <input class="form-control form-control-" name="nom_photo" id="formFile"
                                                type="file">

                                        </div>
                                    </div>
                                    <h3
                                        class="d-block bg-secondary fs-sm fw-semibold text-muted mb-0 px-4 py-3 text-md-center mb-2">
                                        Contact
                                    </h3>
                                    <div class="col-sm-6">
                                        <div class="mb-3 pb-1">
                                            <label class="form-label px-0" for="email">Email<sup
                                                    class="text-danger ms-1">*</sup></label>
                                            <input class="form-control" name="email" type="email" id="email" required>
                                        </div>
                                    </div>
                                    <div class="col-sm-6">
                                        <div class="mb-3 pb-1">
                                            <label class="form-label px-0" for="tel">Numéro de téléphone<sup
                                                    class="text-danger ms-1">*</sup></label>
                                            <input class="form-control" name="telephone" type="number" id="tel"
                                                required>
                                        </div>
                                    </div>
                                    <div class="col-sm-6">
                                        <div class="mb-3 pb-1">
                                            <label class="form-label px-0" for="linkedin">LinkedIn</label>
                                            <input class="form-control" name="linkedin" type="text" id="linkedin">
                                        </div>
                                    </div>
                                    <div class="col-sm-6">
                                        <div class="mb-3 pb-1">
                                            <label class="form-label px-0" for="tweetter">Tweetter</label>
                                            <input class="form-control" name="tweetter" type="text" id="tweetter">
                                        </div>
                                    </div>
                                    <div class="col-sm-6">
                                        <div class="mb-3 pb-1">
                                            <label class="form-label px-0" for="facebook">Facebook</label>
                                            <input class="form-control" name="facebook" type="text" id="facebook">
                                        </div>
                                    </div>
                                    <div class="col-sm-6">
                                        <div class="mb-3 pb-1">
                                            <label class="form-label px-0" for="instagram">Instagram</label>
                                            <input class="form-control" name="instagram" type="text" id="instagram">
                                        </div>
                                    </div>
                                    <div class="col-sm-6">
                                        <div class="mb-3 pb-1">
                                            <label class="form-label px-0" for="youtube">Youtube</label>
                                            <input class="form-control" name="youtube" type="text" id="youtube">
                                        </div>
                                    </div>
                                    <div class="col-sm-6">
                                        <div class="mb-3 pb-1">
                                            <label class="form-label px-0" for="site_web">Site web</label>
                                            <input class="form-control" name="site_web" type="text" id="site_web">
                                        </div>
                                    </div>

                                    <h3
                                        class="d-block bg-secondary fs-sm fw-semibold text-muted mb-0 px-4 py-3 text-md-center mb-2">
                                        Adresse
                                    </h3>
                                    <div class="col-sm-6">
                                        <div class="mb-3 pb-1">
                                            <label class="form-label px-0" for="pays">Pays<sup
                                                    class="text-danger ms-1">*</sup></label>
                                            <input class="form-control" name="pays" type="text" id="pays" required>
                                        </div>
                                    </div>
                                    <div class="col-sm-6">
                                        <div class="mb-3 pb-1">
                                            <label class="form-label px-0" for="ville">Ville<sup
                                                    class="text-danger ms-1">*</sup></label>
                                            <input class="form-control" name="ville" type="text" id="ville" required>
                                        </div>
                                    </div>
                                    <div class="col-sm-6">
                                        <div class="mb-3 pb-1">
                                            <label class="form-label px-0" for="account-address">Localité<sup
                                                    class="text-danger ms-1">*</sup></label>
                                            <input class="form-control" name="localite" type="text" id="account-address"
                                                required>
                                        </div>
                                    </div>
                                    <div class="col-sm-6">
                                        <div class="mb-3 pb-1">
                                            <label class="form-label px-0" for="account-zip">Code Postal</label>
                                            <input class="form-control" name="code_postal" type="text" id="account-zip">
                                        </div>
                                    </div>
                                    @else
                                    <div class="col-sm-6">
                                        <div class="mb-3 pb-1">
                                            <label class="form-label px-0" for="account-fn">Prénom(s)<sup
                                                    class="text-danger ms-1">*</sup></label>
                                            <input class="form-control" type="text" name="prenom" id="account-fn"
                                                required value="{{$info->prenom}}">
                                        </div>
                                    </div>
                                    <div class="col-sm-6">
                                        <div class="mb-3 pb-1">
                                            <label class="form-label px-0" for="account-ln">Nom<sup
                                                    class="text-danger ms-1">*</sup></label>
                                            <input class="form-control" name="nom" type="text" required id="account-ln"
                                                value="{{$info->nom}}">
                                        </div>
                                    </div>
                                    <div class="col-sm-12">
                                        <div class="mb-3 pb-1">
                                            <label class="form-label px-0" for="account-ln">Metier<sup
                                                    class="text-danger ms-1">*</sup></label>
                                            <input class="form-control" type="text" name="metier" required
                                                id="account-ln" value="{{$info->titre}}">
                                        </div>
                                    </div>
                                    <div class="col-sm-12">
                                        <div class="mb-3 pb-1">
                                            <label class="form-label" for="cont-message">Je me présente</label>
                                            <textarea class="form-control" name="description" id="cont-message" rows="5"
                                                >{{$info->description}}</textarea>
                                        </div>
                                    </div>
                                    <div class="col-sm-6">
                                        <div class="mb-3 pb-1">
                                            <label class="form-label px-0" for="date">Date de naissance<sup
                                                    class="text-danger ms-1">*</sup></label>
                                            <input class="form-control" name="date_naissance" required type="date"
                                                id="date" value="{{$info->date_naissance}}">
                                        </div>
                                    </div>
                                    <div class="col-sm-6">
                                        <div class="mb-3 pb-1">
                                            <label class="form-label px-0" for="account-country">Sexe<sup
                                                    class="text-danger ms-1">*</sup></label>
                                            <select name="sexe" class="form-select" id="account-country" value="{{$info->sexe}}" required>
                                                <option value>Sélectiner dans la liste</option>
                                                <option value="Masculin">Masculin</option>
                                                <option value="Feminin">Feminin</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-sm-6">
                                        <div class="mb-3 pb-1">
                                            <label class="form-label px-0" for="Nationalité">Nationalité<sup
                                                    class="text-danger ms-1">*</sup></label>
                                            <input class="form-control" name="nationalite" required type="text"
                                                id="Nationalité" value="{{$info->nationalite}}">
                                        </div>
                                    </div>
                                    <div class="col-sm-6">
                                        <div class="mb-3 pb-1">

                                            <label for="formFile" class="form-label">Ajouter une photo</label>
                                            <input class="form-control form-control" name="nom_photo" id="formFile"
                                                type="file" value="{{$info->nom_photo}}">

                                        </div>
                                    </div>
                                    <h3
                                        class="d-block bg-secondary fs-sm fw-semibold text-muted mb-0 px-4 py-3 text-md-center mb-2">
                                        Contact
                                    </h3>
                                    <div class="col-sm-6">
                                        <div class="mb-3 pb-1">
                                            <label class="form-label px-0" for="email">Email<sup
                                                    class="text-danger ms-1">*</sup></label>
                                            <input class="form-control" name="email" type="email" id="email" required
                                                value="{{$info->email}}">
                                        </div>
                                    </div>
                                    <div class="col-sm-6">
                                        <div class="mb-3 pb-1">
                                            <label class="form-label px-0" for="tel">Numéro de téléphone<sup
                                                    class="text-danger ms-1">*</sup></label>
                                            <input class="form-control" name="telephone" required type="number" id="tel"
                                                value="{{$info->numero_telephone}}">
                                        </div>
                                    </div>
                                    <div class="col-sm-6">
                                        <div class="mb-3 pb-1">
                                            <label class="form-label px-0" for="linkedin">LinkedIn</label>
                                            <input class="form-control" name="linkedin" type="text" id="linkedin"
                                                value="{{$info->linkedin}}">
                                        </div>
                                    </div>
                                    <div class="col-sm-6">
                                        <div class="mb-3 pb-1">
                                            <label class="form-label px-0" for="tweetter">Tweetter</label>
                                            <input class="form-control" name="tweetter" type="text" id="tweetter"
                                                value="{{$info->tweetter}}">
                                        </div>
                                    </div>
                                    <div class="col-sm-6">
                                        <div class="mb-3 pb-1">
                                            <label class="form-label px-0" for="facebook">Facebook</label>
                                            <input class="form-control" name="facebook" type="text" id="facebook"
                                                value="{{$info->facebook}}">
                                        </div>
                                    </div>
                                    <div class="col-sm-6">
                                        <div class="mb-3 pb-1">
                                            <label class="form-label px-0" for="instagram">Instagram</label>
                                            <input class="form-control" name="instagram" type="text" id="instagram"
                                                value="{{$info->instagram}}">
                                        </div>
                                    </div>
                                    <div class="col-sm-6">
                                        <div class="mb-3 pb-1">
                                            <label class="form-label px-0" for="youtube">Youtube</label>
                                            <input class="form-control" name="youtube" type="text" id="youtube"
                                                value="{{$info->youtube}}">
                                        </div>
                                    </div>
                                    <div class="col-sm-6">
                                        <div class="mb-3 pb-1">
                                            <label class="form-label px-0" for="site_web">Site web</label>
                                            <input class="form-control" name="site_web" type="text" id="site_web"
                                                value="{{$info->site_web}}">
                                        </div>
                                    </div>

                                    <h3
                                        class="d-block bg-secondary fs-sm fw-semibold text-muted mb-0 px-4 py-3 text-md-center mb-2">
                                        Adresse
                                    </h3>
                                    <div class="col-sm-6">
                                        <div class="mb-3 pb-1">
                                            <label class="form-label px-0" for="pays">Pays<sup
                                                    class="text-danger ms-1">*</sup></label>
                                            <input class="form-control" name="pays" required type="text" id="pays"
                                                value="{{$info->pays}}">
                                        </div>
                                    </div>
                                    <div class="col-sm-6">
                                        <div class="mb-3 pb-1">
                                            <label class="form-label px-0" for="ville">Ville<sup
                                                    class="text-danger ms-1">*</sup></label>
                                            <input class="form-control" name="ville" required type="text" id="ville"
                                                value="{{$info->ville}}">
                                        </div>
                                    </div>
                                    <div class="col-sm-6">
                                        <div class="mb-3 pb-1">
                                            <label class="form-label px-0" for="account-address">Localité<sup
                                                    class="text-danger ms-1">*</sup></label>
                                            <input class="form-control" name="localite" required type="text"
                                                id="account-address" value="{{$info->localite}}">
                                        </div>
                                    </div>
                                    <div class="col-sm-6">
                                        <div class="mb-3 pb-1">
                                            <label class="form-label px-0" for="account-zip">Code Postal</label>
                                            <input class="form-control" name="code_postal" type="text" id="account-zip"
                                                value="{{$info->code_postal}}">
                                        </div>
                                    </div>
                                    @endif
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