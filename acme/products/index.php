<?php
// Products controller

// Create or access a Session 
session_start();

// Get the database connection file
 require_once '../library/connections.php';
 // Get the acme model for use as needed
 require_once '../model/acme-model.php';
 require  '../model/products_model.php';
 require_once '../model/uploads-model.php';
 require_once '../library/functions.php';
 require_once '../model/reviews-model.php';

 // Get the array of categories
$categories = getCategories();
// Get the array of categories ID
$categoriesID = getCategories1();
$navList = buildNav($categories);
$catList = buildID($categoriesID, $navList, $categories);
// Check if the firstname cookie exists, get its value
if(isset($_COOKIE['firstname'])){
    $cookieFirstname = filter_input(INPUT_COOKIE, 'firstname', FILTER_SANITIZE_STRING);
   }
   $action = filter_input(INPUT_POST, 'action', FILTER_SANITIZE_STRING);
   if ($action == NULL){
    $action = filter_input(INPUT_GET, 'action', FILTER_SANITIZE_STRING);
   }
  
  if ($action == NULL){
    
    header('location: ../?action=home');
    exit;
  }
  if($action == 'new-cat.php'){
          $action = 'new-cat';
    }
   
  if($action == 'new-prod.php'){
          $action = 'new-prod';
    }
  if($action == 'prod-mgmt.php'){
         $action = 'admin';
  }
  
  
        
        
    switch ($action){
        case 'admin':
            include '../view/prod-mgmt.php';
        break;
        case 'new-cat':
            include '../view/new-cat.php';
            break;  
        case 'new-prod':
            include '../view/new-prod.php';
            break;  
        case 'default':
           
            include 'view/home.php';
        break;  
    }      
         
  switch ($action){
   
   case 'cat':
    $categoryName = filter_input(INPUT_POST, 'categoryName', FILTER_SANITIZE_STRING);
    
    // Check for missing data
    if(empty($categoryName)){
       echo '<div class ="message1"><p>Please provide information for this form field</p></div>';
       include '../view/new-cat.php'; 
        exit;
    } 
   // Send the data to the model
   
   $regOutcome = newCategory($categoryName);
    // Check and report the result 
     
    if($regOutcome === 1){
        echo '<div class="message1"><p> Thanks for registering the new category.</p></div>';
        
        include '../view/prod-mgmt.php';
        

        exit;
    } else 
    {
        
        $message = '<p>Sorry, but the registration failed. Please try again. </p>';
        include '../view/new-cat.php';
        exit;
    
    }
        
    break;
   
   case 'prod':
    $invName = filter_input(INPUT_POST, 'invName', FILTER_SANITIZE_STRING);
    $invDescription = filter_input(INPUT_POST, 'invDescription', FILTER_SANITIZE_STRING);
    $invImage = filter_input(INPUT_POST, 'invImage', FILTER_SANITIZE_STRING);
    $invThumbnail = filter_input(INPUT_POST, 'invThumbnail', FILTER_SANITIZE_STRING);
    $invPrice = filter_input(INPUT_POST, 'invPrice', FILTER_SANITIZE_NUMBER_FLOAT, FILTER_FLAG_ALLOW_FRACTION);
    $invStock =filter_input(INPUT_POST, 'invStock');
    $invSize = filter_input(INPUT_POST, 'invSize', FILTER_SANITIZE_NUMBER_FLOAT, FILTER_FLAG_ALLOW_FRACTION);
    $invWeight = filter_input(INPUT_POST, 'invWeight', FILTER_SANITIZE_NUMBER_FLOAT, FILTER_FLAG_ALLOW_FRACTION);
    $invLocation = filter_input(INPUT_POST, 'invLocation', FILTER_SANITIZE_STRING);
    $categoryId = filter_input(INPUT_POST, 'categoryId');
    $invVendor = filter_input(INPUT_POST, 'invVendor', FILTER_SANITIZE_STRING);
    $invStyle = filter_input(INPUT_POST, 'invStyle', FILTER_SANITIZE_STRING);
   
   
// Check for missing data
    if(empty($invName)|| empty($invDescription)|| empty($invImage) || empty($invThumbnail)|| empty($invPrice)|| empty($invStock)|| empty($invSize)|| empty($invWeight)|| empty($invLocation)||empty($categoryId)|| empty($invVendor)||empty($invStyle)){
        
        
        
        echo '<div class ="message2"><p>Please provide information for all empty form fields</p></div>';
        include '../view/new-prod.php';
        
        exit;
        } 
   // Send the data to the model
   
   $regOutcome1 = addProduct($invName, $invDescription, $invImage,$invThumbnail,$invPrice, $invStock, $invSize, $invWeight, $invLocation,$categoryId, $invVendor, $invStyle);
    // Check and report the result 
   
    if($regOutcome1 === 1){
        echo '<div class="message2"><p> Information correct.</p></div>';
        include '../view/new-prod.php';
        exit;
    } 
    else {
        
        $message = '<p>Sorry, but the information failed. Please try again. </p>';
        include '../view/new-prod.php';
        exit;
    
    }
        
    break;
    case 'getInventoryItems': 
        // Get the categoryId 
        $categoryId = filter_input(INPUT_GET, 'categoryId', FILTER_SANITIZE_NUMBER_INT); 
        // Fetch the products by categoryId from the DB 
        $productsArray = getProductsByCategory($categoryId); 
        // Convert the array to a JSON object and send it back 
        echo json_encode($productsArray); 
        break;
    
    case 'mod':
        $categoryId = filter_input(INPUT_POST, 'categoryId');
        $invId = filter_input(INPUT_GET, 'id', FILTER_VALIDATE_INT);
        $prodInfo = getProductInfo($invId);
        if(count($prodInfo)<1){
         $message = 'Sorry, no product information could be found.';
        }
        include '../view/prod-update.php';
        exit;
    break;   
    case 'updateProd':
        
        $invName = filter_input(INPUT_POST, 'invName', FILTER_SANITIZE_STRING);
        $invDescription = filter_input(INPUT_POST, 'invDescription', FILTER_SANITIZE_STRING);
        $invImage = filter_input(INPUT_POST, 'invImage', FILTER_SANITIZE_STRING);
        $invThumbnail = filter_input(INPUT_POST, 'invThumbnail', FILTER_SANITIZE_STRING);
        $invPrice = filter_input(INPUT_POST, 'invPrice', FILTER_SANITIZE_NUMBER_FLOAT, FILTER_FLAG_ALLOW_FRACTION);
        $invStock =filter_input(INPUT_POST, 'invStock');
        $invSize = filter_input(INPUT_POST, 'invSize', FILTER_SANITIZE_NUMBER_FLOAT, FILTER_FLAG_ALLOW_FRACTION);
        $invWeight = filter_input(INPUT_POST, 'invWeight', FILTER_SANITIZE_NUMBER_FLOAT, FILTER_FLAG_ALLOW_FRACTION);
        $invLocation = filter_input(INPUT_POST, 'invLocation', FILTER_SANITIZE_STRING);
        $categoryId = filter_input(INPUT_POST, 'categoryId');
        $invVendor = filter_input(INPUT_POST, 'invVendor', FILTER_SANITIZE_STRING);
        $invStyle = filter_input(INPUT_POST, 'invStyle', FILTER_SANITIZE_STRING);
        $invId = filter_input(INPUT_POST, 'invId', FILTER_SANITIZE_NUMBER_INT);
        
        $prodInfo = getProductInfo($invId);
       
        
        // Check for missing data
        if(empty($invName)|| empty($invDescription)|| empty($invImage) || empty($invThumbnail)|| empty($invPrice)|| empty($invStock)|| empty($invSize)|| empty($invWeight)|| empty($invLocation) || empty($invVendor)||empty($invStyle || empty($invId))){
        
        
        
            echo '<div class ="message2"><p>Please complete all information for the update item! Double check the category of the item.</p></div>';
            //$invId = filter_input(INPUT_POST, 'invId', FILTER_SANITIZE_NUMBER_INT);
            include '../view/prod-update.php';
            exit;
        } 
       
        // function for validation of $updateResult
        $updateResult = validation($prodInfo, $invName, $invDescription, $invImage,$invThumbnail,$invPrice, $invStock, $invSize, $invWeight, $invLocation,$invVendor, $invStyle, $invId );
       // Check and report the result 
        
        if ($updateResult) {
            echo '<div class="message2"><p> Congratulations '. $invName . ' was successfully updated.</p></div>';
            include '../view/prod-mgmt.php';
             exit;
       }    
       else {
            
            echo '<div class="message2"<p> Error. The product was not updated.</p></div>';
            include '../view/prod-update.php';
            exit;
        
        }
    
    break;    
    case 'del':
        $invId = filter_input(INPUT_GET, 'id', FILTER_VALIDATE_INT);
        $prodInfo = getProductInfo($invId);
        if (count($prodInfo) < 1) {
         $message = 'Sorry, no product information could be found.';
       }
        include '../view/prod-delete.php';
        exit;
    break; 
    case 'deleteProd':
        $invName = filter_input(INPUT_POST, 'invName', FILTER_SANITIZE_STRING);
        $invId = filter_input(INPUT_POST, 'invId', FILTER_SANITIZE_NUMBER_INT);
              
        $deleteResult = deleteProduct($invId);
        if ($deleteResult) {
         echo '<div class="message2"> Congratulations  ' . $invName . ' was successfully deleted.</div>';
         //$_SESSION['message'] = $message;
         include '../view/prod-mgmt.php';
         exit;
        } else {
         echo "<p class='message2'>Error: ". $invName.  " was not deleted.</p>";
         //$_SESSION['message'] = $message;
         include '../view/prod-mgmt.php';
         exit;
        }
        break;
    case 'category':
        $invId = filter_input(INPUT_POST, 'invId', FILTER_SANITIZE_NUMBER_INT);
        $invName = filter_input(INPUT_POST, 'invName', FILTER_SANITIZE_STRING);
        
        $categoryName = filter_input(INPUT_GET, 'categoryName', FILTER_SANITIZE_STRING);
        $products = getProductsByCategoryname($categoryName);
        if(!count($products)){
            $message = "<p class='notice'>Sorry, no $categoryName products could be found.</p>";
        } else {
            $prodDisplay = buildProductsDisplay($products);
            
        }
        //$prodInfo = getProductInfo($invId);       
        include '../view/category.php';
    break;
    case 'view-product':
        $invId = filter_input(INPUT_GET, 'id', FILTER_SANITIZE_NUMBER_INT);
        $invName = filter_input(INPUT_POST, 'invName', FILTER_SANITIZE_STRING);
        $categoryName = filter_input(INPUT_GET, 'categoryName', FILTER_SANITIZE_STRING);
        $products = getProductInfo($invId);
        $reviewId = filter_input(INPUT_POST, 'reviewId', FILTER_SANITIZE_NUMBER_INT);
        $getReviewsByItem = getReviewId($invId);
        if(!$getReviewsByItem){
            $getReviewArray = "This product has not reviews ";
            
        }
        else {
        $getReviewArray = functionGetReview($getReviewsByItem); 
        }
        $cont = $invId;
        
        if(!count($products)){
            $message = "<p class='notice'>Sorry, no $categoryName products could be found.</p>";
        } else {
            
            
            $prodDisplay = buildProductsView($products);
           // $prodInfo = getProductInfo($invId);
            $prodInfo = getImages();
            $imprimeImage = buildProductImages($prodInfo);
        }
               
        include '../view/product-view.php';    
    break;  
    case 'default' :
     
        
        echo $catList;
     
        include '../view/prod-mgmt.php';
     break;			                          
}

