<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Task Manager | Layered Architecture Demo</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.7/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-LN+7fdVzj6u52u30Kp6M/trliBMCMKTyK833zpbD+pXdCLuTusPj697FH4R/5mcr" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <link rel="stylesheet" href="assets/css/style.css">
</head>

<body class="bg-light">
    <?php include 'presentation/partials/header.php' ?>

    <div class="container mt-5">
        <div class="card shadow-sm">
            <div class="card-body">
                <?php
                //determine which view to include based on action
                $action = isset($_GET['action']) ? $_GET['action'] : 'index';
                switch ($action) {
                    case 'index':
                        include 'presentation/tasks/index.php';
                        break;
                    case 'create':
                        include 'presentation/tasks/create.php';
                        break;
                    case 'edit':
                        include 'presentation/tasks/edit.php';
                        break;
                    default:
                        include 'presentation/tasks/index.php';
                }
                ?>
            </div>
        </div>
    </div>

    <?php include 'presentation/partials/footer.php' ?>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.7/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-ndDqU0Gzau9qJ1lfW4pNLlhNTkCfHzAVBReH9diLvGRem5+R9g2FzA8ZGN954O5Q"
        crossorigin="anonymous"></script>
    <script src="assets/js/script.js"></script>
</body>

</html>