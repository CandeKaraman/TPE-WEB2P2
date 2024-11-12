<?php
    require_once 'app/model/DestinationModel.php';
    require_once "app/view/json.view.php";
     class DestinationController {
        private $model;
        private $view;

        public function __construct() {
            $this->model = new DestinationModel();
            $this->view = new JSONView();
        }

        public function getAll($req,$res) {
            $destinations= $this->model->getDestinations();
            return $this->view->response($destinations);
        }
    }