<?php

/**
 * This file contains the brands management
 */

// Check if user is logged in when accessing this file
if (login()) {
    
?>
    <div class="content">
    <?php
        // Only continue when there are brands in the database
        // Without brands, there can be no products
        if ($q->countBrands() > 0 && $q->countCategories() > 0) {
?>
            <div class="toolbar">
                <a href="index.php?page=2&action=1&sub=1">Add product</a>
                <a href="index.php?page=2&action=3">Brands</a>
                <a href="index.php?page=2&action=4">Categories</a>
            </div> <!-- toolbar -->

            <div class="table">
<?php
                // Count products in table
                if($q->countProducts() > 0) {

                    // Get all products
                    $products = $q->allProducts();
?>
                    <table id="paginate">
                        <tr>
                            <td>Name</td>
                            <td>Brand</td>
                            <td>Category</td>
                            <td>Own Articlenumber</td>
                            <td>Price</td>
                            <td class="icon">&nbsp;</td>
                            <td class="icon">&nbsp;</td>
                            <td class="icon">&nbsp;</td>
                        </tr>
<?php
                        foreach($products as $productsKey => $productsValue) {

                            // Get brand
                            $brand = $q->getBrandById($productsValue['brand']);

                            // Get category
                            $category = $q->getCategoryById($productsValue['category']);
?>
                            <tr id="row<?= $productsKey+1; ?>">
                                <td><?= $productsValue['name']; ?></td>
                                <td><?= $brand['name']; ?></td>
                                <td><?= $category['en_name']; ?></td>
                                <td><?= $productsValue['own_articlenumber']; ?></td>
                                <td><?= $productsValue['price']; ?></td>
                                <td class="icon"><a href="index.php?page=2&action=1&sub=2&id=<?= $productsValue['id']; ?>"><img src="includes/images/edit.png" alt="edit" /></a></td>
                                <td class="icon"><a href="index.php?page=2&action=1&sub=3&id=<?= $productsValue['id']; ?>"><img src="includes/images/delete.png" alt="delete" /></a></td>
                            </tr>
<?php
                        }
?>
                    </table>

                    <div class="pagebuttons" id="pagebuttons">
                    </div> <!-- pagebuttons -->
<?php
                } else {
                    echo 'No products';
                }
?>
            </div> <!-- table -->
<?php
        } else {
?>
            <div class="toolbar">
                <a href="index.php?page=2&action=4">Categories</a>
                <a href="index.php?page=2&action=3">Brands</a>
            </div> <!-- toolbar -->

            <div class="table">
                Add a brand and category first, before adding products
            </div> <!-- table -->
<?php
        }
?>
    </div> <!-- content -->

<?php

}