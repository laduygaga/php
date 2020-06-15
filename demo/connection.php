<?php
class DB
{
    protected $servername = 'localhost';
    protected $username = 'root';
    protected $password = '';
    protected $dbname = 'demo_mvc';
    public function getInstance() {
        $con = new mysqli($servername, $username, $password, $dbname);
        if (!$con) {
            die('Could not Connect demo_mvc: ' .mysql_error());
        }
    }
    public function insert() {
        if(isset($_POST['save'])) {
            $title= $_POST['title'];
            $description = $_POST['description'];
            $sql = "INSERT INTO posts (title, description) VALUES ('$title', '$description')";
            if (mysqli_query($con, $sql)) {
                echo "New record created successfully !";
            } else {
                echo "Error: " . $sql . " " . mysqli_error($con);
            }
            mysqli_close($con);
        }
    }
    public function edit() {
        if(count($_POST)>0) {
            mysqli_query($con, "UPDATE posts set title='" . $_POST['title'] . "', description='" . $_POST['description'] . "' WHERE id='" . $_POST['id'] . "'");
            $message = "Record Modified Successfully";
        }
        $result = mysqli_query($con, "SELECT * FROM posts WHERE id='" . $_GET['id'] . "'");
        $row = mysqli_fetch_array($result);
    }
    public function delete() {
        $sql = "DELETE FROM posts WHERE id='" . $_GET['id'] . "'";
        if (mysqli_query($con, $sql)) {
            echo "Record deleted successfully";
        } else {
            echo "Error deleting record: " . mysqli_error($con);
        }
        mysqli_close($con);
    }
}
?>
