<?php
require_once("./controller/Home.php");
require_once("config/dbconnect.php"); 
require_once("./model/album.php");
require_once("./model/artist.php");
require_once("./model/genre.php");
require_once("./model/song.php");
$action = "";
if (isset($_REQUEST["action"]))
{    
    $action = $_REQUEST["action"];
}
 
switch ($action)
{
    default:
        $controller = new HomeController();
        $controller->index();
        break;
}

?>
