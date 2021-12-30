@extends('inc.layouts')
@section('content')

<link href="{{ asset('css/myCustomer.css')}}" rel="stylesheet" />

<style>
    .rating {
      display: flex;
      flex-direction: row-reverse;
      justify-content: center
    }

    .rating>input {
      display: none
    }

  .rating>label {
    position: relative;
    width: 0.4em;
    font-size: 1.1vw;
    color: #FFD600;
    cursor: pointer;
  }

  .rating>label::before {
    content: "\2605";
    position: absolute;
    opacity: 0
  }

  .rating>label:hover:before,
  .rating>label:hover~label:before {
    opacity: 1 !important
  }

  .rating>input:checked~label:before {
    opacity: 1
  }

  .rating:hover>input:checked~label:before {
    opacity: 0.4
  }
</style>


  <section id="main-slider" class="no-margin">
    <div class="carousel slide">
      <div class="carousel-inner">
        <div class="item active" style="background-color:#2a3b4e;">
          <div class="container">
            <div class="row slide-margin">
              <div class="col-sm-6">
                <div class="carousel-content">
                  <h2 class="animation animated-item-1">Welcome <span>Chapakazi</span></h2>
                  <p class="animation animated-item-2">
                    Chapakazi is an automated and web-based system that will help both employees and employers to locate each other.
                  </p>
                  <a class="btn-slide animation animated-item-3" href="#">Read More</a>
                </div>
              </div>

              <div class="col-sm-6 hidden-xs animation animated-item-4">
                <div class="slider-img">
                  <img src="{{ asset('images/slider/index1.jpg') }}" class="img-responsive">
                </div>
              </div>

            </div>
          </div>
        </div>
        
      </div>
    </div>
    <!--/.carousel-->
  </section>
  <!--/#main-slider-->

  <section id="team" class="team">
    <div class="container">

      <div class="section-title">
        <h2>Available for recruitment</h2>
        <p>Find your suitable employee</p>
      </div>
      <br>

      <div class="row gy-4">
          <div class="col-md-12 col-lg-">

              <form class="form">
              <input type="text" name="" placeholder="Type your search !" class="form-control text-center" id="searching">
              <div class="row">
                <div class="col-12">
                  <div class="form-group">
                      <div class="selectgroup selectgroup-pills">
                          <label class="selectgroup-item">
                            <input type="radio" name="category" value="All" class="selectgroup-input" checked>
                            <span class="selectgroup-button">All</span>
                          </label>

                          <label class="selectgroup-item">
                          <input type="radio" name="category" value="Plumber" class="selectgroup-input">
                          <span class="selectgroup-button">Plumber</span>
                          </label>
                          <label class="selectgroup-item">
                          <input type="radio" name="category" value="Electricians" class="selectgroup-input">
                          <span class="selectgroup-button">Electricians</span>
                          </label>
                          <label class="selectgroup-item">
                          <input type="radio" name="category" value="Mechanics" class="selectgroup-input">
                          <span class="selectgroup-button">Mechanics</span>
                          </label>
                          <label class="selectgroup-item">
                          <input type="radio" name="category" value="HouseMaid" class="selectgroup-input">
                          <span class="selectgroup-button">House Maid</span>
                          </label>
                          <label class="selectgroup-item">
                          <input type="radio" name="category" value="BabySeaters" class="selectgroup-input">
                          <span class="selectgroup-button">Baby Seaters</span>
                          </label>
                          <label class="selectgroup-item">
                          <input type="radio" name="category" value="Cleaners" class="selectgroup-input">
                          <span class="selectgroup-button">Cleaners</span>
                          </label>
                          <label class="selectgroup-item">
                          <input type="radio" name="category" value="Gatekeepers" class="selectgroup-input">
                          <span class="selectgroup-button">Gate keepers</span>
                          </label>
                          <label class="selectgroup-item">
                            <input type="radio" name="category" value="Gardeners" class="selectgroup-input">
                            <span class="selectgroup-button">Gardeners</span>
                            </label>
                      </div>
                  </div>
                </div>
              </div>
              </form>
          </div>
          
          <div id="loadEmployees"></div>
      </div>
      
      <script>
        $(document).ready(function(){
          $("#loadEmployees").load('/loadEmployee');
          $("#searching").keyup(function(){
            var data = $(this).val();
            if (data != '') {
              $("#loadEmployees").load('/chapa/searching/'+data);
            }else{
              $("#loadEmployees").load('/loadEmployee');
            }
          })
        });
      </script>


    </div><br>
  </section>

  <!-- <div class="about">
    <div class="container">
      <div class="col-md-6 wow fadeInDown" data-wow-duration="1000ms" data-wow-delay="300ms">
        <h2>about us</h2>
        <img src="images/6.jpg" class="img-responsive" />
        <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Phasellus interdum erat libero, pulvinar tincidunt leo consectetur eget. Curabitur lacinia pellentesque libero, pulvinar tincidunt leo consectetur eget. Curabitur lacinia pellentesque libero,
          pulvinar tincidunt leo consectetur eget. Curabitur lacinia pellentesque
        </p>
      </div>

      <div class="col-md-6 wow fadeInDown" data-wow-duration="1000ms" data-wow-delay="600ms">
        <h2>Template built with Twitter Bootstrap</h2>
        <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Phasellus interdum erat libero, pulvinar tincidunt leo consectetur eget. Curabitur lacinia pellentesque libero, pulvinar tincidunt leo consectetur eget. Curabitur lacinia pellentesque libero,
          pulvinar tincidunt leo consectetur eget. Curabitur lacinia pellentesque
          <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Phasellus interdum erat libero, pulvinar tincidunt leo consectetur eget. Curabitur lacinia pellentesque libero, pulvinar tincidunt leo consectetur eget. Curabitur lacinia pellentesque
            libero, pulvinar tincidunt leo consectetur eget. Curabitur lacinia pellentesque
          </p>
          <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Phasellus interdum erat libero, pulvinar tincidunt leo consectetur eget. Curabitur lacinia pellentesque libero, pulvinar tincidunt leo consectetur eget. Curabitur lacinia pellentesque
            libero, pulvinar tincidunt leo consectetur eget. Curabitur lacinia pellentesque </p>
      </div>
    </div>
  </div> -->
{{-- 
  <section id="partner">
    <div class="container">
      <div class="center wow fadeInDown">
        <h2>Our Partners</h2>
        <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut <br> et dolore magna aliqua. Ut enim ad minim veniam</p>
      </div>

      <div class="partners">
        <ul>
          <li> <a href="#"><img class="img-responsive wow fadeInDown" data-wow-duration="1000ms" data-wow-delay="300ms" src="{{ asset('images/partners/partner1.png') }}"></a></li>
          <li> <a href="#"><img class="img-responsive wow fadeInDown" data-wow-duration="1000ms" data-wow-delay="600ms" src="{{ asset('images/partners/partner2.png') }}"></a></li>
          <li> <a href="#"><img class="img-responsive wow fadeInDown" data-wow-duration="1000ms" data-wow-delay="900ms" src="{{ asset('images/partners/partner3.png') }}"></a></li>
          <li> <a href="#"><img class="img-responsive wow fadeInDown" data-wow-duration="1000ms" data-wow-delay="1200ms" src="{{ asset('images/partners/partner4.png') }}"></a></li>
          <li> <a href="#"><img class="img-responsive wow fadeInDown" data-wow-duration="1000ms" data-wow-delay="1500ms" src="{{ asset('images/partners/partner5.png') }}"></a></li>
        </ul>
      </div>
    </div>
    <!--/.container-->
  </section> --}}


  <!--/#partner-->

  <!-- <section id="conatcat-info">
    <div class="container">
      <div class="row">
        <div class="col-sm-8">
          <div class="media contact-info wow fadeInDown" data-wow-duration="1000ms" data-wow-delay="600ms">
            <div class="pull-left">
              <i class="fa fa-phone"></i>
            </div>
            <div class="media-body">
              <h2>Have a question or need a custom quote?</h2>
              <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation +0123 456 70 80</p>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section> -->
  <!--/#conatcat-info-->


@endsection



  <script src="{{ asset('js/jquery.js') }}"></script>
  <script type="text/javascript">
    $(function(){
      $("#home").addClass('active');
    });
  </script>

  <script>
    $(function(){
      $("[name=category]").change(function(){
        var empCategory = $("[name=category]:checked").val();
        //alert(category)
        if(empCategory == "All"){
          $("#loadEmployees").load('/loadEmployee');
        }else if (empCategory != '') {
          $("#loadEmployees").load('/chapa/searching/'+empCategory);
        }else{
          
        }     

      })
    });
  </script>

<form>
  <script src="https://checkout.flutterwave.com/v3.js"></script>
</form>


<!-- Modal -->


