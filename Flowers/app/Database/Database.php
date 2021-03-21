<?php
class Database {

    public $connection;

    public $query;

    public function connection() {
        $user = 'root';
        $password = '';
        $database = 'codelex';
        $server = '127.0.0.1';
    
        $connection = mysqli_connect($server, $user, $password, $database);
    
        if ($connection == true) {
        } else {
            die('Unable to connect');
        }
        $this->connection = $connection;
        return $this->connection;
    }
    
    public function query($sql) {
        $this->query = $sql;
        $this->connection();
        $conn = mysqli_query($this->connection, $this->query);
        return $conn;
    }
}

?>