<?php
class Database
{
    private $host = 'localhost';
    private $username = 'root';
    private $password = '';
    private $dbname = 'trantiendo';

    public $conn;
    function __construct()
    {
        $this->conn = new mysqli($this->host, $this->username, $this->password, $this->dbname);
        // if ($this->conn->connect_error) {
        //     die("Kết nối thất bại" . $this->conn->connect_error);
        // } else {
        //     echo "Kết nối thành công";
        // }
    }
}
?>