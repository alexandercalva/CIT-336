<?php

// Create or access a Session 
session_start();

// Accounts controller
  // Get the database connection file
 require_once '../library/connections.php';
 // Get the acme model for use as needed
 require_once '../model/acme-model.php';
 require_once '../model/products_model.php';
 require_once '../model/accounts-model.php';
 require_once '../model/uploads-model.php';
 require_once '../library/functions.php';  
 require_once '../model/reviews-model.php';
// Get the array of categories
// Build a navigation bar using the $categories array
$categoriesID = getCategories1();
$categories = getCategories();
$navList = buildNav($categories);
$catList = buildID($categoriesID, $navList, $categories);
$clientEmail = filter_input(INPUT_POST, 'clientEmail', FILTER_SANITIZE_EMAIL );
$clientEmail = checkEmail($clientEmail);
$clientData = getClient($clientEmail);
$action = filter_input(INPUT_POST, 'action', FILTER_SANITIZE_STRING);
if ($action == NULL){
 $action = filter_input(INPUT_GET, 'action', FILTER_SANITIZE_STRING);
 
}
if ($action == NULL){
    
    header('location: ../?action=home');
    exit;
  }
  switch ($action){
    case 'login':
        include '../view/login.php';
    break;  
    case 'register':
        include '../view/registration.php';
     break;  
    case 'update':
      include '../view/client-update.php';
      break; 
    } 
 
  switch ($action){
    
    case 'registration':
        $clientFirstname = filter_input(INPUT_POST, 'clientFirstname', FILTER_SANITIZE_STRING );
        $clientLastname = filter_input(INPUT_POST, 'clientLastname', FILTER_SANITIZE_STRING );
        $clientEmail = filter_input(INPUT_POST, 'clientEmail', FILTER_SANITIZE_EMAIL );
        $clientEmail = checkEmail($clientEmail);
        $clientPassword = filter_input(INPUT_POST, 'clientPassword', FILTER_SANITIZE_STRING );
        $checkPassword = checkPassword($clientPassword);
        $comments = filter_input(INPUT_POST, 'comments', FILTER_SANITIZE_STRING );
        
        $existingEmail = checkExistingEmail($clientEmail);
         //echo $existingEmail;
    
       // Check for existing email address in the table
        if($existingEmail){
            $message = '<p class="notice">That email address already exists. Do you want to login instead?</p>';
            include '../view/login.php';
            exit;
        }
        
        if (empty($clientFirstname) || empty($clientLastname) || empty($clientEmail) || empty($checkPassword)|| empty($comments)){
           echo '<div class ="regis"><p>Please provide information for all empty form fields</p></div>';
            include '../view/registration.php';
            exit;
        } 
           
// Send the data to the model
     $hashedPassword = password_hash($clientPassword, PASSWORD_DEFAULT);
    $regOutcome = regClient($clientFirstname, $clientLastname, $clientEmail,$hashedPassword, $comments);
    // Check and report the result 
    
    
    
    
    if($regOutcome === 1){
        //setcookie('firstname', $clientFirstname, strtotime('+1 year'), '/');      
        echo '<div class="message4"><p> Thanks for registering '. $clientFirstname . '</p></div>';
        include '../view/login.php';
        
    } else {
        
        $message = '<p>Sorry $clientFirstname, but the registration failed. Please try again. </p>';
        include '../view/login.php';
        exit;
    
    }
        
    break;
   
    case 'log':
        setcookie('firstname', '', strtotime('-1 year'), '/');
        $clientFirstname = filter_input(INPUT_POST, 'clientFirstname', FILTER_SANITIZE_STRING );
        $clientEmail = filter_input(INPUT_POST, 'clientEmail', FILTER_SANITIZE_EMAIL );
        $clientEmail = checkEmail($clientEmail);
        $clientPassword = filter_input(INPUT_POST, 'clientPassword', FILTER_SANITIZE_STRING );
        $checkPassword = checkPassword($clientPassword);
        $invId = filter_input(INPUT_POST, 'invId', FILTER_SANITIZE_NUMBER_INT);
        $categoryName = filter_input(INPUT_GET, 'categoryName', FILTER_SANITIZE_STRING);
            $cont = $invId;
                            
        if (empty($clientEmail) || empty($checkPassword)){
            
            echo '<div class ="log"><p>Please provide information for all empty form fields</p></div>';
            include '../view/login.php';
            exit;
        } 
        
        
        
        // A valid password exists, proceed with the login process
        // Query the client data based on the email address
        $clientData = getClient($clientEmail);
        $clientFirstname = $clientData['clientFirstname'];
       
        $cookieFirstname = filter_input(INPUT_COOKIE, 'firstname', FILTER_SANITIZE_STRING);
        setcookie('firstname', $clientFirstname, strtotime('+1 year'), '/');      
        $cookieFirstname = $clientFirstname;
        //$clientId = $_SESSION['clientData']['clientId'];
        $clientId = $clientData['clientId'];
        $getReviewsByClient = getReviewClients($clientId);
        $getReviewArray = printClient($getReviewsByClient);
        
                
        // Compare the password just submitted against
        // the hashed password for the matching client
        $hashCheck = password_verify($clientPassword, $clientData['clientPassword']);
        // If the hashes don't match create an error
        // and return to the login view
        if (!$hashCheck) {
        $message = '<p class="notice">Please check your password and try again.</p>';
        include '../view/login.php';
        exit; 
        }

        // A valid user exists, log them in
        $_SESSION['loggedin'] = TRUE;
        // Remove the password from the array
        // the array_pop function removes the last
        // element from an array
        array_pop($clientData);
        // Store the array into the session
        $_SESSION['clientData'] = $clientData;
        // Send them to the admin view
        include '../view/admin.php';
        exit;



        break;       
        case 'logOut':
            session_destroy();
            setcookie('firstname', $_SESSION['clientData']['clientFirstname'], strtotime('-1 year'), '/');
            header('Location: ../');
            exit;
        break;
        
        // Client Update
        case 'Update':
            $clientFirstname = filter_input(INPUT_POST, 'clientFirstname', FILTER_SANITIZE_STRING );
            $clientLastname = filter_input(INPUT_POST, 'clientLastname', FILTER_SANITIZE_STRING );
            $clientEmail = filter_input(INPUT_POST, 'clientEmail', FILTER_SANITIZE_EMAIL );
            $clientEmail = checkEmail($clientEmail);
            $clientId = $_SESSION['clientData']['clientId'];
            $clientEmail = filter_input(INPUT_POST, 'clientEmail', FILTER_SANITIZE_EMAIL );
             $clientData = getClient($clientEmail);
          
             $cookieFirstname = $_SESSION['clientData']['clientFirstname'];
            $existingEmail = checkExistingEmail($clientEmail);
            //echo $existingEmail;
    
            // Check for existing email address in the table
            if($existingEmail){
                $message = '<p class="notice">That email address already exists. Do you want to login instead?</p>';
                include '../view/client-update.php';
                exit;
            }
        
            if (empty($clientFirstname) || empty($clientLastname) || empty($clientEmail) || empty($clientId)){
            echo '<div class ="regis"><p>Please provide information for all empty form fields</p></div>';
                include '../view/client-update.php';
                exit;
            } 
            
            $regOutcome = updateClient($clientId,$clientFirstname, $clientLastname, $clientEmail);
            // Check and report the result 
            
            
            
            
            if($regOutcome === 1){
                setcookie('firstname', $clientFirstname, strtotime('+1 year'), '/');      
                echo '<div class="message4"><p> Thanks for registering '. $clientFirstname . '</p></div>';
                include '../view/login.php';
                
            } else {
                
                $message = '<p>Sorry $clientFirstname, but the registration failed. Please try again. </p>';
                include '../view/login.php';
                exit;
            
            }
                
        
        
        break;
        case 'password':
            $clientId = $_SESSION['clientData']['clientId'];
            $clientPassword = filter_input(INPUT_POST, 'clientPassword', FILTER_SANITIZE_STRING );
            $checkPassword = checkPassword($clientPassword);
            
            if (empty($checkPassword) || empty($clientId)){
                
                echo '<div class ="log"><p>Please provide information for all empty form fields</p></div>';
                include '../view/client-update.php';
                exit;
            } 
            $clientId = $_SESSION['clientData']['clientId'];
            
            $hashedPassword = password_hash($clientPassword, PASSWORD_DEFAULT);

            $regOutcome1 = updateClientPassword($clientId,$hashedPassword);
            // Check and report the result 
                    
            
            
            if($regOutcome1 === 1){
               // setcookie('firstname', $clientFirstname, strtotime('+1 year'), '/');      
                echo '<div class="message4"><p> Your password has been changed.</p></div>';
                include '../view/client-update.php';
                
            } else {
                
                $message = '<p>Sorry $clientFirstname, but the registration failed. Please try again. </p>';
                include '../view/client-update.php';
                exit;
            
            }
            
            
            
        break;
        case 'admin':
        
        $clientEmail = filter_input(INPUT_POST, 'clientEmail', FILTER_SANITIZE_EMAIL );
        $clientData = getClient($clientEmail);
        $cookieFirstname = $_SESSION['clientData']['clientFirstname'];
        $clientId = $_SESSION['clientData']['clientId'];
        $getReviewsByClient = getReviewClients($clientId);
        $getReviewArray = printClient($getReviewsByClient);
        //if(isset($_SESSION['message'])){
          //  echo $_SESSION['message'];
            //$_SESSION['message'] = " ";
         //}      
            include '../view/admin.php';
            exit;
        break;    
        case 'default':
            include '../view/home.php';
        break;  

        

    }
   
