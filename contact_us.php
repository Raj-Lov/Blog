<?php include_once 'inc/header.php';?>
  
  <!--================ Hero sm banner start =================-->  
  <section class="mb-30px">
    <div class="container">
      <div class="hero-banner hero-banner--sm">
        <div class="hero-banner__content">
          <h1>Contact Us</h1>
          <nav aria-label="breadcrumb" class="banner-breadcrumb">
            <ol class="breadcrumb">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active" aria-current="page">Contact Us</li>
            </ol>
          </nav>
        </div>
      </div>
    </div>
  </section>
  <!--================ Hero sm banner end =================-->  


  <!-- ================ contact section start ================= -->
  <section class="section-margin--small section-margin">
    <div class="container">
      <?php
        // send message process starts
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
          $name = $formatObj->validation($_POST['name']); 
          $email = $formatObj->validation($_POST['email']); 
          $subject = $formatObj->validation($_POST['subject']); 
          $message = $formatObj->validation($_POST['message']); 

          $name = $dbObj->link->real_escape_string($name);
          $email = $dbObj->link->real_escape_string($email);
          $subject = $dbObj->link->real_escape_string($subject);
          $message = $dbObj->link->real_escape_string($message);

          $nameerror = $emailerror = $subjecterror = $messageerror = $success_message = "";
          $validate = true ;

          if (empty($name)) {
            $nameerror = "<span class='error'>Name shouldn't be empty!</span>";
            $validate = false ;
          }
          else{
            $name ;
          }
          if (empty($email)) {
            $emailerror = "<span class='error'>Email shouldn't be empty!</span>"; 
            $validate = false ;
          }
          else if(!filter_var($email,FILTER_VALIDATE_EMAIL)){
            $emailerror = "<span class='error'>Invalid email input!</span>";
            $validate = false;
          }
          else{
            $email ;
          }
          if (empty($subject)) {
            $subjecterror = "<span class='error'>Subject shouldn't be empty!</span>";
            $validate = false ;
          }
          else{
            $subject ;
          }
          if (empty($message)) {
            $messageerror = "<span class='error'>Message shouldn't be empty!</span>";
            $validate = false ;
          }
          else if($validate == true ){
            $query = "INSERT INTO tbl_contacts(name, email, subject, message) VALUES( '$name','$email','$subject','$message') ";
              $inserted_rows = $dbObj->create($query);
              if ($inserted_rows) {
                $success_message = "<span class='success'>Message sent successfully!
               </span>";
               $name = $email = $subject = $message = "" ;
              }
              else{
                $error = "<span class='error'>Message sending failed!.
               </span>";
              }
        
          }
          

        }
      ?>
      <div class="row">
        <div class="col-md-4 col-lg-3 mb-4 mb-md-0">
          <div class="media contact-info">
            <span class="contact-info__icon"><i class="ti-home"></i></span>
            <div class="media-body">
              <h3>California United States</h3>
              <p>Santa monica bullevard</p>
            </div>
          </div>
          <div class="media contact-info">
            <span class="contact-info__icon"><i class="ti-headphone"></i></span>
            <div class="media-body">
              <h3><a href="tel:454545654">00 (440) 9865 562</a></h3>
              <p>Mon to Fri 9am to 6pm</p>
            </div>
          </div>
          <div class="media contact-info">
            <span class="contact-info__icon"><i class="ti-email"></i></span>
            <div class="media-body">
              <h3><a href="mailto:support@colorlib.com">support@colorlib.com</a></h3>
              <p>Send us your query anytime!</p>
            </div>
          </div>
        </div>
        <div class="col-md-8 col-lg-9">
          <form action="" class="form-contact contact_form" method="POST">
            <div class="row">
              <div class="col-lg-5">
                <div class="form-group">
                  <input value="<?php if (isset($name)){echo $name;} {
                    # code...
                  }?>" class="form-control" name="name" id="name" type="text" placeholder="Enter your name">
                  <?php if(isset($nameerror)){ echo $nameerror; } ?>
                </div>
                <div class="form-group">
                  <input value="<?php if (isset($email)){echo $email;} {
                    # code...
                  }?>" class="form-control" name="email" id="email" placeholder="Enter email address">
                  <?php if(isset($emailerror)){ echo $emailerror; } ?>
                </div>
                <div class="form-group">
                  <input value="<?php if (isset($subject)){echo $subject;} {
                    # code...
                  }?>" class="form-control" name="subject" id="subject" type="text" placeholder="Enter Subject">
                  <?php if(isset($subjecterror)){ echo $subjecterror; } ?>
                </div>
              </div>
              <div class="col-lg-7">
                <div class="form-group">
                    <textarea class="form-control different-control w-100" name="message" id="message" cols="30" rows="5" placeholder="Enter Message"></textarea>
                    <?php if(isset($messageerror)){ echo $messageerror; } ?>
                    <?php if(isset($success_message)){ echo $success_message; } ?>
                </div>
              </div>
            </div>
            <div class="form-group text-center text-md-right mt-3">
              <button type="submit" class="button button--active button-contactForm">Send Message</button>
            </div>
          </form>
        </div>
      </div> <br> <hr> <br>

      
        <div class="d-none d-sm-block mb-5 pb-4">
          <div id="map" style="height: 420px;"></div>
          <script>
            function initMap() {
              var uluru = {lat: -25.363, lng: 131.044};
              var grayStyles = [
                {
                  featureType: "all",
                  stylers: [
                    { saturation: -90 },
                    { lightness: 50 }
                  ]
                },
                {elementType: 'labels.text.fill', stylers: [{color: '#A3A3A3'}]}
              ];
              var map = new google.maps.Map(document.getElementById('map'), {
                center: {lat: -31.197, lng: 150.744},
                zoom: 9,
                styles: grayStyles,
                scrollwheel:  false
              });
            }
            
          </script>
          <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyDpfS1oRGreGSBU5HHjMmQ3o5NLw7VdJ6I&callback=initMap"></script>
          
        </div>
    </div>
  </section>
	<!-- ================ contact section end ================= -->


<?php include_once 'inc/footer.php'?>