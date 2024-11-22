<?php
class Database {
    private $host = "localhost"; 
    private $user = "root";      
    private $pass = "";          
    private $dbname = "e_buku_menu"; 
    public $connn; 
    public function __construct() {
        // Membuat koneksi menggunakan mysqli
        $this->connn = mysqli_connect($this->host, $this->user, $this->pass, $this->dbname);

        if ($this->connn->connect_error) {
            die("Koneksi gagal: " . $this->connn->connect_error);
        }
    }
}

$database = new Database(); 
$connn = $database->connn; 
?>
