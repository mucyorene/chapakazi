@extends('dashboard.inc.main')
@section('content')
<meta name="csrf-token" content="{{ csrf_token() }}" />

<!-- Main Content -->
<div class="main-content">
  <section class="section">
    <div class="section-body">
      <div class="row">
        <div class="col-12">
          Rwanda
        </div>
      </div>
    </div>
  </section>
</div>

<script src="{{ asset('js/jquery.js') }}"></script>
<script>
  function deleteEmployee(id,firstName,lastName){
    var needConfirm = confirm("Are you sure, you want to delete "+firstName+" "+lastName);
    if (needConfirm) {
      window.location = "/removeEmployee/"+id;
    }
  }
</script>

<script type="text/javascript">
  // $(function(){
  //   $("#registerEmployee").click(function(){
  //     window.location = "{{ route('admin.addRegister') }}";
  //   });

  //   $("#recruites").addClass('active');
  // });
</script>


<!-- General JS Scripts -->
<script src="{{ asset('dashboard/assets/js/app.min.js')}}"></script>

<!-- Page Specific JS File -->
<script src="{{ asset('dashboard/assets/bundles/datatables/datatables.min.js') }}"></script>
<script src="{{ asset('dashboard/assets/bundles/datatables/DataTables-1.10.16/js/dataTables.bootstrap4.min.js')}}"></script>
<script src="{{ asset('dashboard/assets/bundles/datatables/export-tables/dataTables.buttons.min.js') }}"></script>
<script src="{{ asset('dashboard/assets/bundles/datatables/export-tables/buttons.flash.min.js') }}"></script>
<script src="{{ asset('dashboard/assets/bundles/datatables/export-tables/jszip.min.js') }}"></script>
<script src="{{ asset('dashboard/assets/bundles/datatables/export-tables/pdfmake.min.js') }}"></script>
<script src="{{ asset('dashboard/assets/bundles/datatables/export-tables/vfs_fonts.js')}}"></script>
<script src="{{ asset('dashboard/assets/bundles/datatables/export-tables/buttons.print.min.js') }}"></script>
<script src="{{ asset('dashboard/assets/js/page/datatables.js') }}"></script>
<!-- Template JS File -->
<script src="{{ asset('dashboard/assets/js/scripts.js')}}"></script>
<!-- Custom JS File -->
<script src="{{ asset('dashboard/assets/js/custom.js') }}"></script>

  <!-- General JS Scripts -->
  <script src="{{ asset('dashboard/assets/js/app.min.js') }}"></script>
  <!-- JS Libraies -->
  <script src="{{ asset('dashboard/assets/bundles/apexcharts/apexcharts.min.js') }}"></script>
  <!-- Page Specific JS File -->
  <script src="{{ asset('dashboard/assets/js/page/index.js') }}"></script>
  <!-- Template JS File -->
  <script src="{{ asset('dashboard/assets/js/scripts.js') }}"></script>
  <!-- Custom JS File -->
  <script src="{{ asset('dashboard/assets/js/custom.js') }}"></script>

</body>
<!-- index-->



<link rel="stylesheet" href="{{ asset('bootstrap/css/bootstrap.css') }}">

 <!-- Modal -->
 <div class="modal fade" id="staticBackdrop" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg">
  <div class="modal-content">
      <div class="modal-header">
      <h5 class="modal-title" id="staticBackdropLabel">Employee Registration</h5>
      <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close">X</button>
      </div>
      <div class="modal-body"><div id="feedbacks"></div>

        <form class="form" id="formSubmit" method="POST" enctype="multipart/form-data" class="needs-validation" novalidate="" action="{{route('admin.postEmployees')}}">
         @csrf
          <div class="card-body">

            <div class="form-row">
              <div class="form-group col-md-6">
                <label>First Name</label>
                <input type="text" id="firstName" name="firstName" class="form-control" value="{{ old('firstName') }}" required="">
                <div class="invalid-feedback text-danger error-text firstName-error">
                  @error('firstName') {{ $message }}@enderror
                </div>
                <span class="text-danger error-text firstName-error"></span>
              </div>
              <div class="form-group col-md-6">
                <label>Last Name</label>
                <input type="text" id="lastName" name="lastName" class="form-control" value="{{ old('lastName') }}" required="">
                <div class="invalid-feedback text-danger error-text lastname-error">
                  @error('lastName') {{ $message }}@enderror
                </div>
                <span class="text-danger error-text lastName-error"></span>
              </div>
            </div>
            <div class="form-row">
              <div class="form-group col-md-6 mb-0">
                <label>Experience</label>
                <textarea class="form-control" name="experience" id="littleBiography" value="{{ old('experience') }}" cols="30" rows="10"></textarea>
                <div class="invalid-feedback text-danger error-text experience-error">
                  @error('experience') {{ $message }}@enderror
                </div>
                <span class="text-danger error-text experience-error"></span>
              </div>
              <div class="form-group col-md-6">
                <label>Date of birth</label>
                <input type="date" name="dateOfBirth" id="dateOfBirth" value="{{ old('dateOfBirth') }}" class="form-control" required="">
                <div class="invalid-feedback text-danger error-text dob-error">
                  @error('dateOfBirth') {{ $message }}@enderror
                </div>
                <span class="text-danger error-text dateOfBirth-error"></span>
              </div>
            </div>
            <div class="form-row">
              <div class="form-group col-md-6">
                <label>Availability</label>
                <select name="availability" id="availability" class="form-control">
                  <option value="Full-Time">Full-Time</option>
                  <option value="Part-Time">Part-Time</option>
                </select>
                <div class="invalid-feedback text-danger error-text availability-error">
                  @error('dateOfBirth') {{ $message }}@enderror
                </div>
                <span class="text-danger error-text availability-error"></span>
              </div>
              <div class="form-group col-md-6">
                <label>Rate Per Day</label>
                <input type="number" name="ratePerDay" id="ratePerDay" value="{{ old('availability') }}" class="form-control" required="">
                <div class="invalid-feedback text-danger error-text   -error">
                  @error('ratePerDay') {{ $message }}@enderror
                </div>
                <span class="text-danger error-text ratePerDay-error"></span>
              </div>
            </div>
            <div class="form-row">
              <div class="form-group col-md-6">
                <label>Identification Number</label>
                <input type="number" name="identificationNumber" id="identificationNumber" class="form-control"  value="{{ old('identificationNumber') }}" required="">
                <div class="invalid-feedback text-danger error-text identification-error">
                  @error('identificationNumber') {{ $message }}@enderror
                </div>
                <span class="text-danger error-text identificationNumber-error"></span>
              </div>
              <div class="form-group col-md-6">
                <label>Gender</label>

                <select name="gender" id="email" class="form-control">
                  <option value="Male">Male</option>
                  <option value="Female">Female</option>
                </select>

                <div class="invalid-feedback text-danger error-text gender-error">
                  @error('email') {{ $message }}@enderror
                </div>

                <span class="text-danger error-text gender-error"></span>
              </div>
            </div>

            <div class="form-row">
              {{-- <div class="form-group col-md-6 mb-0">
                <label>Category</label>
                <select name="category" id="category" class="form-control">
                  <option value="Plumber">Plumber</option>
                  <option value="Electricians">Electricians</option>
                  <option value="Mechanics">Mechanics</option>
                  <option value="HouseMaid">House Maid</option>
                  <option value="BabySeaters">Baby Seaters</option>
                  <option value="Cleaners">Cleaners</option>
                  <option value="Gatekeepers">Gate keepers</option>
                  <option value="Gardeners">Gardeners</option>
                  <option value="Others">Others</option>
                </select>
                <div class="invalid-feedback text-danger error-text category-error">
                  @error('proffession') {{ $message }}@enderror
                </div>
                <span class="text-danger error-text category-error"></span>
              </div> --}}

              <div class="form-group col-md-6 mb-0">
                <label>Category</label>
                <input list="myList" name="category" class="form-control" /></label>
                    <datalist id="myList">
                        <option value="Plumber">
                        <option value="Electricians">
                        <option value="Mechanics">
                        <option value="HouseMaid">
                        <option value="BabySeaters">
                        <option value="Cleaners">
                        <option value="Gatekeepers">
                        <option value="Gardeners">
                    </datalist>
                <span class="text-danger error-text category-error"></span>
              </div>

              <div class="form-group col-md-6">
                <label>Phone</label>
                  <input type="text" class="form-control" name="phone">
                  <span class="text-danger error-text phone-error"></span>
              </div>

              <div class="form-group col-md-12">
                <label>Profile Image</label>
                <div class="custom-file">
                  <input type="file" class="custom-file-input" name="formProfile" id="formProfile">
                  <label class="custom-file-label" for="customFile">Choose file</label>
                </div>
                <span class="text-danger error-text formProfile-error"></span>
              </div>
            </div>

          </div>
      </div>
      <div class="modal-footer">
      <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Close</button>
          <button  class="btn btn-primary" id="employeeSaving">Save</button>
      </form>
      </div>
  </div>
  </div>
</div>

<!-- Laravel Javascript Validation -->
{{-- <script type="text/javascript" src="{{ asset('jsValidator/vendor/jsvalidation/js/jsvalidation.js')}}"></script>
{{ JsValidator::formRequest('App\Http\Requests\MyFormRequest') }} --}}
<script>

  $(document).ready(function(){
    $("#feedbacks").hide()
    $("#formSubmit").on("submit",function(e){
      e.preventDefault();

      $.ajax({
        method:'POST',
        url:this.action,
        data: new FormData(this),
        processData: false,
        dataType: 'json',
        contentType:false,
        cache:false,

        beforeSend:function () {

          $(document).find('span.error-text').text('');
          $("#employeeSaving").text("Saving");

        },
        success: function(response){
          if (response.status == 0) {

            $.each(response.error,function(prefix, val){
              //console.log(response.error)
              //console.log($('span.'+prefix+'-error').text(val[0]))
              $('span.'+prefix+'-error').text(val[0]);
              $("#employeeSaving").text("Save");
            });
          }else{
            $("#formSubmit").trigger('reset');
            console.log(response.success)
            $("#employeeSaving").text("Save");
            $("#formSubmit").trigger('reset');
            $("#feedbacks").show()
            $("#feedbacks").addClass("alert alert-success")
            $("#feedbacks").html(response.success)
          }


        },error: function(error){
          console.log(error)
          $("#employeeSaving").text("Save");
          $("#feedbacks").show()
          $("#feedbacks").addClass("alert alert-danger")


          // $(".toBe").hide();
          // $("#exampleModalLabel2").html("Can't save data, check inputs like email or unfilled");
          // $("#exampleModalLabel2").show();
        }
      });
    });
  });
</script>


<script src="{{ asset('js/jquery.js') }}"></script>
<script type="text/javascript">
  $(function(){
    $("#employeeAdmin").addClass('active');
    $("#employeeAdmin1").addClass('active');
  });
</script>

@endsection
