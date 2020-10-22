<?php
    session_start();
    // Destrueix sessió
    if(session_destroy()) {
        // Redirecció a la home
        header("Location: ../login.html");
    }
?>