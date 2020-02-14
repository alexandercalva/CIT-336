<?php

if ($_SESSION['clientData']['clientLevel'] < 2) {
  include '../view/home.php';
 exit;
}
if (isset($_SESSION['message'])) {
  $message = $_SESSION['message'];
 }
?><?php
   
$indexCatIDtryarray = 0;
$catNames = array();
foreach ($categories as $category) {
    //save the names in the array
   $catNames[$indexCatIDtryarray] = urlencode($category['categoryName']);
    //increment the index
    $indexCatIDtryarray = $indexCatIDtryarray + 1;
}
//$navList .= '</ul>';
 // reset the index
 $indexCatIDtryarray = 0;
 $catList = '<select name="categoryId" id="categoryId" class="message3">';
 $catList .= '<option value="Choose a category">Choose a category</option>';
 
 foreach ($categoriesID as $categoryID) {
  
   $catList.= '<option value="'.urlencode($categoryID['categoryId']).'"';
   if (isset($categoryId)) {
       if(urlencode($categoryID['categoryId']) === $categoryId) {
           $catList .= ' selected ';
           
       }
   }
   $catList.= '>'.$catNames[$indexCatIDtryarray].'</option>';
   //use the array to write the name according the index, in the sql they use the same class of organization
   $indexCatIDtryarray = $indexCatIDtryarray + 1;
}
$catList .= '</select>';
 
 
?><!DOCTYPE html>
<html lang="en-us">
<head> 
  <title>Products| ACME</title>
  <meta charset="UTF-8">
   <meta name="description" content="Management products"> 
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
  
  <h1>Product Management</h1><br>
  <p>Welcome to the product management page. Please choose and option below:</p>
  <br><br>
  <ul>
      <li><a href="index.php?action=new-cat.php"> Add a New Category</a></li>
      <li><a href="index.php?action=new-prod.php">Add a New Product</a></li>
      
  </ul><?php
      if (isset($message)) { 
      echo $message; 
      } 
      if (isset($catList)) { 
        echo '<h2>Products By Category</h2>'; 
        echo '<p>Choose a category to see those products</p>'; 
        echo $catList; 
      
      
      }
    ?><noscript>
    <p><strong>JavaScript Must Be Enabled to Use this Page.</strong></p>
    </noscript>
    <table id="productsDisplay"></table> 



</main>    
    
    
    
    
  <footer>
    <?php include '../common/footer.php';?>
  </footer>  
   
  <script src="../js/products.js"></script>
  </body>
</html><?php unset($_SESSION['message']); ?>

