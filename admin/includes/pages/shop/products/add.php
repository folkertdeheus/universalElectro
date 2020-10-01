<?php

/**
 * This file contains the add products form
 */

// Check if user is logged in when accessing this file
if (login()) {

    // Get brands
    $brands = $q->allBrands();

    // Get categories
    $categories = $q->allCategories();
    
?>

    <div class="content">
        <form method="post" class="multi" enctype="multipart/form-data" action="index.php?page=2&action=1">

            <div class="content_left">
                <input type="text" name="name" id="name" placeholder="Name" required />
                <input type="text" name="articlenumber" id="articlenumber" placeholder="Manufacturer articlenumber" />
                <input type="text" name="own_articlenumber" id="own_articlenumber" placeholder="Own articlenumber" />
                <textarea name="nl_description" id="nl_description" placeholder="Dutch description" required ></textarea>
                <textarea name="en_description" id="en_description" placeholder="English description" required ></textarea>
                <input type="number" name="price" id="price" placeholder="Price" min="0" step="0.01" />
                <input type="text" name="tags" id="tags" placeholder="Searchtags" />

                <input type="submit" value="Submit" />
                <input type="hidden" name="form" value="addProduct" />
            </div> <!-- content_left -->

            <div class="content_right">
                <label for="brands">Brand</label>
                <select name="brands" id="brands" required >
<?php
                    // Loop through all brands
                    foreach($brands as $brandKey => $brandValue) {
?>
                        <option value="<?= $brandValue['id']; ?>"><?= $brandValue['name']; ?></option>
<?php
                    }
?>
                </select>

                <label for="categories">Category</label>
                <select name="categories" id="categories" required >
<?php
                    // Loop through all categories
                    foreach($categories as $categoryKey => $categoryValue) {
?>
                        <option value="<?= $categoryValue['id']; ?>"><?= $categoryValue['nl_name']; ?></option>
<?php
                    }
?>
                </select>

                <label for="condition">Condition</label>
                <select name="condition" id="condition">
<?php
                    // Get conditions
                    $conditions = $q->allConditions();

                    // Loop through all conditions
                    foreach($conditions as $conKey => $conValue) {
                        echo '<option value="'.$conValue['id'].'">'.$conValue['en_name'].'</option>';
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