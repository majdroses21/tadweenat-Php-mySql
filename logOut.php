<!-- When this file is called, it destroys the initiated session on each page, and thus leads to not saving user data and logging out
And transfer the user to the login page -->
<?php
session_start();
session_unset();
session_destroy();

header('REFRESH:2;login.php');

?>