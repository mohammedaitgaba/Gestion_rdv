<?php

class UserController extends Controller
{
    // public $data = [];
    private $userModel;
  
    public function __construct()
    {
        $this->userModel = $this->model('User');
    }
    public function getInfo(){
        if($_SERVER['REQUEST_METHOD'] == 'POST'){
            $data = json_decode(file_get_contents("php://input"),true);
            $result = $this->userModel->getInfor($data);
            if($result){
                echo json_encode(["message" => "success","data"=> $result]);
            }else{
                echo json_encode(["message" => "error d'affichage"]);
            }
        }
    }

    public function updateinfo(){
        if($_SERVER['REQUEST_METHOD'] == 'POST'){
            $data = json_decode(file_get_contents("php://input"),true);
            
            if($this->userModel->updateInfo($data)){
                echo json_encode(array(
                    "message"=>"done"
                ));
            }else{
                echo json_encode(["message" => "error"]);
            }
            
        }
    }
    public function add_user(){

        if($_SERVER['REQUEST_METHOD'] == 'POST')
        {
            $data = json_decode(file_get_contents("php://input"), true);
            // $result = $this->userModel->newClient([...$data, "id" => uniqid()]);
            // $id = "CL-".uniqid();
            $id ="CL-".substr(uniqid('', true), -5);
            $result = $this->userModel->newClient([...$data, "id" => $id]);

            if($result){
                echo json_encode(["message" => "success", "data" => $result]);
            }else{
                echo json_encode(["message" => "error not created"]);
            }
    }
    }

    public function check_user(){
        
        if($_SERVER['REQUEST_METHOD'] == 'POST'){

            $data = json_decode(file_get_contents("php://input"), true); 
            $result = $this->userModel->getById(strtoupper($data["id"]));
            if($result){
                echo json_encode(["message" => "success","data" => $result]);
            }else{
                echo json_encode(["message" => "you entred false info"]);
            }
        }
    }
    public function getAllusers(){
       
            $result = $this->userModel->getAllusers(); 
            if($result){
                echo json_encode($result);
            }else{
                echo json_encode(["message" => "error"]);
            }
    }
    public function delete_user(){
        if($_SERVER['REQUEST_METHOD'] == 'POST'){

            $id = json_decode(file_get_contents("php://input"), true); 
            $result = $this->userModel->delet_user($id);
            if($result){
                echo json_encode(["message" => "success","ID"=>$id]);
            }else{
                echo json_encode(["message" => "failed"]);
            }
        } 
    }
    // public function updateClient($data)
    // {


    //     $this->db->query("UPDATE client SET name=':name', date_nais=':date_nais', profession=':profession', CIN=':CIN' WHERE id=:id");

    //     //Bind values

    //     $this->db->bind(':name', $data['name']);
    //     $this->db->bind(':date_nais', $data['date_nais']);
    //     $this->db->bind(':profession', $data['profession']);
    //     $this->db->bind(':CIN', $data['CIN']);
    //     $this->db->bind(':id', $data['id']);

    //     //Execute function
    //     try {
    //         $this->db->execute();
    //         return $data = true;
    //     } catch (PDOException $e) {
    //         return $e->getMessage();
    //     }
    // }




    // public function add_rendev(){
        
    //     if($_SERVER['REQUEST_METHOD'] == 'POST'){

    //         $data = json_decode(file_get_contents("php://input"), true); 
    //         $result = $this->userModel->addRendez($data);
    //         if($result){
    //             echo json_encode(["message" => "success","data" => $result]);
    //         }else{
    //             echo json_encode(["message" => "error not created"]);
    //         }
    //     }
    // }


//     public function register()
//     {

//         if ($this->userModel->newClient($this->data)) {
//             print_r(json_encode("Registred Sucssefully"));
//         }
//     }


// C:\xampp\htdocs\brief6\backend\app\controllers\UserController.php


    // public function find()
    // {

    //     $user = $this->userModel->find($this->data);
    //     if ($user) {

            
    //         print_r(json_encode(array(
    //             'User' => $user,
                
    //         )));
    //     } else {
    //         print_r(json_encode("Incorrect Password or Name !"));
    //     }
    // }
    // // // check jwt token
    // // public function checkToken()
    // // {
    // //     $token = $this->data['token'];

    // //     try {
    // //         if ($this->verifyAuth($token)) {
    // //             print_r(json_encode("valid"));
    // //         }
    // //     } catch (\Throwable $th) {
    // //         //throw $th;
    // //         print_r(json_encode(array(
    // //             "error" => "unauthorized" . $th->getMessage(),
    // //         )));
    // //     }
    // // }
    // // get user by id
    // public function getUser()
    // {
    //     $id = $this->data['id'];
    //     $user = $this->userModel->getUser($id);
    //     if ($user) {
    //         print_r(json_encode($user));
    //     } else {
    //         print_r(json_encode(false));
    //     }
    // }

    // // get all clients
    // public function getAllClients()
    // {
    //     $clients = $this->userModel->getAllClients();
    //     if ($clients) {
    //         print_r(json_encode($clients));
    //     } else {
    //         print_r(json_encode("No clients found"));
    //     }
    // }
    // // pagination
    // public function getAll()
    // {
    //     $page =  $this->data['page'];
    //     $limit =  7;
    //     $offset = ($page - 1) * $limit;
    //     $users = $this->userModel->getAll($limit, $offset);

    //     if ($users) {
    //         $pages = ceil($users[1] / $limit);

    //         print_r(json_encode(
    //             array(
    //                 'users' => $users[0],
    //                 'pages' => $pages,
    //             )
    //         ));
    //     } else {
    //         print_r(json_encode("No users found"));
    //     }
    // }

    // // get last 4 clients
    // public function getLast4Clients()
    // {
    //     $clients = $this->userModel->getLast4Clients();
    //     if ($clients) {
    //         print_r(json_encode($clients));
    //     } else {
    //         print_r(json_encode("No clients found"));
    //     }
    // }


    // public function update($id)
    // {

    //     $headers = apache_request_headers();
    //     $headers = isset($headers['Authorization']) ? explode(' ', $headers['Authorization']) : null;
    //     if ($headers) {
    //         try {
    //             $this->verifyAuth($headers[1]);
    //             $update = $this->userModel->updateClientInfo($this->data, $id);
    //             if ($update) {
    //                 print_r('success');
    //             }
    //         } catch (Throwable $th) {
    //             print_r(json_encode(array(
    //                 "error" => "unauthorized1",
    //             )));
    //         }
    //     } else {
    //         print_r(json_encode(array(
    //             "error" => "unauthorized2",
    //         )));
    //     }
    // }
    // // update avatar
    // public function updateAvatar($id)
    // {
    //     $headers = apache_request_headers();
    //     $headers = isset($headers['Authorization']) ? explode(' ', $headers['Authorization']) : null;
    //     if ($headers) {
    //         try {
    //             $this->verifyAuth($headers[1]);
    //             $filename = $_FILES["uploadfile"]["name"];
    //             $tempname = $_FILES["uploadfile"]["tmp_name"];
    //             $folder = "./img/" . $filename;

    //             if (move_uploaded_file($tempname, $folder)) {
    //                 $msg = "Image uploaded successfully";
    //             } else {
    //                 $msg = "Failed to upload image";
    //             }

    //             $this->userModel->updateAvatar($id, $filename);
    //             print_r(json_encode($msg));
    //         } catch (Throwable $th) {
    //             print_r(json_encode(array(
    //                 "unauthorized Token",
    //             )));
    //         }
    //     } else {
    //         print_r(json_encode(array(
    //             "error" => "unauthorized2",
    //         )));
    //     }
    // }
    // public function updatePassword($id)
    // {


    //     $headers = apache_request_headers();
    //     $headers = isset($headers['Authorization']) ? explode(' ', $headers['Authorization']) : null;
    //     if ($headers) {
    //         try {

    //             // role management
    //             $verify = $this->verifyAuth($headers[1]);
    //             $exploaded = get_object_vars($verify);
    //             print_r($exploaded['admin']);

    //             $checkPassword = $this->userModel->checkPassword($this->data, $id);

    //             if ($checkPassword) {

    //                 $updatePassword = $this->userModel->updateClientPassword($this->data, $id);
    //                 if ($updatePassword) {
    //                     print_r(json_encode('success'));
    //                 }
    //             } else {
    //                 print_r(json_encode('The current password is incorrect. Please try again'));
    //             }
    //         } catch (Throwable $th) {
    //             print_r(json_encode(array(
    //                 "error" => "unauthorized1",
    //             )));
    //         }
    //     } else {
    //         print_r(json_encode(array(
    //             "error" => "unauthorized2",
    //         )));
    //     }
    // }

    // public function checkpassword($id)
    // {
    //     $checkp = $this->userModel->checkPassword($this->data, $id);
    //     if ($checkp) {
    //         print_r(json_encode($checkp . 'true'));
    //     } else {
    //         print_r(json_encode($checkp . 'false'));
    //     }
    // }

    // public function checkEmail()
    // {
    //     $checkEmail = $this->userModel->checkEmail($this->data);

    //     if ($checkEmail >= 1) {
    //         print_r(json_encode(true));
    //     } else {
    //         print_r(json_encode(false));
    //     }
    // }

    // public function delete($id)
    // {
    //     header('Access-Control-Allow-Methods: DELETE');

    //     $headers = apache_request_headers();
    //     $headers = isset($headers['Authorization']) ? explode(' ', $headers['Authorization']) : null;
    //     if ($headers) {
    //         try {
    //             // role management
    //             $verify = $this->verifyAuth($headers[1]);
    //             $exploaded = get_object_vars($verify);

    //             if ($exploaded['admin']) {

    //                 // *** The Important Stuff *** //

    //                 $this->userModel->deleteUser($id);
    //                 print_r(json_encode('Client Deleted Successfully'));
    //             } else {
    //                 print_r(json_encode(array(
    //                     "error" => "401",
    //                 )));
    //             }
    //         } catch (Throwable $th) {
    //             print_r(json_encode(array(
    //                 "error" => "unauthorized1",
    //             )));
    //         }
    //     } else {
    //         print_r(json_encode(array(
    //             "error" => "unauthorized2",
    //         )));
    //     }
    // }
}
