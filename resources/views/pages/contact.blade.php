
@extends('inc.layouts')
@section('content')

    <div id="breadcrumb">
        <div class="container">
            <div class="breadcrumb">
            <li><a href="index">Home</a></li>
            <li>Contact</li>
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-md-2"></div>
        <div class="col-md-8">
            <div class="map">
                <div id="google-map">
                    <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d255203.60499289932!2d29.98715762647151!3d-1.9294216813096794!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x19dca4258ed8e797%3A0x32fbb533d31f0834!2sKigali%20City%2C%20Kigali!5e0!3m2!1sen!2srw!4v1640168983518!5m2!1sen!2srw" width="1200" height="400" style="border:0;" allowfullscreen="" loading="lazy"></iframe>
                </div>
            </div>
        </div>
        <div class="col-md-2"></div>
    </div>

    <section id="contact-page">
        <div class="container">
        <div class="center">
            <h2>Drop Your Message</h2>
            {{-- <p>Sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.</p> --}}
        </div>
        <div class="row contact-wrap">
            <div class="status alert alert-success" style="display: none"></div>
            <div class="col-md-6 col-md-offset-3">
            <div id="sendmessage">Your message has been sent. Thank you!</div>
            <div id="errormessage"></div>
            <form  role="form" class="form">
                <div class="form-group">
                <input type="text" name="names" class="form-control" id="name" placeholder="Your Name" data-rule="minlen:4" data-msg="Please enter at least 4 chars" />
                <div class="validation"></div>
                </div>
                <div class="form-group">
                <input type="email" class="form-control" name="email" id="email" placeholder="Your Email" data-rule="email" data-msg="Please enter a valid email" />
                <div class="validation"></div>
                </div>
                <div class="form-group">
                <input type="text" class="form-control" name="subject" id="subject" placeholder="Subject" data-rule="minlen:4" data-msg="Please enter at least 8 chars of subject" />
                <div class="validation"></div>
                </div>
                <div class="form-group">
                <textarea class="form-control" name="message" rows="5" data-rule="required" data-msg="Please write something for us" placeholder="Message"></textarea>
                <div class="validation"></div>
                </div>
                <div class="text-center">
                    <button class="btn btn-primary btn-lg" required="required">Send message</button>
                </div>
            </form>
            </div>
        </div>
        <!--/.row-->
        </div>
        <!--/.container-->
    </section>
  <!--/#contact-page-->
    <script src="{{ asset('js/jquery.js')}}"></script>
    <script type="text/javascript">
        $(function(){
        $("#contact").addClass('active');
        });
    </script>

@endsection
