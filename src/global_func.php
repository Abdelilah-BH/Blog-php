<?php

    function is_login()
    {
        if(isset($_SESSION['id_utilisateur'])):
            return true;
        endif;
    }

?>