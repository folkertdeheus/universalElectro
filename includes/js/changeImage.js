/**
 * This file contains the image changing function for the product page
 */

function changeImage(targetImage)
{
    var target = document.getElementById('largeImage');

    target.src = targetImage.src;
}