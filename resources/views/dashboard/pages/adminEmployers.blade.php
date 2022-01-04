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
                             {{-- <a data-bs-toggle="modal" data-bs-target="#staticBackdrop"  class="dropdown-item has-icon" href="#"><i class="fas fa-th"></i>View</a> --}}
                            <a href="/removeEmployer/{{ $employee->id }}" class="dropdown-item has-icon text-danger" class="removeE" id="removeEmployers"><i class="fas fa-trash"></i>Remove</a>
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

<script src="{{ asset('js/jquery.js') }}"></script>


<script>
    // $(function(){
    //    $("#removeEmployers").click(function(e){
    //         alert("Rwanda");
    //         e.preventDefault();
    //         let ids = $(this).attr('href')
    //         alert(ids)
            // $.ajax({
            //     url:'/removeEmployer/'+ids,
            //     success:function(response){
            //         $(".responseDelete").text("Successfully removed employer");
            //         $(".responseDelete").addClass('alert alert-danger text-center')
            //     },
            //     error:function(error){
            //         console.log(error)
            //     }
            // })
    //    })
    //    $("#removeAllEmployers").click(function(e){
    //     e.preventDefault();
    //        $.ajax({
    //           url:'/removeMyAllEmployers',
    //           success:function(){
    //             $(".responseDelete").text("You removed all employees")
    //             $(".responseDelete").addClass('alert alert-danger text-center')
    //           }
    //        });
    //    })
    // });
</script>



<script>
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
<script>
  $(function(){
      $("#employeesTabs").addClass('active');
      $("#employeesTabs1").addClass('active');
  });
</script>

@endsection
