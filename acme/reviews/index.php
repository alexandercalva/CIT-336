<?php
// Reviews controller

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
   if ($action == NULL){
       $action = 'home';
    
    }
    switch ($action){
        case 'new-review':
            
            $invId = filter_input(INPUT_POST, 'invId', FILTER_SANITIZE_NUMBER_INT);
            $clientId = $_SESSION['clientData']['clientId']; // Get the clientId
            $reviewText = filter_input(INPUT_POST, 'reviewText', FILTER_SANITIZE_STRING);
            $cont = $invId;
            $products = getProductInfo($invId); // Get the product details, calling to function into model.
            
            //Show the product details with $prodDisplay
            $prodDisplay = buildProductsView($products); // Send product details to the function named buildProductsView and assign the answer in $prodDisplay
            $prodInfo = getImages(); // Get the images and assign into $prodInfo
            
            //Show the images with $imprimeImage
            $imprimeImage = buildProductImages($prodInfo); // Call to the $buildProductImages function and sending as parameter $prodInfo
            $getReviewsByItem = getReviewId($invId); // Get all reviews by $invId in the model
            
            //Show the reviews with $getReviewArray using the functionGetReview function
            $getReviewArray = functionGetReview($getReviewsByItem);
            if (empty($products)) {
                echo "<p class='message5'>Sorry, no product was found.</p>";
                include '../view/home.php';
                exit;
            }
            if(empty($reviewText)){
                echo '<p class="message5">The review cannot be empty.</p>';
                include '../view/product-view.php';
                exit;
            }
        
            // Insert a review to the database
            $reviewInfo = insertReview($reviewText, $invId, $clientId);
            
            if($reviewInfo){
                $imprimir= "<p class='message5'>Your review was added successfully.</p>";
               // These two code lines are to refresh the reviews after of adding their.
                $getReviewsByItem = getReviewId($invId);
                $getReviewArray = functionGetReview($getReviewsByItem);
                include '../view/product-view.php';
                
            } else {
                 echo "<p class='message5'>Error: Your review was not sent.</p>";
                 include '../view/product-view.php';
                 exit;
            } 
            
            
        
        break;
        case 'update-review-submit':
            $reviewId = filter_input(INPUT_POST, 'reviewId', FILTER_SANITIZE_NUMBER_INT);
            $reviewText = filter_input(INPUT_POST, 'reviewText', FILTER_SANITIZE_STRING);
            $review = getReviews($reviewId); // Get a specific review to update it.
            
            $clientId = $_SESSION['clientData']['clientId'];
            $getReviewsByClient = getReviewClients($clientId); //Get reviews written by a specific client
           
           
            
            if (empty($review)) {
                    $_SESSION['message'] = "Sorry, review could not be found";
                    header('location: /view/home.php');
                    exit;
            }
            // Check for missing data
            if(empty($reviewText)){
                    $message = '<p>The review cannot be empty.</p>';
                   
                    include ($_SERVER['DOCUMENT_ROOT'].'/view/review.php');
                    exit;
            }
            
            // Send the update to the model with the updateReview function
            $updateReviewResult = updateReview($reviewId, $reviewText);
                    
            if ($updateReviewResult < 1) { // If $updateReviewResult is less than 1 
                    $message = "<p class ='message5'>Sorry, but your review wasn't updated. Please try again.</p>";
                    include ($_SERVER['DOCUMENT_ROOT'].'/view/review.php');
                    exit;
            } else{
                   
               // $message= "<p class='message5'>Your review was updated successfully.</p>";
                $_SESSION['message'] = "<p class='message5'>Your review was updated successfully.</p>";
               // include ($_SERVER['DOCUMENT_ROOT'].'/accounts/index.php?action="admin"');
                header ("Location: /accounts?action=admin");
                //$print = "<p class='message5'>Your review was updated successfully.</p>";
 
                    //include '../view/admin.php';
                    //exit;
            }
        break;  
        case 'update-review':
            $reviewId = filter_input(INPUT_GET, 'id', FILTER_SANITIZE_NUMBER_INT);
            
            if (empty($reviewId)) {
						$_SESSION['message'] = "Sorry, review could not be found";
                        header ("Location: /accounts?action=admin");
						exit;
				}
			$review = getReviews($reviewId);
				if (empty($review)) {
						$_SESSION['message'] = "Sorry, review could not be found";
                        header ("Location: /accounts?action=admin");
						exit;
				}
				
			include ($_SERVER['DOCUMENT_ROOT'].'/view/review.php');
            
            break;  
            case 'delete-review':
				$reviewId = filter_input(INPUT_GET, 'id', FILTER_SANITIZE_NUMBER_INT);
				if (empty($reviewId)) {
                      
                    $_SESSION['message'] = "Sorry, review could not be found";
                        header ("Location: /accounts?action=admin");
						exit;
				}
                
                $review = getReviews($reviewId);
				if (empty($review)) {
                        
                    $_SESSION['message'] = "Sorry, review could not be found";
                        header ("Location: /accounts?action=admin");
						exit;
				}
				
				include ($_SERVER['DOCUMENT_ROOT'].'/view/delete-review.php');

            break;
            case 'delete-review-submit':
				$reviewId = filter_input(INPUT_POST, 'reviewId', FILTER_SANITIZE_NUMBER_INT);
				$review = getReviews($reviewId);
				if (empty($review)) {
						$_SESSION['message'] = "Sorry, review could not be found";
                        header ("Location: /accounts?action=admin");
						exit;
				}
				
				$deleteReviewResult = deleteReview($reviewId);
						
				if ($deleteReviewResult < 1) {
						$message = "<p>Sorry, but your review wasn't deleted. Please try again.</p>";
						//include ($_SERVER['DOCUMENT_ROOT'].'/view/review-delete.php');
                        header ("Location: /accounts?action=admin");

                        exit;
				} else{
						$_SESSION['message'] = "<p class='message5'>Your review was deleted successfully.</p>";
                        header ("Location: /accounts?action=admin");
						exit;
				}
		break;
            case 'default':
          echo "hey";
          exit;
            include '../view/admin.php';
        break;      
         
    }       



 ?>