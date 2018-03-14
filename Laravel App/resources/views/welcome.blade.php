<!DOCTYPE html>
<html lang="en">

  <head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>HelioPower</title>

    <!-- Bootstrap core CSS -->
    <link href="vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom fonts for this template -->
    <link href="vendor/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">
    <link href='https://fonts.googleapis.com/css?family=Open+Sans:300italic,400italic,600italic,700italic,800italic,400,300,600,700,800' rel='stylesheet' type='text/css'>
    <link href='https://fonts.googleapis.com/css?family=Merriweather:400,300,300italic,400italic,700,700italic,900,900italic' rel='stylesheet' type='text/css'>

    <!-- Plugin CSS -->
    <link href="vendor/magnific-popup/magnific-popup.css" rel="stylesheet">

    <!-- Custom styles for this template -->
    <link href="css/creative.min.css" rel="stylesheet">

  </head>

  <body id="page-top">

    <!-- Navigation -->
    <nav class="navbar navbar-expand-lg navbar-light fixed-top" id="mainNav">
      <div class="container">
        <a class="navbar-brand js-scroll-trigger" href="#page-top">HelioPower</a>
        <button class="navbar-toggler navbar-toggler-right" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarResponsive">
          <ul class="navbar-nav ml-auto">
            <li class="nav-item">
              <a class="nav-link js-scroll-trigger" href="#about">About</a>
            </li>
            <li class="nav-item">
              <a class="nav-link js-scroll-trigger" href="#services">Services</a>
            </li>
            <li class="nav-item">
              <a class="nav-link js-scroll-trigger" href="#overview">Overview</a>
            </li>
            <li class="nav-item">
              <a class="nav-link js-scroll-trigger" href="#portfolio">Portfolio</a>
            </li>
            <li class="nav-item">
              <a class="nav-link js-scroll-trigger" href="#contact">Contact</a>
            </li>
            @if (Route::has('login'))
                @auth
                    <li class="nav-item">
                      <a class="nav-link js-scroll-trigger" href="{{ url('/home') }}">Home</a>
                    </li>
                @else
                    <li class="nav-item">
                      <a class="nav-link js-scroll-trigger" href="{{ route('login') }}">Login</a>
                    </li>
                    <li class="nav-item">
                      <a class="nav-link js-scroll-trigger" href="{{ route('register') }}">Register</a>
                    </li>
                @endauth
            @endif
          </ul>
        </div>
      </div>
    </nav>

    <header class="masthead text-center text-white d-flex">
      <div class="container my-auto">
        <div class="row">
          <div class="col-lg-10 mx-auto">
            <h1 class="text-uppercase">
              <strong >Heliostat Solar Power Plants</strong>
            </h1>
            <hr>
          </div>
          <div class="col-lg-8 mx-auto">
            <p class="text-faded mb-5">Efficient approach towards Green energy</p>
            <a class="btn btn-primary btn-xl js-scroll-trigger" href="#about">Find Out More</a>
          </div>
        </div>
      </div>
    </header>

    <section class="bg-primary" id="about">
      <div class="container">
        <div class="row">
          <div class="col-lg-8 mx-auto text-center">
            <h2 class="section-heading text-white">Automated Heliostats</h2>
            <hr class="light my-4">
            <p class="text-faded mb-4">Our new heliostat system is fully automated. Say goodbye to manual adjusting heliostats...</p>
            <a class="btn btn-light btn-xl js-scroll-trigger" href="#services">Get Started!</a>
          </div>
        </div>
      </div>
    </section>

    <section id="services">
      <div class="container">
        <div class="row">
          <div class="col-lg-12 text-center">
            <h2 class="section-heading">At Your Service</h2>
            <hr class="my-4">
          </div>
        </div>
      </div>
      <div class="container">
        <div class="row">
          <div class="col-lg-3 col-md-6 text-center">
            <div class="service-box mt-5 mx-auto">
              <i class="fa fa-4x fa-line-chart text-primary mb-3 sr-icons"></i>
              <h3 class="mb-3">Statistics</h3>
              <p class="text-muted mb-0">Check how plants' perform from your office</p>
            </div>
          </div>
          <div class="col-lg-3 col-md-6 text-center">
            <div class="service-box mt-5 mx-auto">
              <i class="fa fa-4x fa-assistive-listening-systems text-primary mb-3 sr-icons"></i>
              <h3 class="mb-3">Automated System</h3>
              <p class="text-muted mb-0">Full system is automated. So nothing to worry!</p>
            </div>
          </div>
          <div class="col-lg-3 col-md-6 text-center">
            <div class="service-box mt-5 mx-auto">
              <i class="fa fa-4x fa-microchip text-primary mb-3 sr-icons"></i>
              <h3 class="mb-3">Cutting edge technology</h3>
              <p class="text-muted mb-0">Effective, Efficient and Powerful</p>
            </div>
          </div>
          <div class="col-lg-3 col-md-6 text-center">
            <div class="service-box mt-5 mx-auto">
              <i class="fa fa-4x  fa-tachometer text-primary mb-3 sr-icons"></i>
              <h3 class="mb-3">Maximize yeild</h3>
              <p class="text-muted mb-0">Maximize the yeild by fine tuning everything</p>
            </div>
          </div>
        </div>
      </div>
    </section>
    <section class="p-0" id="overview">
        <div class="container">
            <div class="row">
              <div class="col-lg-12 text-center">
                <h2 class="section-heading">System Overview</h2>
                <hr class="my-4">
              </div>
            </div>
        </div>        
        <header class="masthead d-flex" style="background-image: url(../img/overview.jpg);margin-bottom: 5rem;filter: none"></header>
    </section>

    <section class="p-0" id="portfolio">
        <div class="container">
        <div class="row">
          <div class="col-lg-12 text-center">
            <h2 class="section-heading">Our Power Plants</h2>
            <hr class="my-4">
          </div>
        </div>
      </div>
      <div class="container p-0">
        <div class="row no-gutters popup-gallery">
        @foreach($plants as $plant)
          <div class="col-lg-6 col-sm-12">
            <a class="portfolio-box" href="img/plants/{{ $plant->id }}.jpg">
              <img class="img-fluid" src="img/plants/{{ $plant->id }}.jpg" alt="">
              <div class="portfolio-box-caption">
                <div class="portfolio-box-caption-content">
                  <div class="project-name">
                    {{ $plant->name }}
                  </div>
                  <div class="project-category text-faded">
                    {{ $plant->location }}
                  </div>
                </div>
              </div>
            </a>
          </div>
        @endforeach
          
          
        </div>
      </div>
    </section>

    <section id="contact">
      <div class="container">
        <div class="row">
          <div class="col-lg-8 mx-auto text-center">
            <h2 class="section-heading">Let's Get In Touch!</h2>
            <hr class="my-4">
            <p class="mb-5">Ready to start your next project with us? That's great! Give us a call or send us an email and we will get back to you as soon as possible!</p>
          </div>
        </div>
        <div class="row">
          <div class="col-lg-4 ml-auto text-center">
            <i class="fa fa-phone fa-3x mb-3 sr-contact"></i>
            <p>123-456-6789</p>
          </div>
          <div class="col-lg-4 mr-auto text-center">
            <i class="fa fa-envelope-o fa-3x mb-3 sr-contact"></i>
            <p>
              <a href="mailto:your-email@your-domain.com">feedback@startbootstrap.com</a>
            </p>
          </div>
        </div>
      </div>
    </section>


    <!-- Bootstrap core JavaScript -->
    <script src="vendor/jquery/jquery.min.js"></script>
    <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

    <!-- Plugin JavaScript -->
    <script src="vendor/jquery-easing/jquery.easing.min.js"></script>
    <script src="vendor/scrollreveal/scrollreveal.min.js"></script>
    <script src="vendor/magnific-popup/jquery.magnific-popup.min.js"></script>

    <!-- Custom scripts for this template -->
    <script src="js/creative.min.js"></script>

  </body>

</html>
