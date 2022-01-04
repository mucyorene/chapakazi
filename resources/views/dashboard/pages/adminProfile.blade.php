@extends('dashboard.inc.main')
@section('content')
<meta name="csrf-token" content="{{ csrf_token() }}" />
    <!-- Main Content -->
    <!-- Main Content -->
    <div class="main-content">
        <section class="section">
            <div class="section-body">
            <div class="row mt-sm-4">
                <div class="col-12 col-md-12 col-lg-4">
                <div class="card author-box">
                    <div class="card-body">
                    <div class="author-box-center">
                        {{-- <img alt="image" src="{{ assets('profiles/'.$real->profile}}" class="rounded-circle author-box-picture"> --}}
                        <div class="clearfix"></div>
                        <div class="author-box-name">
                        <a href="#">{{ $userAdmin->names}}</a>
                        </div>
                        {{-- <div class="author-box-job">Web Developer</div> --}}
                    </div>
                    <div class="text-center">
                    </div>
                    </div>
                </div>
                <div class="card">
                    <div class="card-header">
                    <h4>Personal Details</h4>
                    </div>
                    <div class="card-body">
                    <div class="py-4">
                        {{-- <p class="clearfix">
                        <span class="float-left">
                            Birthday
                        </span>
                        <span class="float-right text-muted">
                            30-05-1998
                        </span>
                        </p> --}}
                        <p class="clearfix">
                        <span class="float-left">
                            Mail
                        </span>
                        <span class="float-right text-muted">
                            {{ $userAdmin->email}}
                        </span>
                        </p>
                    </div>
                    </div>
                </div>

                </div>
                <div class="col-12 col-md-12 col-lg-8">
                <div class="card">
                    <div class="padding-20">
                    <ul class="nav nav-tabs" id="myTab2" role="tablist">
                        <li class="nav-item">
                        <a class="nav-link active" id="home-tab2" data-toggle="tab" href="#about" role="tab"
                            aria-selected="true">About</a>
                        </li>
                        <li class="nav-item">
                        <a class="nav-link" id="profile-tab2" data-toggle="tab" href="#settings" role="tab"
                            aria-selected="false">Setting</a>
                        </li>
                    </ul>
                    <div class="tab-content tab-bordered" id="myTab3Content">
                        <div class="tab-pane fade show active" id="about" role="tabpanel" aria-labelledby="home-tab2">
                            <div class="row">
                                <div class="col-md-3 col-6 b-r">
                                <strong>Full Name</strong>
                                <br>
                                <p class="text-muted">{{ $userAdmin->names}}</p>
                                </div>
                                <div class="col-md-3 col-6 b-r">
                                    <strong>Email</strong>
                                    <br>
                                    <p class="text-muted">{{ $userAdmin->email}}</p>
                                </div>
                            </div>
                        </div>
                        <div class="tab-pane fade" id="settings" role="tabpanel" aria-labelledby="profile-tab2">
                            <div id="feedbackMessage"></div>
                        <form method="POST" id="updateForm" enctype="multipart/form-data" action="/admin/updateProfile/{{ $userAdmin->id }}" class="form">
                            @csrf
                            <div class="card-header">
                            <h4>Edit Profile</h4>
                            </div>
                            <div class="card-body">
                            <div class="row">
                                <div class="form-group col-md-6 col-6">
                                    <label>Full Names</label>
                                    <input type="text" class="form-control" name="names" value="{{ $userAdmin->names}}">
                                    <div class="invalid-feedback">
                                        Please fill in the first name
                                    </div>
                                    <span class="text-danger names-error"></span>
                                </div>
                                <div class="form-group col-md-6 col-6">
                                    <label>Email</label>
                                    <input type="email" name="email" class="form-control" value="{{ $userAdmin->email}}">
                                    <div class="invalid-feedback">
                                        Please fill in the email
                                    </div>
                                    <span class="text-danger email-error"></span>
                                </div>
                            </div>
                            <div class="row">
                                <div class="form-group col-md-6 col-6">
                                    <label>User Name: </label>
                                    <input type="text" name="username" name="username" class="form-control" value="{{ $userAdmin->username}}">
                                    <div class="invalid-feedback">
                                        Please fill in the email
                                    </div>
                                    <span class="text-danger username-error"></span>
                                </div>
                                {{-- <div class="form-group col-md-6 col-6">
                                    <label>Profile: </label>
                                    <div class="custom-file">
                                        <input type="file" class="custom-file-input" name="adminProfile" id="customFile">
                                        <label class="custom-file-label" for="customFile">Choose file</label>
                                    </div>
                                    <span class="text-danger adminProfile-error"></span>
                                </div> --}}
                            </div>
                            </div>
                            <div class="card-footer text-right">
                            <button id="updateAdmin" class="btn btn-primary">Save Changes</button>
                            </div>
                        </form>
                        </div>
                    </div>
                    </div>
                </div>
                </div>
            </div>
            </div>
        </section>
        <div class="settingSidebar">
            <a href="javascript:void(0)" class="settingPanelToggle"> <i class="fa fa-spin fa-cog"></i>
            </a>
            <div class="settingSidebar-body ps-container ps-theme-default">
            <div class=" fade show active">
                <div class="setting-panel-header">Setting Panel
                </div>
                <div class="p-15 border-bottom">
                <h6 class="font-medium m-b-10">Select Layout</h6>
                <div class="selectgroup layout-color w-50">
                    <label class="selectgroup-item">
                    <input type="radio" name="value" value="1" class="selectgroup-input-radio select-layout" checked>
                    <span class="selectgroup-button">Light</span>
                    </label>
                    <label class="selectgroup-item">
                    <input type="radio" name="value" value="2" class="selectgroup-input-radio select-layout">
                    <span class="selectgroup-button">Dark</span>
                    </label>
                </div>
                </div>
                <div class="p-15 border-bottom">
                <h6 class="font-medium m-b-10">Sidebar Color</h6>
                <div class="selectgroup selectgroup-pills sidebar-color">
                    <label class="selectgroup-item">
                    <input type="radio" name="icon-input" value="1" class="selectgroup-input select-sidebar">
                    <span class="selectgroup-button selectgroup-button-icon" data-toggle="tooltip"
                        data-original-title="Light Sidebar"><i class="fas fa-sun"></i></span>
                    </label>
                    <label class="selectgroup-item">
                    <input type="radio" name="icon-input" value="2" class="selectgroup-input select-sidebar" checked>
                    <span class="selectgroup-button selectgroup-button-icon" data-toggle="tooltip"
                        data-original-title="Dark Sidebar"><i class="fas fa-moon"></i></span>
                    </label>
                </div>
                </div>
                <div class="p-15 border-bottom">
                <h6 class="font-medium m-b-10">Color Theme</h6>
                <div class="theme-setting-options">
                    <ul class="choose-theme list-unstyled mb-0">
                    <li title="white" class="active">
                        <div class="white"></div>
                    </li>
                    <li title="cyan">
                        <div class="cyan"></div>
                    </li>
                    <li title="black">
                        <div class="black"></div>
                    </li>
                    <li title="purple">
                        <div class="purple"></div>
                    </li>
                    <li title="orange">
                        <div class="orange"></div>
                    </li>
                    <li title="green">
                        <div class="green"></div>
                    </li>
                    <li title="red">
                        <div class="red"></div>
                    </li>
                    </ul>
                </div>
                </div>
                <div class="p-15 border-bottom">
                <div class="theme-setting-options">
                    <label class="m-b-0">
                    <input type="checkbox" name="custom-switch-checkbox" class="custom-switch-input"
                        id="mini_sidebar_setting">
                    <span class="custom-switch-indicator"></span>
                    <span class="control-label p-l-10">Mini Sidebar</span>
                    </label>
                </div>
                </div>
                <div class="p-15 border-bottom">
                <div class="theme-setting-options">
                    <label class="m-b-0">
                    <input type="checkbox" name="custom-switch-checkbox" class="custom-switch-input"
                        id="sticky_header_setting">
                    <span class="custom-switch-indicator"></span>
                    <span class="control-label p-l-10">Sticky Header</span>
                    </label>
                </div>
                </div>
                <div class="mt-4 mb-4 p-3 align-center rt-sidebar-last-ele">
                <a href="#" class="btn btn-icon icon-left btn-primary btn-restore-theme">
                    <i class="fas fa-undo"></i> Restore Default
                </a>
                </div>
            </div>
            </div>
        </div>
    </div>
    <script src="{{ asset('js/jquery.js') }}"></script>
    <script>
        $(function(){
            $("#updateForm").on("submit",function(e){
                e.preventDefault()
                var id = $(this).val();
                //alert(id)
                $.ajax({
                    method:'POST',
                    url: this.action,
                    data: new FormData(this),
                    processData: false,
                    dataType:'json',
                    contentType:false,
                    cache:false,
                    beforeSend:function(){
                        $("#updateAdmin").text('Updating...')
                    },
                    success:function(response){
                        if (response.status == 0) {

                            $.each(response.error,function(prefix, val){
                            //console.log(response.error)
                            //console.log($('span.'+prefix+'-error').text(val[0]))
                            $('span.'+prefix+'-error').text(val[0]);
                            $("#employeeSaving").text("Save");
                            });

                        }else{

                            console.log(response)
                            $("#feedbackMessage").text('Updated successfully')
                            $("#feedbackMessage").addClass('alert alert-success')
                            $("#updateAdmin").text('Save Changes')

                        }


                    }
                })
            })
        })
    </script>
@endsection
