<?php

/**
 * This page contains the edit user form
 */

// Check if user is logged in when accessing this file
if (login()) {

    // Get user
    $user = $q->getUserById($_GET['id']);

?>

    <div class="content">

        <form method="post" action="index.php?page=4&action=1">
            <input type="text" id="username" name="username" placeholder="Username" value="<?= $user['username']; ?>" required onchange="edituser('username')" />
            <input type="password" id="password" name="password" id="password" placeholder="Password" onchange="edituser('password')" />
            <input type="password" id="rpassword" name="rpassword" id="rpassword" placeholder="Repeat password" onchange="edituser('rpassword')" />
            <input type="submit" value="Submit" />
            <input type="hidden" name="form" value="editUser" />
            <input type="hidden" name="id" value="<?= $_GET['id']; ?>" />
        </form>

        <div class="message" id="message">
        </div> <!-- message -->

    </div> <!-- content -->

<?php

}