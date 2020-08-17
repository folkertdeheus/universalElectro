<?php

/**
 * This file contains the setCategoryImage() function which checks and sets the product category image in the webshop
 * The input must be an array of images, as inserted in the database
 * If no (correct) image has been found, set default image
 * 
 * @param array $images
 * @param string $name
 * @return string
 */

function setCategoryImage($images, $name) : string
{

    // Set image and check if it is in proper format
    if (isset($images) && $images != null) {

        // Make array of the json database object
        $image = json_decode($images);

        // Set accepted image types
        $acceptedFileTypes = ['jpg', 'jpeg', 'png', 'gif'];

        // Check if file in database has the correct file type
        if (in_array(pathinfo($image[0], PATHINFO_EXTENSION), $acceptedFileTypes)) {

            // Strip path dots from file path
            $imagePath = str_replace('../','' ,$image[0]);

            // Return image object
            return '<img src="'.$imagePath.'" alt="<?= $name; ?>" />';

        } else {

            // Return image object with default image (image not the right type)
            return '<img src="includes/images/default.png" alt="'.$name.'" />';

        }
    } else {

        // Return image object with default image (image not found)
        return '<img src="includes/images/default.png" alt="'.$name.'" />';
    }
}