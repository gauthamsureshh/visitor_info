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
        return $data;

    }
}
