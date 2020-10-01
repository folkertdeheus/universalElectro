<?php

/**
 * This file contains the default page content
 */

// Check if user is logged in
if (login()) {

    // Get homepage information
    $pages = $q->getPages();

?>

<div class="content pages">
    <div class="legend">
        Legend:
        <div><span>:ARTICLE: text :!ARTICLE:</span>Make article</div>
        <div><span>:TITLE: text :!TITLE:</span>Insert title</div>
    </div> <!-- legend -->

    <form method="post" action="index.php?page=index.php">
        <textarea name="nl_content" placeholder="Dutch page content"><?= $pages['nl_content']; ?></textarea>
        <textarea name="en_content" placeholder="English page content"><?= $pages['en_content']; ?></textarea>
        <input type="hidden" name="form" value="pages" />
        <input type="submit" value="Submit" />
    </form>
</div> <!-- content -->

<?php

}