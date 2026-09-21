<?php

namespace Controller;

use Model\ModelUser;
use Utils\Utils;
use View\ViewConnect;

class ControllerUser extends Controller {
    //ATTRIBUTS
    private ModelUser $model;
    private ViewConnect $viewConnect;

    //CONSTRUCTOR
    public function __construct(ModelUser $model, ViewConnect $view) {
        parent::__construct($model, $view);
        $this->model = $model;
        $this->viewConnect = $view;
    }

    //METHODS
    //Formulaire de connexion
    public function seConnecter(): void {
        //Ce n'est pas le formulaire de connexion qui a été envoyé
        if (!isset($_POST['identifiantConnexion'])) {
            return;
        }

        $email = Utils::sanitize($_POST['identifiantConnexion']);
        //Le mot de passe n'est jamais "nettoyé" : on le compare tel quel au hash
        $password = $_POST['mpasswordConnexion'] ?? '';

        if ($email === '' || $password === '') {
            $this->viewConnect->setMessage("Veuillez remplir tous les champs.");
            return;
        }

        $user = $this->model->findByEmail($email);

        if ($user === null || !password_verify($password, $user->getPassword())) {
            //Même message dans les deux cas pour ne pas révéler si l'e-mail existe
            $this->viewConnect->setMessage("E-mail ou mot de passe incorrect.");
            return;
        }

        $this->openSession($user->getId(), $user->getPseudo());
    }

    //Formulaire d'inscription
    public function registerUser(): void {
        //Ce n'est pas le formulaire d'inscription qui a été envoyé
        if (!isset($_POST['emailInscription'])) {
            return;
        }

        $email = Utils::sanitize($_POST['emailInscription']);
        $pseudo = Utils::sanitize($_POST['pseudoInscription'] ?? '');
        $password = $_POST['passwordInscription'] ?? '';
        $confirmation = $_POST['confirmationPasswordInscription'] ?? '';

        if ($email === '' || $pseudo === '' || $password === '' || $confirmation === '') {
            $this->viewConnect->setMessage("Veuillez remplir tous les champs.");
            return;
        }

        if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
            $this->viewConnect->setMessage("Adresse e-mail invalide.");
            return;
        }

        //Les colonnes email et pseudo sont limitées à 50 caractères
        if (mb_strlen($email) > 50 || mb_strlen($pseudo) > 50) {
            $this->viewConnect->setMessage("L'e-mail et le pseudo doivent faire 50 caractères maximum.");
            return;
        }

        if (strlen($password) < 8) {
            $this->viewConnect->setMessage("Le mot de passe doit contenir au moins 8 caractères.");
            return;
        }

        if ($password !== $confirmation) {
            $this->viewConnect->setMessage("Les mots de passe ne correspondent pas.");
            return;
        }

        if ($this->model->emailExists($email)) {
            $this->viewConnect->setMessage("Cette adresse e-mail est déjà utilisée.");
            return;
        }

        if ($this->model->pseudoExists($pseudo)) {
            $this->viewConnect->setMessage("Ce pseudo est déjà pris.");
            return;
        }

        $this->model
            ->setPseudo($pseudo)
            ->setEmail($email)
            ->setPassword(password_hash($password, PASSWORD_DEFAULT))
            ->setRegistrationDate(date('Y-m-d'));

        $idUser = $this->model->create();

        //Le compte est créé : on connecte directement l'utilisateur
        $this->openSession((int) $idUser, $pseudo);
    }

    //Ouvre la session de l'utilisateur puis redirige vers l'accueil
    private function openSession(int $idUser, string $pseudo): void {
        session_regenerate_id(true);
        $_SESSION['is_logged_in'] = true;
        $_SESSION['id_user'] = $idUser;
        $_SESSION['pseudo'] = $pseudo;

        header('Location: ' . $_ENV['accueil']);
        exit;
    }
}