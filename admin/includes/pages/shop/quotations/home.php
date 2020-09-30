<?php

/**
 * This file contains the quotations overview
 */

// Check if user is logged in
if (login()) {

    if ($q->countQuotations() > 0) {

        // Get all quotations
        $quotes = $q->allQuotations();
?>
        <div class="content">
            <div class="table">

                <table id="paginate">
                    <tr>
                        <th>#</td>
                        <th>Date</th>
                        <th>Customer</th>
                        <th>Status</th>
                    </tr>
<?php
                    foreach($quotes as $quoteKey => $quoteValue) {

                        // Check if customer send the quotation
                        if (isset($quoteValue['customer']) && $quoteValue['customer'] != null) {

                            // Get customer
                            $customer = $q->getCustomer($quoteValue['customer']);

                            // Set iv
                            $iv = $customer['iv'];

                            // Get quotation status
                            $status = $q->getQuotationStatus($quoteValue['status']);
?>
                            <tr id="row<?= $quoteKey+1; ?>" class="quoterow" onclick="window.location='index.php?page=2&action=2&id=<?= $quoteValue['id']; ?>'">
                                <td><?= $quoteValue['id']; ?></td>
                                <td><?= $quoteValue['timestamp']; ?></td>
                                <td><?= decrypt($customer['lastname'], $iv).', '.decrypt($customer['firstname'], $iv).' '.decrypt($customer['insertion'], $iv).' ('.$quoteValue['customer'].')'; ?></td>
                                <td><?= $status['en_name']; ?></td>
                            </tr>
<?php
                        }
                    }
?>
                </table>

                <div class="pagebuttons" id="pagebuttons">
                </div> <!-- pagebuttons -->
                
            </div> <!-- table -->
<?php
    } else {

        echo 'No quotations';

    }
?>
    </div> <!-- content -->
<?php
}