<?php

/**
 * This file contains the edit products form
 */

// Check if user is logged in when accessing this file
if (login()) {

    $product = $q->getProductById($_GET['id']);

    // Get brands
    $brands = $q->allBrands();

    // Get categories
    $categories = $q->allCategories();
    
?>

    <div class="content">
        <form method="post" class="multi" enctype="multipart/form-data" action="index.php?page=2&action=1">

            <div class="content_left">
                <input type="text" name="name" id="name" placeholder="Name" value="<?= $product['name']; ?>" required />
                <input type="text" name="articlenumber" id="articlenumber" placeholder="Manufacturer articlenumber" value="<?= $product['articlenumber']; ?>" />
                <input type="text" name="own_articlenumber" id="own_articlenumber" placeholder="Own articlenumber" value="<?= $product['own_articlenumber']; ?>" />
                <textarea name="nl_description" id="nl_description" placeholder="Dutch description" required ><?= $product['description_dutch']; ?></textarea>
                <textarea name="en_description" id="en_description" placeholder="English description" required ><?= $product['description_english']; ?></textarea>
                <input type="number" name="price" id="price" placeholder="Price" min="0" step="0.01" value="<?= $product['price']; ?>" />
                <input type="text" name="tags" id="tags" placeholder="Searchtags" value="<?= $product['tags']; ?>" />

                <input type="submit" value="Submit" />
                <input type="hidden" name="form" value="editProduct" />
                <input type="hidden" name="id" value="<?= $_GET['id']; ?>" />
            </div> <!-- content_left -->

            <div class="content_right">
            <label for="brands">Brand</label>
                <select name="brands" id="brands" required >
<?php
                    foreach($brands as $brandKey => $brandValue) {
?>
                        <option value="<?= $brandValue['id']; ?>" <?php if ($brandValue['id'] == $product['brand']) { echo ' selected '; } ?>><?= $brandValue['name']; ?></option>
<?php
                    }
?>
                </select>

                <label for="categories">Category</label>
                <select name="categories" id="categories" required >
<?php
                    foreach($categories as $categoryKey => $categoryValue) {
?>
                        <option value="<?= $categoryValue['id']; ?>" <?php if ($categoryValue['id'] == $product['category']) { echo ' selected '; } ?>><?= $categoryValue['nl_name']; ?></option>
<?php
                    }
?>
                </select>

                <label for="condition">Condition</label>
                <select name="condition" id="condition">
<?php
                    // Get conditions
                    $conditions = $q->allConditions();

                    // Loop through conditions
                    foreach($conditions as $conKey => $conValue) {

                        // Check which item needs to be selected
                        $selected = null;

                        if ($conValue['id'] == $product['conditions']) { 
                            $selected = ' selected ';
                        }

                        // Option
                        echo '<option value="'.$conValue['id'].'" '.$selected.' >'.$conValue['en_name'].'</option>';
                    }
?>
                </select>

                <label for="image">Images (you can select more than 1)</label>
                <input type="file" name="image[]" id="image" multiple />
            </div> <!-- content_right -->

        </form>

    </div> <!-- content -->

<?php

}