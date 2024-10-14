<?php


class Interaction extends Database {
    public function setVisitor($name, $contact, $purpose, $time): void{
        $sql = "INSERT INTO visitors(visitor_name, contact, purpose, time) VALUES (?,?,?,?)";
        $stmt = $this->connect()->prepare($sql);
        $stmt->execute([$name, $contact, $purpose, $time]);
    }

    public function getVisitor(){
        $sql = "SELECT * FROM visitors";
        $data = $this->connect()->query($sql);
        return  $data;

    }

    public function specficVisitor($id){
        $sql = "SELECT * FROM visitors WHERE v_id= ?";
        $data = $this->connect()->prepare($sql);
        $data->execute([$id]);
        return $data;
    }

    public function updateVisitor($id,$name, $contact, $purpose, $time){
        $sql = "UPDATE visitors SET visitor_name= ? , contact = ? , purpose = ?, time = ? WHERE v_id = ?";
        $data = $this->connect()->prepare($sql);
        $data->execute([$name, $contact, $purpose, $time, $id]);
    }

    public function deleteVisitor($id){
        $sql = "DELETE FROM visitors WHERE v_id = ? ";
        $data = $this->connect()->prepare($sql);
        $data->execute([$id]);
    }
}
