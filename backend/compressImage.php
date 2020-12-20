<?php 
/* 
 * Custom function to compress image size and 
 * upload to the server using PHP 
 */ 
// compress image
function compressImage($source, $destination, $quality)
{ 
    // Get image info 
    $imgInfo = getimagesize($source);
	
    $mime = $imgInfo['mime'];
	 // Create a new image from file 
    switch($mime){ 
        case 'image/jpeg': 
			include 'imageAutoRotate.php';  
            $image = imagecreatefromjpeg($source);      
			imagejpeg($image,$destination,$quality);
            break; 
        case 'image/png': 
            $image = imagecreatefrompng($source);
			imagejpeg($image,$destination,$quality); 
            break; 
        case 'image/gif': 
            $image = imagecreatefromgif($source);
			imagegif($image,$destination,$quality); 
            break; 
        default: 
            $image = imagecreatefromjpeg($source);
			imagejpeg($image,$destination,$quality);
            break; 			
    } 
     
    // Return compressed image  
	return $destination;
} 
?>