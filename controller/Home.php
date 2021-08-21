<?php

class HomeController
{
    public function index()
    {
        $dataAlbums = albumModel::listAll();
        $dataGenre = genreModel::listAll();
        $dataArtist = artistModel::listAll();    
       // echo  json_encode($dataArtist);
        $VIEW = "./view/TrangChu.phtml";
        require("./view/TrangChu.phtml");
    }
}
