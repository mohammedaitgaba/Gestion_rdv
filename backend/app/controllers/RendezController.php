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
        // if($_SERVER['REQUEST_METHOD'] == 'POST'){
            // $data = json_decode(file_get_contents("php://input"), true);
            $result = $this->RendezModel->getRendez(); 

            if($result){
                // echo json_encode(["data" => $result]);
                echo json_encode($result);
            }else{
                echo json_encode(["message" => "error"]);
            }
    }
    // public function getRdvById(){
    //     if($_SERVER['REQUEST_METHOD'] == 'POST'){
    //         $data = json_decode(file_get_contents("php://input"), true);
    //         $result = $this->RendezModel->getRendez($data);
            
    //         if($result){
    //             echo json_encode(["message" => "success", "data" => $result]);
    //         }else{
    //             echo json_encode(["message" => "error"]);
    //         }
    //     }
    // }


    // get rdvs by user id
    // public function getRendezByUserId()
    // {
    //     $userId = $this->data['userId'];
    //     $rendez = $this->rendezModel->getRendezByUserId($userId);

    //     print_r(json_encode($rendez));
    // }

    // // cancel rdv
    // public function cancelrendez()
    // {
    //     $rendez_id = $this->data['rendez_id'];
    //     $status = $this->rendezModel->cancelrendez($rendez_id);
    // }

    // // accept rendez
    // public function acceptOrder()
    // {
    //     $orderId = $this->data['orderId'];
    //     $status = $this->orderModel->acceptOrder($orderId);
    // }

    // // reject order
    // public function rejectOrder()
    // {
    //     $orderId = $this->data['orderId'];
    //     $status = $this->orderModel->rejectOrder($orderId);
    // }

    // // pendding order
    // public function pendingOrder()
    // {
    //     $orderId = $this->data['orderId'];
    //     $status = $this->orderModel->pendingOrder($orderId);
    // }
    // get all rendez
    // public function getAllRendez()
    // {
    //     $page =  $this->data['page'];
    //     $limit =  7;
    //     $offset = ($page - 1) * $limit;
    //     $rendez = $this->rendezModel->getAllrendez($limit, $offset);

    //     if ($rendez) {
    //         $pages = ceil($rendez[1] / $limit);

    //         print_r(json_encode(
    //             array(
    //                 'rendez' => $rendez[0],
    //                 'pages' => $pages,
    //         )));
            
    //     } else {
    //         print_r(json_encode("No rendez-vous found"));
    //     }

    // }

    // // last rendez
    // public function getLastRendez()
    // {
    //     $rendez = $this->rendezModel->getLastRendez();
    //     print_r(json_encode($rendez));
    // }

    // // get rdv by id
    // public function getrdvById($id)
    // {
    //     $rendez = $this->rendezModel->getrdvById($id);
    //     print_r(json_encode($rendez));
    // }



}