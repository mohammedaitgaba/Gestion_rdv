<?php
class User
{
    private $db;

    public function __construct()
    {
        $this->db = new Database;
    }
    public function newClient($data)
     {
        $this->db->query('INSERT INTO client (id,name, date_nais, CIN,profession) VALUES(:id,:name, :date_nais, :CIN, :profession)');

        //Bind values

        $this->db->bind(":id", $data["id"]);
        $this->db->bind(':name', $data['full_name']);
        $this->db->bind(':date_nais', $data['birthday']);
        $this->db->bind(':CIN', $data['CIN']);
        $this->db->bind(':profession', $data['Job']);


        //Execute function
        // ternary operator
        try {
            return $this->db->execute() ? $data : false;
        } catch (PDOException $e) {
            return $e->getMessage();
        }
    }

    // public function validat_user($data){

    //     $this ->db->query('SELECT * FROM client WHERE id = :id ');
    //     $this->db->bind(":id", $data["id"]);
        
    //     try {
    //         // fetch
    //         return $this->db->resultSet() ? $data : false;
    //     } catch (PDOException $e) {
    //         return $e->getMessage();
    //     }
    // }

    public function getById($id)
    {
        $this ->db->query('SELECT * FROM client WHERE id = :id ');
        $this->db->bind(":id", $id);

        try {
            return $this->db->single();
        } catch (PDOException $e) {
            return $e->getMessage();
        }
    }
    public function getAllusers(){
        $this->db->query('SELECT * FROM client');
        try {
            return $this->db->resultSet();
        } catch (PDOException $e) {
            return $e->getMessage();
        }
    }
    public function delet_user($data){
        $this->db->query('DELETE  FROM client WHERE id = :id');
        $this->db->bind(":id", $data);
        try {
            return $this->db->execute();
        } catch (PDOException $e) {
            return $e->getMessage();
        }
    }





    // public function find($data)
    // {
    //     $this->db->query("SELECT * FROM client WHERE id = :id ");

    //     //Bind values
    //     $this->db->bind(':id', $data['id']);

    //     //Execute function
    //     $user = $this->db->single();

    //     return $user;
    // }
	

    // // pagination
    // public function getAll($limit, $start)
    // {
    //     // total rows
    //     $this->db->query("SELECT COUNT(*) AS total FROM client");
    //     $total = $this->db->single();
    //     $total = $total->total;

    //     $this->db->query("SELECT * FROM client  ORDER BY date DESC LIMIT :limit OFFSET :start");
    //     $this->db->bind(':limit', $limit);
    //     $this->db->bind(':start', $start);
    //     $users = $this->db->resultSet();
    //     return array($users, $total);
    // }
    // get all clients
    // public function getAllClients()
    // {
    //     $this->db->query('SELECT * FROM client');
    //     $clients = $this->db->resultSet();
    //     return $clients;
    // }

    

    // get user
    // public function getUser($id)
    // {
    //     $this->db->query("SELECT * FROM client WHERE id = :id");
    //     $this->db->bind(':id', $id);
    //     $user = $this->db->single();
    //     return $user;
    // }

    

    // public function updateClientInfo($data, $id)
    // {

    //     $this->db->query("UPDATE client SET name=:name, date_nais=:date_nais, profession=:profession, CIN=:CIN WHERE id=:id");

    //     //Bind values

    //     $this->db->bind(':name', $data['name']);
    //     $this->db->bind(':CIN', $data['CIN']);
    //     $this->db->bind(':profession', $data['profession']);
    //     $this->db->bind(':date_nais', $data['date_nais']);
    //     $this->db->bind(':id', $id);

    //     //Execute function
    //     try {
    //         $this->db->execute();
    //         return $data = true;
    //     } catch (PDOException $e) {
    //         return $e->getMessage();
    //     }
    // }

    
// register & login
    // public function checkid($data)
    // {

    //     $this->db->query("SELECT * FROM client WHERE id=:id");

    //     $this->db->bind(':id', $data['id']);

    //     $this->db->execute();
        // return $this->db->rowCount();
    // }

    // public function deleteUser($id)
    // {
    //     $this->db->query("DELETE FROM client WHERE id=:id");

    //     $this->db->bind(':id', $id);

    //     //Execute function
    //     try {
    //         $this->db->execute();
    //         return "ok";
    //     } catch (PDOException $e) {
    //         return $e->getMessage();
    //     }
    // }
}
