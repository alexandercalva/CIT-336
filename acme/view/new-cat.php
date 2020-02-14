<?php
if ($_SESSION['clientData']['clientLevel'] < 2) {
 header('location: /');
 exit;
}
?><!DOCTYPE html>
<html lang="en-us">
<head> 
  <title>Category | ACME</title>
  <meta charset="UTF-8">
   <meta name="description" content="New category"> 
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
      
  <h1>Add Category</h1><br/>
  <p>Add a new category of products below</p>
  
  <br/><br/>
  
  <form method="POST" class="reg" action="../products/index.php">
      <label>New Category Name</label> <br/>
      <input name="categoryName" id="categoryName" title="Category Name" placeholder="Name" type="text" maxlength="50" required>
      <br/><br/>
      <input type="submit" name="submit" value="Add Category" class="log1"/>       
      <input type="hidden" name="action" value="cat">
      
  </form>    
  </main>    
    
    
    
    
    <footer>
    <?php include '../common/footer.php';?>
  </footer>  
   

</body>
</html>

