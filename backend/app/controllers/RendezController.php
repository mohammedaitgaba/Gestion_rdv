<?php
// header('Access-Control-Allow-Origin: *');
// header('Content-Type: application/json');
// header('Access-Control-Allow-Methods: POST');
// header('Access-Control-Allow-Headers: Access-Control-Allow-Headers,Content-Type,Access-Control-Allow-Methods, Authorization, X-Requested-With');

class RendezController extends Controller
{
    private $RendezModel;

    public $data = [];

    public function __construct()
    {
        $this->RendezModel = $this->model('Rendez');
    }


    public function add_rendev(){
        if($_SERVER['REQUEST_METHOD'] == 'POST'){
            $data = json_decode(file_get_contents("php://input"), true);
            $result = $this->RendezModel->addRendez($data);
            
            if($result){
                echo json_encode(["message" => "success", "data" => $result]);
            }else{
                echo json_encode(["message" => "error"]);
            }
        }

    }
    public function getAllRendez(){

            $result = $this->RendezModel->getRendez(); 

            if($result){
                echo json_encode($result);
            }else{
                echo json_encode(["message" => "error"]);
            }
    }

    public function check_rdv(){
        if($_SERVER['REQUEST_METHOD'] == 'POST'){
            $data = json_decode(file_get_contents("php://input"), true);
            $result = $this->RendezModel->Check_Rendez($data);
            
    }
    }

}