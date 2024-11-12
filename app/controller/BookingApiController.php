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

        public function editBooking($req, $res){
            $bookingId= $req->params->id;
            $booking= $this->model->getBooking($bookingId);
            var_dump($booking);
            if($booking){
                $destination=$req->body->destination;
                $housing= $req->body->housing;
                $checkin= $req->body->checkin;
                $checkout= $req->body->checkout;
                $this->model->updateBookin($destination, $housing, $checkin, $checkout,$bookingId);
                $this->view->response("Reserva=$bookingId actualizada con exito", 200);
            }
            else{ 
                $this->view->response("Reserva=$bookingId not found", 404);
            }
        }

        public function getBooking($req){
            $bookingId= $req->params->id;
            $booking= $this->model->getBooking($bookingId);
            return $this->view->response($booking, 200);
        }
    
    }