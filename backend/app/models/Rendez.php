<?php
class Rendez
{
    private $db;

    public function __construct()
    {
        $this->db = new Database;
    }
    public function addRendez($data)
     {
        //  	id	name	date_rdv	sujet	creneau	id_client	
        $this->db->query('INSERT INTO rdv (id_client, date_rdv, sujet,creneau) VALUES(:id_client, :date_rdv, :sujet, :creneau)');

        //Bind values

        $this->db->bind(':date_rdv', $data['date_rdv']);
        $this->db->bind(':sujet', $data['sujet']);
        $this->db->bind(':id_client', $data['id_client']);
        $this->db->bind(':creneau', $data['creneau']);


        //Execute function
        try {
            $this->db->execute();
            return $data = true;
        } catch (PDOException $e) {
            return $e->getMessage();
        }
    }
    public function getRendez()
    {
            $this->db->query('SELECT rdv.*,client.* FROM rdv 
            INNER JOIN client ON  client.id = rdv.id_client ');
        // $this->db->query('SELECT * FROM rdv');
        try {
            return $this->db->resultSet();
        } catch (PDOException $e) {
            return $e->getMessage();
        }
    }
    public function Check_Rendez($data){
        $this->db->query('SELECT date_rdv FROM rdv where date_rdv = :date');
        $this->db->bind(':date_rdv', $data['date_rdv']);

            if($this->db->rowCount() == 5){
                return 1;
            }else{
                $this->db->query('SELECT creneau FROM rdv where date_rdv = :date');
                $this->db->resultSet();
            }

    }
//     public function getRendezByUserId($userId)
//     {

//         $this->db->query('SELECT * FROM rdv WHERE id_client=:userId');

//         $this->db->bind(':id_client', $userId);

//         $rendez = $this->db->resultSet();
//         return $rendez;
//     }

//     // cancel rendez
//     public function cancelrendez($rendez)
//     {
//         $this->db->query('UPDATE rdv SET date_rdv=:date , creneau=:creneau WHERE id=:rendez');

//         $this->db->bind(':date', 'date');
//         $this->db->bind(':creneau', 'creneau');
//         $this->db->execute();
//     }

//     // // accept order
//     // public function acceptRende($orderId)
//     // {
//     //     $this->db->query('UPDATE orders SET status=:status WHERE id=:orderId');
//     //     $this->db->bind(':status', 'delivered');
//     //     $this->db->bind(':orderId', $orderId);
//     //     $this->db->execute();
//     // }

//     // // reject order
//     // public function rejectOrder($orderId)
//     // {
//     //     $this->db->query('UPDATE orders SET status=:status WHERE id=:orderId');
//     //     $this->db->bind(':status', 'rejected');
//     //     $this->db->bind(':orderId', $orderId);
//     //     $this->db->execute();
//     // }

//     // pending order
//     // public function pendingOrder($orderId)
//     // {
//     //     $this->db->query('UPDATE orders SET status=:status WHERE id=:orderId');
//     //     $this->db->bind(':status', 'pending');
//     //     $this->db->bind(':orderId', $orderId);
//     //     $this->db->execute();
//     // }

//     // get all rendez ordered by date
//     public function getAllRendez($limit, $start)
//     {

//         // total rows 
//         $this->db->query("SELECT COUNT(*) AS total FROM rdv");
//         $total = $this->db->single();
//         $total = $total->total;

//         $this->db->query('SELECT * FROM rdv  ORDER BY created DESC LIMIT :limit OFFSET :start');
//         $this->db->bind(':limit', $limit);
//         $this->db->bind(':start', $start);
//         $rendez = $this->db->resultSet();
//         return array($rendez, $total);
//     }

//     // last Rendez inner join?	

//     public function getLastRendez()
//     {
//         $this->db->query('SELECT r.id, c.name, r.date_rdv, r.sujet, r.creneau  FROM client c ,rdv r WHERE c.id=r.id_client
//         ORDER BY r.id DESC LIMIT 4');
//         $showrdv = $this->db->resultSet();
//         return $showrdv;
//     }

//     // get order by id
//     public function getrdvById($rendezId)
//     {
//         $this->db->query('SELECT c.id, c.name, c.profession, r.id, r.date_rdv, r.sujet, r.creneau  FROM client c ,rdv r WHERE c.id=o.clientId AND o.id=:orderId ');

//         // $this->db->query('SELECT * FROM orders WHERE id=:orderId');
//         $this->db->bind(':rendezId', $rendezId);
//         $rendez = $this->db->single();
//         return $rendez;
//     }
}
