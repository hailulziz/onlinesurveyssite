<?php 
session_start();

	include("database.php");

  // Check if the user is logged in
  if (!isset($_SESSION['user_id'])) {
    // Redirect to login page or display an error message
    header('Location: login.php');
    exit();
  }

  // Retrieve user information from the database based on the user's ID
  $user_id = $_SESSION['user_id'];
  $integerVariable = intval($user_id);
  $query = "SELECT * FROM users WHERE user_id = '$integerVariable'";
  $result = mysqli_query($conn, $query);
  

  // Check if the query was successful
  if ($result && mysqli_num_rows($result) > 0) {
    // Fetch user data
    $user = mysqli_fetch_assoc($result);
  } else {
    echo "User not found or database query failed.";
  }
?>

<!DOCTYPE html> 
<html>
    <head>
        <title>Money Hour</title>
        <link rel="icon" type="image/x-icon" href="images/sitelogo.jfif">
        <meta name="description" content="This website helps people make money online in a fast and easy way without much hussle through online surveys, fun games and saving money.">
        <meta name="robots" content="index, follow" />
        <meta charset="UTF-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1.0" />
        <meta name="keywords" content="money, how to make money online, how to make money, make money online, money in the bank 2023, how to make money from home, how to save money, ways to make money online, ways to make money, money for nothing, make money from home, $200 no deposit bonus 200 free spins real money, how to make extra money, ways to make money from home, easy ways to make money, earn money online, pennies worth money, ways to make extra money, where can I get money, ">
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">
        <link href="styles.css" rel="stylesheet">
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
    </head>

    <body>
      <nav class="navbar navbar-expand-sm bg-primary navbar-light">
        <div class="container-fluid">
          <a class="navbar-brand" href="#">
            <img src="images/sitelogo.jfif" alt="Logo" style="width:40px;" class="rounded-pill"> 
          </a>
        </div>
        <div class="container-fluid">
          <ul class="navbar-nav">
            <li class="nav-item nav-li">
              <h3 style="margin-top: 10px; border: 1px solid red; color: #dba717; background-color: black; width: 150px;" id="earnings"></h3>
            </li>
            <li class="nav-item nav-li">
              <a class="nav-link" href="index.html" style="font-size: 20px;">Homepage</a>
            </li>
            <li class="nav-item nav-li">
              <a class="nav-link" href="surveys.html" style="font-size: 20px;">Surveys</a>
            </li>
            <li class="nav-item nav-li">
              <a class="nav-link" href="games.html" style="font-size: 20px;">Games</a>
            </li>
            <li class="nav-item nav-li">
              <a class="nav-link" href="contests.html" style="font-size: 20px;">Contests</a>
            </li>
            <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown">
                    <img src="images/avatar.jfif" alt="Avatar" style="width:40px;" class="rounded-pill">
                </a>
                <ul class="dropdown-menu">
                  <li><a class="dropdown-item" href="myprofile.php">My profile</a></li>
                  <li><a class="dropdown-item" href="settings.php">Settings</a></li>
                  <li><a class="dropdown-item" href="checkout.html">Checkout</a></li>
                  <li><a class="dropdown-item" href="logout.html">Logout</a></li>
                </ul>
              </li>
          </ul>
        </div>
      </nav>

      <section id="profile">
        <?php 
          $imagePath = $user['avatar'];
            echo "<img src='$imagePath' alt='avatar' class='settings-avatar' style='border: 1px solid black; border-radius: 50%; margin-left: 40%;'>";
        ?>
        <div class="profile-element">
          <h3>Username</h3>
          <p><?php echo $user['full_name']; ?></p>
        </div>
        <div class="profile-element">
          <h3>Email</h3>
          <p><?php echo $user['email']; ?></p>
        </div>
        <div class="profile-element">
          <h3>Mobile number</h3>
          <p><?php echo $user['mobile_number']; ?></p>
        </div>
        <div class="profile-element">
          <h3>Country</h3>
          <p><?php echo $user['country']; ?></p>
        </div>
      </section>
        
      <footer class="bg-primary text-white text-center text-lg-start">
        <!-- Section: Social media -->
        <div class="d-flex flex-row justify-content-between p-4 border-bottom" style="margin: 0 50px;">
          <!-- Left -->
          <div class="d-none d-lg-block p-2" style="font-size: 30px;">
            <span>Get connected with us on social networks:</span>
          </div>
          <!-- Left -->
    
          <!-- Right -->
          <div class=" p-2">
            <!-- Youtube -->
            <a
              data-mdb-ripple-init
              class="btn text-white btn-floating me-4 text-reset"
              style="background-color: #e21f1f;"
              href="https://www.youtube.com/channel/UClG_X00mgxoPIysOWGMGZmw"
              role="button"
              target="_blank"
              ><i class="fab fa-youtube"></i
            ></a>
    
            <!-- Twitter -->
            <a
              data-mdb-ripple-init
              class="btn text-white btn-floating me-4 text-reset"
              style="background-color: #55acee;"
              href="https://twitter.com/MoneyFirst45"
              role="button"
              target="_blank"
              ><i class="fab fa-twitter"></i
            ></a>
    
            <!-- Instagram -->
            <a
              data-mdb-ripple-init
              class="btn text-white btn-floating me-4 text-reset"
              style="background-color: #000000;"
              href="https://www.tiktok.com/@moneyfirst4558"
              role="button"
              target="_blank"
              ><i class="fab fa-tiktok"></i
            ></a>
    
            <!-- Instagram -->
            <a
              data-mdb-ripple-init
              class="btn text-white btn-floating me-4 text-reset"
              style="background-color: #f1169e;"
              href="#!"
              role="button"
              target="_blank"
              ><i class="fab fa-instagram"></i
            ></a>
    
    
          </div>
          <!-- Right -->
        </div>
        <!-- Section: Social media -->
    
        <!-- Grid container -->
        <div class="container p-4">
          <!--Grid row-->
          <div class="row">
            <!--Grid column-->
            <div class="col-lg-4 col-md-6 mb-4 mb-md-0">
              <h5 class="text-uppercase">Contact Us</h5>
      
              <div class="list-unstyled mb-0">
                  <address class="d-flex flex-column">
                      <span>By email at: <a href="mailto:muthonihailuhannah@gmail.com" style="color: white;">muthonihailuhannah@gmail.com</a></span>
                      <span>By phone using: <a href="tel:+245703947330" style="color: white;">+245703947330</a></span>
                  </address>
              </div>
            </div>
            <!--Grid column-->
      
            <!--Grid column-->
            <div class="col-lg-4 col-md-6 mb-4 mb-md-0">
              <h5 class="text-uppercase">Legal</h5>
      
              <ul class="list-unstyled mb-0">
                <li>
                  <a href="#!" class="text-white" target="_blank">Privacy Policy</a>
                </li>
                <li>
                  <a href="#!" class="text-white" target="_blank">Terms of Use</a>
                </li>
                <li>
                  <a href="#!" class="text-white" target="_blank">Your Cookies Choices</a>
                </li>
                <li>
                  <a href="#!" class="text-white" target="_blank">Advertising Disclosure</a>
                </li>
              </ul>
            </div>
            <!--Grid column-->
      
            <!--Grid column-->
            <div class="col-lg-4 col-md-6 mb-4 mb-md-0">
              <h5 class="text-uppercase mb-0">Links</h5>
      
              <ul class="list-unstyled">
                <li>
                  <a href="#!" class="text-white" target="_blank">About Us</a>
                </li>
                <li>
                  <a href="#!" class="text-white" target="_blank">Blog</a>
                </li>
                <li>
                  <a href="#!" class="text-white" target="_blank">How It Works</a>
                </li>
                <li>
                  <a href="#!" class="text-white" target="_blank">Do's and Don'ts</a>
                </li>
              </ul>
            </div>
            <!--Grid column-->
          </div>
          <!--Grid row-->
        </div>
        <!-- Grid container -->
      </footer>

      <!--Script-->
      <script src="script.js"></script>
    </body>
</html>