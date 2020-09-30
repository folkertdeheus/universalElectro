<?php

/**
 * This file contains the send quotation confirmation
 */

if ($quotationRequestSent) {

?>
    <main id="mainEnglish">
        <?= $language['en_quote_sent']; ?>
    </main>

    <main id="mainDutch">
        <?= $language['nl_quote_sent']; ?>
    </main>
<?php

} else {
    // Failed to sent message

?>
    <main id="mainEnglish">
        <?= $language['en_quote_notsent']; ?>
    </main>

    <main id="mainDutch">
        <?= $language['nl_quote_notsent']; ?>
    </main>

<?php

}