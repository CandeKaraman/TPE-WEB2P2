<?php
require_once 'app/view/JSONView.php';
require_once 'app/model/BookingModel.php';

    class BookingController{

        private $model;
        private $view;

        public function __construct(){
            $this->view= new JSONView;
            $this->model= new BookingModel;
        }

        public function getAll($req, $res){
            $bookins= $this->model->getAllBookings();
            return $this->view->response($bookins);
        }
    
    }