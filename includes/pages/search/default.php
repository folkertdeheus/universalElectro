<?php

/**
 * This file contains the search page
 */

// Set search term for form
$searchTerm = null;

// Check if form is sent, run query
if (isset($_POST['form']) && $_POST['form'] == 'search') { 
    $searchTerm = $_POST['search'];
    $result = $q->search(htmlentities($_POST['search']));
}

?>

<main id="mainEnglish">

    <div class="title">
        Search
    </div> <!-- title -->

    <div class="search">

        <form method="post">
            <input type="search" name="search" placeholder="Search" value="<?= $searchTerm; ?>" />
            <input type="submit" value="Go" />
            <input type="hidden" name="form" value="search" />
        </form>

    </div> <!-- search -->

<?php

    if (isset($_POST['form']) && $_POST['form'] == 'search' && isset($result) && $result != null) {

?>

        <div class="search_results">

<?php
            // Count arrays
            // 1 = products
            // 2 = brands
            // 3 = categories
            $countArray = 1;

            // Loop through results
            foreach($result as $resultKey => $resultValue) {

                // Check if result are not empty
                if (count($resultValue) > 0) {

                    switch($countArray) {
                        case '1':
?>
                            <span>Products</span>

                            <div class="search_result">
                                <table>
                                    <tr>
                                        <th>Name</th>
                                        <th>Brand</th>
                                        <th>Category</th>
                                        <th>Article number</th>
                                    </tr>
<?php
                                    foreach($resultValue as $productKey => $productValue) {
                                        $cat = $q->getCategoryById($productValue['category']);
                                        $brand = $q->getBrandById($productValue['brand']);
?>
                                        <tr class="trmarkup" onclick="window.location='index.php?page=1&cat=<?= $productValue['category']; ?>&product=<?= $productValue['id']; ?>';">
                                            <td class="s4"><?= $productValue['name']; ?></td>
                                            <td class="s4"><?= $brand['name']; ?></td>
                                            <td class="s4"><?= $cat['en_name']; ?></td>
                                            <td class="s4"><?= $productValue['articlenumber']; ?></td>
                                        </tr>
<?php
                                    }
?>
                                </table>
                            </div> <!-- search_result -->
<?php
                            break;
                        case '2':
?>
                            <span>Brands</span>

                            <div class="search_result">
<?php
                                foreach($resultValue as $brandKey => $brandValue) {
                                    $products = $q->getProductByBrand($brandValue['id']);
?>
                                    <?= $brandValue['name']; ?>
                                    
                                    <div class="search_result">
                                        <table>
                                            <tr>
                                                <th>Name</th>
                                                <th>Category</th>
                                                <th>Articlenumber</th>
                                            </tr>
<?php
                                        foreach($products as $productKey => $productValue) {
                                            $cat = $q->getCategoryById($productValue['category']);
?>
                                            <tr class="trmarkup" onclick="window.location='index.php?page=1&cat=<?= $productValue['category']; ?>&product=<?= $productValue['id']; ?>';">
                                                <td class="s3"><?= $productValue['name']; ?></td>
                                                <td class="s3"><?= $cat['en_name']; ?></td>
                                                <td class="s3"><?= $productValue['articlenumber']; ?></td>
                                            </tr>
<?php
                                        }
?>
                                        </table>
                                    </div> <!-- search_result -->
<?php
                                }
?>
                            </div> <!-- search_result -->
<?php
                            break;
                        case '3':
?>
                            <span>Categories</span>

                            <div class="search_result">
<?php
                                foreach($resultValue as $catKey => $catValue) {
                                    $products = $q->getProductsByCategory($catValue['id']);
?>
                                    <?= $catValue['en_name']; ?>
                                    
                                    <div class="search_result">
                                        <table>
                                            <tr>
                                                <th>Name</th>
                                                <th>Brand</th>
                                                <th>Articlenumber</th>
                                            </tr>
<?php
                                        foreach($products as $productKey => $productValue) {
                                            $brand = $q->getBrandById($productValue['brand']);
?>
                                            <tr class="trmarkup" onclick="window.location='index.php?page=1&cat=<?= $productValue['category']; ?>&product=<?= $productValue['id']; ?>';">
                                                <td class="s3"><?= $productValue['name']; ?></td>
                                                <td class="s3"><?= $brand['name']; ?></td>
                                                <td class="s3"><?= $productValue['articlenumber']; ?></td>
                                            </tr>
<?php
                                        }
?>
                                        </table>
                                    </div> <!-- search_result -->
<?php
                                }
?>
                            </div> <!-- search_result -->
<?php
                            break;
                    }
                }

                // Next array
                $countArray++;
            }
?>

        </div> <!-- search_results -->

<?php
    }

?>
</main>

<main id="mainDutch">
</main>