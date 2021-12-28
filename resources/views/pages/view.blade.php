@extends('inc.layouts')
@section('content')

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
    width: 1em;
    font-size: 2vw;
    color: #FFD600;
    cursor: pointer
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


  <!--/#main-slider-->
<br><br><br><br><br>
  <section id="team" class="team">
    <div class="container">

      <div class="section-title">
        <h2>Read the details about {{ $casual->firstName}} {{ $casual->lastName}}</h2>
        <p>Magnam dolores commodi suscipit. Necessitatibus eius consequatur ex aliquid fuga eum quidem. Sit sint consectetur velit. Quisquam quos quisquam cupiditate. Et nemo qui impedit suscipit alias ea. Quia fugiat sit in iste officiis commodi quidem hic quas.</p>
      </div>
      <br>
      <div class="row gy-4">
        <div class="col-lg-4"></div>
        <div class="col-lg-4 col-md-4">
            <div class="member">
                <img src="{{ asset('profiles/'.$casual->profile)}}" alt="No Image found">
                
                @if (Auth::guard('webemployers')->id() > 0)
                    {{-- Rating system --}}
                  <div class="rating">
                      <input type="radio"  name="rating" value="5" class="id10" id="5"><label for="5">☆</label>
                      <input type="radio" name="rating" value="4" class="id1" id="4"><label for="4">☆</label>
                      <input type="radio" name="rating" value="3" class="id1" id="3"><label for="3">☆</label>
                      <input type="radio" name="rating" value="2" class="id1" id="2"><label for="2">☆</label>
                      <input type="radio" name="rating" value="1" class="id1" id="1"><label for="1">☆</label>
                  </div>

                  <script>
                    $(function(){
                      $("[name=rating]").change(function(){
                        var id = $("[name=rating]:checked").val();
                        alert(id)
                      })
                    });
                  </script>

                @else
                    {{-- Rating system --}}
                  <div class="rating">
                      <input type="radio"  name="rating" value="5" id="5"><label for="5"> ☆ </label>
                  </div>
                @endif
                <div class="row">
                    <div class="col-md-12"><br><br>
                        <table class="table-borderless" style="color:black;">
                            <tr>
                                <td><strong>Names: &nbsp;</strong></td>
                                <td>{{ $casual->firstName}} {{ $casual->lastName}}</td>
                            </tr>
                            <tr>
                                <td><strong>Profession: </strong> &nbsp;</td>
                                <td>{{ $casual->profession}}</td>
                            </tr>
                            <tr>
                                <td><strong>Availability: </strong> &nbsp;</td>
                                <td>{{ $casual->availability}}</td>
                            </tr>
                            <tr>
                                <td><strong>Biography: </strong> &nbsp;</td>
                                <td>{{ $casual->littleBiography}}</td>
                            </tr>
                            <tr>
                                <td><strong>Date of Birth: </strong> &nbsp;</td>
                                <td>{{ $casual->dob}}</td>
                            </tr>
                        </table>
                    </div>
                </div>
                
                <div class="social">
                    <div class="row">
                        <div class="col-3"></div>
                        <div class="col-6">
                            @if (Auth::guard('webemployers')->id() > 0)
                            <form action="/userCart" method="post">
                                @csrf
                                <input type="hidden" name="employersId" value="{{ Auth::guard('webemployers')->id()}}">
                                <input type="hidden" name="employeeId" value="{{ $casual->id }}">
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
        <div class="col-lg-4"></div>
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


<!-- Modal -->


