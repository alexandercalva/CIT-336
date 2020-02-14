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
  <title><?php if(isset($prodInfo['invName'])){ 
      echo "Modify $prodInfo[invName] ";} 
      elseif(isset($invName)) { echo $invName; }?>Product | ACME</title>
  <meta charset="UTF-8">
   <meta name="description" content="Update product"> 
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
  <h1><?php if(isset($prodInfo['invName'])){ 
       echo "Modify $prodInfo[invName] ";} 
       elseif(isset($invName)) { echo $invName; }?></h1>    
  
  <h2>Update the selected product.</h2> 
  
  
  
 
  <br/><br/>
  <form method="POST" class="reg" action="../products/">
      <fieldset>
        <label for="catType"> Choose a category </label><br/>
        <input id="catType" hidden>
        <?PHP 
         
         echo $catList;
             
             
        ?><br>
              
        <label>Product Name</label> <br/>   
        <input type="text" name="invName" id="invName" <?php if(isset($invName)){echo "value='$invName'";} elseif(isset($prodInfo['invName'])) {
         echo "value='$prodInfo[invName]'"; } ?> required> <br/>
         <label>Product Description</label> <br/>
        <textarea name="invDescription" id="invDescription" title="Description" required><?php if(isset($invDescription)){echo $invDescription;} elseif(isset($prodInfo['invDescription'])) {
         echo $prodInfo['invDescription']; } ?>  </textarea><br/>
        <label>Product Image(path to image)</label> <br/>
        <input type="text" name="invImage" id="invImage" title="Image" <?php if(isset($invImage)){echo "value='$invImage'";} elseif(isset($prodInfo['invImage'])) {
         echo "value='$prodInfo[invImage]'"; }?> required> <br/>
        <label>Product Thumbnail(path to thumbnail</label> <br/>
        <input type="text" name="invThumbnail" id="invThumbnail" title="Thumbnail" <?PHP if(isset($invThumbnail)){ echo "value='$invThumbnail'";} elseif(isset($prodInfo['invThumbnail'])) {
         echo "value='$prodInfo[invThumbnail]'"; } ?> required><br/>
        <label>Product Price</label> <br/>
        <input name="invPrice" id="invPrice" title="Product Price" placeholder="Price $" type="number" min="0" step="0.01" <?php if(isset($invPrice)){echo "value='$invPrice'";} elseif(isset($prodInfo['invPrice'])) {
         echo "value='$prodInfo[invPrice]'"; } ?> required><br/>
        <label># In Stock</label> <br/>
        <input name="invStock" id="invStock" title="Amount in Stock" placeholder="Inventory" type="number" min="0" <?php if(isset($invStock)){echo "value='$invStock'";} elseif(isset($prodInfo['invStock'])) {
         echo "value='$prodInfo[invStock]'"; } ?> required><br/>
        <label>Shipping Size(W x H x L in inches</label> <br/>
        <input name="invSize" id="invSize" title="Shipping Size" placeholder="Inches" type="number" min="0"  step="0.01" <?php if(isset($invSize)){echo "value='$invSize'";} elseif(isset($prodInfo['invSize'])) {
         echo "value='$prodInfo[invSize]'"; } ?> required> <br/>
        <label>Weight(lbs)</label> <br/>
        <input name="invWeight" id="invWeight" title="Weight" placeholder="Lbs" type="number" min="0"  step="0.01" <?php if(isset($invWeight)){echo "value='$invWeight'";} elseif(isset($prodInfo['invWeight'])) {
         echo "value='$prodInfo[invWeight]'"; } ?> required><br/>
        <label>Location(city name)</label> <br/>
        <input name="invLocation" id="invLocation" type="text" <?php if(isset($invLocation)){echo "value='$invLocation'";} elseif(isset($prodInfo['invLocation'])) {
         echo "value='$prodInfo[invLocation]'"; } ?> required> <br/>
        <label>Vendor Name</label> <br/>
        <input name="invVendor" id="invVendor" title="Vendor Name"  type="text" <?php if(isset($invVendor)){echo "value='$invVendor'";} elseif(isset($prodInfo['invVendor'])) {
         echo "value='$prodInfo[invVendor]'"; }?> required> <br/>
        <label>Primary Material</label> <br/>
        <input name="invStyle" id="invStyle" type="text" <?php if(isset($invStyle)){echo "value='$invStyle'";} elseif(isset($prodInfo['invStyle'])) {
         echo "value='$prodInfo[invStyle]'"; } ?> required> <br/><br>
        <input type="submit" name="submit" value="Update Product" class="log1"/>       
        <input type="hidden" name="action" value="updateProd">
        <input type="hidden" name="invId" 
        value="<?php if(isset($prodInfo['invId'])){ echo $prodInfo['invId'];} 
        elseif(isset($invId)){ echo $invId; }?>">
       
        
     
         
    </fieldset>
  </form>    
  </main>    
  
    
    <footer>
    <?php include '../common/footer.php';?>
  </footer>  
   

</body>
</html>

