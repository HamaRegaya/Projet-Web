<?php

 include 'includes/autoloader.inc.php';
 Control::settings();
 
 $string = 'Profile Settings';
 require("html.php");?>  
 <div class="form">
  <h1>Account Settings</h1>
  <p id="error"></p>
  <form name="accountInfo" action="" method="post">
  <p>Your Name</p>
  <div class ="input_row">
      <input type="text"  placeholder="Username"  id="profileUsername" /> 
      <span id="profileUsernameErr"></span>
  </div>
  <p>Age</p>
  <div class ="input_row">
      <input type="text"  placeholder="Age"  id="profileAge" />
       <span id="profileAgeErr"></span> 
  </div>
  <div class ="input_row">
     <p>Password</p>
     <input type="button"  value="Change" id="change" />
     <input type="password" placeholder="New Password" id="newPass" />
     <span id="profilePassErr"></span> 

  </div>
  <div class ="input_row">
     <input type="button"  value=" Cancel " id="cancel" />
     <input type="button"  value="  Save  " id="save" />
  </div>
  <input type="button"  value="Delete Account" id="delete" />


  </form>
  </div>
<script src="settings.js"></script>
</body>
</html>