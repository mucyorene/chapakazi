@extends('inc.layouts')
@section('content')

  <section id="main-slider" class="no-margin">
    <div class="carousel slide">
      <div class="carousel-inner">
        <div class="item active" style="background-color:#2a3b4e;">
          <div class="container">
            <div class="row slide-margin">
              <div class="col-sm-6">
                <div class="carousel-content">
                  <h2 class="animation animated-item-1">Welcome <span>Chapakazi</span></h2>
                  <p class="animation animated-item-2">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Vivamus consectetur nunc pulvinar libero bibendum eleifend. Suspendisse scelerisque eros et mauris faucibus venenatis.</p>
                  <a class="btn-slide animation animated-item-3" href="#">Read More</a>
                </div>
              </div>

              <div class="col-sm-6 hidden-xs animation animated-item-4">
                <div class="slider-img">
                  <img src="{{ asset('images/slider/img3.png') }}" class="img-responsive">
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
        <h2>These are ready to be recruited</h2>
        <p>Magnam dolores commodi suscipit. Necessitatibus eius consequatur ex aliquid fuga eum quidem. Sit sint consectetur velit. Quisquam quos quisquam cupiditate. Et nemo qui impedit suscipit alias ea. Quia fugiat sit in iste officiis commodi quidem hic quas.</p>
      </div>
      <br>
      <div class="row gy-4">
        <div class="col-md-12">
          <form action="" method class="form">
            <input type="text" name="searching" class="form-control" id="">
          </form>
        </div>
      </div>
      <br>
    <div class="row gy-4">
      @foreach ($employees as $employee)
        
          <div class="col-lg-4 col-md-6">
            <div class="member">
              <img src="profiles/{{ $employee->profile}}" alt="">
              <h4>{{ $employee->firstName}} {{ $employee->lastName}}</h4>
              <small style="color:red;">{{ $employee->profession}}</small>
              <p>
                {{ $employee->littleBiography }}
              </p>
              <div class="social">
                <div class="row">
                  <div class="col-3"></div>
                  <div class="col-6">
                    @if (Auth::guard('webemployers')->id() > 0)
                      <form action="/userCart" method="post">
                        @csrf
                        <input type="hidden" name="employersId" value="{{ Auth::guard('webemployers')->id()}}">
                        <input type="hidden" name="employeeId" value="{{ $employee->id }}">
                        <button type="submit" class="btn btn-success btn-sm btn-flat">Recruite</button>
                      </form> 
                    @else
                        <button href="/authentication" id="recruite" class="btn btn-info btn-sm btn-flat"><strong>Recruite</strong></button>
                    @endif
                    
                    {{-- <a href="casual/{{$employee->id}}" class="btn btn-success btn-sm btn-flat">Add to list</a> --}}
                  </div>
                  <div class="col-3"></div>
                  
                </div>
              </div>
            </div>
          </div>

      @endforeach
    </div> 
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
  </section>


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


<form>
  <script src="https://checkout.flutterwave.com/v3.js"></script>

</form>

