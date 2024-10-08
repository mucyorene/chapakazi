
 @extends('inc.layouts')
 @section('content')
 <div id="breadcrumb">
    <div class="container">
        <div class="breadcrumb">
        <li><a href="index.html">Home</a></li>
        <li>About Us</li>
        </div>
    </div>
</div>
<div class="aboutus">
    <div class="container">
    <h3>Chapakazi Information</h3>
    <hr>
    <div class="col-md-7 wow fadeInDown" data-wow-duration="1000ms" data-wow-delay="300ms">
        <img src="images/imageAbout.jpg" class="img-responsive">
        <h4>Bringing the best casual workers to the right employers!</h4>
        </div>
    <div class="col-md-5 wow fadeInDown" data-wow-duration="1000ms" data-wow-delay="600ms">
        <div class="skill">
        <h2>Our Skills</h2>
        <p>Based on previous experience, we've got experiences including the following: </p>

        <div class="progress-wrap">
            <h3>Communication skills</h3>
            <div class="progress">
            <div class="progress-bar  color1" role="progressbar" aria-valuenow="40" aria-valuemin="0" aria-valuemax="100" style="width: 91%">
                <span class="bar-width">91%</span>
            </div>

            </div>
        </div>

        <div class="progress-wrap">
            <h4>Customer care</h4>
            <div class="progress">
            <div class="progress-bar color2" role="progressbar" aria-valuenow="20" aria-valuemin="0" aria-valuemax="100" style="width: 97%">
                <span class="bar-width">97%</span>
            </div>
            </div>
        </div>

        </div>
    </div>
    </div>
</div>
<div class="our-team">
    <div class="container">
    <h3>Our Team</h3>
    <div class="text-center">
        <div class="col-md-4 wow fadeInDown" data-wow-duration="1000ms" data-wow-delay="300ms">
        <img src="images/services/brendah.jpeg" alt="" class="img" width="200">
        <h4>Brendah UMUTONIWASE</h4>
        <p>System Administrator & communication specialist</p>
        </div>
        <div class="col-md-4 wow fadeInDown" data-wow-duration="1000ms" data-wow-delay="600ms">
        <img src="images/services/paul.jpg" alt="" class="img" width="200">
        <h4>Paul RWIGEMA</h4>
        <p>System Administrator</p>
        </div>
        <div class="col-md-4 wow fadeInDown" data-wow-duration="1000ms" data-wow-delay="900ms">
        <img src="images/services/3.jpg" alt="" class="img" width="200">
        <h4>Rene MUCYO</h4>
        <p>System Administrator</p>
        </div>
    </div>
    </div>
</div>
 @endsection
 <script src="{{ asset('js/jquery.js') }}"></script>
 <script type="text/javascript">
   $(function(){
     $("#about").addClass('active');
   });
 </script>

