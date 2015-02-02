<!DOCTYPE html>
<html lang='en'>
<head>
    <meta charset='UTF-8'>
    <meta http-equiv='X-UA-Compatible' content='IE=edge'/>
    <meta name='viewport' content='width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no'/>
    <meta name="google-site-verification" content="7rNtu5rcMOZJFbNqSOoX4nLNV8pXYYGKWjOVXg1aqPM"/>
    <title>Outsider Capital</title>
    <link rel='stylesheet' href='https://maxcdn.bootstrapcdn.com/bootstrap/3.3.1/css/bootstrap.min.css'/>
    <link rel='stylesheet' href="/css/main.css">
    <script src="//use.typekit.net/xjp3gev.js"></script>
    <script>try{Typekit.load();}catch(e){}</script>
    <script src="//code.jquery.com/jquery-1.11.2.min.js"></script>

    <script>
         (function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
         (i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
         m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
         })(window,document,'script','//www.google-analytics.com/analytics.js','ga');

         ga('create', 'UA-58780483-1', 'auto');
         ga('send', 'pageview');
    </script>
</head>
<body>
    <header class="container-fluid text-center">
        <img id='logo' class='center-block img-responsive' src="/img/logo.png" alt="Outsider Capital"/>
        <h1 class='tagline'>Building Tech Companies.</h1>
        <p id='subtitle'>Outside Silicon Valley.</p>
    </header>

    <main class='container'>
        <div class="row text-center coming-soon-label">
            <h4 id='winter'>COMING SPRING 2015</h4>
        </div>

        <?php if(isset($_SESSION['thanks'])): ?>
            <div id='thanks' class="well text-center">
                Thank you for contacting us. Someone will get back to you shortly.
            </div>
        <?php endif; ?>

        <div class="row main">

            <div id='main_content_left' class="col-sm-6 mission-blurb-wrapper">
                <h4>OUR MISSION</h4>
                <p class='main-text'>
                    Be a driving force in helping entrepreneurs
                    build tech companies outside Silicon Valley.
                    <strong><em>Starting with Central Texas.</em></strong>
                </p>
                <div class="links">
                    <div class="col-md-6 highlighted left-link">
                        <a href="mailto:info@outsidervc.com" class='mail-link'>
                            info&#64;outsidervc.com
                        </a>
                    </div>
                    <div class="col-md-6 highlighted right-link">
                        <a href='http://twitter.com/outsidervc' target='_blank' class='twitter-link'>
                            &#64;outsidervc
                        </a>
                    </div>
                </div>
            </div>
            <div id='main_content_right' class="col-sm-6 contact-us">
                <div id="contact_form_wrapper" style="display: block;">
                    <h4>CONTACT US</h4>
                    <form name="contact_form" action="contact-submit.php" method='POST' onsubmit="return submitMessage()">
                        <div class="form-group">
                            <label for="fullname" class="sr-only">Your Name</label>
                            <input type="text" name="fullname" id='fullname' placeholder="Your Name" required/>
                        </div>
                        <div class="form-group">
                            <label for="email" class="sr-only">Your eMail</label>
                            <input type="email" name="email" id='email' placeholder="name&#64;youremail.com" required/>
                        </div>
                        <div class="form-group">
                            <label for="message" class="sr-only">Your Message</label>
                            <textarea name="message" id="message" rows="1" placeholder='Your Message' data-autoresize required></textarea>
                        </div>
                        <div class="form-group">
                            <input id="contact_submit_btn" class='button' type="submit" value="Submit" />
                        </div>
                    </form>
                </div>

                <div id='contact_submit_msg_wrapper' class="col-sm-6" style='display: none;'>
                    Thanks for your message!  We'll be in touch as soon as possible.
                </div>
            </div>
        </div>
    </main>

    <footer class="container-fluid text-center">
        <p>&copy; Copyright Outsider Capital 2015</p>
    </footer>

<script>

$(document).ready(function() {
    $.each($('textarea[data-autoresize]'), function() {
        var offset = this.offsetHeight - this.clientHeight;

        var resizeTextarea = function(el) {
            $(el).css('height', 'auto').css('height', el.scrollHeight + offset);
        };
        $(this).on('keyup input', function() { resizeTextarea(this); }).removeAttr('data-autoresize');
    });
});

function submitMessage(e) {

    var url      = "contact-submit.php";
    var fullname = $('input[name="fullname"]').val();
    var email    = $('input[name="email"]').val();
    var message  = $('#message').val();

    var data = {
        fullname:    fullname,
        email:       email,
        message:     message
    };

    $('#contact_submit_btn').val("Sending ...");
    $('#contact_submit_btn').prop('disabled', true);

    setTimeout(function() {

        $.ajax({
            url:  url,
            type: "POST",
            data: data,
            success: function (response) {

                $('#contact_form_wrapper').hide();
                $('#contact_submit_msg_wrapper').show();

                setTimeout(function(){

                    $('input[name="fullname"]').val('');
                    $('input[name="email"]').val('');
                    $('#message').val('');

                    $('#contact_submit_msg_wrapper').hide();
                    $('#contact_form_wrapper').fadeIn();
                    $('#contact_submit_btn').val("Submit");
                    $('#contact_submit_btn').prop('disabled', false);
                }, 10000);
            },
            error: function(response) {
                alert("Error encountered while submitting. Please try again.");
                $('#contact_submit_btn').val("Submit");
                $('#contact_submit_btn').prop('disabled', false);
            }
        });

    }, 1000);

    return false;
}
</script>

</body>
</html>