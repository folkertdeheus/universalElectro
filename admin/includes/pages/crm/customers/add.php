<?php

/**
 * This file contains the add customers form
 */

// Check if user is logged in when accessing this file
if (login()) {
    
?>

    <div class="content">
        <form method="post" class="multi" action="index.php?page=1&action=1">
            
            <div class="content_left">
                <span class="form_cat">Basic information</span>
                
                <input type="text" name="firstname" id="firstname" placeholder="Firstname" required onchange="addCustumers('firstname')" />
                <input type="text" name="insertion" id="insertion" placeholder="Insertion" />
                <input type="text" name="lastname" id="lastname" placeholder="Lastname" required onchange="addCustomers('lastname')" />
                <input type="text" name="email" id="email" placeholder="Email" required onchange="addCustomers('email')" />
                <input type="text" name="phone" id="phone" placeholder="Phone" />
                <input type="text" name="company" id="company" placeholder="Company name" />
                <input type="text" name="taxnumber" id="taxnumber" placeholder="Tax number" />
                <input type="text" name="password" id="password" placeholder="Password" required />
                <textarea name="remarks" id="remarks" placeholder="Remarks"></textarea>

            </div> <!-- content_left -->
            
            <div class="content_right">
                <span class="form_cat">Shipping information</span>

                <input type="text" name="shipping_street" id="shipping_street" placeholder="Shipping street" />
                <input type="text" name="shipping_housenumber" id="shipping_housenumber" placeholder="Shipping housenumber" />
                <input type="text" name="shipping_postalcode" id="shipping_postalcode" placeholder="Shipping postalcode" />
                <input type="text" name="shipping_city" id="shipping_city" placeholder="Shipping city" />
                <input type="text" name="shipping_provence" id="shipping_provence" placeholder="Shipping provence" />
                <input type="text" name="shipping_country" id="shipping_country" placeholder="Shipping country" />

                <span id="copy_adress" onclick="copy_adress()">Copy to billing information</span>

                <span class="form_cat">Billing information</span>

                <input type="text" name="billing_street" id="billing_street" placeholder="Billing street" />
                <input type="text" name="billing_housenumber" id="billing_housenumber" placeholder="Billing housenumber" />
                <input type="text" name="billing_postalcode" id="billing_postalcode" placeholder="Billing postalcode" />
                <input type="text" name="billing_city" id="billing_city" placeholder="Billing city" />
                <input type="text" name="billing_provence" id="billing_provence" placeholder="Billing provence" />
                <input type="text" name="billing_country" id="billing_country" placeholder="Billing country" />

                <input type="submit" value="Submit" />
                <input type="hidden" name="form" value="addCustomer" />

            </div> <!-- content_right -->

        </form>

        <div class="message" id="message">
        </div> <!-- message -->

    </div> <!-- content -->

<?php

}