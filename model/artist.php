<?php

class artistModel
{    
    function __construct() {
        $this->ArtistID = "";
        $this->Name = "";
        $this->DOB = "";
        $this->Country = "";
        $this->ImagePath = "";
    }
    public static function listAll() {
        $mysqli = connect();
        $mysqli->query("SET NAMES utf8");
        $query = "SELECT * FROM artist";
        $result = $mysqli->query($query);
        $artists = array();
        if ($result) 
        {            
            foreach ($result as $row) {
                $ab = new artistModel();
                $ab->ArtistID = $row["ArtistID"];
                $ab->Name = $row["Name"]; 
                $ab->DOB = $row["DOB"];
                $ab->Country = $row["Country"];
                $ab->ImagePath = $row["ImagePath"];
                $artists[] = $ab; //add an item into array
            }
        }

        $mysqli->close();
        return $artists;
    }
    public static function findByName($name) {
        $mysqli = connect();
        $mysqli->query("SET NAMES utf8");
        $query = "SELECT * FROM artist WHERE Name LIKE '%$name%'";
        $result = $mysqli->query($query);
        $artists = array();
        if ($result) 
        {            
            foreach ($result as $row) {
                $ab = new artistModel();
                $ab->ArtistID = $row["ArtistID"];
                $ab->Name = $row["Name"]; 
                $ab->DOB = $row["DOB"];
                $ab->Country = $row["Country"];
                $ab->ImagePath = $row["ImagePath"];
                $artists[] = $ab; //add an item into array
            }
        }
        $mysqli->close();
        return $artists;
    }
    public static function findById($id) {
        $mysqli = connect();
        $mysqli->query("SET NAMES utf8");
        $query = "SELECT * FROM artist WHERE artistID = '$id'";
        $result = $mysqli->query($query);
        $artists = array();
        if ($result) 
        {            
            foreach ($result as $row) {
                $ab = new artistModel();
                $ab->ArtistID = $row["ArtistID"];
                $ab->Name = $row["Name"]; 
                $ab->DOB = $row["DOB"];
                $ab->Country = $row["Country"];
                $ab->ImagePath = $row["ImagePath"];
                $artists[] = $ab; //add an item into array
            }
        }
        $mysqli->close();
        return $artists;
    }
}
?>
