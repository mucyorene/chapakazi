@extends('dashboard.inc.main')
@section('content')

<link rel="stylesheet" href="{{ asset('dashboard/assets/bundles/datatables/datatables.min.css') }}">
<link rel="stylesheet" href="{{ asset('dashboard/assets/bundles/datatables/DataTables-1.10.16/css/dataTables.bootstrap4.min.css') }}">

<script src="{{ asset('dashboard/assets/js/jquery.js')}}"></script>

<!-- Main Content -->
<div class="main-content">
  <section class="section">
    <div class="section-body">
      <div class="row">
        <div class="col-12">
          <div class="card">
            <div class="card-header">
              <div class="col-md-10">
                    <h4>Employee</h4>
              </div>
              <div class="col-md-2">
                <button id="registerEmployee" class="btn btn-info btn-sm btn-flat">Add New</button>
              </div>
            </div>
            <div class="card-body">
              <div class="table-responsive">
                <table class="table table-striped table-hover" id="tableExport" style="width:100%;">
                  <thead>
                    <tr>
                      <th>Names</th>
                      <th>IDNumber</th>
                      <th>Profession</th>
                      <th>Age</th>
                      <th>Profession</th>
                      <th>Availability</th>
                      <th>Rate Per Day</th>
                      <th>Date of Birth</th>
                      <th>Bio</th>
                      <th>Status</th>
                      <th>Profile</th>
                      <th>Action</th>
                      <th>Action</th>
                      <th>Action</th>
                    </tr>
                  </thead>
                  <tbody>
                    <tr>
                      <td>Jena Gaines</td>
                      <td>Office Manager</td>
                      <td>London</td>
                      <td>30</td>
                      <td>2008/12/19</td>
                      <td>$90,560</td>
                      <td>Jena Gaines</td>
                      <td>Office Manager</td>
                      <td>London</td>
                      <td>Jena Gaines</td>
                      <td>Office Manager</td>
                      <td>London</td>
                      <td>Office Manager</td>
                      <td>London</td>
                    </tr>
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

<script type="text/javascript">
    $(function(){
      $("#registerEmployee").click(function(){
        alert("Rwanda");
      });
    });
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

@endsection