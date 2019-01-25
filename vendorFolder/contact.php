<?php
    session_start();
    require_once '../helpers/security.php';
    // echo e('<script>alert(1);</script>');

    // print_r($_SESSION);

    //if errors are set we wan tto assign the arrays procurred to the current array of eererrosrors, otherewise set an empty array
    $errors = isset($_SESSION['errors']) ? $_SESSION['errors'] : [];
    $fields = isset($_SESSION['fields']) ? $_SESSION['fields'] : [];
    $thanks = isset($_SESSION['thanks']) ? $_SESSION['thanks'] : '';

            
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta name="description" content="Feel free to contact the massage therapist. Prompt replies.">
    <meta name="keywords" content="Massage Therapy, therapy, massage, masseuse, bodywork, relief, therapist, health, acupressure, reflexology, swedish massage, trigger point therapy, zen shiatsu, abmp, professional, associated bodywork & massage professions, benefits, learn, age-fighting">
    <meta name="author" content="Vinci Allen-Steward">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="subject" content="Massage Therapy | Bodywork">
    <meta name="owner" content="Maki Evans">
    <meta name="page-title" content="Contact">
    <meta name="theme-color" content="#ff7b00">

    <title>Inquiry about massage? Back-ache? Migraine? Ask the masseuse| Kneaded Relief </title>
    <!-- <title>Contact</title> -->
    <!--LINKS TO INTERNAL FILES-->
    <link rel="stylesheet" href="../assets/css/styles.css">
    <link rel="stylesheet" href="../assets/css/alt.css">
    <link rel="stylesheet" href="../assets/css/images.css">
    <link rel="stylesheet" href="../assets/css/media.css">
    <script src="../assets/js/app.js"></script>
    <link rel="shortcut icon" href="../assets/images/icons/icons8-stones-64.png" type="image/x-icon">
    <!--FONTS-->
    <link href="https://fonts.googleapis.com/css?family=Arizonia" rel="stylesheet">
    <!-- ANIAMTE.CSS -->
    <link rel="stylesheet" href="animate.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/3.7.0/animate.min.css">
    <!-- JQUERY -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <!-- reCAPTCHA -->
    <script src="https://www.google.com/recaptcha/api.js" async defer></script>


</head>
<body>
    <div id="basin">
        <section class="navbar">
            <div>
                <a class="nav-title">Kneaded Relief</a>
                <span id="cheeseburger" style="font-size:30px;cursor:pointer" onclick="openClose()">&#9776;</span>
            </div>
        </section>
        <nav class="overlay" id="myNav">
            <div>
                <ul class="overlay-content">
                    <li>
                        <a id="close" style="float: right; width: 90px; margin-right: 20px; height: 20px; border-radius: 25px; font-family: 'Josefin Sans', sans-serif;" onclick="openClose()">&times;</a>
                    </li>
                    <br>
                    <br>
                    <li><a href="../index.html">Home</a></li>
                    <li><a href="../services.html">Services</a></li>
                    <li><a href="../hours.html">Hours & Scheduling</a></li>
                    <li><a href="./vendorFolder/contact.php">Contact</a></li>
                    <li><a href="../about.html">About</a></li>
                    <li><a href="../benefits.html">Benefits</a></li>
                    <li><a href="../faq.html">FAQ</a></li>
                    <li>
                        <a href="https://www.abmp.com/">
                            <img class="member-icon" src="../assets/images/icons/abmp-only.png" alt="ABMP site">
                        </a>
                    </li>
                    <!-- <li><a href="../cForms.html">Client Forms</a></li> -->
                </ul>
            </ul>
        </div>
        </nav>
        <header>                    
            <h1 class="title">Contact Me</h1>
        </header>
        <section class="box-2 contact-box">
            <div class="contact">
                <?php if(empty($errors)): ?>
                    <p style="color: #3bc2bc; font-family: 'Arizonia', cursive; font-size: 30px; text-shadow: 5px 5px 10px #3c78a3;"><?php echo $thanks; ?></p>
                <?php endif; ?>

                <?php if(!empty($errors)): ?>
                    <div>
                        <!-- implode function = takes an array, takes it out of the array and joins it by a string -->
                        <ul style="padding: 10px; border: outset; border-radius: 100px; font-family: 'Josefin Sans', sans-serif; text-align: center; color: red; background-color: #eee;"><p><?php echo implode('</p><p> ', $errors); ?></p></ul>
                    </div>
                <?php endif; ?>
            <!-- The action="contact.php" bit tells the page to send the form’s content to itself when the form is submitted -->
            <!-- return false= stops the normal behavior that usually that usually happens when a person submits  a form -->
            <!-- //action is being sent to this page via the server super global -->
                <form id="contact-logic" method="post" action="contact-logic.php">
                    <!-- https://developers.google.com/recaptcha/docs/display -->
                    <p class="full" >
                        <label for="subject">Subject Matter</label>
                        <select id="s" name="subject">
                            <option value="appointment">Appointment Inquiry</option>
                            <option value="question">Question/More Information</option>
                            <option value="testimonial">Submit a Testimonial</option>
                            <option value="join">Join Mailing List</option>
                            <option value="other">Other</option>
                        </select>
                    </p>
                    <p>
                        <label for="first-name">First Name</label>
                        <input id="fn" type="text" name="first_name" placeholder="First Name" <?php echo isset($fields['first_name']) ? 'value="'.e($fields['first_name']).'"' : '' ?> >
                    </p>
                    <p>
                        <label for="last-name">Last Name</label>
                        <input id="ln" type="text" name="last_name" placeholder="Last Name" <?php echo isset($fields['last_name']) ? 'value="'.e($fields['last_name']).'"' : '' ?> >
                    </p>
                    <p class="full">
                        <label for="message">Message</label>
                        <textarea id="m" type="text" name="message" rows="5" placeholder="Write your Message here..." ><?php echo isset($fields['message']) ? e($fields['message']) : '' ?></textarea>
                    </p>
                    <p class="full">Please enter at least one way we can contact</p>
                    <p>
                        <label for="phone">Phone Number</label>
                        <input id="p" type="text" name="phone" placeholder="Format: 123-456-7890" pattern="[0-9]{3}-[0-9]{3}-[0-9]{4}" <?php echo isset($fields['phone']) ? e($fields['phone']) : '' ?> >
                    </p>
                    <p>
                        <label for="email">Email Address</label>
                        <input id="e" type="email" name="email" placeholder="Email Address" <?php echo isset($fields['email']) ? e($fields['email']) : '' ?> >
                    </p>
                    <p class="full">Indicate how you would like to be contacted
                    </p>
                    <p class="full">
                        <label class="preference">
                            <input id="pPref" type="radio" name="preference" value="phone" checked>
                            <img src="../assets/images/icons/phone.png" alt="Phone">
                        </label>
                        <label class="preference">
                            <input id="ePref" type="radio" name="preference" value="email">
                            <img src="../assets/images/icons/email.png" alt="Email">
                        </label>
                    </p>
                    <p class="full">
                        <button id="submitForm" type="submit" name="submit" class="submit animated">Submit</button>
                    </p>
                </form>
                <br>
            </div>
        </section>
        <div id="box-4">
            <button id="reserve">
                <a href="https://squareup.com/appointments/book/NWK5QMSG0C50D/kneaded-relief"><span>Reserve An Appointment</span></a>
            </button>
        </div>
    </div>
    <footer>
        <div>
            <a href="https://www.abmp.com/"><img class="member-icon" src="../assets/images/icons/abmp2.png" alt="Link to the Associated Bodywork & Massage Professionals website">
            </a>
            <p>&copy; Copyright 2018 Surreal Sensations. All rights reserved. </p>
            <small class="imprint" style="text-decoration: none;">
                <div>Icons made by <a href="https://www.flaticon.com/authors/popcorns-arts" title="Icon Pond">Icon Pond </a> and <a href="https://www.freepik.com/" title="Freepik">Freepik</a> from <a href="https://www.flaticon.com/" title="Flaticon">www.flaticon.com</a> is licensed by <a href="http://creativecommons.org/licenses/by/3.0/" title="Creative Commons BY 3.0" target="_blank">CC 3.0 BY</a></div>
            </small>
        </div>
    </footer>
    <script>
        $(document).ready(function(){
            $('.box-2').addClass('bounceIn');
            $(".submit").click(function(){
                $('.container').addClass('rubberBand');
                window.stop();
    
            })
        })
        //just give you the capability of calling the getElementBy id without having to write it out a whole bunch of times, now we can just use the underscore(_)
        function _(id){
            return document.getElementById(id);
        }


    
    </script>
</body>
</html>

<!-- so the errors wont continue if the errors have been seen and the person resubmits the form -->
<?php
    //kills all of the sessions; would be optimal for logout
    // session_destroy();
    //kills specific data in session
    unset($_SESSION['errors']);
    unset($_SESSION['fields']);
    unset($_SESSION['thanks']);

?>