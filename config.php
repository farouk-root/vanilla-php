<?php
class Database {
    private $host = "localhost"; // Replace with your database host
    private $username = "root"; // Replace with your database username
    private $password = ""; // Replace with your database password
    private $dbname = "asma"; // Replace with your database name

    private $conn;

    public function __construct() {
        $this->connect();
    }

    public function connect() {
        $dsn = "mysql:host={$this->host};dbname={$this->dbname}";

        try {
            $this->conn = new PDO($dsn, $this->username, $this->password);
            // Set the PDO error mode to exception
            $this->conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        } catch (PDOException $e) {
            die("Connection failed: " . $e->getMessage());
        }
    }

    public function closeConnection() {
        $this->conn = null;
    }

    public function getConnection() {
        return $this->conn;
    }

    // Execute a prepared statement
    public function execute($query, $params = []) {
        try {
            $stmt = $this->conn->prepare($query);
            $stmt->execute($params);
            return $stmt;
        } catch (PDOException $e) {
            die("Query failed: " . $e->getMessage());
        }
    }

    // Fetch a single row as an associative array
    public function fetch($query, $param) {
        $stmt = $this->execute($query, $param);
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }

    // Fetch all rows as an associative array
    public function fetchAll($query, $params = []) {
        $stmt = $this->execute($query, $params);
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }
    public function query($query) {
        $stmt = $this->conn->prepare($query);
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }
}
?>