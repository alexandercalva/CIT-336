<?php


// Create or access a Session 
session_start();
 // Get the database connection file
 require_once 'library/connections.php';
 // Get the acme model for use as needed
 require_once 'model/acme-model.php';
 require_once 'library/functions.php';
 // Get the array of categories
$categories = getCategories();
$navList = buildNav($categories);
 // Build a navigation bar using the $categories array
 

 $action = filter_input(INPUT_POST, 'action', FILTER_SANITIZE_STRING);
   if ($action == NULL){
      
    $action = filter_input(INPUT_GET, 'action', FILTER_SANITIZE_STRING);
   } 
  
  if ($action == NULL){
        $action = 'home';
  }
  else {
    $action = 'home';

  }
 
 // Check if the firstname cookie exists, get its value
//if(isset($_COOKIE['firstname'])){
    $cookieFirstname = filter_input(INPUT_COOKIE, 'firstname', FILTER_SANITIZE_STRING);
  // }

 
   
   
 switch ($action){
    
case 'home':
     
    include 'view/home.php';
break;
case 'default':
   
    include 'view/home.php';
break;
}

