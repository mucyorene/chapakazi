@extends('dashboard.inc.main')
@section('content')
<!-- Main Content -->
<div class="main-content">
  <section class="section">
    <div class="section-body">
      <div class="row">
          
        <div class="col-12">
            <div class="responseDelete"></div>
        </div>
        <div class="col-12">
          <div class="card">
            <div class="card-header">
              <div class="col-md-10">
                    <h4>Employee</h4>
              </div>
              <div class="col-md-2">
                <button id="removeAllEmployers" class="btn btn-danger btn-sm btn-flat">Remove all</button>
              </div>
            </div>
            <div class="card-body">
              <div class="table-responsive">

                @if (session('danger'))
                    <div class="alert alert-danger">
                      {{session('danger')}}
                    </div>
                @endif
              
                <table class="table table-striped table-hover" id="tableExport">
                  <thead>
                    <tr>
                      <th>Names</th>
                      <th>Phone</th>
                      <th>Email</th>
                      <th>Address</th>
                      <th>Created At</th>
                      <th>Action</th>
                    </tr>
                  </thead>
                  <tbody>
                    @foreach ($data as $employee)
                    <tr>
                      <td>{{ $employee->fullNames }}</td>
                      {{-- <td>{{ $employee->identificationNumber }}</td> --}}
                      <td>{{ $employee->phone }}</td>
                      <td>{{ $employee->email }}</td>
                      <td>{{ $employee->address }}</td>
                      <td>{{ $employee->created_at }}</td>
                      {{-- <td class="avatar avatar mr-2 avatar-xl bg-white">
                          <img class="img img-fluid" src="profiles/{{$employee->profile}}" alt="No profile">
                          <i class="avatar-presence online"></i>
                      </td> --}}
                      <td>
                        
                        <div class="dropdown d-inline">
                          <button class="btn btn-primary dropdown-toggle" type="button" id="dropdownMenuButton2"
                            data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            Choose
                          </button>
                          <div class="dropdown-menu">
                            {{-- <a class="dropdown-item has-icon" href="#"><i class="fas fa-th"></i>View</a> --}}
                            <a class="dropdown-item has-icon text-danger" class="removeE" id="removeEmployers" href="{{$employee->id}}"><i class="fas fa-trash"></i>Remove</a>                           
                          </div>
                        </div>

                      </td>
                    </tr>
                    @endforeach
                  </tbody>
                </table>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>
</div>

<script src="{{ secure_asset('js/jquery.js') }}"></script>


<script>
    $(function(){
       $("#removeEmployers").click(function(e){
        //    alert("Rwanda");
            e.preventDefault();
            let ids = $(this).attr('href')
            $.ajax({
                url:'/removeEmployer/'+ids,
                success:function(response){
                    $(".responseDelete").text("Successfully removed employer");
                    $(".responseDelete").addClass('alert alert-danger text-center')
                },
                error:function(error){
                    console.log(error)
                }
            })
       })
       $("#removeAllEmployers").click(function(e){
        e.preventDefault();
           $.ajax({
              url:'/removeMyAllEmployers',
              success:function(){
                $(".responseDelete").text("You removed all employees")
                $(".responseDelete").addClass('alert alert-danger text-center')
              }
           });
       })
    });
</script>



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
<script src="{{ secure_asset('dashboard/assets/js/app.min.js')}}"></script>

<!-- Page Specific JS File -->
<script src="{{ secure_asset('dashboard/assets/bundles/datatables/datatables.min.js') }}"></script>
<script src="{{ secure_asset('dashboard/assets/bundles/datatables/DataTables-1.10.16/js/dataTables.bootstrap4.min.js')}}"></script>
<script src="{{ secure_asset('dashboard/assets/bundles/datatables/export-tables/dataTables.buttons.min.js') }}"></script>
<script src="{{ secure_asset('dashboard/assets/bundles/datatables/export-tables/buttons.flash.min.js') }}"></script>
<script src="{{ secure_asset('dashboard/assets/bundles/datatables/export-tables/jszip.min.js') }}"></script>
<script src="{{ secure_asset('dashboard/assets/bundles/datatables/export-tables/pdfmake.min.js') }}"></script>
<script src="{{ secure_asset('dashboard/assets/bundles/datatables/export-tables/vfs_fonts.js')}}"></script>
<script src="{{ secure_asset('dashboard/assets/bundles/datatables/export-tables/buttons.print.min.js') }}"></script>
<script src="{{ secure_asset('dashboard/assets/js/page/datatables.js') }}"></script>
<!-- Template JS File -->
<script src="{{ secure_asset('dashboard/assets/js/scripts.js')}}"></script>
<!-- Custom JS File -->
<script src="{{ secure_asset('dashboard/assets/js/custom.js') }}"></script>

  <!-- General JS Scripts -->
  <script src="{{ secure_asset('dashboard/assets/js/app.min.js') }}"></script>
  <!-- JS Libraies -->
  <script src="{{ secure_asset('dashboard/assets/bundles/apexcharts/apexcharts.min.js') }}"></script>
  <!-- Page Specific JS File -->
  <script src="{{ secure_asset('dashboard/assets/js/page/index.js') }}"></script>
  <!-- Template JS File -->
  <script src="{{ secure_asset('dashboard/assets/js/scripts.js') }}"></script>
  <!-- Custom JS File -->
  <script src="{{ secure_asset('dashboard/assets/js/custom.js') }}"></script>

</body>
<!-- index-->

<link rel="stylesheet" href="{{ secure_asset('bootstrap/css/bootstrap.css') }}">

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
                <div class="invalid-feedback">
                  @error('firstName') {{ $message }}@enderror
                </div>
              </div>
              <div class="form-group col-md-6">
                <label>Last Name</label>
                <input type="text" id="lastName" name="lastName" class="form-control" value="{{ old('lastName') }}" required="">
                <div class="invalid-feedback">
                  @error('lastName') {{ $message }}@enderror
                </div>
              </div>
            </div>
            <div class="form-row">
              <div class="form-group col-md-6 mb-0">
                <label>Litle Bio</label>
                <textarea name="littleBiography" id="littleBiography" class="form-control" value="{{ old('lastName') }}" required=""></textarea>
                <div class="invalid-feedback">
                  @error('littleBiography') {{ $message }}@enderror
                </div>
              </div>
              <div class="form-group col-md-6">
                <label>Date of birth</label>
                <input type="date" name="dateOfBirth" id="dateOfBirth" value="{{ old('dateOfBirth') }}" class="form-control" required="">
                <div class="invalid-feedback">
                  @error('dateOfBirth') {{ $message }}@enderror
                </div>
              </div>
            </div>
            <div class="form-row">
              <div class="form-group col-md-6">
                <label>Availability</label>
                <input type="text" name="availability" id="availability" value="{{ old('availability') }}" class="form-control" required="">
                <div class="invalid-feedback">
                  @error('dateOfBirth') {{ $message }}@enderror
                </div>
              </div>
              <div class="form-group col-md-6">
                <label>Rate Per Day</label>
                <input type="number" name="ratePerDay" id="ratePerDay" value="{{ old('availability') }}" class="form-control" required="">
                <div class="invalid-feedback">
                  @error('ratePerDay') {{ $message }}@enderror
                </div>
              </div>
            </div>
            <div class="form-row">
              <div class="form-group col-md-6">
                <label>Identification Number</label>
                <input type="number" name="identificationNumber" id="identificationNumber" class="form-control"  value="{{ old('identificationNumber') }}" required="">
                <div class="invalid-feedback">
                  @error('identificationNumber') {{ $message }}@enderror
                </div>
              </div>
              <div class="form-group col-md-6">
                <label>Email</label>
                <input type="email" name="email" id="email" class="form-control"  value="{{ old('email') }}" required="">
                <div class="invalid-feedback">
                  @error('email') {{ $message }}@enderror
                </div>
              </div>
            </div>

            <div class="form-row">
              <div class="form-group col-md-6 mb-0">
                <label>Profession</label>
                <textarea class="form-control" id="proffession" value="{{ old('proffession') }}" name="proffession" required=""></textarea>
                <div class="invalid-feedback">
                  @error('proffession') {{ $message }}@enderror
                </div>
              </div>
              <div class="form-group col-md-6">
                <label>Profile Image</label>
                <div class="custom-file">
                  <input type="file" class="custom-file-input" name="formProfile" id="formProfile">
                  <label class="custom-file-label" for="customFile">Choose file</label>
                </div>
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

<script>

//   $(document).ready(function(){
//     $("#feedbacks").hide()
//     $("#formSubmit").on("submit",function(e){
//       e.preventDefault();
//       $.ajax({
//         method:'POST',
//         url:this.action,
//         data: new FormData(this),
//         processData: false,
//         dataType: 'json',
//         contentType:false,
//         cache:false,

//         beforeSend:function () {
//           $("#employeeSaving").text("Saving");
//         },
//         success: function(response){

//           console.log(response.success)
//           $("#employeeSaving").text("Save");
//           $("#formSubmit").trigger('reset');
//           $("#feedbacks").show()
//           $("#feedbacks").addClass("alert alert-success")
//           $("#feedbacks").html(response.success)

//         },error: function(error){
//           console.log(error)
//           $("#employeeSaving").text("Save");
//           $("#feedbacks").show()
//           $("#feedbacks").addClass("alert alert-danger")

          
//           // $(".toBe").hide();
//           // $("#exampleModalLabel2").html("Can't save data, check inputs like email or unfilled");
//           // $("#exampleModalLabel2").show();
//         }
//       });
//     });
//   });
</script>

<script>
  $(function(){
      $("#employeesTabs").addClass('active');
      $("#employeesTabs1").addClass('active');
  });
</script>

@endsection
      