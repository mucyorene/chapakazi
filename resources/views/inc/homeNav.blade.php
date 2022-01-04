<?php
    use App\Http\Controllers\web\HomeController;
?>
<header>
    <nav class="navbar navbar-default navbar-fixed-top" role="navigation">
        <div class="navigation">
        <div class="container">
            <div class="navbar-header">
            <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target=".navbar-collapse.collapse">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
            <div class="navbar-brand">
                <a href="/"><h1><span>Chapa</span>kazi</h1></a>
            </div>
            </div>

            <div class="navbar-collapse collapse">
            <div class="menu">
                <ul class="nav nav-tabs" role="tablist">
                    <li role="presentation"><a id="home" href="/">Home</a></li>
                    <li role="presentation"><a href="/eRecruite" id="recruite">Recruite</a></li>
                    <li role="presentation"><a href="/about" id="about">About Us</a></li>
                    {{-- <li role="presentation"><a id="services" href="/services">Services</a></li> --}}
                    <li role="presentation"><a id="contact" href="/contact">Contact</a></li>  
                    @if (Auth::guard('webemployers')->id() > 0)
                        <li role="presentation"><a id="login" href="/savedList">My List<span style="color:red;">&nbsp {{HomeController::displayNumber()}}</span></a></li>
                        <li role="presentation"><a id="login" href="/user/dash">Your dashboard</a></li>
                    @else
                        <li role="presentation"><a id="login" href="/authentication">Login</a></li>
                    @endif              
                    
                    {{-- <li role="presentation"><a href="{{ route('recruites') }}">List &nbsp;<span class="text-danger">{{ session()->has('empList') ? session()->get('empList')->totalEmployee : ''}}</span></a></li> --}}
                </ul>
            </div>
            </div>
        </div>
        </div>
    </nav>
</header>
<div class="modal fade" id="modalLogin" data-backdrop="static" data-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="staticBackdropLabel">Mo</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
            <div class="row">
                
            </div>
        </div>
        <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
            <button type="button" class="btn btn-primary">Understood</button>
        </div>
      </div>
    </div>
</div>