<?php

/* Functions */
// Function to build the nav 
function buildNav($categories){
   
 $navList = '<ul>';
 $navList .= "<li><a href='../index.php' title='View the Acme home page'>Home</a></li>";
 foreach ($categories as $category) {
  $navList .= "<li><a href='../products/?action=category&categoryName=".urlencode($category['categoryName'])."' title='View our $category[categoryName] product line'>$category[categoryName]</a></li>";
 }
 $navList .= '</ul>';
 //echo $navList;
 //exit;
    
 return $navList;
}

// Function to build catList
function buildID($categoriesID,$navList,$categories){
   $indexCatIDtryarray = 0;
   $catNames = array();
   foreach ($categories as $category) {
    $navList .= "<li><a href='../products/?action=category&categoryName=".urlencode($category['categoryName'])."' title='View our $category[categoryName] product line'>$category[categoryName]</a></li>";
       //save the names in the array
      $catNames[$indexCatIDtryarray] = urlencode($category['categoryName']);
       //increment the index
       $indexCatIDtryarray = $indexCatIDtryarray + 1;
   }
   $navList .= '</ul>';
    //echo $navList;
    //exit;
    // reset the index
    //*********************************************************** */
   
    
    
    
    
    
    //********************************************************* */
    $indexCatIDtryarray = 0;
    $catList = '<select name="categoryId" id="categoryId" class="message3">';
    $catList .= '<option value="Choose a category">Choose a category</option>';
    foreach ($categoriesID as $categoryID) {
        $catList .= '<option value="'.urlencode($categoryID['categoryId']).'" class="big">'.$catNames[$indexCatIDtryarray].'</option>';
        //use the array to write the name according the index, in the sql they use the same class of organization
        $indexCatIDtryarray = $indexCatIDtryarray + 1;
    }
    $catList .= '</select>';
    //echo $catList;
    //exit;
     
    return $catList;
}
// Function to check an email
function checkEmail($clientEmail){
    $valEmail = filter_var($clientEmail, FILTER_VALIDATE_EMAIL);
    return $valEmail;
}
// Check the password for a minimum of 8 characters,
 // at least one 1 capital letter, at least 1 number and
 // at least 1 special character
function checkPassword($clientPassword){
 $pattern = '/^(?=.*[[:digit:]])(?=.*[[:punct:]])(?=.*[A-Z])(?=.*[a-z])([^\s]){8,}$/';
 return preg_match($pattern, $clientPassword);
}

// Function to check a correct price
function checkPrice($invPrice){
    if (strlen(substr(strrchr($invPrice, "."), 1)) < 3 && $invPrice >= 0){
            return filter_var($invPrice, FILTER_VALIDATE_FLOAT, FILTER_FLAG_ALLOW_FRACTION);
    } else{
            return NULL;
    }
}
// Function to check integer numbers
function checkInt($num){
    return filter_var($num, FILTER_VALIDATE_INT, array("options" => array("min_range"=>0)));
}
// Function to check float numbers
function checkFloat($num){
    if ($num >= 0){
            return filter_var($num, FILTER_VALIDATE_FLOAT, FILTER_FLAG_ALLOW_FRACTION);
    } else{
            return NULL;
    }
}

// Build the categories select list 
function buildCategoryList($categories){ 
    $catList = '<select name="categoryId" id="categoryId">'; 
    $catList .= "<option>Choose a Category</option>"; 
    foreach ($categories as $category) { 
     $catList .= "<option value='$category[categoryId]'>$category[categoryName]</option>"; 
    } 
    $catList .= '</select>'; 
    return $catList; 
   }
 // Function for validation of $updateResult
 function validation($prodInfo, $invName, $invDescription, $invImage,$invThumbnail,$invPrice, $invStock, $invSize, $invWeight, $invLocation,$invVendor, $invStyle, $invId ) {
    if($prodInfo['invName'] != $invName){
        $updateResult = updateProduct($invName, $invDescription, $invImage,$invThumbnail,$invPrice, $invStock, $invSize, $invWeight, $invLocation,$invVendor, $invStyle, $invId);
    }else if($prodInfo['invImage'] != $invImage){
        $updateResult = updateProduct($invName, $invDescription, $invImage,$invThumbnail,$invPrice, $invStock, $invSize, $invWeight, $invLocation,$invVendor, $invStyle, $invId);
    }else if($prodInfo['invThumbnail'] != $invThumbnail){
        $updateResult = updateProduct($invName, $invDescription, $invImage,$invThumbnail,$invPrice, $invStock, $invSize, $invWeight, $invLocation,$invVendor, $invStyle, $invId);
    }else if($prodInfo['invPrice'] != $invPrice){
        $updateResult = updateProduct($invName, $invDescription, $invImage,$invThumbnail,$invPrice, $invStock, $invSize, $invWeight, $invLocation,$invVendor, $invStyle, $invId);
    }else if($prodInfo['invStock'] != $invStock){
        $updateResult = updateProduct($invName, $invDescription, $invImage,$invThumbnail,$invPrice, $invStock, $invSize, $invWeight, $invLocation,$invVendor, $invStyle, $invId);
    }else if($prodInfo['invSize'] != $invSize){
        $updateResult = updateProduct($invName, $invDescription, $invImage,$invThumbnail,$invPrice, $invStock, $invSize, $invWeight, $invLocation,$invVendor, $invStyle, $invId);
    }else if($prodInfo['invWeight'] != $invWeight){
        $updateResult = updateProduct($invName, $invDescription, $invImage,$invThumbnail,$invPrice, $invStock, $invSize, $invWeight, $invLocation,$invVendor, $invStyle, $invId);
    }else if($prodInfo['invLocation'] != $invLocation){
        $updateResult = updateProduct($invName, $invDescription, $invImage,$invThumbnail,$invPrice, $invStock, $invSize, $invWeight, $invLocation,$invVendor, $invStyle, $invId);
    }else if($prodInfo['invVendor'] != $invVendor){
        $updateResult = updateProduct($invName, $invDescription, $invImage,$invThumbnail,$invPrice, $invStock, $invSize, $invWeight, $invLocation,$invVendor, $invStyle, $invId);
    }else if($prodInfo['invStyle'] != $invStyle){
        $updateResult = updateProduct($invName, $invDescription, $invImage,$invThumbnail,$invPrice, $invStock, $invSize, $invWeight, $invLocation,$invVendor, $invStyle, $invId);
    }else {
        $updateResult = 0;
         
    }
   return $updateResult; 
} 

// Function to build a displaY of products
function buildProductsDisplay($products){
    $pd = '<ul id="prod-display">';
    foreach ($products as $product) {
     $pd .= '<li>';
     $pd .= "<a href ='../products?action=view-product&id=$product[invId]'><img src='$product[invThumbnail]' alt='Image of $product[invName] on Acme.com'></a>";
     $pd .= '<hr>';
     $pd .= "<a href ='../products?action=view-product&id=$product[invId]'><h2>$product[invName]</h2></a>";
     $pd .= "<span>$product[invPrice]</span>";
     $pd .= '</li>';
    }
    $pd .= '</ul>';
    return $pd;
   }
   // Function to show only an image
   function buildProductImages($imageArray){
    $pd = '<div id="images">';
    
     foreach($imageArray as $prod) {
        $fileN = pathinfo($prod['imgName'], PATHINFO_FILENAME);
        $extension = substr($fileN, -2);
        if($prod['invId'] == $GLOBALS['cont'] && $extension != 'tn'){
            $pd .= "<img src='$prod[imgPath]' alt='Image of $prod[imgName] on Acme.com'>";
                       
         }    
                    
    }
              
     
    $pd .= '</div>';   
    return $pd;

    }

   function buildProductsView($products){
    $pd = '<div id="prod-details">';
   

    $pd .= "<div><h1>$products[invName]</h1>";
    $pd .= "<img src='$products[invImage]' alt='Image of $products[invName] on Acme.com'></div>";
    $pd .= "<div id='vendor'><h3>By $products[invVendor]</h3>";
    $pd .= "<h2>$products[invStock] left in stock.</h2>";
    $pd .= "<p>$products[invDescription]</p>";
    $pd .= "<ul><li>Size: $products[invSize] in&sup3;</li>";
    $pd .= "<li>Weight: $products[invWeight] lbs</li>";
    $pd .= "<li>Material: $products[invStyle]</li></ul>";
    $pd .= "<h2 class='price'>$products[invPrice]</h2>";
    $pd .= "<h3>Ships from $products[invLocation]</h3></div>";
    $pd .= "</div>";
    
    return $pd;
}

/* * ********************************
*  Functions for working with images
* ********************************* */

    function makeThumbnailName($image) {
        $i = strrpos($image, '.');
        $image_name = substr($image, 0, $i);
        $ext = substr($image, $i);
        $image = $image_name . '-tn' . $ext;
        return $image;
    }
   
    // Build images display for image management view
    function buildImageDisplay($imageArray) {
        $id = '<ul id="image-display">';
        foreach ($imageArray as $image) {
        $id .= '<li>';
        $id .= "<img src='$image[imgPath]' title='$image[invName] image on Acme.com' alt='$image[invName] image on Acme.com'>";
        $id .= "<p><a href='/uploads?action=delete&imgId=$image[imgId]&filename=$image[imgName]' title='Delete the image'>Delete $image[imgName]</a></p>";
        $id .= '</li>';
        }
        $id .= '</ul>';
        return $id;
   } 

   // Build the products select list
    function buildProductsSelect($products) {
        $prodList = '<select name="invId" id="invId">';
        $prodList .= "<option>Choose a Product</option>";
        foreach ($products as $product) {
        $prodList .= "<option value='$product[invId]'>$product[invName]</option>";
        }
        $prodList .= '</select>';
        return $prodList;
   }

   // Handles the file upload process and returns the path
// The file path is stored into the database
    function uploadFile($name) {
        // Gets the paths, full and local directory
        global $image_dir, $image_dir_path;
        if (isset($_FILES[$name])) {
            // Gets the actual file name
            $filename = $_FILES[$name]['name'];
            if (empty($filename)) {
                return;
            }
            // Get the file from the temp folder on the server
            $source = $_FILES[$name]['tmp_name'];
            // Sets the new path - images folder in this directory
            $target = $image_dir_path . '/' . $filename;
            // Moves the file to the target folder
            move_uploaded_file($source, $target);
            // Send file for further processing
            processImage($image_dir_path, $filename);
            // Sets the path for the image for Database storage
            $filepath = $image_dir . '/' . $filename;
            // Returns the path where the file is stored
            return $filepath;
        }
   }

    // Processes images by getting paths and 
    // creating smaller versions of the image
    function processImage($dir, $filename) {
        // Set up the variables
        $dir = $dir . '/';

        // Set up the image path
        $image_path = $dir . $filename;

        // Set up the thumbnail image path
        $image_path_tn = $dir.makeThumbnailName($filename);

        // Create a thumbnail image that's a maximum of 200 pixels square
        resizeImage($image_path, $image_path_tn, 200, 200);

        // Resize original to a maximum of 500 pixels square
        resizeImage($image_path, $image_path, 500, 500);
    }

// Checks and Resizes image
function resizeImage($old_image_path, $new_image_path, $max_width, $max_height) {
    // Get image type
    $image_info = getimagesize($old_image_path);
    $image_type = $image_info[2];
    // Set up the function names
    switch ($image_type) {
            case IMAGETYPE_JPEG:
                    $image_from_file = 'imagecreatefromjpeg';
                    $image_to_file = 'imagejpeg';
            break;
            case IMAGETYPE_GIF:
                    $image_from_file = 'imagecreatefromgif';
                    $image_to_file = 'imagegif';
            break;
            case IMAGETYPE_PNG:
                    $image_from_file = 'imagecreatefrompng';
                    $image_to_file = 'imagepng';
            break;
            default:
                    return;
            break;
    }
    // Get the old image and its height and width
    $old_image = $image_from_file($old_image_path);
    $old_width = imagesx($old_image);
    $old_height = imagesy($old_image);
    // Calculate height and width ratios
    $width_ratio = $old_width / $max_width;
    $height_ratio = $old_height / $max_height;
    // If image is larger than specified ratio, create the new image
    if ($width_ratio > 1 || $height_ratio > 1) {
            // Calculate height and width for the new image
            $ratio = max($width_ratio, $height_ratio);
            $new_height = round($old_height / $ratio);
            $new_width = round($old_width / $ratio);
            // Create the new image
            $new_image = imagecreatetruecolor($new_width, $new_height);
            // Set transparency according to image type
            if ($image_type == IMAGETYPE_GIF) {
                    $alpha = imagecolorallocatealpha($new_image, 0, 0, 0, 127);
                    imagecolortransparent($new_image, $alpha);
            }
            if ($image_type == IMAGETYPE_PNG || $image_type == IMAGETYPE_GIF) {
                    imagealphablending($new_image, false);
                    imagesavealpha($new_image, true);
            }
            // Copy old image to new image - this resizes the image
            $new_x = 0;
            $new_y = 0;
            $old_x = 0;
            $old_y = 0;
            imagecopyresampled($new_image, $old_image, $new_x, $new_y, $old_x, $old_y, $new_width, $new_height, $old_width, $old_height);
            // Write the new image to a new file
            $image_to_file($new_image, $new_image_path);
            // Free any memory associated with the new image
            imagedestroy($new_image);
} else {
            // Write the old image to a new file
            $image_to_file($old_image, $new_image_path);
}
// Free any memory associated with the old image
imagedestroy($old_image);
}    

// Functions for reivews

function functionGetReview($getReviewsByItem){
    $id = '<div id="review-item">';
        foreach ($getReviewsByItem as $item) {
    
            $id.= "<div class='item'><h3>". substr( $item['clientFirstname'], 0,1). $item['clientLastname']. " "."<span class='fecha'>wrote on</span>"." ". "<span class='fecha'>". $item['reviewDate']."</span>" .":". "</h3></div>";
            $id .="<div><p> $item[reviewText]</p>";
            $id .= "</div>";    
         
        } 
        $id .= '</div>';
        return $id;

}

function printClient($getReviewsByClient){
    $id = '<div id="review-item">';
        foreach ($getReviewsByClient as $item) {
    
            $id.= "<div class='item'><h3>". $item['invName']." ". "<span class='fecha'>wrote on</span>"." ". "<span class='fecha'>". $item['reviewDate']."</span>" .":"." ".  "<a href='../reviews/index.php?action=update-review&id=$item[reviewId]'>Edit</a>". " ". " | ". "<a href='../reviews/index.php?action=delete-review&id=$item[reviewId]'>Delete</a></h3></div>";
            $id .="<div><p> $item[reviewText]</p>";
            $id .= "</div>";    
         
        } 
        $id .= '</div>';
        return $id;
}
function functionGetUpdate($getUpdate){
    $id = '<div id="review-item1">';
        foreach ($getUpdate as $item) {
    
            $id.= "<div class='item'><h3>". $item['invName']." ". "<span class='fecha'>wrote on</span>"." ". "<span class='fecha'>". $item['reviewDate']."</span>". "</h3></div>";
            $id .="<div><p> $item[reviewText]</p>";
            $id .= "</div>";    
         
        } 
        $id .= '</div>';
        return $id;

}
