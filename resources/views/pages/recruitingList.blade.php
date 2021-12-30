@extends('inc.layouts')
@section('content')

<br><br><br><br><br><br><br>

<div class="container">
    <div class="row text-dark">
        <div class="col-md-3"  style="color:black;"></div>
        <div class="col-md-6" style="color:black;">
            @if (count($employersList) > 0)
            <div id="removedFromList"></div>
                <div id="refresh">
                  <table class="table" style="color:black;">
                      <th colspan="3" class="text-center bg-success">Your recruite list</th>
                      <tr>
                          <td><strong>First name</strong></td>
                          <td><strong>Last Name</strong></td><td></td>
                      </tr>
                          
                              @foreach ($employersList as $saved)
                                  <tr>
                                      <td>{{ $saved->employee->firstName }} &nbsp;</td>
                                      <td>{{ $saved->employee->lastName }}</td>
                                      <td><button id="removeCart" value="{{ $saved->employee->id }}"  class="btn btn-sm btn-danger btn-flat" style="float: right;">-</button></td>
                                  </tr>                            
                              @endforeach
                      <tr>
                          <td><strong>Total: </strong></td>
                          <td><strong>{{$totalNumber * 500}} Rwf</strong></td><td></td>
                      </tr>
                      <tr>
                          <td colspan="3" class="text-center">
                              <button id="savingData" onclick="saveRecruitedEmployee( {{$totalNumber * 500}} )" class="btn btn-success btn-lg btn-flat btn-sm">Checkout</button>
                          </td>
                      </tr>
                  </table>
                </div>
            @else
                <div class="alert alert-primary">
                    Please make a cart
                </div>
            @endif
        </div>
        <div class="col-md-3" style="color:black;"></div>
    </div>
    <div class="row">
        <div class="col-md-10"></div>
        <div class="col-md-2">
            
        </div>
    </div>
  </div>

  <br><br><br><br><br><br><br><br><br><br><br><br><br><br>
  <script src="{{ asset('js/jquery.js') }}"></script>
  <script>
      $(function(){
          
        $("#savingData").click(function(e){
            e.preventDefault();
        })
      });
  </script>
<script type="text/javascript">
    $(function(){
        $("#login").addClass('active');
    });
</script>
<script>
  $(function(){
    $("#removeCart").click(function(e){
      e.preventDefault;
      var employeeIds = $("#removeCart").val();
      var employerIds = {{Auth::guard('webemployers')->id()}}
      //alert(employerIds);
        $.ajax({
          url: "/listRemoving/"+employerIds+"/"+employeeIds,
          success:function(success){
            
            $("#removedFromList").text(success)
            $("#removedFromList").addClass('alert alert-danger')
            $("#mydiv").load(location.href + " #refresh");
          },
          error:function(){
            console.log('Failed to delete')
          }
        })
    });
  });
</script>
<script src="https://checkout.flutterwave.com/v3.js"></script>
<script>
        function saveRecruitedEmployee(values) {
            $.ajax({
                url: '/saveRecruited',
                success:function(){
                    makePayment(values);
                }
            })
        }

    function makePayment(values) {
        //alert(values);
      FlutterwaveCheckout({
        public_key: "FLWPUBK_TEST-a17b1b49dbd7c122031a5e851acf247d-X",
        tx_ref: "RX1",
        amount: values,
        currency: "RWF",
        country: "RW",
        payment_options: " ",
        redirect_url: // specified redirect URL
          "/",
        meta: {
          consumer_id: 23,
          consumer_mac: "92a3-912ba-1192a",
        },
        customer: {
          email: "{{ Auth::guard('webemployers')->user()->email}}",
          phone_number: "{{ Auth::guard('webemployers')->user()->phone }}",
          name: "{{ Auth::guard('webemployers')->user()->fullNames}}",
        },
        callback: function (data) {
          console.log(data);
        },
        onclose: function() {
          // close modal
        },
        customizations: {
          title: "Pay",
          description: "Payment for service charges",
          logo: "https://assets.piedpiper.com/logo.png",
        },
      });
    }
  </script>

@endsection