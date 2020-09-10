<?php

/**
 * This page contains the cancel quotation confirmation
 */

// Get quotation
$quote = $q->getLatestQuotationFromSession($_COOKIE['unele_shop']);

// Delete quotation
$q->deleteQuotation($_COOKIE['unele_shop']);
$q->insertLog('Quotation', 'Delete', 'Deleted quotation id '.$quote['id'].' without submitting');

?>

<main id="mainEnglish">
    <?= $language['en_quote_deleted']; ?>
</main>

<main id="mainDutch">
    <?= $language['nl_quote_deleted']; ?>
</main>