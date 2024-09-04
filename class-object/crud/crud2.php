<?php
include_once 'db.php';

class database
{

    public $conn;

    function __construct()
    {

        $this->conn = mysqli_connect(HOSTNAME, USERNAME, PASSWORD, DATABASE);
    }

    function insert($tblname, $data)
    {

        $column = implode(",", array_keys($data));

        $values = "'" . implode("','", array_values($data)) . "'";

        mysqli_query($this->conn, "insert into $tblname($column) values($values)");
    }
}

$ob = new database();


?>