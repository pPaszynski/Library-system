<?php
session_start();
 echo "<p>witaj ".$_SESSION['userName'].'![ <a href="logOut.php">Log Out!</a> ]</p>';