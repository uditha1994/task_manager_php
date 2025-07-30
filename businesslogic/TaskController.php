<?php
// Task Controller - Business Logic Layer
require_once __DIR__ . '/../database/Task.php';

class TaskController
{
    private $taskModel;

    public function __construct($db)
    {
        $this->taskModel = new Task($db);
        // $this->taskModel->createTable(); // create db table if not exists
    }

    public function index()
    {
        $tasks = $this->taskModel->getAll();
        require_once __DIR__ . '/../presentation/layout.php';
    }

    public function create()
    {
        require_once __DIR__.'/../presentation/layout.php';
    }

    public function store()
    {
        if($_SERVER['REQUEST_METHOD']=== 'POST'){
            $this->taskModel->title = $_POST['title'];
            $this->taskModel->description = $_POST['description'];
            $this->taskModel->due_date = $_POST['due_date'];
            $this->taskModel->status = $_POST['status'];

            if($this->taskModel->create()){
                header("Location: index.php?action=index&message=Task+Created+Successfully!");
            } else{
                die("Error in creating task");
            } 
        }
    }

    public function edit($id)
    {
    }

    public function update()
    {
    }

    public function delete()
    {
    }
}