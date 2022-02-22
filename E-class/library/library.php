<?php
    function isLoged(){
        return isset($_SESSION['auth']) 
                && isset($_SESSION['auth']['email']) 
                && isset($_SESSION['auth']['password']);
    }

    function redirect($page){
        header("location: $page.php");
    }

    function destroy(){
        // unset($_SESSION['auth']['email']);
        // unset($_SESSION['auth']['password']);
        // unset($_SESSION['auth']);
        session_unset();
        session_destroy();
        
    }   
?>