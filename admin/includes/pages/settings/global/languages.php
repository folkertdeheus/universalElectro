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
            // Loop through language fields as set in php/language.php
            foreach($languageFields as $lKey => $lValue) {

                // Category header
                echo '<tr>';
                    echo '<th colspan=2>'.$lKey.'</th>';
                echo '</tr>';
                
                // Loop through language items
                foreach($lValue as $fieldKey => $fieldValue) {

                    // Check if field must be a textarea instead of a textfield
                    if (in_array($fieldKey, $fieldsTextarea)) {

                        // Textarea
                        echo '<tr>';
                            echo '<td><textarea name="nl_'.$fieldKey.'" id="nl_'.$fieldKey.'" placeholder=\''.$fieldValue.' Dutch\' required >'.$language['nl_'.$fieldKey].'</textarea></td>';
                            echo '<td><textarea name="en_'.$fieldKey.'" id="en_'.$fieldKey.'" placeholder=\''.$fieldValue.' English\' required >'.$language['en_'.$fieldKey].'</textarea></td>';
                        echo '</tr>';

                    } else {

                        // Textfield
                        echo '<tr>';
                            echo '<td><input type="text" name="nl_'.$fieldKey.'" id="nl_'.$fieldKey.'" placeholder=\''.$fieldValue.' Dutch\' required value="'.$language['nl_'.$fieldKey].'" /></td>';
                            echo '<td><input type="text" name="en_'.$fieldKey.'" id="en_'.$fieldKey.'" placeholder=\''.$fieldValue.' English\' required value="'.$language['en_'.$fieldKey].'" /></td>';
                        echo '</tr>';
                    }
                }
            }
?>
        </table>

        <input type="hidden" name="form" value="languages" />
        <input type="submit" value="Save" />
    </form>

</div> <!-- content -->


<?php

}