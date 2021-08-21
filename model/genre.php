<?php

class genreModel
{    
    function __construct() {
        $this->GenreID = "";
        $this->GenreName = "";
    }
    public static function listAll() {
        $mysqli = connect();
        $mysqli->query("SET NAMES utf8");
        $query = "SELECT * FROM genre";
        $result = $mysqli->query($query);
        $genres = array();
        if ($result) 
        {            
            foreach ($result as $row) {
                $ab = new genreModel();
                $ab->GenreID = $row["GenreID"];
                $ab->GenreName = $row["GenreName"];  
                $genres[] = $ab; //add an item into array
            }
        }

        $mysqli->close();
        return $genres;
    }
    public static function findByName($name) {
        $mysqli = connect();
        $mysqli->query("SET NAMES utf8");
        $query = "SELECT * FROM genre WHERE GenreName LIKE '%$name%'";
        $result = $mysqli->query($query);
        $genres = array();
        if ($result) 
        {            
            foreach ($result as $row) {
                $ab = new genreModel();
                $ab->GenreID = $row["GenreID"];
                $ab->GenreName = $row["GenreName"];  
                $genres[] = $ab; //add an item into array
            }
        }
        $mysqli->close();
        return $genres;
    }
    public static function findById($id) {
        $mysqli = connect();
        $mysqli->query("SET NAMES utf8");
        $query = "SELECT * FROM genre WHERE GenreID = '$id'";
        $result = $mysqli->query($query);
        $genres = array();
        if ($result) 
        {            
            foreach ($result as $row) {
                $ab = new genreModel();
                $ab->GenreID = $row["AlbumID"];
                $ab->GenreName = $row["Title"];  
                $genres[] = $ab; //add an item into array
            }
        }
        $mysqli->close();
        return $genres;
    }
}
?>
