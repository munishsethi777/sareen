<?php
  Include("resize-class.php");	
  class FileUtil{
    public static function uploadFiles($file,$path){
        if(move_uploaded_file($file['tmp_name'], $path .basename($file['name'])))
        {
            return $file['name'];
        }
        else
        {
            throw new Exception("Error During file upload");
        }
    }
    
    public static function uploadImageFiles($file,$path,$name){
    	$tempName = $file['tmp_name'];
    	$error = $_FILES["inventoryImage"]['error'];
    	if(is_array($tempName)){
    		$tempName = $tempName[0];
    	}
        if(move_uploaded_file($tempName, $path.$name))
        {
            return $name;
        }
        else
        {
            throw new Exception("Error During file upload ".$path);
        }
    }
    
    public static function getAllFilesFromDir($dirPath){
    	$fileNames = array_slice(scandir($dirPath), 2);    	
    	return $fileNames;
    }
    
    public static function deletefile($path){
    	if(file_exists ($path)){
    		unlink($path);
    	}
    }
    
    public static function compress($source, $destination,$thumbnailDestination, $quality) {
    		$info = getimagesize($source);
    		if ($info['mime'] == 'image/jpeg')
    		$image = imagecreatefromjpeg($source);
    
    		elseif ($info['mime'] == 'image/gif')
    		$image = imagecreatefromgif($source);
    
    		elseif ($info['mime'] == 'image/png')
    		$image = imagecreatefrompng($source);
    		$widthOrg = imagesx($image);
    		$heightOrg = imagesy($image);
    		$newImageWidth =  $widthOrg / 2;
    		$scalingFactor = $newImageWidth / $widthOrg;
    		$newImageHeight = $heightOrg * $scalingFactor;
    		$newImage = imagecreatetruecolor($newImageWidth, $newImageHeight);
    		imagecopyresampled($newImage, $image, 0, 0, 0, 0, $newImageWidth, $newImageHeight, $widthOrg, $heightOrg);
    		imagejpeg($newImage, $destination, $quality);
    		
    		//Thumbmail
    		$scalingFactor = 200 / $widthOrg;
    		$newImageHeight = $heightOrg * $scalingFactor;
    		$newImage = imagecreatetruecolor($newImageWidth, $newImageHeight);
    		imagecopyresampled($newImage, $image, 0, 0, 0, 0, $newImageWidth, $newImageHeight, $widthOrg, $heightOrg);
    		imagejpeg($newImage, $thumbnailDestination, $quality);
    		return $destination;
    }
    
    public static function resizeImageAndUpload($sourcePath,$thumbPath){
    	$info = getimagesize($sourcePath);
    	if ($info['mime'] == 'image/jpeg')
    	$image = imagecreatefromjpeg($sourcePath);
    	
    	elseif ($info['mime'] == 'image/gif')
    	$image = imagecreatefromgif($sourcePath);
    	
    	elseif ($info['mime'] == 'image/png')
    	$image = imagecreatefrompng($sourcePath);
    	
    	$widthOrg = imagesx($image);
    	$heightOrg = imagesy($image);
    	$newWidth = $widthOrg;
    	$newImageHeight = $heightOrg;
    	if ($widthOrg > 700){
    		$newWidth = 700;	
    	}
    	$scalingFactor = $newWidth / $widthOrg;
    	$newImageHeight = $heightOrg * $scalingFactor;
    	$resizeObj = new resize($sourcePath);
    	$resizeObj -> resizeImage($newWidth, $newImageHeight, 'auto');
    	$resizeObj -> saveImage($sourcePath);
    	
    	
    	
    	$thumbNewWidth = $newWidth;
    	$thumbNewHeight = $newImageHeight;
    	if ($newWidth > 200){
    		$thumbNewWidth = 200;
    	}
    	$scalingFactor = $thumbNewWidth / $newWidth;
    	$thumbNewHeight = $newImageHeight * $scalingFactor;
    	$resizeObj = new resize($sourcePath);
    	$resizeObj -> resizeImage($thumbNewWidth, $thumbNewHeight, 'auto');
    	$resizeObj -> saveImage($thumbPath);
    	return $fileName;
    }
    
  }
    
?>
