<?php

include_once MODEL_DIR . 'CustomerModel.php';
include_once MODEL_DIR . 'SubscriptionsModel.php';
include_once MODEL_DIR . 'TaskCustomerModel.php';

class taskController extends App{
    protected $TaskCustomerModel;
    public function __construct() {
        parent::__construct();

        $this->init();
    }
    public function init() {
        $this->TaskCustomerModel = new TaskCustomerModel();
        array_shift($this->urlSegments);
        if ($this->requestMethod === 'GET') {
            if ($this->urlSegments) {
                switch ($this->urlSegments[0]) {
                    case 'kanban':
                        return $this->ViewCustomerKanban();
                        break;
                    case 'del':
                        break;
                    case 'view':
                         return $this->viewActivity();
                        break;
                    case 'debug':
                        return $this->jsonCustomerTask();
                        break;
                    case 'json':
                        return $this->jkanbanjson();
                        break;
                    case 'add':
                        return $this->addCustomerTaskView();
                        break;
                    case 'detail':
                        return $this->viewTaskid();
                        break;
                    case 'list':
                        return $this->ViewCustomerTaskList();
                        break;
                    default:
                        return $this->ViewCustomerTask();
                        break;
                }
            } else {
                $this->ViewCustomerTask();
            }
        } else if ($this->requestMethod === 'POST') {
                $this->postData = json_decode(file_get_contents('php://input'), true);
                $this->action =  $this->postData['action'] ?? '';
                switch ($this->action) {
                    case 'followtask':
                      return $this->InsertFollowTask();
                        break;
                    case 'newcustomer':
                       return $this->insertTask(); 
                        break;
                    case 'false':
                        // code...
                        break; 
                    case 'update':
                        return $this->updateTask(); 
                        break; 
                    default:
                        // code...
                        break;
                }
        }
    }

    public function viewActivity(){
        include LAYOUT.'activityview.php';
    }
    public function jsonCustomerTask() {
        $this->ViewCustomerTask();
        header('Content-Type: application/json; charset=utf-8');
        echo json_encode($this->customerTask);
    }
    
    
    public function getFollowTask($id){
        return $this->TaskCustomerModel->getFollowTask($id);
    }

    public function subscriptionsId($id) {
        $subscriptionss = new SubscriptionsModel();
        return $subscriptionss->getSubscriptions($id)->get();
    }

    public function ViewCustomerTaskList() {
        $privilage = $this->mainController->privilegeUsers();
        $privilageSet = [
            'teknisi' => ['pending', 'onprogress', 'onsurvey'],
            'noc' => ['onlogic'],
            'owner' => ['pending', 'onprogress', 'onsurvey', 'done','onlogic', 'nocoverage'],
        ];
        $this->data = $this->ViewCustomerTask(['Ok_task_customer.status' => $privilageSet[$privilage['position']],'ORDER' =>['created_at' => 'DESC']]); 
        $this->title = 'Task New Customer - Okebiling';
        return $this->layout()->view('newcustomer', [
            'cssLinks' => ['/assets/vendor/libs/winbox/css/winbox.min.css'],
            'scripts' => [
                '/assets/vendor/libs/winbox/js/winbox.min.js',
                '/assets/vendor/libs/block-ui/block-ui.js',
                '/assets/js/task.js?'.rand(1, 100),

            ]]);
    }
    
    
    public function viewTaskid($id){
       return $this->data = $this->TaskCustomerModel->getTaskDetail(['Ok_task_customer.id' =>$id]); 
       
    }
    
    
    public function ViewCustomerTask($conditional = null) {

        if (!empty($conditional)) {
            return $this->customerTask = $this->TaskCustomerModel->getTask($conditional);
        } else {
            return $this->customerTask = $this->TaskCustomerModel->getTask();
        }
    }
 
 
    public function InsertFollowTask(){
        unset($this->postData['action']);
         $this->postData['iduser']=session::get('_id');
         $this->TaskCustomerModel->insertHisTask(['idcustomer'=> $this->postData['idcustomer'],'type'=>'follow']);
         $followtask = $this->TaskCustomerModel->followTask($this->postData);
         echo json_encode($this->postData);
    }



    public function insertTask() {
         unset($this->postData['action']);
        $this->postData['id'] = randstring();
        $actions= $this->TaskCustomerModel->insetTask($this->postData); 
        $this->TaskCustomerModel->insertHisTask(['idcustomer'=> $this->postData['id'],'type'=>'create']);
        echo json_encode($this->TaskCustomerModel->insertHisTask);

    }
    
    public function viewHisTask($array){
        return  $this->TaskCustomerModel->getHisTask($array);
    }
    
    
    
    public function updateTask(){
        $idcustomer=$this->postData['idcustomer'];
        unset($this->postData['idcustomer']);
        unset($this->postData['message']);
        unset($this->postData['action']);
         $this->TaskCustomerModel->updateTask($this->postData,['id'=> $idcustomer]);
       return $this->TaskCustomerModel->insertHisTask(['idcustomer'=>$idcustomer,'type'=>'update','status'=> 'onsurvey']);
         
    }


    public function addCustomerTaskView() {
        $this->subscriptions = new SubscriptionsModel();
        $this->title = 'Add Customer - Okebiling';
        $this->layout()->view('addcustomer', $this->loadlib());
    }
    

    
    public function ViewCustomerKanban() {
        $this->customerall = $this->TaskCustomerModel->getTask();
        $this->title = 'Customer Pending- Okebiling';
        return $this->layout()->view('customerKanban', $this->loadlibKanban());
    }
    
    public function loadlib() {
        return [
            'cssLinks' => [
                'https://unpkg.com/leaflet@1.9.4/dist/leaflet.css',
                '/assets/vendor/libs/select2/select2.css',
                '/assets/vendor/libs/bootstrap-select/bootstrap-select.css'],
            'scripts' => [
                '/assets/vendor/libs/leaflet/leaflet.js',
                '/assets/js/forms-selects.js?'.rand(1, 100),
                '/assets/vendor/libs/select2/select2.js',
                '/assets/vendor/libs/cleavejs/cleave.js',
                '/assets/vendor/libs/formvalidation/dist/js/FormValidation.min.js',
                '/assets/vendor/libs/formvalidation/dist/js/plugins/Bootstrap5.min.js',
                '/assets/vendor/libs/formvalidation/dist/js/plugins/AutoFocus.min.js',
                '/assets/js/customer.js?'.rand(1, 100),
                '/assets/js/ui-popover.js'
            ]];
    }

    public function loadlibKanban() {
        return [
            'cssLinks' => [
                '/assets/vendor/libs/jkanban/jkanban.css?'.rand(1, 100),
                '/assets/vendor/css/pages/app-kanban.css?'.rand(1, 100),
            ],
            'scripts' => [
                '/assets/vendor/libs/moment/moment.js',
                '/assets/vendor/libs/jkanban/jkanban.js?'.rand(1, 100),
                '/assets/js/app-kanban.js?'.rand(1, 100),

            ]];
    }


   public function jkanbanjson() {
        $data = $this->TaskCustomerModel->getTask();

        $statusToBoardId = [
            'pending' => 'pending',
            'onsurvey' => 'onsurvey',
            'onprogress' => 'onprogress',
            'onlogic' => 'onlogic',
            'done' => 'done',
            'nocoverage' => 'nocoverage',
        ];

        $dragToIdMap = [
            'pending' => ["onsurvey"],
            'onsurvey' => ["onprogress",
                "nocoverage"],
            'onprogress' => ["onlogic"],
            'onlogic' => ["done"],
            'done' => [""],
            'nocoverage' => [""],
        ];
        $titleMap = [
            'pending' => 'Pending',
            'onsurvey' => 'Survey',
            'onprogress' => 'Progress',
            'onlogic' => 'Logic Konfigurasi',
            'done' => 'Done',
            'nocoverage' => 'Tidak Tersedia',
        ];

        $output = [];
        $boardOrder = array_flip(array_values($statusToBoardId)); // Urutan board sesuai dengan $statusToBoardId

        // Buat peta untuk mengelompokkan data berdasarkan status
        $groupedData = [];

        foreach ($data as $item) {
            $status = $item['status'];

            if (isset($statusToBoardId[$status])) {
                $boardId = $statusToBoardId[$status];

                if (!isset($groupedData[$boardId])) {
                    $groupedData[$boardId] = [
                        'id' => $status,
                        'title' => ucfirst($titleMap[$status]),
                        'dragTo' => $dragToIdMap[$status],
                        'item' => [],
                    ];
                }

                $groupedData[$boardId]['item'][] = [
                    'id' => $item['id'],
                    'title' => $item['firstname'] . ' ' . $item['lastname'],
                    'comments' => '5',
                    'alamat' => $item['alamat'],
                    'badge-text' => $this->subscriptionsId($item['subscriptions'])['package'],
                    'lat-lng' => $item['lat'] . ',' . $item['lng'],
                    'phone-number' => str_replace(' ', '', $item['phoneNumber']),
                    'email' => $item['email'],
                    'type' => $item['type'],
                    'updated_at' => $item['updated_at'],
                    'badge' => badgelevel($item['subscriptions']),
                    'start-date' => $item['created_at'],
                    'attachments' => '',
                    // Gantilah dengan data sesuai kebutuhan
                    'idfrom' => [
                        'idfrom jika ada',
                        // Gantilah dengan data sesuai kebutuhan
                        'idfrom',
                        // Gantilah dengan data sesuai kebutuhan
                        'idfrom',
                        // Gantilah dengan data sesuai kebutuhan
                    ],
                ];
            }
        }

        // Urutkan output berdasarkan urutan board
        usort($groupedData, function ($a, $b) use ($boardOrder) {
            return $boardOrder[$a['id']] - $boardOrder[$b['id']];
        });

        // Konversi data yang telah dikelompokkan menjadi array
        foreach ($groupedData as $boardData) {
            $output[] = $boardData;
        }
        header('Content-Type: application/json; charset=utf-8');
        echo json_encode($output);
    }

}