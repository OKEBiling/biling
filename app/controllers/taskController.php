<?php

include_once MODEL_DIR . "CustomerModel.php";
include_once MODEL_DIR . "SubscriptionsModel.php";
include_once MODEL_DIR . "TaskCustomerModel.php";
include_once MODEL_DIR . "FileModel.php";
include_once MODEL_DIR . "CommentModel.php";
include_once CONTROLLER_DIR . "UploadController.php";
include_once CONTROLLER_DIR . "CommentController.php";

class taskController extends App
{
    protected $TaskCustomerModel;
    public function __construct() {
        parent::__construct();
        $this->init();
    }
    public function init() {
        $this->TaskCustomerModel = new TaskCustomerModel();
         
        array_shift($this->urlSegments);
        if ($this->requestMethod === "GET") {
            if ($this->urlSegments) {
                switch ($this->urlSegments[0]) {
                    case "kanban":
                        return $this->ViewCustomerKanban();
                        break;
                    case "setupmode":
                        return $this->setupmode();
                        break;
                    case "setup":
                        return $this->setupModeView();
                    case "timelineView":
                        return $this->timelineView();
                    case "view":
                        return $this->viewActivity();
                        break;
                    case "debug":
                        return $this->jsonCustomerTask();
                        break;
                    case "json":
                        return $this->jkanbanjson();
                        break;
                    case "add":
                        return $this->addCustomerTaskView();
                        break;
                    case "detail":
                        return $this->viewTaskid();
                        break;
                    case "list":
                        return $this->ViewCustomerTaskList();
                        break;

                    return $this->ViewCustomerTask();
                    break;
                }
            } else {
                $this->ViewCustomerTask();
            }
        } elseif ($this->requestMethod === "POST") {
            $this->postData = json_decode(
                file_get_contents("php://input"),
                true
            );
            if ($this->postData && isset($this->postData["action"])) {
                $this->action = $this->postData["action"];
            } elseif (isset($_POST["action"])) {
                $this->action = $_POST["action"];
            }

            switch ($this->action) {
                case "followtask":
                    return $this->InsertFollowTask();
                    break;
                case "newcustomer":
                    return $this->insertTask();
                    break;
                case "false":
                    // code...
                    break;
                case "uploadFoto":
                    return $this->uploadTask();
                    break;
                case "update":
                    return $this->updateTask($this->postData["fn"]);
                    break;
                default:
                    echo $this->postData;
                    break;
            }
        }
    }

    public function viewActivity() {
        include LAYOUT . "activityview.php";
    }
    public function setupmode() {
        include LAYOUT . "setupmode.php";
    }
    public function timelineView() {
        include LAYOUT . "activitytimeline.php";
    }
    
    
    public function showComments($data){
       $this->comments= new CommentController();
       return   $this->comments->showComments($data);
    }
    
    public function setupModeView() {
        
        $this->title = "Setup Customer - Okebiling";
               return $this->layout()->view("setupmode", [
            "cssLinks" => [
                "/assets/vendor/libs/winbox/css/winbox.min.css",
                "/assets/vendor/libs/flatpickr/flatpickr.css",
                "https://unpkg.com/leaflet@1.9.4/dist/leaflet.css",
                "/assets/vendor/libs/dropzone/dropzone.css",
                "/assets/vendor/libs/select2/select2.css",
                "/assets/vendor/libs/Okebar/Okebar.css",
            ],
            "scripts" => [
                '/assets/vendor/libs/spotlight/dist/spotlight.bundle.js',
                "/assets/vendor/libs/dropzone/dropzone.js",
                "/assets/vendor/libs/masonry/masonry.js",
                "/assets/vendor/libs/winbox/js/winbox.min.js",
                "/assets/js/forms-selects.js?" . rand(1, 100),
                "/assets/vendor/libs/select2/select2.js",
                "/assets/vendor/libs/Okebar/Okebar.js",
                "/assets/vendor/libs/block-ui/block-ui.js",
                "/assets/vendor/libs/leaflet/leaflet.js",
                "/assets/vendor/libs/flatpickr/flatpickr.js",
                "/assets/js/task.js?" . rand(1, 100),
            ],
        ]);
    }
    
    public function jsonCustomerTask() {
        $this->ViewCustomerTask();
        header("Content-Type: application/json; charset=utf-8");
        echo json_encode($this->customerTask);
    }

    public function getFollowTask($id) {
        return $this->TaskCustomerModel->getFollowTask($id);
    }

    public function subscriptionsId($id) {
        $subscriptionss = new SubscriptionsModel();
        return $subscriptionss->getSubscriptions($id)->get();
    }

    public function ViewCustomerTaskList() {
        $privilage = $this->mainController->privilegeUsers();
        $privilageSet = [
            "teknisi" => ["pending",
                "onprogress",
                "onsurvey"],
            "noc" => ["onlogic"],
            "owner" => ["pending",
                "onprogress",
                "onsurvey",
                "done",
                "onlogic",
                "nocoverage",
            ],
        ];
        $this->data = $this->ViewCustomerTask([
            "Ok_task_customer.status" => $privilageSet[$privilage["position"]],
            "ORDER" => ["created_at" => "DESC"],
        ]);
        $this->title = "Task New Customer - Okebiling";
        
        return $this->layout()->view("newcustomer", [
            "cssLinks" => [
                "/assets/vendor/libs/winbox/css/winbox.min.css",
                "/assets/vendor/libs/flatpickr/flatpickr.css",
                "https://unpkg.com/leaflet@1.9.4/dist/leaflet.css",
                "/assets/vendor/libs/dropzone/dropzone.css",
                "/assets/vendor/libs/select2/select2.css",
                "/assets/vendor/libs/Okebar/Okebar.css",
            ],
            "scripts" => [
                '/assets/vendor/libs/spotlight/dist/spotlight.bundle.js',
                "/assets/vendor/libs/dropzone/dropzone.js",
                "/assets/vendor/libs/winbox/js/winbox.min.js",
                "/assets/js/forms-selects.js?" . rand(1, 100),
                "/assets/vendor/libs/select2/select2.js",
                "/assets/vendor/libs/Okebar/Okebar.js",
                "/assets/vendor/libs/block-ui/block-ui.js",
                "/assets/vendor/libs/leaflet/leaflet.js",
                "/assets/vendor/libs/flatpickr/flatpickr.js",
                "/assets/js/task.js?" . rand(1, 100),
            ],
        ]);
    }

    public function viewTaskid($id) {
        return $this->data = $this->TaskCustomerModel->getTaskDetail([
            "Ok_task_customer.id" => $id,
        ]);
    }
  public function dataMapFiles($files) {


    $groupedFiles = [];
    foreach ($files as $file) {
        $idfiles = $file['idfiles'];
        if (!isset($groupedFiles[$idfiles])) {
            $groupedFiles[$idfiles] = [
                'idfiles' => $idfiles,
                'file_name' => [],
                'file_path' => []
            ];
        }
        $groupedFiles[$idfiles]['file_name'][] = $file['file_name'];
        $groupedFiles[$idfiles]['file_path'][] = $file['file_path'];
    }
    foreach ($groupedFiles as $idfiles => $fileData) {
        $result= [
            'idfiles' => $idfiles,
            'file_name' => $fileData['file_name'],
            'file_path' => $fileData['file_path']
        ];
    }

    return $result;
}

    public function GetFile($id) {
                $this->filemodal = new FileModel();
        return  $this->filemodal->GetFile(["idfiles" => $id]);
    }
    
    public function GetFileWitemaps($id) {
                $this->filemodal = new FileModel();
        return  $this->filemodal->GetFileWitemaps($id);
    }

    public function ViewCustomerTask($conditional = null) {
        if (!empty($conditional)) {
            return $this->customerTask = $this->TaskCustomerModel->getTask(
                $conditional
            );
        } else {
            return $this->customerTask = $this->TaskCustomerModel->getTask();
        }
    }

    public function InsertFollowTask() {
        unset($this->postData["action"]);
        $this->postData["iduser"] = session::get("_id");
        $this->TaskCustomerModel->insertHisTask([
            "idcustomer" => $this->postData["idcustomer"],
            "type" => "follow",
        ]);
        $followtask = $this->TaskCustomerModel->followTask($this->postData);
        echo json_encode($this->postData);
    }

    public function insertTask() {
        unset($this->postData["action"]);
        $this->postData["id"] = randstring();
        $actions = $this->TaskCustomerModel->insetTask($this->postData);
        $this->TaskCustomerModel->insertHisTask([
            "idcustomer" => $this->postData["id"],
            "type" => "create",
        ]);
        echo json_encode($this->TaskCustomerModel->insertHisTask);
    }

    public function viewHisTask($array) {
        return $this->TaskCustomerModel->getHisTask($array);
    }
    
    public function viewPhotos($id) {
        return $this->TaskCustomerModel->getHisPhotos($id);
    }

    public function updateTask($exceute) {
        echo $this->$exceute();
    }

    public function updateTaskPending() {
        $allowedDataTask = Helper::ArrayByWhitelist(
            $this->postData,
            $this->TaskCustomerModel->getTableColumns("Ok_task_customer")
        );

        $this->TaskCustomerModel->updateTask($allowedDataTask, [
            "id" => $this->postData["idcustomer"],
        ]);
        $allowedDataHistory = Helper::ArrayByWhitelist(
            $this->postData,
            $this->TaskCustomerModel->getTableColumns("Ok_task_progress_his")
        );
        $this->InsertHistory("status", $allowedDataHistory, null);
         sleep(2);
        $this->InsertHistory("schedule", $allowedDataHistory, "message");
        return json_encode($allowedDataHistory);
    }

    public function updateTaskOnsurvey() {
        if ($this->postData['status'] == 'reschedule') {
            $this->postData['status'] = $this->postData['cr'];
            $this->InsertHistory("schedule", $this->allowedDataHistory());

        } else {
            if (isset($this->postData['file'])) {
                $this->filemodal = new FileModel();
                $this->postData['idfiles'] = randstring();
                $this->InsertHistory("upload", $this->allowedDataHistory(), ["message","schedule","file"]);
                sleep(1);
                $this->TaskCustomerModel->updateTask($this->allowedDataTask(), [ "id" => $this->postData["idcustomer"], ]);
                echo json_encode($this->allowedDataTask());
                $this->InsertHistory("status", $this->allowedDataHistory(), "file");
                sleep(1);
                $this->InsertHistory("schedule", $this->allowedDataHistory(), ["message","file"]);
                foreach ($this->postData['file'] as $file_name => $file_path) {
                   $this->filemodal->setFile([
                        'idfiles' => $this->postData['idfiles'],
                        'file_path' => $file_path, 
                        'file_name' => $file_name,
                        'file_info'=> 'file on task '.$this->postData['cr'],
                        'idtask' => $this->postData['idcustomer'],
                        'task' => $this->postData['cr']
                    ]);
                }
            } else {
                $this->InsertHistory("status", $this->allowedDataHistory(), "file");
                sleep(1);
                $this->InsertHistory("schedule", $this->allowedDataHistory(), ["message","file"]);
            }
        }


        //  $this->TaskCustomerModel->updateTask($this->allowedDataTask(), [
        //    "id" => $this->postData["idcustomer"],
        //  ]);
        //   $this->InsertHistory("status", $allowedDataHistory, null)



    }
    public function updateTaskOnprogress() {
        
           if ($this->postData['status'] == 'reschedule') {
            $this->postData['status'] = $this->postData['cr'];
            $this->InsertHistory("schedule", $this->allowedDataHistory());
        
           }elseif($this->postData['status'] == $this->postData['cr']){
               
               
           }elseif($this->postData['status'] == 'onlogic'){
             if (isset($this->postData['file'])) {
                $this->filemodal = new FileModel();
                $this->postData['idfiles'] = randstring();
                $this->InsertHistory("upload", $this->allowedDataHistory(), ["message","schedule","file"]);
                sleep(1);
                $this->TaskCustomerModel->updateTask($this->allowedDataTask(), [ "id" => $this->postData["idcustomer"], ]);
                echo json_encode($this->allowedDataTask());
                $this->InsertHistory("status", $this->allowedDataHistory(), "file");
                foreach ($this->postData['file'] as $file_name => $file_path) {
                   $this->filemodal->setFile([
                        'idfiles' => $this->postData['idfiles'],
                        'file_path' => $file_path, 
                        'file_name' => $file_name,
                        'file_info'=> 'file on task '.$this->postData['cr'],
                        'idtask' => $this->postData['idcustomer'],
                        'task' => $this->postData['cr']
                    ]);
                }
            } else {
                $this->InsertHistory("status", $this->allowedDataHistory(), "file");
                sleep(1);
                $this->TaskCustomerModel->updateTask($this->allowedDataTask(), [ "id" => $this->postData["idcustomer"], ]);
            }
               
           }
        
        
        
        
    }
    public function updateTaskLogic() {
        
    }
    public function updateTaskDone() {
        
    }

    public function updateTaskUncoverage() {
        
    }

    public function allowedDataTask() {
        return Helper::ArrayByWhitelist(
            $this->postData,
            $this->TaskCustomerModel->getTableColumns("Ok_task_customer")
        );

    }
    public function allowedDataHistory() {
        return Helper::ArrayByWhitelist(
            $this->postData,
            $this->TaskCustomerModel->getTableColumns("Ok_task_progress_his")
        );

    }

    public function getLatestMessage($id) {
        $pesanTerbaru = $this->TaskCustomerModel->getLatestMessage($id);

        return $pesanTerbaru[0]["message"];
    }
    
    public function InsertHistory($taskType, $data, $excludeElements = null) {
        $historyData = [
            "type" => "update",
            "task" => $taskType,
        ];
        $historyData = array_merge($historyData, $data);
        if ($excludeElements !== null) {
            // Jika ada elemen yang harus dikecualikan, hapus elemen tersebut
            if (is_array($excludeElements)) {
                foreach ($excludeElements as $element) {
                    if (isset($historyData[$element])) {
                        unset($historyData[$element]);
                    }
                }
            } else {
                if (isset($historyData[$excludeElements])) {
                    unset($historyData[$excludeElements]);
                }
            }
        }
    
        $this->TaskCustomerModel->insertHisTask($historyData);
    }

    public function uploadTask() {
        $idcustomer = $_POST["idcustomer"];
        $param = $_POST["param"];
        $uploadRootDirectory = "uploads/task/" . $idcustomer . "/" . $param;
        $fileUploader = new FileUploader($uploadRootDirectory);
        $result = $fileUploader->uploadFile("file", true);
        echo json_encode($result);
    }

    public function addCustomerTaskView() {
        $this->subscriptions = new SubscriptionsModel();
        $this->title = "Add Customer - Okebiling";
        $this->layout()->view("addcustomer", $this->loadlib());
    }

    public function ViewCustomerKanban() {
        $this->customerall = $this->TaskCustomerModel->getTask();
        $this->title = "Customer Pending- Okebiling";
        return $this->layout()->view("customerKanban", $this->loadlibKanban());
    }

    public function loadlib() {
        return [
            "cssLinks" => [
                "https://unpkg.com/leaflet@1.9.4/dist/leaflet.css",
                "/assets/vendor/libs/select2/select2.css",
                "/assets/vendor/libs/bootstrap-select/bootstrap-select.css",
            ],
            "scripts" => [
                "/assets/vendor/libs/leaflet/leaflet.js",
                "/assets/js/forms-selects.js?" . rand(1, 100),
                "/assets/vendor/libs/select2/select2.js",
                "/assets/vendor/libs/cleavejs/cleave.js",
                "/assets/vendor/libs/formvalidation/dist/js/FormValidation.min.js",
                "/assets/vendor/libs/formvalidation/dist/js/plugins/Bootstrap5.min.js",
                "/assets/vendor/libs/formvalidation/dist/js/plugins/AutoFocus.min.js",
                "/assets/js/customer.js?" . rand(1, 100),
                "/assets/js/ui-popover.js",
            ],
        ];
    }

    public function loadlibKanban() {
        return [
            "cssLinks" => [
                "/assets/vendor/libs/jkanban/jkanban.css?" . rand(1, 100),
                "/assets/vendor/css/pages/app-kanban.css?" . rand(1, 100),
            ],
            "scripts" => [
                "/assets/vendor/libs/moment/moment.js",
                "/assets/vendor/libs/jkanban/jkanban.js?" . rand(1, 100),
                "/assets/js/app-kanban.js?" . rand(1, 100),
            ],
        ];
    }

    public function jkanbanjson() {
        $data = $this->TaskCustomerModel->getTask();

        $statusToBoardId = [
            "pending" => "pending",
            "onsurvey" => "onsurvey",
            "onprogress" => "onprogress",
            "onlogic" => "onlogic",
            "done" => "done",
            "nocoverage" => "nocoverage",
        ];

        $dragToIdMap = [
            "pending" => ["onsurvey"],
            "onsurvey" => ["onprogress",
                "nocoverage"],
            "onprogress" => ["onlogic"],
            "onlogic" => ["done"],
            "done" => [""],
            "nocoverage" => [""],
        ];
        $titleMap = [
            "pending" => "Pending",
            "onsurvey" => "Survey",
            "onprogress" => "Progress",
            "onlogic" => "Logic Konfigurasi",
            "done" => "Done",
            "nocoverage" => "Tidak Tersedia",
        ];

        $output = [];
        $boardOrder = array_flip(array_values($statusToBoardId)); // Urutan board sesuai dengan $statusToBoardId

        // Buat peta untuk mengelompokkan data berdasarkan status
        $groupedData = [];

        foreach ($data as $item) {
            $status = $item["status"];

            if (isset($statusToBoardId[$status])) {
                $boardId = $statusToBoardId[$status];

                if (!isset($groupedData[$boardId])) {
                    $groupedData[$boardId] = [
                        "id" => $status,
                        "title" => ucfirst($titleMap[$status]),
                        "dragTo" => $dragToIdMap[$status],
                        "item" => [],
                    ];
                }

                $groupedData[$boardId]["item"][] = [
                    "id" => $item["id"],
                    "title" => $item["firstname"] . " " . $item["lastname"],
                    "comments" => "5",
                    "alamat" => $item["alamat"],
                    "badge-text" => $this->subscriptionsId(
                        $item["subscriptions"]
                    )["package"],
                    "lat-lng" => $item["lat"] . "," . $item["lng"],
                    "phone-number" => str_replace(
                        " ",
                        "",
                        $item["phoneNumber"]
                    ),
                    "email" => $item["email"],
                    "type" => $item["type"],
                    "updated_at" => $item["updated_at"],
                    "badge" => badgelevel($item["subscriptions"]),
                    "start-date" => $item["created_at"],
                    "attachments" => "",
                    // Gantilah dengan data sesuai kebutuhan
                    "idfrom" => [
                        "idfrom jika ada",
                        // Gantilah dengan data sesuai kebutuhan
                        "idfrom",
                        // Gantilah dengan data sesuai kebutuhan
                        "idfrom",
                        // Gantilah dengan data sesuai kebutuhan
                    ],
                ];
            }
        }

        // Urutkan output berdasarkan urutan board
        usort($groupedData, function ($a, $b) use ($boardOrder) {
            return $boardOrder[$a["id"]] - $boardOrder[$b["id"]];
        });

        // Konversi data yang telah dikelompokkan menjadi array
        foreach ($groupedData as $boardData) {
            $output[] = $boardData;
        }
        header("Content-Type: application/json; charset=utf-8");
        echo json_encode($output);
    }
}