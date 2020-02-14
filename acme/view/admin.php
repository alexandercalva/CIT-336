<?php // If not logged in, go log in

   
if (!isset($_SESSION['clientData'])){
		include '../accounts/index.php?action=login';
    exit;
}?><!DOCTYPE html>
<html lang="en-us">
<head> 
  <title>Admin | ACME</title>
  <meta charset="UTF-8">
   <meta name="description" content="Admin page."> 
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
      <?php echo $navList;?>
  </nav>
 
  
  <main>
     
     <h1><?php echo  $_SESSION['clientData']['clientFirstname'] . " " .  $_SESSION['clientData']['clientLastname'];?></h1><br>
     <h2 class="letras">You are logged in.</h2><br>          
     <ul>
        <li>FirstName: <strong><?php echo $_SESSION['clientData']['clientFirstname']; ?></strong></li>
        <li>LastName: <strong><?php echo $_SESSION['clientData']['clientLastname']; ?></strong></li>
        <li>Email: <strong><?php echo  $_SESSION['clientData']['clientEmail']; ?></strong></li>
    </ul><br><br>
   
    <h3><a href="../accounts/index.php?action=update"> Update Account Information </a></h3><br><?php if( $_SESSION['clientData']['clientLevel'] > 1) { 
            echo "<h2 class ='letras'>Administrative Functions</h2><br>";
            echo "<h3>Use the link below to manage products</h3><br>";
            echo "<h3><a href='../products/index.php?action=prod-mgmt.php'> Products</a></h3>";
            echo "<br>";
            if(isset($_SESSION['message'])){
              echo $_SESSION['message'];
              $_SESSION['message'] = " ";
           }
            echo "<h2>Manage Your product reviews</h2>";
            if(isset($getReviewArray)){
              echo $getReviewArray;
          } 
         
            
      }
      
      ?></main> 
       
   
    
    
    
    <footer>
    <?php include '../common/footer.php';?>
  </footer>  
   

</body>
</html>