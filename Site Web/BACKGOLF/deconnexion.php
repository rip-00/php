<?php
    unset($_SESSION['mail']);
	unset($_SESSION['idf']);
    session_destroy();  
    header('location:./index.html'); 
?>