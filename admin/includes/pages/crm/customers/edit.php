<?php

/**
 * This file contains the edit customers form
 */

// Check if user is logged in when accessing this file
if (login()) {
    
    $customer = $q->getCustomer($_GET['id']);

?>

    <div class="content">
        <form method="post" class="multi" action="index.php?page=1&action=1">
            
            <div class="content_left">
                <span class="form_cat">Basic information</span>
                
                <input type="text" name="firstname" id="firstname" placeholder="Firstname" required onchange="addCustumers('firstname')" value="<?= $customer['firstname']; ?>" />
                <input type="text" name="insertion" id="insertion" placeholder="Insertion" value="<?= $customer['insertion']; ?>" />
                <input type="text" name="lastname" id="lastname" placeholder="Lastname" required onchange="addCustomers('lastname')" value="<?= $customer['lastname']; ?>" />
                <input type="text" name="email" id="email" placeholder="Email" required onchange="addCustomers('email')" value="<?= $customer['email']; ?>" />
                <input type="text" name="phone" id="phone" placeholder="Phone" value="<?= $customer['phone']; ?>" />
                <input type="text" name="company" id="company" placeholder="Company name" value="<?= $customer['company_name']; ?>" />
                <input type="text" name="password" id="password" placeholder="New password (blank to keep current)" />
                <textarea name="remarks" id="remarks" placeholder="Remarks"><?= $customer['remarks']; ?></textarea>

            </div> <!-- content_left -->
            
            <div class="content_right">
                <span class="form_cat">Shipping information</span>

                <input type="text" name="shipping_street" id="shipping_street" placeholder="Shipping street" value="<?= $customer['shipping_street']; ?>" />
                <input type="text" name="shipping_housenumber" id="shipping_housenumber" placeholder="Shipping housenumber" value="<?= $customer['shipping_housenumber']; ?>" />
                <input type="text" name="shipping_postalcode" id="shipping_postalcode" placeholder="Shipping postalcode" value="<?= $customer['shipping_postalcode']; ?>" />
                <input type="text" name="shipping_city" id="shipping_city" placeholder="Shipping city" value="<?= $customer['shipping_city']; ?>" />
                <input type="text" name="shipping_provence" id="shipping_provence" placeholder="Shipping provence" value="<?= $customer['shipping_provence']; ?>" />
                <input type="text" name="shipping_country" id="shipping_country" placeholder="Shipping country" value="<?= $customer['shipping_country']; ?>" />

                <span id="copy_adress" onclick="copy_adress()">Copy to billing information</span>

                <span class="form_cat">Billing information</span>

                <input type="text" name="billing_street" id="billing_street" placeholder="Billing street" value="<?= $customer['billing_street']; ?>" />
                <input type="text" name="billing_housenumber" id="billing_housenumber" placeholder="Billing housenumber" value="<?= $customer['billing_housenumber']; ?>" />
                <input type="text" name="billing_postalcode" id="billing_postalcode" placeholder="Billing postalcode" value="<?= $customer['billing_postalcode']; ?>" />
                <input type="text" name="billing_city" id="billing_city" placeholder="Billing city" value="<?= $customer['billing_city']; ?>" />
                <input type="text" name="billing_provence" id="billing_provence" placeholder="Billing provence" value="<?= $customer['billing_provence']; ?>" />
                <input type="text" name="billing_country" id="billing_country" placeholder="Billing country" value="<?= $customer['billing_country']; ?>" />

                <input type="submit" value="Submit" />
                <input type="hidden" name="id" value="<?= $customer['id']; ?>" />
                <input type="hidden" name="form" value="editCustomer" />

            </div> <!-- content_right -->

        </form>

        <div class="message" id="message">
        </div> <!-- message -->

    </div> <!-- content -->

<?php

}