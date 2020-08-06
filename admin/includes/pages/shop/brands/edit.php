<?php

/**
 * This file contains the edit brands form
 */

// Check if user is logged in when accessing this file
if (login()) {

    // Get brand information
    $brands = $q->getBrandById($_GET['id']);
?>

    <div class="content">
        <form method="post" enctype="multipart/form-data" action="index.php?page=2&action=3">
            <input type="text" id="name" name="name" value="<?= $brands['name']; ?>" placeholder="Name" required onchange="editbrand('name')" />
            <label for="image"><img src="<?= $brands['image']; ?>" alt="logo preview" />&nbsp;Image (max 2Mb):</label>
            <input type="file" id="image" name="image" placeholder="Image" />
            <input type="text" id="website" name="website" value="<?= $brands['website']; ?>" placeholder="Website" />
            <textarea id="description" name="description" placeholder="Description"><?= $brands['description']; ?></textarea>
            <input type="submit" value="Submit" />
            <input type="hidden" name="form" value="editBrand" />
            <input type="hidden" name="id" value="<?= $brands['id']; ?>" />
        </form>

        <div class="message" id="message">
        </div> <!-- message -->

    </div> <!-- content -->

<?php

}