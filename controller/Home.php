<?php

class HomeController
{
    public function index()
    {
        $dataAlbums = albumModel::listAll();
        $dataGenre = genreModel::listAll();
        $dataArtist = artistModel::listAll();    
        require("./view/index.phtml");
    }
}
