<header class="header navbar navbar-expand-lg navbar-dark navbar-floating navbar-sticky" data-fixed-element>
        <div class="container px-0 px-xl-3">
          <button class="navbar-toggler ms-n2 me-2" type="button" data-bs-toggle="offcanvas" data-bs-target="#primaryMenu"><span class="navbar-toggler-icon"></span></button><a class="navbar-brand flex-shrink-0 order-lg-1 mx-auto ms-lg-0 pe-lg-2 me-lg-4" href="/"><img class="navbar-floating-logo d-none d-lg-block" src="img/logo/logo-light.png" alt="Around" width="153"><img class="navbar-stuck-logo" src="img/logo/logo-dark.png" alt="Around" width="153"><img class="d-lg-none" src="img/logo/logo-icon.png" alt="Around" width="58"></a>
          <div class="d-flex align-items-center order-lg-3 ms-lg-auto">
          @if(!session()->has('LoggedUser'))
              <a class="btn btn-primary m-3" href="{{route('login')}}" rel="noopener">Connexion</a>
              <a class="btn btn-primary" href="{{route('register')}}" rel="noopener">S'inscrire</a>
          @else
             @if(getImage())
             <div class="navbar-tool dropdown"><a class="navbar-tool-icon-box" href="#">
               <img class="navbar-tool-icon-box-img"  src="{{asset('storage/images/'.getImage())}}" alt="{{getName()}}"><a class="navbar-tool-label dropdown-toggle" href="#"><small>Hello,</small>{{getName()}}</a>
              <ul class="dropdown-menu dropdown-menu-end" style="width: 15rem;">
                <li><a class="dropdown-item d-flex align-items-center" href="{{route('logout')}}"><i class="ai-log-out fs-base opacity-60 me-2"></i>Déconnexion</a></li>
              </ul>
            </div>
            @endif
          
          @endif
        </div>
          <div class="offcanvas offcanvas-collapse order-lg-2" id="primaryMenu">
            <div class="offcanvas-header navbar-shadow">
              <h5 class="mt-1 mb-0">Menu</h5>
              <button class="btn-close lead" type="button" data-bs-dismiss="offcanvas" aria-label="Close"></button>
            </div>
            <div class="offcanvas-body">
              <!-- Menu-->
              <ul class="navbar-nav">
                <li class="nav-item dropdown"><a class="nav-link dropdown-toggle" href="#" data-bs-toggle="dropdown">Account</a>
                </li>
                <li class="nav-item dropdown"><a class="nav-link dropdown-toggle" href="#" data-bs-toggle="dropdown">Pages</a>
                </li>
              </ul>
            </div>
          </div>
        </div>
</header>