<!DOCTYPE html>
<html lang="en-us">
<head> 
  <title>Template | ACME</title>
  <meta charset="UTF-8">
   <meta name="description" content="Edit Review page."> 
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
  
  <form method="post" action="/reviews/index.php">
            <h1><?php echo "Delete $review[invName] Review"; ?></h1><br>
            <?php if (isset($message)) { echo $message; } ?>
            <h2><label for="reviewText" ><?php echo "Reviewed on ", date('M d, Y', strtotime($review['reviewDate']));"</h2>" ?></label></h2><br>
            <h3>Review Text</h3>
            <textarea name="reviewText" id="reviewText" class="textArea" title="Review Text" readonly><?php 
            if (isset($reviewText)) { echo $reviewText; }
            else { echo $review['reviewText']; } ?></textarea><br>

            <!-- Add the action name - value pair -->
            <input type="hidden" name="action" value="delete-review-submit" >
            <input type="hidden" name="reviewId" value="<?php echo $review['reviewId']; ?>">
            <input type="submit" value="Delete Review" class="log1">
            
	</form>
   <?php if(isset($imprimir)){
       echo $imprimir;

    }
       ?>
 
 </main>    
   
    
    
    
    <footer>
    <?php include '../common/footer.php';?>
  </footer>  
   

</body>
</html>