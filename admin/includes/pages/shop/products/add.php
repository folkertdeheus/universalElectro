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
        <form method="post" enctype="multipart/form-data" action="index.php?page=2&action=1">
            <input type="text" name="name" id="name" placeholder="Name" required onchange="addproduct('name')" />
            <label for="brands">Brand</label>
            <select name="brands" id="brands" required onchange="addproduct('brands')">
<?php
                foreach($brands as $brandKey => $brandValue) {
?>
                    <option value="<?= $brandValue['id']; ?>"><?= $brandValue['name']; ?></option>
<?php
                }
?>
            </select>
            <label for="categories">Category</label>
            <select name="categories" id="categories" required onchange="addproduct('categories')">
<?php
                foreach($categories as $categoryKey => $categoryValue) {
?>
                    <option value="<?= $categoryValue['id']; ?>"><?= $categoryValue['name']; ?></option>
<?php
                }
?>
            </select>
            <input type="text" name="articlenumber" id="articlenumber" placeholder="Articlenumber" required onchange="addproduct('articlenumber')" />
            <textarea name="nl_description" id="nl_description" placeholder="Dutch description" required onchange="addproduct('nl_description')"></textarea>
            <textarea name="en_description" id="en_description" placeholder="English description" required onchange="addproduct('en_description')"></textarea>
            <textarea name="properties" id="properties" placeholder="Properties"></textarea>
            <textarea name="specifications" id="specifications" placeholder="Specifications"></textarea>
            <input type="number" name="price" id="price" placeholder="Price" min="0" step="0.01" />
            <input type="text" name="tags" id="tags" placeholder="Searchtags" />
            <label for="highlight">Highlight</label>
            <select name="highlight" id="highlight">
                <option value="0">No</option>
                <option value="1">Yes</option>
            </select>
            <label for="image">Images (you can select more than 1)</label>
            <input type="file" name="image[]" id="image" multiple />
            <input type="submit" value="Submit" />
            <input type="hidden" name="form" value="addProduct" />
        </form>

        <div class="message" id="message">
        </div> <!-- message -->

    </div> <!-- content -->

<?php

}