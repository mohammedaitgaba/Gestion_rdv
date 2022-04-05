<?php
class Admin
{
    private $db;

    public function __construct()
    {
        $this->db = new Database;
    }

    public function checkAdminByID($id)
    {
        $this->db->query("SELECT * FROM admin WHERE id = :id ");

        //Bind values
        $this->db->bind(':id', $id);
        

        //Execute function
        try {
            return $this->db->single();
        } catch (PDOException $e) {
            return $e->getMessage();
        }
    }
}