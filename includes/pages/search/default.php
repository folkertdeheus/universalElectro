<?php

/**
 * This file contains the search page
 */

// Set search term for form
$searchTerm = null;

// Check if form is sent, run query
if (isset($_POST['form']) && $_POST['form'] == 'search') { 
    $searchTerm = htmlentities($_POST['search']);
    $result = $q->search($searchTerm);
}

?>

<main id="mainEnglish">

    <div class="title">
        <?= $language['en_search_search']; ?>
    </div> <!-- title -->

    <div class="search">

        <form method="post">
            <input type="search" name="search" placeholder="<?= $language['en_search_searchfield']; ?>" value="<?= $searchTerm; ?>" />
            <input type="submit" value="<?= $language['en_search_go']; ?>" />
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
                            <span><?= $language['en_search_products']; ?></span>

                            <div class="search_result">
                                <table>
                                    <tr>
                                        <th><?= $language['en_search_name']; ?></th>
                                        <th><?= $language['en_search_brand']; ?></th>
                                        <th><?= $language['en_search_category']; ?></th>
                                        <th><?= $language['en_search_articlenumber']; ?></th>
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
                            <span><?= $language['en_search_brands']; ?></span>

                            <div class="search_result">
<?php
                                foreach($resultValue as $brandKey => $brandValue) {
                                    $products = $q->getProductByBrand($brandValue['id']);
?>
                                    <?= $brandValue['name']; ?>
                                    
                                    <div class="search_result">
                                        <table>
                                            <tr>
                                                <th><?= $language['en_search_name']; ?></th>
                                                <th><?= $language['en_search_category']; ?></th>
                                                <th><?= $language['en_search_articlenumber']; ?></th>
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
                            <span><?= $language['en_search_categories']; ?></span>

                            <div class="search_result">
<?php
                                foreach($resultValue as $catKey => $catValue) {
                                    $products = $q->getProductsByCategory($catValue['id']);
?>
                                    <?= $catValue['en_name']; ?>
                                    
                                    <div class="search_result">
                                        <table>
                                            <tr>
                                                <th><?= $language['en_search_name']; ?></th>
                                                <th><?= $language['en_search_brand']; ?></th>
                                                <th><?= $language['en_search_articlenumber']; ?></th>
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
    <div class="title">
        <?= $language['nl_search_search']; ?>
    </div> <!-- title -->

    <div class="search">

        <form method="post">
            <input type="search" name="search" placeholder="<?= $language['nl_search_searchfield']; ?>" value="<?= $searchTerm; ?>" />
            <input type="submit" value="<?= $language['nl_search_go']; ?>" />
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
                            <span><?= $language['nl_search_products']; ?></span>

                            <div class="search_result">
                                <table>
                                    <tr>
                                        <th><?= $language['nl_search_name']; ?></th>
                                        <th><?= $language['nl_search_brand']; ?></th>
                                        <th><?= $language['nl_search_category']; ?></th>
                                        <th><?= $language['nl_search_articlenumber']; ?></th>
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
                            <span><?= $language['nl_search_brands']; ?></span>

                            <div class="search_result">
<?php
                                foreach($resultValue as $brandKey => $brandValue) {
                                    $products = $q->getProductByBrand($brandValue['id']);
?>
                                    <?= $brandValue['name']; ?>
                                    
                                    <div class="search_result">
                                        <table>
                                            <tr>
                                                <th><?= $language['nl_search_name']; ?></th>
                                                <th><?= $language['nl_search_category']; ?></th>
                                                <th><?= $language['nl_search_articlenumber']; ?></th>
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
                            <span><?= $language['nl_search_categories']; ?></span>

                            <div class="search_result">
<?php
                                foreach($resultValue as $catKey => $catValue) {
                                    $products = $q->getProductsByCategory($catValue['id']);
?>
                                    <?= $catValue['en_name']; ?>
                                    
                                    <div class="search_result">
                                        <table>
                                            <tr>
                                                <th><?= $language['nl_search_name']; ?></th>
                                                <th><?= $language['nl_search_brand']; ?></th>
                                                <th><?= $language['nl_search_articlenumber']; ?></th>
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