<?php
class dbh{

    private $servername;
    private $username;
    private $dbname;

    protected function connect(){
        $this->servername = "localhost";
        $this->username = "root";
        $this->password = "123456789";
        $this->dbname = "camagru";

        $conn = new mysqli($this->servername, $this->username, $this->password, $this->dbname);
        return $conn;
    }
}
?>