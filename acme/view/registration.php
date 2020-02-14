<!DOCTYPE html>
<html lang="en-us">
<head> 
  <title>Login | ACME</title>
  <meta charset="UTF-8">
  <meta name="description" content="Registration"> 
  <meta name="keywords" content="ACME">
  <meta name="author" content="Alexander Calva">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="../css/style.css">
 
</head>
 
 
<body>
  
  <header>
    <?php include '../common/header.php';?>
  </header>
   <nav>
   <?PHP echo $navList;?>
  </nav>
 
  
  <main>
  <?php
      if (isset($message)) {
      echo $message;
      }
   ?>
      
      <form action="../accounts/index.php" method="POST" class="reg">  
         
         <label>First Name: </label><br>
         <input name="clientFirstname" id="clientFirstname" type="text" <?php if(isset($clientFirstname)){ echo "value= '$clientFirstname'";}?> maxlength="50" required /><br>
         <label> Last Name: </label><br>
         <input name="clientLastname" id="clientLastname" type="text" <?php if(isset($clientLastname)){ echo "value= '$clientLastname'";}?>maxlength="50" required/><br>
         <label>Email: </label><br>
         <input name="clientEmail" id="clientEmail" type="email" <?php if(isset($clientEmail)){ echo "value= '$clientEmail'";}?> maxlength="50" required/><br>
         <label>Password: </label><br>
         <input name="clientPassword" id="clientPassword"required pattern="(?=^.{8,}$)(?=.*\d)(?=.*\W+)(?![.\n])(?=.*[A-Z])(?=.*[a-z]).*$" type="password" maxlength="50" required/><br>
         <label>Comments </label><br>
         <input name="comments" id="comments" type="text" <?php if(isset($comments)){ echo "value= '$comments'";}?>required/><br>
         <input type="hidden" name="action" value="registration"/>
         <input type="submit" name="submit" value="register" class="big1"/>       
         
         <label> </label><br>
         <span class="message3">Passwords must be at least 8 characters and contain at least 1 number, 1 capital letter and 1 special character</span>
           
      </form>
   
   <?php 
   ?>  
 
 </main>    
   
    
    
<footer>
   <?php include '../common/footer.php';?>
</footer>  
   

</body>
</html>