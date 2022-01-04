
@if (count($employees) > 0)
    <div class="row gy-4">
        <!-- Button trigger modal -->
        @foreach ($employees as $employee)
        <div class="col-lg-4 col-md-6" >
            <div class="member">
            <img src="profiles/{{ $employee->profile}}" alt="">
                {{-- Rating system --}}
            <div class="rating">
                <small class="text-warning">{{ App\Http\Controllers\web\HomeController::rating($employee->id) }}</small>&nbsp; &nbsp;<input type="radio"  name="rating" value="5" id="5"><label for="5"> ☆ </label>   
            </div>

            <h4 id="viewEmployee">{{ $employee->firstName}} {{ $employee->lastName}}</h4>
            <a href="/viewCasual/{{ $employee->id}}">More</a><br>
            <small style="color:red;">{{ $employee->profession}}</small>
            <p>
                <strong>Per Day: </strong>{{ $employee->ratePerDay }}
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
                        <button type="submit" style="background-color:#1BBD36;" class="btn btn-success btn-sm btn-flat">Recruite</button>
                    </form> 
                    @else
                        <button id="recruitess" style="background-color:#1BBD36;" class="btn btn-sm btn-flat"><strong>Recruite</strong></button>
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
@else
    <div class="alert alert-danger">
    No Employee registered yet !
    </div>
@endif
<script src="{{ asset('js/jquery.js') }}"></script>
<script>
    $(document).ready(function(){
        $("#recruitess").click(function(){
            //alert("Listened")
            window.top.location = "/authentication";
        })
    })
</script>