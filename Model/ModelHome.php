<?php

namespace Model;
use PDO;

class ModelHome extends Model {

    //Albums créés par un utilisateur, avec la première photo de chaque album 10 max
    public function findAlbumsByUser(int $idUser, int $limit = 10): array {
        $req = $this->getDb()->prepare(
            "SELECT album.id_album, album.title, (SELECT photo.url_photo FROM to_contain JOIN photo ON photo.id_photo = to_contain.id_photo WHERE to_contain.id_album = album.id_album ORDER BY photo.id_photo ASC LIMIT 1) AS url_photo FROM album JOIN to_create ON to_create.id_album = album.id_album WHERE to_create.id_user = :idUser ORDER BY album.date_album ASC,album.id_album ASC LIMIT :limit");

        $req->bindValue(':idUser', $idUser, PDO::PARAM_INT);
        $req->bindValue(':limit', $limit, PDO::PARAM_INT);
        $req->execute();

        return $req->fetchAll(PDO::FETCH_ASSOC);
    }
}

