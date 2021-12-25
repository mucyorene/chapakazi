@extends('inc.layouts')
@section('content')

    <div id="breadcrumb">
        <div class="container">
            <div class="breadcrumb">
            <li><a href="index">Home</a></li>
            <li>Services</li>
            </div>
        </div>
    </div>

    <div class="services">
        <div class="container">
        <h3>Chapakazi Services</h3>
        <hr>
        <div class="col-md-6">
            <img src="images/4.jpg" class="img-responsive">
            <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Phasellus interdum erat libero, pulvinar tincidunt leo consectetur eget. Curabitur lacinia pellentesque libero, pulvinar tincidunt leo consectetur eget. Curabitur lacinia pellentesque libero,
            pulvinar tincidunt leo consectetur eget. Curabitur lacinia pellentesque</p>
        </div>

        <div class="col-md-6">
            <div class="media">
            <ul>
                <li>
                <div class="media-left">
                    <i class="fa fa-pencil"></i>
                </div>
                <div class="media-body">
                    <h4 class="media-heading">Best Employee</h4>
                    <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Phasellus interdum erat libero, pulvinar tincidunt leo consectetur eget.</p>
                </div>
                </li>
                <li>
                <div class="media-left">
                    <i class="fa fa-book"></i>
                </div>
                <div class="media-body">
                    <h4 class="media-heading">Publish them</h4>
                    <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Phasellus interdum erat libero, pulvinar tincidunt leo consectetur eget.</p>
                </div>
                </li>
                <li>
                <div class="media-left">
                    <i class="fa fa-rocket"></i>
                </div>
                <div class="media-body">
                    <h4 class="media-heading">Directing them at Right Employers</h4>
                    <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Phasellus interdum erat libero, pulvinar tincidunt leo consectetur eget.</p>
                </div>
                </li>
            </ul>
            </div>
        </div>
        </div>
    </div>

    <div class="sub-services">
        <div class="container">
        <div class="col-md-6">
            <div class="media">
            <ul>
                <li>
                <div class="media-left">
                    <i class="fa fa-pencil"></i>
                </div>
                <div class="media-body">
                    <h4 class="media-heading">Finding casuals</h4>
                    <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Phasellus interdum erat libero, pulvinar tincidunt leo consectetur eget.</p>
                </div>
                </li>
                <li>
                <div class="media-left">
                    <i class="fa fa-book"></i>
                </div>
                <div class="media-body">
                    <h4 class="media-heading">Chacking their background</h4>
                    <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Phasellus interdum erat libero, pulvinar tincidunt leo consectetur eget.</p>
                </div>
                </li>
                <li>
                <div class="media-left">
                    <i class="fa fa-rocket"></i>
                </div>
                <div class="media-body">
                    <h4 class="media-heading">Posting them</h4>
                    <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Phasellus interdum erat libero, pulvinar tincidunt leo consectetur eget.</p>
                </div>
                </li>
            </ul>
            </div>
        </div>

        <div class="col-md-6">
            <img src="images/4.jpg" class="img-responsive">
            <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Phasellus interdum erat libero, pulvinar tincidunt leo consectetur eget. Curabitur lacinia pellentesque libero, pulvinar tincidunt leo consectetur eget. Curabitur lacinia pellentesque libero,
            pulvinar tincidunt leo consectetur eget. Curabitur lacinia pellentesque</p>
        </div>
        </div>
    </div>

@endsection

<script src="{{ asset('js/jquery.js')}}"></script>
<script type="text/javascript">
    $(function(){
    $("#services").addClass('active');
    });
</script>