@if (count($employees) > 0)
    <div class="row gy-4">
        <!-- Button trigger modal -->
        @foreach ($employees as $employee)
        <div class="col-lg-4 col-md-6">
            <div class="member">
            <img src="profiles/{{ $employee->profile}}" alt="">
                {{-- Rating system --}}
            <div class="rating">
                <input type="radio"  name="rating" value="5" id="5"><label for="5"> ☆ </label>
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
                        <button type="submit" id="loginFirst" class="btn btn-success btn-sm btn-flat">Recruite</button>
                    </form> 
                    @else
                        <button href="/authentication" id="recruite" class="btn btn-info btn-sm btn-flat"><strong>Recruite</strong></button>
                    @endif
                    
                    {{-- <a href="casual/{{$employee->id}}" class="btn btn-success btn-sm btn-flat">Add to list</a> --}}
                </div>
                <div class="col-3"></div>
                <script src="{{ asset('js/jquery.js') }}"></script>
                <script>
                    $(document).ready(function(){
                        $("#recruite").click(function(){
                            window.top.location = "/authentication";
                        })
                    })
                </script>
                </div>
            </div>
            </div>
        </div>
        @endforeach
    </div> 
@else
    <div class="alert alert-danger">
        No employee registered yet !
    </div>
@endif