<?php
if ($_SESSION['clientData']['clientLevel'] < 2) {
 header('location: /');
 exit;
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
  <title>Product | ACME</title>
  <meta charset="UTF-8">
   <meta name="description" content="New product"> 
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
      
  <h1>Add Product</h1><br/>
  <p>Add a new product below. All fields are required!</p>
  
  
 
  <br/><br/>
  <form method="POST" class="reg" action="../products/">
      <fieldset>
        <label for="catType"> Choose a category </label><br/>
        <input id="catType" hidden>
        <?PHP 
        
         echo $catList;
             
             
        ?><br>
              
        <label>Product Name</label> <br/>   
        <input type="text" name="invName" id="invName" <?php if(isset($invName)){echo "value='$invName'";} ?> required> <br/>
        <label>Product Description</label> <br/>
        <textarea name="invDescription" id="invDescription" title="Description" required><?php if(isset($invDescription)){echo $invDescription;} ?>  </textarea><br/>
        <label>Product Image(path to image)</label> <br/>
        <input type="text" name="invImage" id="invImage" title="Image" <?php if(isset($invImage)){echo "value='$invImage'";}?>required> <br/>
        <label>Product Thumbnail(path to thumbnail</label> <br/>
        <input type="text" name="invThumbnail" id="invThumbnail" title="Thumbnail" <?PHP if(isset($invThumbnail)){ echo "value='$invThumbnail'";} ?>required><br/>
        <label>Product Price</label> <br/>
        <input name="invPrice" id="invPrice" title="Product Price" placeholder="Price $" type="number" min="0" step="0.01" <?php if(isset($invPrice)){echo "value='$invPrice'";} ?> required><br/>
        <label># In Stock</label> <br/>
        <input name="invStock" id="invStock" title="Amount in Stock" placeholder="Inventory" type="number" min="0" <?php if(isset($invStock)){echo "value='$invStock'";} ?> required><br/>
        <label>Shipping Size(W x H x L in inches</label> <br/>
        <input name="invSize" id="invSize" title="Shipping Size" placeholder="Inches" type="number" min="0"  step="0.01" <?php if(isset($invSize)){echo "value='$invSize'";} ?> required> <br/>
        <label>Weight(lbs)</label> <br/>
        <input name="invWeight" id="invWeight" title="Weight" placeholder="Lbs" type="number" min="0"  step="0.01" <?php if(isset($invWeight)){echo "value='$invWeight'";} ?> required><br/>
        <label>Location(city name)</label> <br/>
        <input name="invLocation" id="invLocation" type="text" <?php if(isset($invLocation)){echo "value='$invLocation'";} ?> required> <br/>
        <label>Vendor Name</label> <br/>
        <input name="invVendor" id="invVendor" title="Vendor Name"  type="text" <?php if(isset($invVendor)){echo "value='$invVendor'";} ?> required> <br/>
        <label>Primary Material</label> <br/>
        <input name="invStyle" id="invStyle" type="text" <?php if(isset($invStyle)){echo "value='$invStyle'";} ?> required> <br/><br>
        <input type="submit" name="submit" value="Send" class="log1"/>       
        <input type="hidden" name="action" value="prod">

     
         
    </fieldset>
  </form>    
  </main>    
   
    
    
    
    <footer>
    <?php include '../common/footer.php';?>
  </footer>  
   

</body>
</html>

