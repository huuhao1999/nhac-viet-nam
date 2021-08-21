<?php

class songModel
{    
    public static function findByName($name) {
        $mysqli = connect();
        $mysqli->query("SET NAMES utf8");
        $query = "SELECT* FROM song INNER JOIN title on title.TitleID=song.TitleID  INNER JOIN artist on artist.ArtistID=song.ArtistID INNER JOIN genre on genre.GenreID=title.GenreID WHERE title.Title LIKE '%$name%'";
        $result = $mysqli->query($query);
        $songs = array();
        {            
            foreach ($result as $row) {
                $ab = new artistModel();
                $ab->Title = $row["Title"];
                $ab->TitleID = $row["TitleID"]; 
                $ab->Year = $row["Year"];
                $ab->Country = $row["Country"];
                $ab->ArtistID = $row["ArtistID"];
                $ab->SongID = $row["SongID"];
                $ab->ArtistName = $row["Name"];
                $ab->SongID = $row["SongID"];
                $ab->GenreName = $row["GenreName"];
                $ab->Length = $row["Length"];
              
                $songs[] = $ab; //add an item into array
            }
        }
        //e//cho mysql_num_rows( $result);
        $mysqli->close();
        return $songs;
    }
}
?>
