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

  <!--/#main-slider-->
<br><br><br>
  <section id="team" class="team">
    <div class="container">

      <div class="section-title">
        <h2>Available for recruitment</h2>
        <p>Find your suitable employee</p>
      </div>
      <div class="row gy-4">
          <div class="col-md-12 col-lg-">

              <form class="form">
              <input type="text" name="" placeholder="Type the name or category, !" class="form-control text-center" id="searching">
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
@endsection



  <script src="{{ asset('js/jquery.js') }}"></script>
  <script type="text/javascript">
    $(function(){
      $("#recruite").addClass('active');
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


