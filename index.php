<?php
include 'koneksi.php';
session_start();

if (isset($_POST['submit'])) {
  $id   = $_POST['id'];
  $pass = $_POST['pass'];

  /* Defense SQL Injection */
  $id   = stripslashes($id);
  $pass = stripslashes($pass);
  $id   = mysql_real_escape_string($id);
  $pass = mysql_real_escape_string($pass);

  $login = mysql_query("SELECT * FROM login WHERE id='$id' AND pass='$pass'");
  $data = mysql_num_rows($login);

  if ($data == 1) {
    session_start();
    $_SESSION['id'] = $id;
      header("location: home.php");
    } else {
      echo "<script>alert('Maaf.. ID dan Password yang Anda masukan salah!');window.location='index.php';</script>";
  }
}
?>

<!DOCTYPE html>
  <html>
    <head>
      <!--Import Google Icon Font-->
      <link href="css/materialicon.css" rel="stylesheet">
      <!--Import materialize.css-->
      <link type="text/css" rel="stylesheet" href="css/materialize.min.css"  media="screen,projection"/>
      <link type="text/css" rel="stylesheet" href="css/materialize.css"  media="screen,projection"/>
      <!--Import jQuery before materialize.js-->
      <script type="text/javascript" src="jquery/jquery.js"></script>
      <script type="text/javascript" src="js/materialize.min.js"></script>
      <!--Let browser know website is optimized for mobile-->
      <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
    </head>

    <!--Body-->
    <body>
      <div class="container">
        <div class="row">
          <div class="col s12 m6">
              <h2 class="thin">Minify Twitter</h2>
              <p>Selamat datang di <b>Minify Twitter</b>. Website ini dibuat untuk memenuhi tugas Pemrograman Web yang berkaitan dengan Sosial Media.
                Pada kesempatan kali ini saya ditugaskan untuk membuat jejaring sosial media Twitter tetapi dengan versi <b>Mini</b>.
                Menggunakan framework Materialize CSS dan bahasa Pemrogaman PHP, website ini masih memiliki beberapa keterbatasan.
                Apabilan kalian ingin berkontribusi mengembangkan lebih lanjut, silahkan kunjungin link berikut:</br></br>
                Github: <a href="https://github.com/iqbalpmgks">https://github.com/iqbalpmgks</a> </br>
                Blog 1: <a href="https://suaiq.blogspot.com/">https://suaiq.blogspot.com/ </a> </br>
                Blog 2: <a href="https://dokumentasiharian.blogspot.com/">https://dokumentasiharian.blogspot.com/ </a></p>
            </div>
            <div class="col s12 m6">
              <h2 class="center-align thin">Login</h2>
              <div class="row">
                  <form action="index.php" method="POST" class="col s12" >
                    <p class="center-align">
                      <div class="row">
                          <div class="input-field col s12">
                              <input type="text" name="id" placeholder="Username" id="username" required>
                              <label for="email">Username</label>
                          </div>
                      </div>
                      <div class="row">
                          <div class="input-field col s12">
                              <input type="Password" name="pass" placeholder="Password" id="password" required>
                              <label for="pass">Password</label>
                          </div>
                      </div>
                     <div class="row">
                          <div class="col m12">
                              <p class="right-align">
                                <input type="submit" name="submit" class="btn waves-effect waves-light" value="Login" />
                              </p>
                          </div>
                     </div>
                   </form>
            </div>
        </div>
    </div>
    <!--End of Body-->

    <!--Footer-->
        <footer>
          <div class="row center">
            Copyright &copy; 2016. All right reserved.
          </div>
    <!--End of Footer-->

      </div>
    </body>
  </html>
