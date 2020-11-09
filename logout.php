<?php
//This includes he session_start() to resume the session on this page. It identifies the session that needs to be destroyed
include_once 'includes/session.php'?>
<?php
//session_destory() destroys the ession. Then the header() function redirects to the homepage
    session_destroy();
    header('Location: index.php');

?>