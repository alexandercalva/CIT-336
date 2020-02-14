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
   <meta name="description" content="Products category view."> 
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
   
  
  <?php if(isset($message)){
      echo $message; } 
  ?>
  
    <?php if(isset($prodDisplay)){ 
          echo $prodDisplay; 
          
          
      } 
      ?>
   <br>
   <hr>
      
      <?php 
          if(isset($imprimeImage)){ 
            echo $imprimeImage;  
          }  
       ?>
   <br>    
   <hr>
   <h2>Customer Reviews</h2>
   <h3>Review the <?php if(isset ($prodDisplay)){
      echo $products['invName'];
   }?> 
   
   <?php if (isset($message)) { echo $message; } ?>
      <div id='prod-detail'><?php if (isset($prodDetail)) { echo $prodDetail; } ?></div>
      <hr>
      <?php if (!isset($_SESSION['clientData'])){
          echo "<p>To add you own review please <a href='/accounts?action=login'>Login</a></p>";
      } else {?>
          <div id ='reg'>
          <form method='post' action='/reviews/index.php'>
          <h2>Add a Review</h2>
          <label for='reviewText'>Screen Name:
          <?php echo substr($_SESSION['clientData']['clientFirstname'],0,1). $_SESSION['clientData']['clientLastname']."</label>";?>
          <textarea name='reviewText' id='reviewText' class='textArea'  required></textarea>
          <input type='hidden' name='invId' value=<?php echo $invId;?>>
          <input type='hidden' name='action' value='new-review'>
          <input type='submit' value='Submit Review' class='log1'>
          </form>
          </div>
          <?php }
          if(isset($imprimir)){ // Print the message
            echo $imprimir;
          }
            ?>  
         <br>   
          
    <?php 
      if(isset($getReviewArray)){
        echo $getReviewArray;
        
    } 
    ?>
    </main> 
     
   
    
    
    
    <footer>
    <?php include '../common/footer.php';?>
  </footer>  
   

</body>
</html>