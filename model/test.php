<?php
require_once("../config/dbconnect.php"); 
require_once("artist.php"); 
function ok()
{
    $data = artistModel::listAll();
    echo var_dump($data);
}
ok();
