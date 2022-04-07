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
        $this->db->query("SELECT * FROM admin WHERE id = :id");
        $this->db->bind(':id',$id);
        try {
            return $this->db->single();
        } catch (PDOException $e) {
            return $e->getMessage();
        }
    }
}