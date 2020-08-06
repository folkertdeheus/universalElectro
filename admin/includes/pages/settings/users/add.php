<?php

/**
 * This page contains the add user form
 */

// Check if user is logged in when accessing this file
if (login()) {

?>

    <div class="content">

        <form method="post" action="index.php?page=4&action=1">
            <input type="text" name="username" placeholder="Username" required onchange="adduser('username')" />
            <input type="password" name="password" id="password" placeholder="Password" required onchange="adduser('password')" />
            <input type="password" name="rpassword" id="rpassword" placeholder="Repeat password" onchange="adduser('rpassword')" required />
            <input type="submit" value="Submit" />
            <input type="hidden" name="form" value="addUser" />
        </form>

        <div class="message" id="message">
        </div> <!-- message -->

    </div> <!-- content -->

<?php

}