@extends('dashboard.inc.main')
@section('content')
<meta name="csrf-token" content="{{ csrf_token() }}" />
<!-- Main Content -->
<div class="main-content">
  <section class="section">
    <div class="section-body">
      <div class="row">
        <div class="col-12">
          <div class="card">
            <div class="card-header">
              <div class="col-md-12">
                    <h4>Pending list</h4>
              </div>
            </div>
            <div class="card-body">
              <div class="table-responsive">

                <div class="statusChanged"></div>

                <table class="table table-striped table-hover" id="tableExport">
                  <thead>
                    <tr>
                      <th>Names</th>
                      <th>IDNumber</th>
                      <th>Category</th>
                      <th>Availability</th>
                      <th>Rate Per Day</th>
                      <th>Employer Names</th>
                      <th>Status</th>
                      <th>Action</th>
                    </tr>
                  </thead>
                  <tbody>
                    @foreach ($data as $employee)
                        @if($employee->status == 'pending')
                            <tr>
                                <td>{{ $employee->employee->firstName }} {{$employee->employee->lastName}}</td>
                                <td>{{ $employee->employee->identificationNumber }}</td>
                                <td>{{ $employee->employee->category }}</td>
                                <td>{{ $employee->employee->availability }}</td>
                                <td>{{ $employee->employee->ratePerDay }}</td>

                                <td><a id="registerEmployee" data-bs-toggle="modal" class="text-success" data-bs-target="#staticBackdrop">{{ $employee->employers->fullNames }}</a></td>
                                <td>{{ $employee->status }}</td>
                                <td>
                                    <button id="updateRequestStatus" value="{{ $employee->employers->id }}" class="btn btn-warning btn-sm btn-flat">Confirm</button>
                                </td>
                            </tr>
                        @endif
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
    $(document).ready(function(){
        $("#updateRequestStatus").click(function(){
            var id = $(this).val();
            //alert(id)
            $.ajax({
                url:'/dash/recruiteStatus/'+id,
                beforeSend:function(){
                    $("#updateRequestStatus").text('Confirming')
                },
                success:function(response){
                    console.log(response.status)
                    $("#updateRequestStatus").text('confirm')
                    $(".statusChanged").text(response.status)
                    $(".statusChanged").addClass('alert alert-success')
                }
            })
        })
    })
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
      <h5 class="modal-title" id="staticBackdropLabel">Employer's Details</h5>
      <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close">X</button>
      </div>
          <div class="modal-body"><div id="feedbacks"></div>
            @foreach($data as $real)
              <div class="card">
                  <div class="card-body">
                      <div class="py-4">
                          <p class="clearfix">
                                    <span class="float-left">
                                        Names:
                                    </span>
                              <span class="float-right text-muted">
                                        {{ $real->employers->fullNames}}
                                    </span>
                          </p>

                          <p class="clearfix">
                                    <span class="float-left">
                                        Address:
                                    </span>
                              <span class="float-right text-muted">
                                        {{ $real->employers->address}}
                                    </span>
                          </p>

                          <p class="clearfix">
                                    <span class="float-left">
                                        Mail
                                    </span>
                              <span class="float-right text-muted">
                                        {{ $real->employers->email}}
                                    </span>
                          </p>
                          <p class="clearfix">
                                    <span class="float-left">
                                        Biography
                                    </span>
                              <span class="float-right text-muted">
                                        {{ $real->employers->biography}}
                                    </span>
                          </p>
                      </div>
                  </div>
              </div>
            @endforeach
          </div>
  </div>
  </div>
</div>


<script src="{{ asset('js/jquery.js') }}"></script>
<script type="text/javascript">
  $(function(){
    $("#employeeAdmin").addClass('active');
    $("#employeeAdmin20").addClass('active');
  });
</script>

@endsection
