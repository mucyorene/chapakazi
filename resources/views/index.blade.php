@extends('inc.layouts')
@section('content')

<link href="{{ secure_asset('css/myCustomer.css')}}" rel="stylesheet" />

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
                  <a class="btn-slide animation animated-item-3" href="/eRecruite">Get started</a>
                </div>
              </div>

              <div class="col-sm-6 hidden-xs animation animated-item-4">
                <div class="slider-img">
                  <img src="{{ secure_asset('images/slider/index1.jpg') }}" class="img-responsive">
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

@endsection



  <script src="{{ secure_asset('js/jquery.js') }}"></script>
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
          $("#loadEmployees").load('/chapa/search/category/'+empCategory);
        }else{
          
        }     

      })
    });
  </script>

<form>
  <script src="https://checkout.flutterwave.com/v3.js"></script>
</form>


<!-- Modal -->


