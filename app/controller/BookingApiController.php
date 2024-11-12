<?php
require_once 'app/view/JSONView.php';
require_once 'app/model/BookingApiModel.php';

    class BookingApiController{

        private $model;
        private $view;

        public function __construct(){
            $this->view= new JSONView();
            $this->model= new BookingApiModel();
        }

        public function getAll($req, $res){
            $bookins= $this->model->getAllBookings();
            return $this->view->response($bookins);
        }
    
    }