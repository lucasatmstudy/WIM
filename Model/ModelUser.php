<?php

namespace Model;
use Exception, PDO;

class ModelUser extends Model{
    private ?int $id = null;
    private ?string $pseudo = null;
    private ?string $email = null;
    private ?string $password = null;
    private ?string $avatar = null;
    private ?string $registrationDate = null;
    private ?int $idRole = null;

    public function getId():int{
        return $this->id;
    }

    public function setId(int $id):self{
        $this->id=$id;
        return $this;
    }

    public function getPseudo():string{
        return $this->pseudo;
    }

    public function setPseudo(string $pseudo):self{
        $this->pseudo=$pseudo;
        return $this;
    }

    public function getEmail():string{
        return $this->email;
    }

    public function setEmail(string $email):self{
        $this->email=$email;
        return $this;
    }

    public function getPassword():string{
        return $this->password;
    }

    public function setPassword(string $password):self{
        $this->password=$password;
        return $this;
    }

    public function getAvatar():string{
        return $this->avatar;
    }

    public function setAvatar(string $avatar):self{
        $this->avatar=$avatar;
        return $this;
    }

    public function getRegistrationDate():string{
        return $this->registrationDate;
    }

    public function setRegistrationDate(string $registrationDate):self{
        $this->registrationDate=$registrationDate;
        return $this;
    }
    public function getIdRole():string{
        return $this->idRole;
    }

    public function setIdRole(string $idRole):self{
        $this->idRole=$idRole;
        return $this;
    }

    public function findAll(int $idUser): ?array {
        $req = $this->getDb()->prepare("SELECT album.id_album, album.title, album.date_album, album.id_acces_type, acces_type.type_acces, user.id_user, user.pseudo, user.avatar FROM album INNER JOIN to_create ON album.id_album = to_create.id_album INNER JOIN user ON to_create.id_user = user.id_user INNER JOIN acces_type ON album.id_acces_type = acces_type.id_acces_type WHERE user.id_user = :idUser OR acces_type.type_acces ='public' OR (acces_type.type_acces = 'friend' AND EXISTS (SELECT 1 FROM to_befriend WHERE friend_status ='accepted' AND ((id_user_sender = :idUser AND id_user_recipient = user.id_user) OR (id_user_recipient = :idUser AND id_user_sender = user.id_user)))) ORDER BY album.date_album DESC");

        $req->execute([
            'idUser' => $idUser
        ]);

        return $req->fetchAll(PDO::FETCH_ASSOC);
    }

    public function findByEmail(string $email): ?self {
        $req = $this->getDb()->prepare("SELECT user.id_user, user.pseudo, user.email, user.`password`, user.avatar, user.registration_date, user.id_role FROM `user` WHERE email = ?");
        $req->execute([$email]);
        $data =$req->fetch(PDO::FETCH_ASSOC);
        
        if (!$data) {
            return null;
        }

        $this->id =$data['id_user'];
        $this->pseudo =$data['pseudo'];
        $this->email =$data['email'];
        $this->password =$data['password'];
        $this->avatar =$data['avatar'];
        $this->registrationDate =$data['registration_date'];
        $this->idRole =$data['id_role'];

        return $this;
    }

    public function findAlbums(): array {
        if (!$this->id) return [];
        $req = $this->getDb()->prepare("SELECT album.id_album, album.title, album.date_album, acces_type.type_acces FROM album JOIN to_create ON album.id_album = to_create.id_album JOIN acces_type ON album.id_acces_type = acces_type.id_acces_type WHERE to_create.id_user = ?
        ");
        $req->execute([$this->id]);
        return $req->fetchAll(PDO::FETCH_ASSOC);
    }

    public function emailExists(string $email): bool {
        $req = $this->getDb()->prepare("SELECT user.email FROM `user` WHERE email = ?");
        $req->execute([$email]);
        return $req->fetchColumn() !== false;
    }

    public function pseudoExists(string $pseudo): bool {
        $req = $this->getDb()->prepare("SELECT user.pseudo FROM `user` WHERE pseudo = ?");
        $req->execute([$pseudo]);
        return $req->fetchColumn() !== false;
    }

    public function create(): ?int {
        try {
            $req = $this->getDb()->prepare("INSERT INTO `user` (pseudo, email, `password`, avatar, registration_date) VALUES (?,?,?,?,?)");
            $req->bindParam(1,$this->pseudo,PDO::PARAM_STR);
            $req->bindParam(2,$this->email,PDO::PARAM_STR);
            $req->bindParam(3,$this->password,PDO::PARAM_STR);
            $req->bindParam(4,$this->avatar,PDO::PARAM_STR);
            $req->bindParam(5,$this->registrationDate,PDO::PARAM_STR);

            $req->execute();

            $this->id = (int) $this->getDb()->lastInsertId();
            return $this->id;

        }catch(EXCEPTION $error){
            die($error->getMessage());
        }
    }

    // Récupère la liste des amis acceptés de l'utilisateur courant
    public function findFriends(): array {
        if ($this->id === null) {
            return [];
        }

        $req = $this->getDb()->prepare(
            "SELECT u.id_user, u.pseudo, u.avatar FROM `user` u JOIN to_befriend tb ON (tb.id_user_recipient = ? AND tb.id_user_sender = u.id_user) OR (tb.id_user_sender = ? AND tb.id_user_recipient = u.id_user) WHERE tb.friend_status = 'accepted' ORDER BY u.pseudo");
        $req->execute([$this->id, $this->id]);

        return $req->fetchAll(PDO::FETCH_ASSOC);
    }
}
