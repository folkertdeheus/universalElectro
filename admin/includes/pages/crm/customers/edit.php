<?php

/**
 * This file contains the edit customers form
 */

// Check if user is logged in when accessing this file
if (login()) {
    
    // Get customer information
    $customer = $q->getCustomer($_GET['id']);

    // Set iv for decryption
    $iv = $customer['iv'];

?>

    <div class="content">
        <form method="post" class="multi" action="index.php?page=1&action=1">
            
            <div class="content_left">
                <span class="form_cat">Basic information</span>
                
                <input type="text" name="firstname" id="firstname" placeholder="Firstname" required value="<?= decrypt($customer['firstname'], $iv); ?>" />
                <input type="text" name="insertion" id="insertion" placeholder="Middle name" value="<?= decrypt($customer['insertion'], $iv); ?>" />
                <input type="text" name="lastname" id="lastname" placeholder="Lastname" required value="<?= decrypt($customer['lastname'], $iv); ?>" />
                <input type="text" name="email" id="email" placeholder="Email" required value="<?= decrypt($customer['email'], $iv); ?>" />
                <input type="text" name="phone" id="phone" placeholder="Phone" value="<?= decrypt($customer['phone'], $iv); ?>" />
                <input type="text" name="company" id="company" placeholder="Company name" value="<?= decrypt($customer['company_name'], $iv); ?>" />
                <input type="text" name="taxnumber" id="taxnumber" placeholder="Tax number" value="<?= decrypt($customer['taxnumber'], $iv); ?>" />
                <input type="text" name="password" id="password" placeholder="New password (blank to keep current)" />
                <textarea name="remarks" id="remarks" placeholder="Remarks"><?= decrypt($customer['remarks'], $iv); ?></textarea>

            </div> <!-- content_left -->
            
            <div class="content_right">
                <span class="form_cat">Shipping information</span>

                <input type="text" name="shipping_street" id="shipping_street" placeholder="Shipping street" value="<?= decrypt($customer['shipping_street'], $iv); ?>" />
                <input type="text" name="shipping_housenumber" id="shipping_housenumber" placeholder="Shipping housenumber" value="<?= decrypt($customer['shipping_housenumber'], $iv); ?>" />
                <input type="text" name="shipping_postalcode" id="shipping_postalcode" placeholder="Shipping postalcode" value="<?= decrypt($customer['shipping_postalcode'], $iv); ?>" />
                <input type="text" name="shipping_city" id="shipping_city" placeholder="Shipping city" value="<?= decrypt($customer['shipping_city'], $iv); ?>" />
                <input type="text" name="shipping_provence" id="shipping_provence" placeholder="Shipping provence" value="<?= decrypt($customer['shipping_provence'], $iv); ?>" />
                <input type="text" name="shipping_country" id="shipping_country" placeholder="Shipping country" value="<?= decrypt($customer['shipping_country'], $iv); ?>" />

                <span id="copy_adress" onclick="copy_adress()">Copy to billing information</span>

                <span class="form_cat">Billing information</span>

                <input type="text" name="billing_street" id="billing_street" placeholder="Billing street" value="<?= decrypt($customer['billing_street'], $iv); ?>" />
                <input type="text" name="billing_housenumber" id="billing_housenumber" placeholder="Billing housenumber" value="<?= decrypt($customer['billing_housenumber'], $iv); ?>" />
                <input type="text" name="billing_postalcode" id="billing_postalcode" placeholder="Billing postalcode" value="<?= decrypt($customer['billing_postalcode'], $iv); ?>" />
                <input type="text" name="billing_city" id="billing_city" placeholder="Billing city" value="<?= decrypt($customer['billing_city'], $iv); ?>" />
                <input type="text" name="billing_provence" id="billing_provence" placeholder="Billing provence" value="<?= decrypt($customer['billing_provence'], $iv); ?>" />
                <input type="text" name="billing_country" id="billing_country" placeholder="Billing country" value="<?= decrypt($customer['billing_country'], $iv); ?>" />

                <input type="submit" value="Submit" />
                <input type="hidden" name="id" value="<?= $customer['id']; ?>" />
                <input type="hidden" name="form" value="editCustomer" />

            </div> <!-- content_right -->

        </form>

    </div> <!-- content -->

<?php

}