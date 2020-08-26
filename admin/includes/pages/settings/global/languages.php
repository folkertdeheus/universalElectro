<?php

/**
 * This file contains the language settings page
 */

// Check if user is logged in when accessing this file
if (login()) {

    // Get language data
    $language = $q->allLanguages();

?>

<div class="content">

    <form method="post" action="index.php?page=4&action=2">
        <table>
<?php
            foreach($languageFields as $lKey => $lValue) {
                echo '<tr>';
                    echo '<th colspan=2>'.$lKey.'</th>';
                echo '</tr>';
                
                foreach($lValue as $fieldKey => $fieldValue) {
                    echo '<tr>';
                        echo '<td><input type="text" name="nl_'.$fieldKey.'" id="nl_'.$fieldKey.'" placeholder=\''.$fieldValue.' Dutch\' required onchange="languageSettings(\'nl_'.$fieldKey.'\')" value="'.$language['nl_'.$fieldKey].'" /></td>';
                        echo '<td><input type="text" name="en_'.$fieldKey.'" id="en_'.$fieldKey.'" placeholder=\''.$fieldValue.' English\' required onchange="languageSettings(\'en_'.$fieldKey.'\')" value="'.$language['en_'.$fieldKey].'" /></td>';
                    echo '</tr>';
                }
            }
?>
        </table>

        <input type="hidden" name="form" value="languages" />
        <input type="submit" value="Save" />
    </form>

    <div class="message" id="message">
    </div> <!-- message -->

</div> <!-- content -->


<?php

}