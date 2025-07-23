<?php
// Task Model - Data Access Layer
// Handle all database operations for task

class Task
{
    private $conn;
    private $table = "tasks";

    // Task Properties
    public $id;
    public $title;
    public $description;
    public $due_date;
    public $status;
    public $created_at;

    public function __construct($db)
    {
        $this->conn = $db;
    }

    public function createTable()
    {
        $sql = "CREATE TABLE IF NOT EXISTS $this->table(
        id INT AUTO_INCREMENT PRIMARY_KEY,
        title VARCHAR(255) NOT NULL,
        `description` TEXT,
        due_date DATE,
        `status` ENUM('pending','in_progress','completed') DEFAULT 'pending',
        created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
        )";

        $this->conn->exec($sql);
    }

    //Get all tasks
    public function getAll()
    {
        $query = "SELECT * FROM $this->table ORDER BY due_date ASC";
        $stmt = $this->conn->prepare($query);
        $stmt->execute();
        return $stmt;
    }

    //get single tast
    public function getById($id)
    {
        $query = "SELECT * FROM $this->table WHERE id=? LIMIT 1";
        $stmt = $this->conn->prepare($query);
        $stmt->bindParam(1, $id);
        $stmt->execute();
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }

    //create new task
    public function create()
    {
        $query = "INSERT INTO $this->table
        SET title=:title, description=:description,
        due_date=:due_date, status=:status";

        $stmt = $this->conn->prepare($query);

        //sanitize data
        $this->title = htmlspecialchars
        (strip_tags(($this->title)));
        $this->description = htmlspecialchars
        (strip_tags(($this->description)));
        $this->due_date = htmlspecialchars
        (strip_tags(($this->due_date)));
        $this->status = htmlspecialchars
        (strip_tags(($this->status)));

        //bind params
        $stmt->bindParam(":title", $this->title);
        $stmt->bindParam(":description", $this->description);
        $stmt->bindParam(":due_date", $this->due_date);
        $stmt->bindParam(":status", $this->status);

        return $stmt->execute();
    }

    //update Task
    public function update()
    {
        $query = "UPDATE $this->table
        SET title=:title, `description`=:`description`,
        due_date=:due_date, `status`=:`status` WHERE id=:id";

        $stmt = $this->conn->prepare($query);

        //sanitize data
        $this->title = htmlspecialchars
        (strip_tags(($this->title)));
        $this->description = htmlspecialchars
        (strip_tags(($this->description)));
        $this->due_date = htmlspecialchars
        (strip_tags(($this->due_date)));
        $this->status = htmlspecialchars
        (strip_tags(($this->status)));
        $this->id = htmlspecialchars
        (strip_tags(($this->id)));

        //bind params
        $stmt->bindParam(":title", $this->title);
        $stmt->bindParam(":description", $this->description);
        $stmt->bindParam(":due_date", $this->due_date);
        $stmt->bindParam(":status", $this->status);
        $stmt->bindParam(":id", $this->id);

        return $stmt->execute();
    }

    //Delete task
    public function delete(){
        $query = "DELETE FROM $this->table WHERE id=?";
        $stmt = $this->conn->prepare($query);
        $stmt->bindParam(1, $this->id);
        return $stmt->execute();
    }
}