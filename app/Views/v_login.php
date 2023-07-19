<!DOCTYPE html>
<!-- Created by CodingLab |www.youtube.com/c/CodingLabYT-->
<html lang="en" dir="ltr">

<head>
  <meta charset="UTF-8">
  <!--<title> Login and Registration Form in HTML & CSS | CodingLab </title>-->
  <link rel="stylesheet" href="<?= base_url('assets') ?>/css/style.css">
  <!-- Fontawesome CDN Link -->
  <link rel=" stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
</head>

<body>
  <div class="container">
    <input type="checkbox" id="flip">
    <div class="cover">
      <div class="front">
        <img src="<?= base_url('assets') ?>/images/hanna_caffe.png" alt="">
        <div class="text">
          <span class="text-1">Let's go to <br> Order Now!</span>
          <span class="text-2">Let's get Login</span>
        </div>
      </div>

    </div>
    <div class="forms">
      <div class="form-content">
        <div class="login-form">
          <div class="title">Login</div>


          <form action="<?= base_url('/login') ?>" method="post">
            <div class="input-boxes">

              <div class="input-box">
                <i class="fas fa-envelope"></i>
                <input type="text" name="username" type="username" class="form-control" placeholder="Username" required>
              </div>

              <div class="input-box">
                <i class="fas fa-lock"></i>
                <input type="password" name="password" type="password" class="form-control" placeholder="password" required>
              </div>


              <div class="button input-box">
                <input type="submit" value="Login">
              </div>


            </div>
          </form>
        </div>


      </div>
    </div>
  </div>
</body>

</html>