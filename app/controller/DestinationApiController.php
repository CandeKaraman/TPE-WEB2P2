<?php
 require_once 'app/model/DestinationApiModel.php';
 require_once "app/view/JSONView.php";
  class DestinationApiController {
     private $model;
     private $view;

     public function __construct() {
         $this->model = new DestinationApiModel();
         $this->view = new JSONView();
     }

     public function getAll($req,$res) {
         $destinations= $this->model->getDestinations();
         return $this->view->response($destinations);
     }

     public function getDestination($req,$res){
         $IDDESTINATION = $req->params->id;
         $destinations= $this->model->getDestinationById($IDDESTINATION);
         if($destinations){        //si el destino existe
             return $this->view->response($destinations,200);
         }else{
             return $this->view->response('El destino no esxite', 404);
         }
     }

     public function addDestination($req, $res){
         if(empty($req->body->name) || empty($req->body->description)){
             return $this->view->response('Datos incompetos', 400);
         }

         $name = $req->body->name;
         $description = $req->body->description;
         $attractions = $req->body->attractions;
         $season = $req->body->season;

         $id = $this->model->insertDestination($name, $description, $attractions, $season);

         if(!$id){
             return $this->view->response('Error al añadir destino', 500);
         }
         $destination = $this->model->getDestinations($id);
         $this->view->response($destination, 200);


     }
 }
    