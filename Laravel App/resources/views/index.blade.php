@extends ('layouts.master')

@section ('styles')
  <link href="/css/dashboard.css" rel="stylesheet">
  <link href="/css/carousel.css" rel="stylesheet">
@endsection

@section ('content')
<main role="main">
  <div id="myCarousel" class="carousel slide" data-ride="carousel">
    <ol class="carousel-indicators">
      <li data-target="#myCarousel" data-slide-to="0" class="active"></li>
      <li data-target="#myCarousel" data-slide-to="1"></li>
      <li data-target="#myCarousel" data-slide-to="2"></li>
    </ol>
    <div class="carousel-inner">
      <div class="carousel-item active">
        <img class="first-slide" src="/img/heli1.jpg" alt="First slide">
        <div class="container">
          <div class="carousel-caption text-left">
            <h1>Heliostat Power Stations</h1>
            <p>The future is here, with the new heliostat power stations.</p>
            <p><a class="btn btn-lg btn-primary" href="#" role="button">Learn More &raquo;</a></p>
          </div>
        </div>
      </div>
      <div class="carousel-item">
        <img class="second-slide" src="/img/heli2.png" alt="Second slide">
        <div class="container">
          <div class="carousel-caption">
            <h1>Automated Heliostats</h1>
            <p>Our new heliostat system is fully automated. Say goodbye to manual adjusting heliostats...</p>
            <p><a class="btn btn-lg btn-primary" href="#" role="button">Learn more &raquo;</a></p>
          </div>
        </div>
      </div>
      <div class="carousel-item">
        <img class="third-slide" src="/img/heli3.jpg" alt="Third slide">
        <div class="container">
          <div class="carousel-caption text-right">
            <h1>Effective.. Efficient.. Powerful..</h1>
            <p>Minimized loss, Minimized power consumtion, Maximied yield...</p>
            <p><a class="btn btn-lg btn-primary" href="#" role="button">Learn More &raquo;</a></p>
          </div>
        </div>
      </div>
    </div>
    <a class="carousel-control-prev" href="#myCarousel" role="button" data-slide="prev">
      <span class="carousel-control-prev-icon" aria-hidden="true"></span>
      <span class="sr-only">Previous</span>
    </a>
    <a class="carousel-control-next" href="#myCarousel" role="button" data-slide="next">
      <span class="carousel-control-next-icon" aria-hidden="true"></span>
      <span class="sr-only">Next</span>
    </a>
  </div>
  <!-- Marketing messaging and featurettes
  ================================================== -->
  <!-- Wrap the rest of the page in another container to center all the content. -->
  <div class="container marketing">
    <!-- Three columns of text below the carousel -->
    <div class="row">
      <div class="col-lg-4">
        <img class="rounded-circle" src="/img/contact_us.png" alt="Contact Us" width="140" height="140">
        <h2>Contact Us</h2>
        Email: heliostats@gmail.com<br>
        Tel. No: 0123456789
        <p><a class="btn btn-secondary" href="#" role="button">Send an email &raquo;</a></p>
        </div><!-- /.col-lg-4 -->
        <div class="col-lg-4">
          <img class="rounded-circle" src="/img/visit_us.png" alt="Visit US" width="140" height="140">
          <h2>Visit Us</h2>
          <a href="www.heliostats.com">www.heliostats.com</a>
          <p><a class="btn btn-secondary" href="#" role="button">Make an appointment &raquo;</a></p>
          </div><!-- /.col-lg-4 -->
          <div class="col-lg-4">
            <img class="rounded-circle" src="/img/support_us.png" alt="Support Us" width="140" height="140">
            <h2>Promote Us</h2>
            <p>We appreciate your help and support in expanding our technology and knowledge.</p>
            <p><a class="btn btn-secondary" href="#" role="button">View details &raquo;</a></p>
            </div><!-- /.col-lg-4 -->
            </div><!-- /.row -->
            <!-- START THE FEATURETTES -->
            <hr class="featurette-divider">
            <div class="row featurette">
              <div class="col-md-7">
                <h2 class="featurette-heading">Sample heading. <span class="text-muted">It'll blow your mind.</span></h2>
                <p class="lead">Will be updated later...</p>
              </div>
            </div>
            <hr class="featurette-divider">
            <!-- /END THE FEATURETTES -->
            </div><!-- /.container -->
          </main>
          @endsection