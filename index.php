<?php
// Front Controller - Entry poit for the application
// Routes requests to appropriate controller methods
spl_autoload_register(function ($class_name) {
    $file = __DIR__ . '/' . str_replace('\\', '/', $class_name) . '.php';
    if (file_exists($file)) {
        require_once $file;
    }
});

//initialize database connection
require_once 'config/db.php';
$database = new Database();
$db = $database->getConnection();

//initialize controller
require_once 'businesslogic/TaskController.php';
$taskController = new TaskController($db);

$action = isset($_GET['action']) ? $_GET['action'] : 'index';

switch ($action) {
    case 'index':
        $taskController->index();
        break;
    case 'create':
        $taskController->create();
        break;
    case 'store':
        $taskController->store();
        break;
    case 'edit':
        $id = isset($_GET['id']) ? $_GET['id'] : die('Task ID not specified');
        $taskController->edit($id);
        break;
    case 'update':
        $taskController->update();
        break;
    case 'delete':
        $id = isset($_GET['id']) ? $_GET['id'] : die('Task ID not specified');
        $taskController->delete($id);
        break;
    default:
        $taskController->index();
}

?>