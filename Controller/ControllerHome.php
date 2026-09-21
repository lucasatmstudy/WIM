<?php

namespace Controller;

use Model\ModelHome;
use View\ViewHome;

class ControllerHome extends Controller {
    //ATTRIBUTS
    private ModelHome $model;
    private ViewHome $viewHome;

    //CONSTRUCTOR
    public function __construct(ModelHome $model, ViewHome $view) {
        parent::__construct($model, $view);
        $this->model = $model;
        $this->viewHome = $view;
    }

    //METHODS
    public function index(): void {
        if (($_SESSION['is_logged_in'] ?? false) === true) {
            $albums = $this->model->findAlbumsByUser((int) $_SESSION['id_user']);
            $this->viewHome->setAlbums($albums);
        }
    }
}