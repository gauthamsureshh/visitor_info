<?php

class VipVisitor extends Visitor {
    private int $vip_status;

    public function __construct($visitor_name='', $contact_number='', $purpose='', $time='', $vip_status= '') {
        parent::__construct($visitor_name, $contact_number, $purpose, $time);
        $this->vip_status = $vip_status;
    }

    public function addVisitor(): void{
        try{
            $sql = "INSERT INTO visitors(visitor_name, contact, purpose, time,vip ) VALUES (?,?,?,?,?)";
            $data = $this->connect()->prepare($sql);
            $data->execute([$this->visitor_name, $this->contact_number, $this->purpose, $this->time, $this->vip_status]);
        }
        catch(PDOException $e) {
            echo "Error adding New Visitor" . $e->getMessage();
        }
    }

    public function updateVisitor($id): void{
        try{
            $sql = "UPDATE visitors SET visitor_name= ? , contact = ? , purpose = ?, time = ?, vip = ? WHERE v_id = ?";
            $data = $this->connect()->prepare($sql);
            $data->execute([$this->visitor_name, $this->contact_number, $this->purpose, $this->time, $this->vip_status, $id]);
        }
        catch(PDOException $e) {
            echo "Error while Updating Visitor with ID: $id " . $e->getMessage();
        }
    }
}