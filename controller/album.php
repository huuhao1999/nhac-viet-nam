<?php

class albumController
{
    public function listAll()
    {
        $data = albumModel::listAll();
        $VIEW = "./view/DanhSachSV.phtml";
        require("./template/template.phtml");
    }
    public function add()
    {
        $data = "";
        $sv = new albumModel();
        $sv->AlbumID = $_REQUEST["AlbumID"];
        $sv->Title = $_REQUEST["Title"];
        $sv->ReleaseDate = $_REQUEST["ReleaseDate"];
        $sv->ArtistID = $_REQUEST["ArtistID"];
        $sv->CoverPath = $_REQUEST["CoverPath"];
        $result = albumModel::add($sv);
        if ($result == 1)
            $data = "Thêm thành công";
        else
            $data = "Thêm bị lỗi";

        $VIEW = "./view/ThemSinhVien.phtml";
        require("./template/template.phtml");
    }

    public function show()
    {
        $album_id = $_REQUEST["album_id"];
        $data = albumModel::findById($album_id);
        $VIEW = "./view/ThongTinSV.phtml";
        require("./template/template.phtml");
    }

    public function delete()
    {
        $album_id = $_REQUEST["album_id"];
        $result = albumModel::delete($album_id);
        $data = albumModel::listAll();
        $VIEW = "./view/DanhSachSV.phtml";
        require("./template/template.phtml");
    }
}
