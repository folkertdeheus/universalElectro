<?php

/**
 * This file contains the detail page of quotations
 */

// Check if user is logged in
if (login()) {

    // Get quotation
    $quotation = $q->getQuotation($_GET['id']);

    // Get products
    $products = $q->getQuotationProducts($quotation['id']);

    // Get customer
    $customer = $q->getCustomer($quotation['customer']);

    // Set iv
    $iv = $customer['iv'];

    // Get quotation status
    $status = $q->getQuotationStatus($quotation['status']);
?>

    <div class="content">

        <div class="quote_details">

            <form method="post" class="forceleft" action="index.php?page=2&action=2&id=<?= $quotation['id']; ?>">
                <table>
                    <tr>
                        <td>Request by:</td>
                        <td><?= decrypt($customer['lastname'], $iv).', '.decrypt($customer['firstname'], $iv).' '.decrypt($customer['insertion'], $iv); ?></td>
                    </tr>
                    <tr>
                        <td><label for="status">Status:</label></td>
                        <td>
                            <select name="status" id="status">
<?php
                                // Loop through all quotation statusses
                                foreach($q->allQuotationStatus() as $statusKey => $statusValue) {
?>
                                    <option value="<?= $statusValue['id']; ?>" <?php if($statusValue['id'] == $quotation['status']) { echo ' selected '; } ?>><?= $statusValue['en_name']; ?></option>
<?php
                                }
?>
                            </select>
                        </td>
                    </tr>
                    <tr>
                        <td colspan=2>
                            <input type="hidden" name="form" value="quotestatus">
                            <input type="hidden" name="id" value="<?= $quotation['id']; ?>" />
                            <input type="submit" value="Save" />
                        </td>
                    </tr>
                </table>
            </form>
        </div> <!-- details -->

        <div class="table">
            <table>
                <tr>
                    <th>Amount</th>
                    <th>Product</th>
                    <th>Brand</th>
                    <th>Article number</th>
                </tr>
<?php
                // Loop through all products in quotation
                foreach($products as $productKey => $productValue) {

                    // Get product
                    $product = $q->getProductById($productValue['product']);

                    // Get brand
                    $brand = $q->getBrandById($product['brand']);
?>
                    <tr>
                        <td><?= $productValue['amount']; ?></td>
                        <td><?= $product['name']; ?></td>
                        <td><?= $brand['name']; ?></td>
                        <td><?= $product['articlenumber']; ?></td>
                    </tr>
<?php
                }
?>
            </table>
        </div> <!-- products -->

        <div class="multi">
            <div class="content_left quote_account">
                <table>
                    <tr>
                        <th colspan=2 class="form_cat">Basic information</th>
                    </tr>
                    <tr>
                        <td>Name</td>
                        <td><?= decrypt($customer['lastname'], $iv).', '.decrypt($customer['firstname'], $iv).' '.decrypt($customer['insertion'], $iv); ?></td>
                    </tr>
                    <tr>
                        <td>Email</td>
                        <td><?= decrypt($customer['email'], $iv); ?></td>
                    </tr>
                    <tr>
                        <td>Phone</td>
                        <td><?= decrypt($customer['phone'], $iv); ?></td>
                    </tr>
                    <tr>
                        <td>Company</td>
                        <td><?= decrypt($customer['company_name'], $iv); ?></td>
                    </tr>
                    <tr>
                        <td>Tax number</td>
                        <td><?= decrypt($customer['taxnumber'], $iv); ?></td>
                    </tr>
                    <tr>
                        <td>Remarks</td>
                        <td><?= nl2br(decrypt($customer['remarks'], $iv)); ?></td>
                    </tr>
                </table>
            </div> <!-- content_left -->

            <div class="content_right quote_account">
                <table>
                    <tr>
                        <th colspan=2 class="form_cat">Shipping adress</th>
                    </tr>
                    <tr>
                        <td>Street</td>
                        <td><?= decrypt($customer['shipping_street'], $iv); ?></td>
                    </tr>
                    <tr>
                        <td>Housenumber</td>
                        <td><?= decrypt($customer['shipping_housenumber'], $iv); ?></td>
                    </tr>
                    <tr>
                        <td>Postal code</td>
                        <td><?= decrypt($customer['shipping_postalcode'], $iv); ?></td>
                    </tr>
                    <tr>
                        <td>City</td>
                        <td><?= decrypt($customer['shipping_city'], $iv); ?></td>
                    </tr>
                    <tr>
                        <td>Provence</td>
                        <td><?= decrypt($customer['shipping_provence'], $iv); ?></td>
                    </tr>
                    <tr>
                        <td>Country</td>
                        <td><?= decrypt($customer['shipping_country'], $iv); ?></td>
                    </tr>
                </table>

                <table>
                    <tr>
                        <th colspan=2 class="form_cat">Billing adress</th>
                    </tr>
                    <tr>
                        <td>Street</td>
                        <td><?= decrypt($customer['billing_street'], $iv); ?></td>
                    </tr>
                    <tr>
                        <td>Housenumber</td>
                        <td><?= decrypt($customer['billing_housenumber'], $iv); ?></td>
                    </tr>
                    <tr>
                        <td>Postal code</td>
                        <td><?= decrypt($customer['billing_postalcode'], $iv); ?></td>
                    </tr>
                    <tr>
                        <td>City</td>
                        <td><?= decrypt($customer['billing_city'], $iv); ?></td>
                    </tr>
                    <tr>
                        <td>Provence</td>
                        <td><?= decrypt($customer['billing_provence'], $iv); ?></td>
                    </tr>
                    <tr>
                        <td>Country</td>
                        <td><?= decrypt($customer['billing_country'], $iv); ?></td>
                    </tr>
                </table>
            </div> <!-- content_right -->
        </div> <!-- multi -->

    </div> <!-- content -->

<?php
}