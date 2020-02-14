<?php
   
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
  <title><?php echo $categoryName; ?> Products | Acme, Inc.</title>
  <meta charset="UTF-8">
   <meta name="description" content="Products category."> 
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
    
  <h1 class="title"><?php echo $categoryName; ?> Product</h1>
  <?php if(isset($message)){
      echo  $message; } 
  ?>
   
    <?php if(isset($prodDisplay)){ 
          echo $prodDisplay; 
      
          
      } 
      ?>
   
 </main>    
   
    
    
    
    <footer>
    <?php include '../common/footer.php';?>
  </footer>  
   

</body>
</html>