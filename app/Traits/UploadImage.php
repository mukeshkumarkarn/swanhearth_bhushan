<?php

namespace App\Traits;

use App\Models\AppNotifications;


trait UploadImage
{
   //upload image
   private function UploadImage($storage, $path, $image, $img)
   {

       if (count(array($image)) > 0) {
           $new_name_of_profile_photo=$img;
           $image->move($storage, $new_name_of_profile_photo);
        //    return $path.'/'.$new_name_of_profile_photo;
           return $path.$new_name_of_profile_photo;


       } else {
       }


   }

   // compress image
   public function compressImageWebp($source, $destination, $quality)
   {

       $info = getimagesize($source);

       if ($info['mime'] == 'image/jpeg') {
           $image = imagecreatefromjpeg($source);
       } elseif ($info['mime'] == 'image/png') {
           $image = imagecreatefrompng($source);
       }

       imagewebp($image, $destination, $quality);


       return true;
   }



   // compress image to jpeg
   public function compressImageJPEG($source, $destination, $quality)
   {
       $info = getimagesize($source);

       if ($info['mime'] == 'image/jpeg') {
           $image = imagecreatefromjpeg($source);
       } elseif ($info['mime'] == 'image/png') {
           $image = imagecreatefrompng($source);
       }

       imagejpeg($image, $destination, $quality);
       //$this->resizeImageWebp($source);
       return true;
   }
}