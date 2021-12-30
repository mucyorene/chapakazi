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
                <img src="{{ secure_asset('profiles/'.$casual->profile)}}" alt="No Image found">
                
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
                        var ratings = $("[name=rating]:checked").val();
                        var employeeId = {{ $casual->id }}
                        var employerId = {{ Auth::guard('webemployers')->id() }}
                        $.ajax({
                          url: '/rateNow/'+ratings+'/'+employeeId+"/"+employerId,
                          success:function(response){
                            //console.log(response)
                            window.location.reload(true);
                          }
                        })
                      })
                    });
                  </script>

                @else
                    {{-- Rating system --}}
                  
                    viewCasual{{-- Rating system --}} 

                    <div class="rating"> <strong class="text-warning">{{ App\Http\Controllers\web\HomeController::rating($casual->id) }}</strong>&nbsp;<input type="radio"  name="rating" value="5" id="5"><label for="5"> ☆ </label> </div>

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
                                <td>{{ $casual->category}}</td>
                            </tr>
                            <tr>
                                <td><strong>Availability: </strong> &nbsp;</td>
                                <td>{{ $casual->availability}}</td>
                            </tr>
                            <tr>
                                <td><strong>Experience: </strong> &nbsp;</td>
                                <td>{{ $casual->experience}} years</td>
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

@endsection

<script src="{{ secure_asset('js/jquery.js') }}"></script>
<script type="text/javascript">
  $(function(){
    $("#recruite").addClass('active');
  });
</script>

<form>
  <script src="https://checkout.flutterwave.com/v3.js"></script>
</form>

