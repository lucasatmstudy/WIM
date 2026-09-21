<?php

namespace Controller;

use Model\Model;
use View\View;

abstract class Controller {
    //ATTRIBUT
    private Model $model;
    protected View $view;

    //CONSTRUCTOR
    public function __construct(Model $model, View $view) {
        $this->model = $model;
        $this->view = $view;
    }

    //METHOD
    public function getModel():Model{
        return $this->model;
    }

    public function setModel(Model $newModel):self{
        $this->model= $newModel;
        return $this;
    }

    public function getView():View{
        return $this->view;
    }

    public function setView(View $newView):self{
        $this->view = $newView;
        return $this;
    }

    //Rendu de l'affichage : header + contenu + footer
    public function render(): void {
        $this->view->displayAll();
    }
}

