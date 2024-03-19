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
        <meta http-equiv="X-UA-Compatible" content="ie=edge">
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">
        <link href="styles.css" rel="stylesheet">
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
        <script src="https://code.iconify.design/3/3.1.0/iconify.min.js"></script>
        <style>
          #avatar-settings-box{
            border-radius: 50%;
            margin-left: 40%;
          }

          .profile-element-form>input, .profile-element-form>select{
            border: 1px solid black;
            background-color: #f0eaea;
            width: 90%;
            height: 35px;
            padding: 5px;
            border-radius: 5px;
            margin-bottom: 15px;
          }
          .profile-element-form{
            width: 70%;
            margin-left: 15%;
            margin-top: 20px;
            display: none;
          }
          :root {
            --primary: #111;
            --secondary: #fd0;
          }	

          * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
          }

          .select-box {
            border: 1px solid black;
            height: fit-content;
            border-radius: 10px;
            width: 90%;
          }

          .select-box input {
            width: 100%;
            padding: 1rem .6rem;
            font-size: 1.1rem;
            border: .1rem solid transparent;
            outline: none;
          }

          input[type="tel"] {
            border-radius: 0 .5rem .5rem 0;
          }

          .select-box input:focus {
            border: .1rem solid var(--primary);
          }

          .selected-option {
            background-color: #eee;
            border-radius: .5rem;
            overflow: hidden;
            display: flex;
            justify-content: space-between;
            align-items: center;
          }

          .selected-option div{
            position: relative;
            width: 6rem;
            padding: 0 2.8rem 0 .5rem;
            text-align: center;
            cursor: pointer;
          }

          .selected-option div::after{
            position: absolute;
            content: "";
            right: .8rem;
            top: 50%;
            transform: translateY(-50%) rotate(45deg);
            width: .8rem;
            height: .8rem;
            border-right: .12rem solid var(--primary);
            border-bottom: .12rem solid var(--primary);
            transition: .2s;
          }

          .selected-option div.active::after{
            transform: translateY(-50%) rotate(225deg);
          }

          .select-box .options {
            position: relative;
            top: 1rem;  
            width: 100%;
            background-color: #fff;
            border-radius: .5rem;

            display: none;
          }

          .select-box .options.active {
            display: block;
          }

          .select-box .options::before {
            position: absolute;
            content: "";
            left: 1rem;
            top: -1.2rem;
            width: 0;
            height: 0;
            border: .6rem solid transparent;
            border-bottom-color: var(--primary);
          }

          input.search-box {
            background-color: var(--primary);
            color: #fff;
            border-radius: .5rem .5rem 0 0;
            padding: 1.4rem 1rem;
          }

          .select-box ol {
            list-style: none;
            max-height: 23rem;
            overflow: overlay;
          }

          .select-box ol::-webkit-scrollbar {
            width: 90%;
          }

          .select-box ol::-webkit-scrollbar-thumb {
            width: 90%;
            height: 3rem;
            background-color: #ccc;
            border-radius: .4rem;
          }

          .select-box ol li {
            padding: 1rem;
            display: flex;
            justify-content: space-between;
            cursor: pointer;
          }

          .select-box ol li.hide {
            display: none;
          }

          .select-box ol li:not(:last-child) {
            border-bottom: .1rem solid #eee;
          }

          .select-box ol li:hover {
            background-color: lightcyan;
          }

          .select-box ol li .country-name {
            margin-left: .4rem;
          }

          #avatar-container{
            position: absolute;
            height: fit-content;
            width: 80%;
            margin-left: 10%;
            top: 100px;
            background: white;
            display: flex;
            flex-direction: column;
            padding: 10px;
            justify-content: space-around;
            border: 2px solid black;
            display: none;
          }

          #avatar-container *{
            margin: 10px;
          }

          #avatar-container-div *{
            border: 1px solid black;
            border-radius: 50%;
          }
        </style>
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

    <section id="settings">
      <div id="avatar-settings-box">
        <?php 
        $imagePath = $user['avatar'];
          echo "<img src='$imagePath' alt='avatar' class='settings-avatar' style='border: 1px solid black; border-radius: 50%;'>";
        ?>
        <button id="edit-button-avatar" onclick="openAvatarPopup()">Edit</button>
      </div>

      <?php
        var_dump($user['avatar']);
          if (isset($_POST["submitzero"])) {
            $avatar = $_POST["image"];
            $errors = array();
            if(empty($avatar)){
              array_push($errors,"All fields are required");
            }

            if (count($errors)>0) {
              foreach ($errors as  $error) {
                  echo "<div class='alert alert-danger'>$error</div>";
              }
            }else{
              // SQL query to update the full_name column for the specified user_id
              $sql = "UPDATE users SET avatar = ? WHERE user_id = ?";
              
              // Prepare the SQL statement
              $stmt = mysqli_stmt_init($conn);
              if (mysqli_stmt_prepare($stmt, $sql)) {
                  // Bind parameters and execute the statement
                  mysqli_stmt_bind_param($stmt, "si", $avatar, $user_id);
                  mysqli_stmt_execute($stmt);

                  if (mysqli_stmt_affected_rows($stmt) > 0) {
                    echo "<div class='alert alert-success'>Refresh to view changes</div>";
                  }
              } else {
                  echo "<div class='alert alert-danger'>Error: " . mysqli_error($conn) . "</div>";
              }
            }
          }
        ?>

      <form id="avatar-container" method="post">
        <div id="avatar-container-div" style="display: flex; flex-direction: row; flex-wrap: wrap;">
          <input type="hidden" id="selectedImage" name="image" value="">
          <img src="images/lion.jfif" alt="Image 1" id="imgone" onclick="selectImage('images/lion.jfif')"><br>
          <img src="images/cheetah.jfif" alt="Image 2" id="imgtwo" onclick="selectImage('images/cheetah.jfif')"><br>
          <img src="images/cougar.jfif" alt="Image 3" id="imgthree" onclick="selectImage('images/cougar.jfif')"><br>
          <img src="images/leopard.jfif" alt="Image 4" id="imgfour" onclick="selectImage('images/leopard.jfif')"><br>
          <img src="images/panther.jfif" alt="Image 5" id="imgfive" onclick="selectImage('images/panther.jfif')"><br>
          <img src="images/tiger.jfif" alt="Image 6" id="imgsix" onclick="selectImage('images/tiger.jfif')"><br>
        </div>
        <input type="submit" name="submitzero" value="Submit" style="width: 90%; margin-left: 5%;">
      </form>
      <div class="profile-element">
        <h3>Username</h3>
        <p class="profile-pelement"><?php echo $user['full_name']; ?></p> 
        <button class="edit-button" onclick="editPopup(0)">Edit</button>
      </div>
      <?php
          if (isset($_POST["submitone"])) {
            $fullName = $_POST["fullname"];
            $errors = array();
            if(empty($fullName)){
              array_push($errors,"All fields are required");
            }

            if (count($errors)>0) {
              foreach ($errors as  $error) {
                  echo "<div class='alert alert-danger'>$error</div>";
              }
            }else{
              // SQL query to update the full_name column for the specified user_id
              $sql = "UPDATE users SET full_name = ? WHERE user_id = ?";
              
              // Prepare the SQL statement
              $stmt = mysqli_stmt_init($conn);
              if (mysqli_stmt_prepare($stmt, $sql)) {
                  // Bind parameters and execute the statement
                  mysqli_stmt_bind_param($stmt, "si", $fullName, $user_id);
                  mysqli_stmt_execute($stmt);

                  if (mysqli_stmt_affected_rows($stmt) > 0) {
                    echo "<div class='alert alert-success'>Refresh to view changes</div>";
                  }
              } else {
                  echo "<div class='alert alert-danger'>Error: " . mysqli_error($conn) . "</div>";
              }
            }
          }
        ?>
      <form class="profile-element-form" method="post">
        <h3>Username</h3>
        <input type="text" class="form-control-settings" name="fullname" placeholder="Enter new username:">
        <div class="form-btn">
          <input type="submit" class="btn btn-primary" value="Register" name="submitone">
        </div>
      </form>
      <div class="profile-element">
        <h3>Email</h3>
        <p class="profile-pelement"><?php echo $user['email']; ?></p>
        <button class="edit-button" onclick="editPopup(1)">Edit</button>
      </div>
      <?php
          if (isset($_POST["submittwo"])) {
            $email = $_POST["email"];
            $errors = array();
            if(empty($email)){
              array_push($errors,"All fields are required");
            }
            if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
              array_push($errors, "Email is not valid");
            }

            if (count($errors)>0) {
              foreach ($errors as  $error) {
                  echo "<div class='alert alert-danger'>$error</div>";
              }
            }else{
              // SQL query to update the full_name column for the specified user_id
              $sql = "UPDATE users SET email = ? WHERE user_id = ?";
              
              // Prepare the SQL statement
              $stmt = mysqli_stmt_init($conn);
              if (mysqli_stmt_prepare($stmt, $sql)) {
                // Bind parameters and execute the statement
                mysqli_stmt_bind_param($stmt, "si", $email, $user_id);
                mysqli_stmt_execute($stmt);

                // Check if any rows were affected
                if (mysqli_stmt_affected_rows($stmt) > 0) {
                  echo "<div class='alert alert-success'>Refresh to view changes</div>";
                } 
                // else {
                //   echo "<div class='alert alert-warning'>Refresh to view changes</div>";
                // }
              } else {
                  echo "<div class='alert alert-danger'>Error: " . mysqli_error($conn) . "</div>";
              }
            }
          }
        ?>
      <form class="profile-element-form" method="post">
        <h3>Email</h3>
        <input type="email" class="form-control-settings" name="email" placeholder="Enter new email:">
        <div class="form-btn">
          <input type="submit" class="btn btn-primary" value="Register" name="submittwo">
        </div>
      </form>
      <div class="profile-element">
        <h3>Mobile number</h3>
        <p class="profile-pelement"><?php echo $user['mobile_number']; ?></p>
        <button class="edit-button" onclick="editPopup(2)">Edit</button>
      </div>
      <?php
          if (isset($_POST["submitthree"])) {
            $number = $_POST["tel"];
            $errors = array();
            if(empty($number)){
              array_push($errors,"Field is required");
            }

            if (count($errors)>0) {
              foreach ($errors as  $error) {
                  echo "<div class='alert alert-danger'>$error</div>";
              }
            }else{
              // SQL query to update the full_name column for the specified user_id
              $sql = "UPDATE users SET mobile_number = ? WHERE user_id = ?";
              
              // Prepare the SQL statement
              $stmt = mysqli_stmt_init($conn);
              if (mysqli_stmt_prepare($stmt, $sql)) {
                // Bind parameters and execute the statement
                mysqli_stmt_bind_param($stmt, "si", $number, $user_id);
                mysqli_stmt_execute($stmt);

                // Check if any rows were affected
                if (mysqli_stmt_affected_rows($stmt) > 0) {
                  echo "<div class='alert alert-success'>Refresh to view changes</div>";
                }
              } else {
                  echo "<div class='alert alert-danger'>Error: " . mysqli_error($conn) . "</div>";
              }
            }
          }
        ?>
      <form class="profile-element-form" method="post">
        <h3>Mobile number</h3>
        <div class="select-box">
          <div class="selected-option">
            <div>
              <span class="iconify" data-icon="flag:gb-4x3"></span>
              <strong>+44</strong>
            </div>
            <input type="tel" name="tel" placeholder="Phone Number">
          </div>
          <div class="options">
            <input type="text" class="search-box" placeholder="Search Country Name">
            <ol>

            </ol>
          </div>
        </div>
        <div class="form-btn">
          <input type="submit" class="btn btn-primary" value="Register" name="submitthree">
        </div>
        <!-- <button class="edit-button" onclick="editPopupClose(2)" type="submit">Save</button> -->
      </form>
      <div class="profile-element">
        <h3>Country</h3>
        <p class="profile-pelement"><?php echo $user['country']; ?></p>
        <button class="edit-button" onclick="editPopup(3)">Edit</button>
      </div>
      <?php
          if (isset($_POST["submitfour"])) {
            $country = $_POST["country"];
            $errors = array();
            if(empty($country)){
              array_push($errors,"Field is required");
            }

            if (count($errors)>0) {
              foreach ($errors as  $error) {
                  echo "<div class='alert alert-danger'>$error</div>";
              }
            }else{
              // SQL query to update the full_name column for the specified user_id
              $sql = "UPDATE users SET country = ? WHERE user_id = ?";
              
              // Prepare the SQL statement
              $stmt = mysqli_stmt_init($conn);
              if (mysqli_stmt_prepare($stmt, $sql)) {
                // Bind parameters and execute the statement
                mysqli_stmt_bind_param($stmt, "si", $country, $user_id);
                mysqli_stmt_execute($stmt);

                // Check if any rows were affected
                if (mysqli_stmt_affected_rows($stmt) > 0) {
                  echo "<div class='alert alert-success'>Refresh to view changes</div>";
                }
              } else {
                  echo "<div class='alert alert-danger'>Error: " . mysqli_error($conn) . "</div>";
              }
            }
          }
        ?>
      <form class="profile-element-form" method="post">
        <h3>Country</h3>
        <select id="countrySelect" name="country">
          <option value="">Select a country</option>
          <option value="AF">Afghanistan</option>
          <option value="AX">Åland Islands</option>
          <option value="AL">Albania</option>
          <option value="DZ">Algeria</option>
          <option value="AS">American Samoa</option>
          <option value="AD">Andorra</option>
          <option value="AO">Angola</option>
          <option value="AI">Anguilla</option>
          <option value="AQ">Antarctica</option>
          <option value="AG">Antigua and Barbuda</option>
          <option value="AR">Argentina</option>
          <option value="AM">Armenia</option>
          <option value="AW">Aruba</option>
          <option value="AU">Australia</option>
          <option value="AT">Austria</option>
          <option value="AZ">Azerbaijan</option>
          <option value="BS">Bahamas</option>
          <option value="BH">Bahrain</option>
          <option value="BD">Bangladesh</option>
          <option value="BB">Barbados</option>
          <option value="BY">Belarus</option>
          <option value="BE">Belgium</option>
          <option value="BZ">Belize</option>
          <option value="BJ">Benin</option>
          <option value="BM">Bermuda</option>
          <option value="BT">Bhutan</option>
          <option value="BO">Bolivia (Plurinational State of)</option>
          <option value="BQ">Bonaire, Sint Eustatius and Saba</option>
          <option value="BA">Bosnia and Herzegovina</option>
          <option value="BW">Botswana</option>
          <option value="BV">Bouvet Island</option>
          <option value="BR">Brazil</option>
          <option value="IO">British Indian Ocean Territory</option>
          <option value="BN">Brunei Darussalam</option>
          <option value="BG">Bulgaria</option>
          <option value="BF">Burkina Faso</option>
          <option value="BI">Burundi</option>
          <option value="CV">Cabo Verde</option>
          <option value="KH">Cambodia</option>
          <option value="CM">Cameroon</option>
          <option value="CA">Canada</option>
          <option value="KY">Cayman Islands</option>
          <option value="CF">Central African Republic</option>
          <option value="TD">Chad</option>
          <option value="CL">Chile</option>
          <option value="CN">China</option>
          <option value="CX">Christmas Island</option>
          <option value="CC">Cocos (Keeling) Islands</option>
          <option value="CO">Colombia</option>
          <option value="KM">Comoros</option>
          <option value="CG">Congo</option>
          <option value="CD">Congo (Democratic Republic of the)</option>
          <option value="CK">Cook Islands</option>
          <option value="CR">Costa Rica</option>
          <option value="HR">Croatia</option>
          <option value="CU">Cuba</option>
          <option value="CW">Curaçao</option>
          <option value="CY">Cyprus</option>
          <option value="CZ">Czech Republic</option>
          <option value="DK">Denmark</option>
          <option value="DJ">Djibouti</option>
          <option value="DM">Dominica</option>
          <option value="DO">Dominican Republic</option>
          <option value="EC">Ecuador</option>
          <option value="EG">Egypt</option>
          <option value="SV">El Salvador</option>
          <option value="GQ">Equatorial Guinea</option>
          <option value="ER">Eritrea</option>
          <option value="EE">Estonia</option>
          <option value="ET">Ethiopia</option>
          <option value="FK">Falkland Islands (Malvinas)</option>
          <option value="FO">Faroe Islands</option>
          <option value="FJ">Fiji</option>
          <option value="FI">Finland</option>
          <option value="FR">France</option>
          <option value="GF">French Guiana</option>
          <option value="PF">French Polynesia</option>
          <option value="TF">French Southern Territories</option>
          <option value="GA">Gabon</option>
          <option value="GM">Gambia</option>
          <option value="GE">Georgia</option>
          <option value="DE">Germany</option>
          <option value="GH">Ghana</option>
          <option value="GI">Gibraltar</option>
          <option value="GR">Greece</option>
          <option value="GL">Greenland</option>
          <option value="GD">Grenada</option>
          <option value="GP">Guadeloupe</option>
          <option value="GU">Guam</option>
          <option value="GT">Guatemala</option>
          <option value="GG">Guernsey</option>
          <option value="GN">Guinea</option>
          <option value="GW">Guinea-Bissau</option>
          <option value="GY">Guyana</option>
          <option value="HT">Haiti</option>
          <option value="HM">Heard Island and McDonald Islands</option>
          <option value="VA">Holy See</option>
          <option value="HN">Honduras</option>
          <option value="HK">Hong Kong</option>
          <option value="HU">Hungary</option>
          <option value="IS">Iceland</option>
          <option value="IN">India</option>
          <option value="ID">Indonesia</option>
          <option value="IR">Iran (Islamic Republic of)</option>
          <option value="IQ">Iraq</option>
          <option value="IE">Ireland</option>
          <option value="IM">Isle of Man</option>
          <option value="IL">Israel</option>
          <option value="IT">Italy</option>
          <option value="JM">Jamaica</option>
          <option value="JP">Japan</option>
          <option value="JE">Jersey</option>
          <option value="JO">Jordan</option>
          <option value="KZ">Kazakhstan</option>
          <option value="KE">Kenya</option>
          <option value="KI">Kiribati</option>
          <option value="KP">Korea (Democratic People's Republic of)</option>
          <option value="KR">Korea (Republic of)</option>
          <option value="KW">Kuwait</option>
          <option value="KG">Kyrgyzstan</option>
          <option value="LA">Lao People's Democratic Republic</option>
          <option value="LV">Latvia</option>
          <option value="LB">Lebanon</option>
          <option value="LS">Lesotho</option>
          <option value="LR">Liberia</option>
          <option value="LY">Libya</option>
          <option value="LI">Liechtenstein</option>
          <option value="LT">Lithuania</option>
          <option value="LU">Luxembourg</option>
          <option value="MO">Macao</option>
          <option value="MK">Macedonia (the former Yugoslav Republic of)</option>
          <option value="MG">Madagascar</option>
          <option value="MW">Malawi</option>
          <option value="MY">Malaysia</option>
          <option value="MV">Maldives</option>
          <option value="ML">Mali</option>
          <option value="MT">Malta</option>
          <option value="MH">Marshall Islands</option>
          <option value="MQ">Martinique</option>
          <option value="MR">Mauritania</option>
          <option value="MU">Mauritius</option>
          <option value="YT">Mayotte</option>
          <option value="MX">Mexico</option>
          <option value="FM">Micronesia (Federated States of)</option>
          <option value="MD">Moldova (Republic of)</option>
          <option value="MC">Monaco</option>
          <option value="MN">Mongolia</option>
          <option value="ME">Montenegro</option>
          <option value="MS">Montserrat</option>
          <option value="MA">Morocco</option>
          <option value="MZ">Mozambique</option>
          <option value="MM">Myanmar</option>
          <option value="NA">Namibia</option>
          <option value="NR">Nauru</option>
          <option value="NP">Nepal</option>
          <option value="NL">Netherlands</option>
          <option value="NC">New Caledonia</option>
          <option value="NZ">New Zealand</option>
          <option value="NI">Nicaragua</option>
          <option value="NE">Niger</option>
          <option value="NG">Nigeria</option>
          <option value="NU">Niue</option>
          <option value="NF">Norfolk Island</option>
          <option value="MP">Northern Mariana Islands</option>
          <option value="NO">Norway</option>
          <option value="OM">Oman</option>
          <option value="PK">Pakistan</option>
          <option value="PW">Palau</option>
          <option value="PS">Palestine, State of</option>
          <option value="PA">Panama</option>
          <option value="PG">Papua New Guinea</option>
          <option value="PY">Paraguay</option>
          <option value="PE">Peru</option>
          <option value="PH">Philippines</option>
          <option value="PN">Pitcairn</option>
          <option value="PL">Poland</option>
          <option value="PT">Portugal</option>
          <option value="PR">Puerto Rico</option>
          <option value="QA">Qatar</option>
          <option value="RE">Réunion</option>
          <option value="RO">Romania</option>
          <option value="RU">Russian Federation</option>
          <option value="RW">Rwanda</option>
          <option value="BL">Saint Barthélemy</option>
          <option value="SH">Saint Helena, Ascension and Tristan da Cunha</option>
          <option value="KN">Saint Kitts and Nevis</option>
          <option value="LC">Saint Lucia</option>
          <option value="MF">Saint Martin (French part)</option>
          <option value="PM">Saint Pierre and Miquelon</option>
          <option value="VC">Saint Vincent and the Grenadines</option>
          <option value="WS">Samoa</option>
          <option value="SM">San Marino</option>
          <option value="ST">Sao Tome and Principe</option>
          <option value="SA">Saudi Arabia</option>
          <option value="SN">Senegal</option>
          <option value="RS">Serbia</option>
          <option value="SC">Seychelles</option>
          <option value="SL">Sierra Leone</option>
          <option value="SG">Singapore</option>
          <option value="SX">Sint Maarten (Dutch part)</option>
          <option value="SK">Slovakia</option>
          <option value="SI">Slovenia</option>
          <option value="SB">Solomon Islands</option>
          <option value="SO">Somalia</option>
          <option value="ZA">South Africa</option>
          <option value="GS">South Georgia and the South Sandwich Islands</option>
          <option value="SS">South Sudan</option>
          <option value="ES">Spain</option>
          <option value="LK">Sri Lanka</option>
          <option value="SD">Sudan</option>
          <option value="SR">Suriname</option>
          <option value="SJ">Svalbard and Jan Mayen</option>
          <option value="SZ">Swaziland</option>
          <option value="SE">Sweden</option>
          <option value="CH">Switzerland</option>
          <option value="SY">Syrian Arab Republic</option>
          <option value="TW">Taiwan, Province of China</option>
          <option value="TJ">Tajikistan</option>
          <option value="TZ">Tanzania, United Republic of</option>
          <option value="TH">Thailand</option>
          <option value="TL">Timor-Leste</option>
          <option value="TG">Togo</option>
          <option value="TK">Tokelau</option>
          <option value="TO">Tonga</option>
          <option value="TT">Trinidad and Tobago</option>
          <option value="TN">Tunisia</option>
          <option value="TR">Turkey</option>
          <option value="TM">Turkmenistan</option>
          <option value="TC">Turks and Caicos Islands</option>
          <option value="TV">Tuvalu</option>
          <option value="UG">Uganda</option>
          <option value="UA">Ukraine</option>
          <option value="AE">United Arab Emirates</option>
          <option value="GB">United Kingdom of Great Britain and Northern Ireland</option>
          <option value="US">United States of America</option>
          <option value="UM">United States Minor Outlying Islands</option>
          <option value="UY">Uruguay</option>
          <option value="UZ">Uzbekistan</option>
          <option value="VU">Vanuatu</option>
          <option value="VE">Venezuela (Bolivarian Republic of)</option>
          <option value="VN">Viet Nam</option>
          <option value="VG">Virgin Islands (British)</option>
          <option value="VI">Virgin Islands (U.S.)</option>
          <option value="WF">Wallis and Futuna</option>
          <option value="EH">Western Sahara</option>
          <option value="YE">Yemen</option>
          <option value="ZM">Zambia</option>
          <option value="ZW">Zimbabwe</option>
        </select>
        <div class="form-btn">
          <input type="submit" class="btn btn-primary" value="Register" name="submitfour">
        </div>
        <!-- <button class="edit-button" onclick="editPopupClose(3)" type="submit">Save</button> -->
      </form>

    </section>
    
    <script>
      const pElements = document.getElementsByClassName("profile-element");
      const inputElements = document.getElementsByClassName("profile-element-form");
      function editPopup(i){
        pElements[i].style.display = 'none';
        inputElements[i].style.display = 'block';
      }

      function editPopupClose(i){
        pElements[i].style.display = 'block';
        inputElements[i].style.display = 'none';
      }

      const avatarBox = document.getElementById("avatar-container");
      const avatarSettings = document.getElementById("avatar-settings-box");
      function openAvatarPopup(){
        avatarBox.style.display = 'block';
        avatarSettings.style.display = 'none';
      }
      function selectImage(imagePath) {
        var selectedImageInput = document.getElementById('selectedImage');
        var currentSelectedImage = selectedImageInput.value;

        // Deselect the previously selected image if any
        if (currentSelectedImage !== '') {
            var previouslySelectedImage = document.querySelector('img[src="' + currentSelectedImage + '"]');
            previouslySelectedImage.style.border = 'none';
        }

        // Select the new image
        selectedImageInput.value = imagePath; // Set the value of the hidden input to the selected image path
        var newlySelectedImage = document.querySelector('img[src="' + imagePath + '"]');
        newlySelectedImage.style.border = '2px solid blue';
    }
    </script>
        
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
      <script src="script.js"></script>
      <script src="scriptNumbers.js"></script>
    </body>
</html>