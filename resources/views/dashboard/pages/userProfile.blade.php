@extends('dashboard.inc.main1')
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
                        <a href="#">{{ $real->fullNames}}</a>
                        </div>
                        {{-- <div class="author-box-job">Web Developer</div> --}}
                    </div>
                    <div class="text-center">
                        {{-- <div class="author-box-description">
                            <p>
                                Lorem ipsum dolor sit amet, consectetur adipisicing elit. Pariatur voluptatum alias molestias
                                minus quod dignissimos.
                            </p>
                        </div> --}}
                        {{-- <div class="mb-2 mt-3">
                        <div class="text-small font-weight-bold">Follow Hasan On</div>
                        </div>
                        <a href="#" class="btn btn-social-icon mr-1 btn-facebook">
                        <i class="fab fa-facebook-f"></i>
                        </a>
                        <a href="#" class="btn btn-social-icon mr-1 btn-twitter">
                        <i class="fab fa-twitter"></i>
                        </a>
                        <a href="#" class="btn btn-social-icon mr-1 btn-github">
                        <i class="fab fa-github"></i>
                        </a>
                        <a href="#" class="btn btn-social-icon mr-1 btn-instagram">
                        <i class="fab fa-instagram"></i>
                        </a>
                        <div class="w-100 d-sm-none"></div> --}}
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
                            Phone
                        </span>
                        <span class="float-right text-muted">
                            {{ $real->phone}}
                        </span>
                        </p>
                        <p class="clearfix">
                        <span class="float-left">
                            Mail
                        </span>
                        <span class="float-right text-muted">
                            {{ $real->email}}
                        </span>
                        </p>
                        <p class="clearfix">
                        <span class="float-left">
                            Facebook
                        </span>
                        <span class="float-right text-muted">
                            <a href="#">John Deo</a>
                        </span>
                        </p>
                        <p class="clearfix">
                        <span class="float-left">
                            Twitter
                        </span>
                        <span class="float-right text-muted">
                            <a href="#">@johndeo</a>
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
                            <p class="text-muted">{{ $real->fullNames}}</p>
                            </div>
                            <div class="col-md-3 col-6 b-r">
                            <strong>Mobile</strong>
                            <br>
                            <p class="text-muted">{{ $real->phone}}</p>
                            </div>
                            <div class="col-md-3 col-6 b-r">
                            <strong>Email</strong>
                            <br>
                            <p class="text-muted">{{ $real->fullNames}}</p>
                            </div>
                            <div class="col-md-3 col-6">
                            <strong>Location</strong>
                            <br>
                            <p class="text-muted">{{ $real->fullNames}}</p>
                            </div>
                        </div>
                        <p class="m-t-30">Employer Some Biography
                        </p>

                        </div>
                        <div class="tab-pane fade" id="settings" role="tabpanel" aria-labelledby="profile-tab2">
                            <div id="messageDisplay"></div>
                        <form method="post" id="userUpdate" action="dash/user/update/{{ $real->id }}" class="form" class="form">
                            @csrf
                            <div class="card-header">
                            <h4>Edit Profile</h4>
                            </div>
                            <div class="card-body">
                            <div class="row">
                                <div class="form-group col-md-12 col-12">
                                    <label>Full Names</label>
                                    <input type="text" class="form-control" name="names" value="{{ $real->fullNames}}">
                                    <div class="invalid-feedback">
                                        Please fill in the first name
                                    </div>
                                    <span class="text-danger names-error"></span>
                                </div>
                            </div>



                            <div class="row">
                                <div class="form-group col-md-7 col-12">
                                    <label>Email</label>
                                    <input type="email" name="email" class="form-control" value="{{ $real->email}}">
                                    <div class="invalid-feedback">
                                        Please fill in the email
                                    </div>
                                    <span class="text-danger email-error"></span>
                                </div>
                                <div class="form-group col-md-5 col-12">
                                    <label>Phone</label>
                                    <input type="tel" name="phone" class="form-control" value="{{ $real->phone}} ">
                                    <span class="text-danger phone-error"></span>
                                </div>
                            </div>
                            <div class="row">
                                <div class="form-group col-md-7 col-12">
                                    <label>User Name: </label>
                                    <input type="text" name="username" class="form-control" value="{{ $real->username}}">
                                    <div class="invalid-feedback">
                                        Please fill in the email
                                    </div>
                                    <span class="text-danger username-error"></span>
                                </div>
                                <div class="form-group col-md-5 col-12">
                                    <label>Address</label>
                                    <input type="tel" name="address" class="form-control" value="{{ $real->address}}">
                                    <span class="text-danger address-error"></span>
                                </div>
                            </div>
                            <div class="row">
                                <div class="form-group col-12">
                                    <label>Bio</label>
                                    <textarea name="biography" class="form-control summernote-simple">{{ $real->biography}}</textarea>
                                    <span class="text-danger biography-error"></span>
                                </div>
                            </div>
                            <div class="row">
                                <div class="form-group col-12">
                                <label>Profile</label>
                                <div class="custom-file">
                                    <input type="file" name="profile" class="custom-file-input" id="customFile">
                                    <label class="custom-file-label" for="customFile">Choose file</label>
                                    <span class="text-danger profile-error"></span>
                                </div>
                                </div>
                            </div>

                            </div>
                            <div class="card-footer text-right">
                            <button id="updateBtn" class="btn btn-primary">Save Changes</button>
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



        <script src="{{ asset('js/jquery.js') }}"></script>
        <script>
            $(function(){
                $("#userUpdate").on('submit',function(e){
                    e.preventDefault()
                   // alert("Clicked")
                    $.ajax({
                        method:'POST',
                        url: this.action,
                        data: new FormData(this),
                        processData: false,
                        dataType:'json',
                        contentType:false,
                        cache:false,
                        beforeSend:function(){
                            $("#updateBtn").text('Updating')
                        },
                        success:function(response){
                            console.log(response)
                            if (response.status == 0) {

                                $.each(response.error,function(prefix, val){
                                //console.log(response.error)
                                //console.log($('span.'+prefix+'-error').text(val[0]))
                                $('span.'+prefix+'-error').text(val[0]);
                                $("#updateBtn").text("Save changes");
                                });

                            }else{

                                console.log(response)
                                $("#updateBtn").text("Save changes");
                                $("#messageDisplay").text('Updated successfully')
                                $("#messageDisplay").addClass('alert alert-success')
                                $("#updateAdmin").text('Save Changes')

                            }

                        }
                    })
                })
            });
        </script>














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
@endsection
