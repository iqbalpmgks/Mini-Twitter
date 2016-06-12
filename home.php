<?php
include 'koneksi.php';
session_start();
if (isset($_SESSION['id'])) {

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

    <body>
      <nav class="white" role="navigation">
          <div class="nav-wrapper container">
            <a id="logo-container" href="#" class="brand-logo black-text thin">Minify Twitter</a>
            <ul class="right hide-on-med-and-down black-text">
              <li><a href="home.php" class="black-text">HOME</a></li>
              <li><a href="logout.php" class="black-text">LOGOUT</a></li>
            </ul>

            <ul id="slide-out" class="side-nav">
              <li><a href="home.php">HOME</a></li>
              <li><a href="logout.php">LOGOUT</a></li>
            </ul>
            <a href="#" data-activates="slide-out" class="button-collapse black-text"><i class="material-icons">menu</i></a>
          </div>
      </nav>

      <!--Body-->
      <div class="section no-pad-bot" id="index-banner">
        <div class="container">
          <div class="thin"><h6><b>Welcome, <?php echo $_SESSION['id']; ?>.</b></h6></div>
          <br>
          <form action="action.php" method="POST">
            <div class="input-field col s12">
              <i class="material-icons prefix">comment</i>
              <textarea id="textarea1" class="materialize-textarea" name="pesan" length="140"></textarea>
              <label for="textarea1">What's happening?</label>
            </div>
          </br>
        <div class="row center">
          <button class="btn waves-effect waves-light" type="submit" name="submit">Tweet</button>
        </div>
      </form>

      <!--Show Data On Dashboard-->
      <?php
      $get = mysql_query("SELECT * FROM tweet ORDER BY id DESC");
      while ($tampil=mysql_fetch_array($get)) {
      ?>
      <div class="section">
	       <div class="row">
		         <div class="col s12">
                  <div class="divider"></div>
                  <?php echo $tampil['user']; ?><p><?php echo $tampil['konten'] ?></p>

                  <div class="thin"><?php echo $tampil['tgl']?></div>
                  <div class="right-align">
                    <a href="delete.php?konten=<?php echo $tampil['konten']; ?>" title="Delete"><i class="material-icons">delete</i></a></div>

                  <div class="divider"></div>
              </div>
	        </div>
          <?php } ?>
      <!--End of Body-->

      <!--Footer-->
      <footer>
        <div class="row center">
        Copyright &copy; 2016. All right reserved.
      <!--End of Footer-->

     </div>
    </body>
  </html>

<?php
} else {
  echo "<script>alert('Ups.. Silahkan login kembali!');window.location='index.php';</script>";
}
?>
