<?php if (isset($_SESSION['message'])) {
 $message = $_SESSION['message'];
}?><!DOCTYPE html>
<html lang="en-us">
<head> 
  <title>Image Management</title>
  <meta charset="UTF-8">
   <meta name="description" content="Image admin"> 
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
    <h2>Add New Product Image</h2>
    <?php
    if (isset($message)) {
    echo $message;
    } ?>

    <form action="/uploads/" method="post" enctype="multipart/form-data">
        <label for="invItem">Product</label><br>
        <label>
          <input style= "display:none" id="invItem">
        </label>
        
        <?php echo $prodSelect; ?><br><br>
        <label>Upload Image:</label><br>
        <input type="file" name="file1"><br>
        <input type="submit" class="big" value="Upload">
        <input type="hidden" name="action" value="upload">
    </form>
   <br>
   <hr>
   <h2>Existing Images</h2>
    <p class="notice">If deleting an image, delete the thumbnail too and vice versa.</p>
    <?php
    if (isset($imageDisplay)) {
        echo $imageDisplay;
    } ?>
   
 
 </main>    
   
    
    
    
    <footer>
    <?php include '../common/footer.php';?>
  </footer>  
   

</body>
<?php unset($_SESSION['message']); ?></html>