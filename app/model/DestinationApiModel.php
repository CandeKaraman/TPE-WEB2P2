<?php

class DestinationApiModel{
    private $db;
    public function __construct() {
        $this->db = new PDO('mysql:host=localhost; dbname=sistemadereservas; charser= utf8', 'root','');
    }
    
    public function getDestinations($orderBy){
        $sql= 'SELECT * FROM destination';
        if($orderBy){
            switch ($orderBy) {
                case 'name':
                    $sql .= ' ORDER BY name';
                    break;
                case 'season':
                    $sql .= ' ORDER BY season';
                    break;
                case 'IDDESTINATION ':
                    $sql .= 'ORDER BY IDDESTINATION ';
                    break;
            }

        }
        $query = $this->db->prepare($sql);
        $query->execute();
        return $query->fetchAll(PDO::FETCH_OBJ);
    }

    public function insertDestination($name, $description, $attractions, $season){
        $query = $this->db->prepare("INSERT INTO destination(name, description, attractions, season) VALUES (?, ?, ?, ?)");
        $query->execute([$name, $description, $attractions, $season]);
       
        $id = $this->db->lastInsertId();
        return $id;
    }

    public function deleteDestination($IDDESTINATION){
        $query = $this->db->prepare('DELETE FROM destination WHERE IDDESTINATION = ?');
        return $query->execute([$IDDESTINATION]);
    }

    public function editDestination($IDDESTINATION, $name, $description, $attractions, $season) {
        $query = $this->db->prepare('UPDATE destination SET name = ?, description = ?, attractions = ?, season = ? WHERE IDDESTINATION = ?');
        return $query->execute([$name, $description, $attractions, $season, $IDDESTINATION]);
    }

    public function getDestinationById($IDDESTINATION){
        $query = $this->db->prepare('SELECT * FROM destination WHERE IDDESTINATION = ?');
        $query->execute([$IDDESTINATION]);
        return $query->fetch(PDO::FETCH_OBJ);
    }
}