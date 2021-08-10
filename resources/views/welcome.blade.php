@extends('layouts/master',['title'=>'Home'])

@section('content')
    <main class="page-wrapper">
      <!-- Navbar Floating light for Index page only-->
      @include('layouts/_navbar')
      <!-- Page content-->
      <!-- Intro-->
      <section class="d-flex align-items-center position-relative bg-dark bg-size-cover bg-position-center min-vh-100 overflow-hidden pt-6 pb-lg-5" style="background-image: url(img/demo/presentation/intro/bg.jpg);">
        <div class="container-fluid pt-4 pb-5 py-lg-5">
          <div class="row align-items-center py-3">
            <div class="col-xl-6 col-lg-5 d-flex justify-content-end">
              <div class="pt-2 mx-auto mb-5 mb-lg-0 ms-lg-0 me-xl-7 text-center text-lg-start" style="max-width: 495px;">
                <h1 class="display-4 text-light pb-2"><span class="fw-light">Have a look </span>Around!</h1>
                <p class="h4 fw-light text-light opacity-70 line-height-base">And you will find everything you need to build a great looking website.</p><a class="d-inline-flex align-items-center text-decoration-none pt-2 mt-4 mb-5" href="#demos" data-scroll><span class="btn btn-icon rounded-circle border-light flex-shrink-0 px-3"><i class="ai-arrow-down h4 text-light my-1"></i></span><span class="ms-3 text-light fw-medium">View Demos</span></a>
                <hr class="hr-light mt-0 mb-5">
                <div class="row">
                  <div class="col-sm-4 mb-4 mb-sm-0">
                    <div class="h1 text-light mb-1">14</div>
                    <div class="h5 text-light fw-normal opacity-70 mb-2">Demo Homepages</div><span class="badge rounded-pill bg-success">More coming</span>
                  </div>
                  <div class="col-sm-4 mb-4 mb-sm-0">
                    <div class="h1 text-light mb-1">50+</div>
                    <div class="h5 text-light fw-normal opacity-70 mb-1">Flexible Components</div>
                  </div>
                  <div class="col-sm-4">
                    <div class="h1 text-light mb-1">47</div>
                    <div class="h5 text-light fw-normal opacity-70 mb-1">Inner Page Templates</div>
                  </div>
                </div>
              </div>
            </div>
            <div class="col-xl-6 col-lg-7">
              <div class="parallax ms-lg-n5" style="max-width: 920px;">
                <div class="parallax-layer position-relative" data-depth="0.1"><img src="img/demo/presentation/intro/layer01.png" alt="Layer"></div>
                <div class="parallax-layer" style="z-index: 2;" data-depth="0.3"><img src="img/demo/presentation/intro/layer02.png" alt="Layer"></div>
                <div class="parallax-layer" data-depth="0.2"><img src="img/demo/presentation/intro/layer03.png" alt="Layer"></div>
                <div class="parallax-layer" style="z-index: 3;" data-depth="0.1"><img src="img/demo/presentation/intro/layer04.png" alt="Layer"></div>
                <div class="parallax-layer" data-depth="0.15"><img src="img/demo/presentation/intro/layer05.png" alt="Layer"></div>
                <div class="parallax-layer" style="z-index: 4;" data-depth="0.25"><img src="img/demo/presentation/intro/layer06.png" alt="Layer"></div>
                <div class="parallax-layer" data-depth="0.3"><img src="img/demo/presentation/intro/layer07.png" alt="Layer"></div>
                <div class="parallax-layer" data-depth="0.4"><img src="img/demo/presentation/intro/layer08.png" alt="Layer"></div>
                <div class="parallax-layer" data-depth="0.35"><img src="img/demo/presentation/intro/layer09.png" alt="Layer"></div>
              </div>
            </div>
          </div>
        </div>
      </section>
      <!-- Demos-->
      <section class="bg-secondary" id="demos">
        <div class="container pt-5 pb-4 py-md-6 py-lg-7">
          <div class="text-center mb-5 pt-3 pt-lg-4">
            <h2 class="h1 mb-4">Homepage <span class='bg-faded-primary rounded text-primary px-3 py-2'>Demos</span></h2>
            <p class="text-muted">Choose from pre-built layouts of our unique homepage demos</p>
          </div>
          <div class="row">
            <div class="col-lg-4 col-sm-6 mb-grid-gutter pb-3"><a class="d-block nav-heading text-center" href="demo-business-consulting.html">
                <div class="card card-hover border-0 shadow-lg mb-4"><img class="card-img" src="img/demo/presentation/demos/business-consulting.jpg" alt="Business Consulting"></div>
                <h3 class="h5 nav-heading-title mb-0">Business Consulting</h3><span class="fs-sm fw-normal text-muted">Corporate, Business, Agency</span></a></div>
            <div class="col-lg-4 col-sm-6 mb-grid-gutter pb-3"><a class="d-block nav-heading text-center" href="demo-shop-homepage.html">
                <div class="card card-hover border-0 shadow-lg mb-4"><img class="card-img" src="img/demo/presentation/demos/shop-homepage.jpg" alt="Shop Homepage"></div>
                <h3 class="h5 nav-heading-title mb-0">Shop Homepage</h3><span class="fs-sm fw-normal text-muted">E-Commerce, Retail, Electronics, Fashion</span></a></div>
            <div class="col-lg-4 col-sm-6 mb-grid-gutter pb-3"><a class="d-block nav-heading text-center" href="demo-booking-directory.html">
                <div class="card card-hover border-0 shadow-lg mb-4"><img class="card-img" src="img/demo/presentation/demos/booking.jpg" alt="Booking &amp;amp; Directory"></div>
                <h3 class="h5 nav-heading-title mb-0">Booking / Directory</h3><span class="fs-sm fw-normal text-muted">Listings, Flights, Destinations</span></a></div>
            <div class="col-lg-4 col-sm-6 mb-grid-gutter pb-3"><a class="d-block nav-heading text-center" href="demo-creative-agency.html">
                <div class="card card-hover border-0 shadow-lg mb-4"><img class="card-img" src="img/demo/presentation/demos/creative-agency.jpg" alt="Creative Agency"></div>
                <h3 class="h5 nav-heading-title mb-0">Creative Agency</h3><span class="fs-sm fw-normal text-muted">Creative Business, Portfolio, Agency</span></a></div>
            <div class="col-lg-4 col-sm-6 mb-grid-gutter pb-3"><a class="d-block nav-heading text-center" href="demo-web-studio.html">
                <div class="card card-hover border-0 shadow-lg mb-4"><img class="card-img" src="img/demo/presentation/demos/web-studio.jpg" alt="Web Studio"></div>
                <h3 class="h5 nav-heading-title mb-0">Web Studio</h3><span class="fs-sm fw-normal text-muted">Web Design, Portfolio, Agency</span></a></div>
            <div class="col-lg-4 col-sm-6 mb-grid-gutter pb-3"><a class="d-block nav-heading text-center" href="demo-product-software.html">
                <div class="card card-hover border-0 shadow-lg mb-4"><img class="card-img" src="img/demo/presentation/demos/software-landing.jpg" alt="Product Landing - Software"></div>
                <h3 class="h5 nav-heading-title mb-0">Product Landing - Software</h3><span class="fs-sm fw-normal text-muted">Software, Showcase, Landing Page</span></a></div>
            <div class="col-lg-4 col-sm-6 mb-grid-gutter pb-3"><a class="d-block nav-heading text-center" href="demo-product-gadget.html">
                <div class="card card-hover border-0 shadow-lg mb-4"><img class="card-img" src="img/demo/presentation/demos/gadget-landing.jpg" alt="Product Landing - Gadget"></div>
                <h3 class="h5 nav-heading-title mb-0">Product Landing - Gadget</h3><span class="fs-sm fw-normal text-muted">Gadget, Showcase, Landing Page</span></a></div>
            <div class="col-lg-4 col-sm-6 mb-grid-gutter pb-3"><a class="d-block nav-heading text-center" href="demo-mobile-app.html">
                <div class="card card-hover border-0 shadow-lg mb-4"><img class="card-img" src="img/demo/presentation/demos/mobile-app.jpg" alt="Mobile App Showcase"></div>
                <h3 class="h5 nav-heading-title mb-0">Mobile App Showcase</h3><span class="fs-sm fw-normal text-muted">Mobile App, Showcase, Landing</span></a></div>
            <div class="col-lg-4 col-sm-6 mb-grid-gutter pb-3"><a class="d-block nav-heading text-center" href="demo-coworking-space.html">
                <div class="card card-hover border-0 shadow-lg mb-4"><img class="card-img" src="img/demo/presentation/demos/coworking.jpg" alt="Coworkin Space"></div>
                <h3 class="h5 nav-heading-title mb-0">Coworking Space</h3><span class="fs-sm fw-normal text-muted">Coworking Space Landing Page</span></a></div>
            <div class="col-lg-4 col-sm-6 mb-grid-gutter pb-3"><a class="d-block nav-heading text-center" href="demo-event-landing.html">
                <div class="card card-hover border-0 shadow-lg mb-4"><img class="card-img" src="img/demo/presentation/demos/event-landing.jpg" alt="Event Landing"></div>
                <h3 class="h5 nav-heading-title mb-0">Event Landing</h3><span class="fs-sm fw-normal text-muted">Landing Page, Event, Countdown, Tickets</span></a></div>
            <div class="col-lg-4 col-sm-6 mb-grid-gutter pb-3"><a class="d-block nav-heading text-center" href="index-2.html">
                <div class="card card-hover border-0 shadow-lg mb-4"><img class="card-img" src="img/demo/presentation/demos/template-presentation.jpg" alt="Web Template Presentation"></div>
                <h3 class="h5 nav-heading-title mb-0">Web Template Presentation</h3><span class="fs-sm fw-normal text-muted">Showcase your Web Template features beautifully</span></a></div>
            <div class="col-lg-4 col-sm-6 mb-grid-gutter pb-3"><a class="d-block nav-heading text-center" href="demo-marketing-seo.html">
                <div class="card card-hover border-0 shadow-lg mb-4"><img class="card-img" src="img/demo/presentation/demos/marketing-seo.jpg" alt="Digital Marketing &amp; SEO"></div>
                <h3 class="h5 nav-heading-title mb-0">Digital Marketing &amp; SEO</h3><span class="fs-sm fw-normal text-muted">Marketing services, Agency, Portfolio</span></a></div>
            <div class="col-lg-4 col-sm-6 mb-grid-gutter pb-3"><a class="d-block nav-heading text-center" href="demo-food-blog.html">
                <div class="card card-hover border-0 shadow-lg mb-4"><img class="card-img" src="img/demo/presentation/demos/food-blog.jpg" alt="Food Blog"></div>
                <h3 class="h5 nav-heading-title mb-0">Food Blog</h3><span class="fs-sm fw-normal text-muted">Cooking, Recipes, Personal Blog</span></a></div>
            <div class="col-lg-4 col-sm-6 mb-grid-gutter pb-3"><a class="d-block nav-heading text-center" href="demo-personal-portfolio.html">
                <div class="card card-hover border-0 shadow-lg mb-4"><img class="card-img" src="img/demo/presentation/demos/personal-portfolio.jpg" alt="Personal Portfolio"></div>
                <h3 class="h5 nav-heading-title mb-0">Personal Portfolio</h3><span class="fs-sm fw-normal text-muted">Cooking, Recipes, Personal Blog</span></a></div>
            <div class="col-lg-4 col-sm-6 mb-grid-gutter pb-3"><img class="d-block mb-4" src="img/demo/presentation/demos/coming.png" alt="Coming">
              <h3 class="h5 text-center mb-0">Coming Soon</h3>
            </div>
          </div>
        </div>
      </section>
     
    </main>

    @endsection
