<?php
require_once("../config/dbconnect.php");
require_once("../model/album.php");
require_once("../model/artist.php");
require_once("../model/genre.php");
require_once("../model/song.php");
$mysqli = connect();
$mysqli->query("SET NAMES utf8");

//$result = $mysqli->query($query);


if (empty($_GET["keyword"])) {
    header("Content-type: application/json");
    echo 'Missing params';
}
$keyword = $_GET["keyword"];
$artistList = array();
$albumList = array();
$songList = array();
$dataRes = null;
if (!isset($_GET["artist_name"]) && !isset($_GET["album_name"]) && !isset($_GET["song_name"])) {
    $albumList = albumModel::findByName($keyword);
    $artistList = artistModel::findByName($keyword);
    $songList = songModel::findByName($keyword);
    $dataRes = array(
        'albums' => $albumList,
        'songs' =>  $songList,
        'artists' => $artistList
    );
    header("Content-type: application/json");
    echo json_encode($dataRes);
    die();
}


if (isset($_GET["album_name"])) {
    $albumList = albumModel::findByName($keyword);
}
if (isset($_GET["song_name"])) {
    $songList = songModel::findByName($keyword);
}
if (isset($_GET["artist_name"])) {
    $artistList = artistModel::findByName($keyword);
}
$dataRes = array(
    'albums' => $albumList,
    'songs' =>  $songList,
    'artists' => $artistList
);
header("Content-type: application/json");
echo json_encode($dataRes);
die();
die();
