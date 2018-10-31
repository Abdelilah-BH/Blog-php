<?php
require_once(dirname(__FILE__).'/config/dbconf.php');
require_once(dirname(__FILE__).'/global_func.php');

function autoloader($class_name)
{
    foreach (glob(__dir__.'/*',GLOB_ONLYDIR) as $dir) {
        if(file_exists("$dir/".$class_name.'.class.php'))
        {
            require_once("$dir/".$class_name.'.class.php');
            break;
        }
    }
    
}
spl_autoload_register('autoloader');
$Category = new Category($connexion);
$category = $Category->get_all_category();
$Post = new Post($connexion);
$post= $Post->get_all_post();
$Comment = new Comment($connexion);
$comment = $Comment->get_all_comment();
$User = new User($connexion);
$user = $User->get_all_user();


?>