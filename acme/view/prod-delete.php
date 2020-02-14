<!DOCTYPE html>
<html lang="en-us">
<head> 
  <title><?php if(isset($prodInfo['invName'])){ echo "Delete $prodInfo[invName]";} ?>Product | ACME</title>
  <meta charset="UTF-8">
   <meta name="description" content="Delete product"> 
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
  <h1><?php if(isset($prodInfo['invName'])){ echo "Delete $prodInfo[invName]";} ?></h1>    
  
    <p>Confirm Product Deletion. The delete is permanent.</p><br>
    

  
  
 
  <br/><br/>
  <form method="POST" class="reg" action="../products/">
      
        
                      
        <fieldset>
            <label for="invName">Product Name</label><br>
            <input type="text" readonly name="invName" id="invName" 
            <?php if(isset($prodInfo['invName'])) {echo "value='$prodInfo[invName]'"; }?>><br>
            <label for="invDescription">Product Description</label><br>
            <textarea name="invDescription" readonly id="invDescription">
            <?php if(isset($prodInfo['invDescription'])) {echo $prodInfo['invDescription']; } ?></textarea>
            <label>&nbsp;</label>
            <input type="submit" class="log1" name="submit" value="Delete Product">
            <input type="hidden" name="action" value="deleteProd">
            <input type="hidden" name="invId" value="
            <?php if(isset($prodInfo['invId'])){ echo $prodInfo['invId'];} ?>">
        </fieldset>
       
        
     
         
    
  </form>    
  </main>    
  
    
    <footer>
    <?php include '../common/footer.php';?>
  </footer>  
   

</body>
</html>

