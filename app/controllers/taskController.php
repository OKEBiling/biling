<?php

include_once MODEL_DIR . 'CustomerModel.php';
include_once MODEL_DIR . 'SubscriptionsModel.php';
include_once MODEL_DIR . 'TaskCustomerModel.php';

class taskController extends App{

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
                    case 'debug':
                        return $this->jsonCustomerTask();
                        break;
                    case 'json':
                        return $this->jkanbanjson();
                        break;
                    case 'add':
                        return $this->addCustomerTaskView();
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
            $this->processPost();
        }
    }


    public function jsonCustomerTask() {
        $this->ViewCustomerTask();
        header('Content-Type: application/json; charset=utf-8');
        echo json_encode($this->customerTask);
    }

    public function subscriptionsId($id) {
        $subscriptionss = new SubscriptionsModel();
        return $subscriptionss->getSubscriptions($id)->get();
    }



    public function ViewCustomerTaskList() {
      
        $this->title = 'Task New Customer - Okebiling';
        return $this->layout()->view('newcustomer', [
            'scripts' => [
                '/assets/js/task.js?'.rand(1, 100),

            ]]);
    }

    public function ViewCustomerTask($conditional = null) {

        if (!empty($conditional)) {
            return $this->customerTask = $this->TaskCustomerModel->getTask($conditional);
        } else {
            return $this->customerTask = $this->TaskCustomerModel->getTask();
        }
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


    public function processPost() {
        $postData = json_decode(file_get_contents('php://input'), true);
        $postData['id'] = randstring();
        $this->TaskCustomerModel->insetTask($postData);
        //debug
        echo json_encode($postData);

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



}