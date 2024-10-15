<?php

class Interaction extends Database {
    //inserts new visitor information to db.
    public function setVisitor($name, $contact, $purpose, $time,$vip_status): void{
        $sql = "INSERT INTO visitors(visitor_name, contact, purpose, time, vip) VALUES (?,?,?,?,?)";
        $stmt = $this->connect()->prepare($sql);
        $stmt->execute([$name, $contact, $purpose, $time, $vip_status]);
    }

    //get all the visitors present in db.
    public function getVisitor(){
        $sql = "SELECT * FROM visitors";
        return  $this->connect()->query($sql);
    }

    //get a specific visitor according to the visitor id passed.
    public function specificVisitor($id){
        $sql = "SELECT * FROM visitors WHERE v_id= ?";
        $data = $this->connect()->prepare($sql);
        $data->execute([$id]);
        return $data;
    }

    //updates a existing visitor.
    public function updateVisitor($id,$name, $contact, $purpose, $time, $vip_status): void{
        $sql = "UPDATE visitors SET visitor_name= ? , contact = ? , purpose = ?, time = ? , vip = ? WHERE v_id = ?";
        $data = $this->connect()->prepare($sql);
        $data->execute([$name, $contact, $purpose, $time, $vip_status, $id]);
    }

    //deletes visitor info according to the visitor id passed.
    public function deleteVisitor($id): void{
        $sql = "DELETE FROM visitors WHERE v_id = ? ";
        $data = $this->connect()->prepare($sql);
        $data->execute([$id]);
    }
}
