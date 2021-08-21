<?php

class albumModel
{
    public $MSSV;
    public $HOTEN;
    
    function __construct() {
        $this->Title = "";
        $this->ReleaseDate = "";
        $this->ArtistID = "";
        $this->CoverPath = "";
    }
    
    public static function listAll() {
        $mysqli = connect();
        $mysqli->query("SET NAMES utf8");
        $query = "SELECT * FROM album";
        $result = $mysqli->query($query);
        $albs = array();
        if ($result) 
        {            
            foreach ($result as $row) {
                $ab = new albumModel();
                $ab->AlbumID = $row["AlbumID"];
                $ab->Title = $row["Title"];
                $ab->ReleaseDate = $row["ReleaseDate"];     
                $ab->ArtistID = $row["ArtistID"]; 
                $ab->CoverPath = $row["CoverPath"];     
                $albs[] = $ab; //add an item into array
            }
        }
        $mysqli->close();
        return $albs;
    }
    public static function findById($id) {
        $mysqli = connect();
        $mysqli->query("SET NAMES utf8");
        $query = "SELECT * FROM album WHERE AlbumID = '$id'";
        $result = $mysqli->query($query);
        $albs = array();
        if ($result) 
        {            
            foreach ($result as $row) {
                $ab = new albumModel();
                $ab->AlbumID = $row["AlbumID"];
                $ab->Title = $row["Title"];
                $ab->ReleaseDate = $row["ReleaseDate"];     
                $ab->ArtistID = $row["ArtistID"]; 
                $ab->CoverPath = $row["CoverPath"];    
                $albs[] = $ab; //add an item into array
            }
        }
        $mysqli->close();
        return $albs;
    }

    public static function add($ab)
    {
        $mysqli = connect();
        $mysqli->query("SET NAMES utf8");
        $Title = $ab["Title"];
        $ReleaseDate = $ab["ReleaseDate"];     
        $ArtistID = $ab["ArtistID"]; 
        $CoverPath = $ab["CoverPath"];  

        $query = "INSERT INTO album values ($Title, '$ReleaseDate', '$ArtistID', '$CoverPath')";
        if ($mysqli->query($query))        
            return 1;        
        return 0;
    }
    public static function delete($album_id)
    {
        $mysqli = connect();
        $mysqli->query("SET NAMES utf8");
        $query = "DELETE FROM album WHERE album=$album_id";
        $r = 0;
        if ($mysqli->query($query))       
            $r = 1;
        $mysqli->close();
        return $r;
        
    }
}
?>
