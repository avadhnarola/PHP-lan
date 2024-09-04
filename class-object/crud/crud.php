<?php
include_once 'db.php';

class database
{

    public $con;
    function __construct()
    {

        $this->con = mysqli_connect(HOSTNAME, USERNAME, PASSWORD, DATABASE);
    }

    function insert($tbl_name,$data)
    {
        $column_name = implode(",", array_keys($data));  // array_keys() --> array mathi KEY (feild name) aape
        $values = "'".implode("','",array_values($data))."'";

        mysqli_query($this->con, "insert into $tbl_name($column_name)values($values)");

    }
}

$db = new database;


?>