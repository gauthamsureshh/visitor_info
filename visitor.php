<?php

class Visitor extends Database {

    private string $visitor_name;
    private string $contact_number;
    private string $purpose;
    private string $time;

    public function __construct($visitor_name='', $contact_number='', $purpose='', $time='') {
        $this->visitor_name = $visitor_name;
        $this->contact_number = $contact_number;
        $this->purpose = $purpose;
        $this->time = $time;
    }

    //inserts new visitor information to db.
    public function addVisitor(): void{
        try{
            $sql = "INSERT INTO visitors(visitor_name, contact, purpose, time) VALUES (?,?,?,?)";
            $data = $this->connect()->prepare($sql);
            $data->execute([$this->visitor_name, $this->contact_number, $this->purpose, $this->time]);
        } 
        catch(PDOException $e) {
            echo "Error adding New Visitor" . $e->getMessage();
        }
    }

    //get all the visitors present in db.
    public function getVisitor(): array{
        try{
            $sql = "SELECT * FROM visitors";
            $data = $this->connect()->query($sql);
            return $data->fetchAll();
        }
        catch(PDOException $e) {
            echo "Error getting Visitor Information" . $e->getMessage();
            return [];
        }
    }

    //get a specific visitor according to the visitor id passed.
    public function specificVisitor($id): array{
        try{
            $sql = "SELECT * FROM visitors WHERE v_id= ?";
            $data = $this->connect()->prepare($sql);
            $data->execute([$id]);
            return $data->fetchAll();
        }
        catch(PDOException $e) {
            echo "Error while getting Visitor Information with ID: $id" . $e->getMessage();
            return [];
        }
    }

    //updates a existing visitor.
    public function updateVisitor($id): void{
        try{
            $sql = "UPDATE visitors SET visitor_name= ? , contact = ? , purpose = ?, time = ? WHERE v_id = ?";
            $data = $this->connect()->prepare($sql);
            $data->execute([$this->visitor_name, $this->contact_number, $this->purpose, $this->time, $id]);
        }
        catch(PDOException $e) {
            echo "Error while Updating Visitor with ID: $id " . $e->getMessage();
        }
    }

    //deletes visitor info according to the visitor id passed.
    public function deleteVisitor($id): void{
        try{
            $sql = "DELETE FROM visitors WHERE v_id = ? ";
            $data = $this->connect()->prepare($sql);
            $data->execute([$id]);
        }
        catch(PDOException $e) {
            echo "Error while Deleting Visitor with ID: $id" . $e->getMessage();
        }
    }
}
