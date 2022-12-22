<?php
date_default_timezone_set("Asia/Kolkata");   //India time (GMT+5:30)

trait Database
{
    public $conn = "";

    public function __construct()
    {
        $this->conn = new mysqli('localhost', 'root', '12345', 'timemvc');
    }
}


class model
{
    use Database;

    public function insert($tbl, $data)
    {
        $cols = "";
        $vals = "";
        foreach ($data as $key => $value) {
            $cols .= " $key ,";
            $vals .= " '$value' ,";
        }
        $cols = rtrim($cols, ',');
        $vals = rtrim($vals, ',');
        // echo $cols;
        // echo $vals;
        $SQL = "INSERT INTO $tbl ($cols) VALUES ($vals)";
        // echo $SQL;
        $SqlEx = $this->conn->query($SQL);
        print_r($SqlEx);
        if ($SqlEx > 0) {
            $DATA['Msg'] = 'success';
            $DATA['Data'] = 1;
            $DATA['Code'] = 1;
        } else {
            $DATA['Msg'] = 'Try Again';
            $DATA['Data'] = 0;
            $DATA['Code'] = 0;
        }
    }

    public function login($tbl, $LoginData)
    {
        $Username = $LoginData['username'];
        $Password = $LoginData['password'];

        $SQL = "SELECT * FROM $tbl WHERE ( username = '$Username' OR email = '$Username' ) AND password = '$Password' ";

        $SqlEx = $this->conn->query($SQL);
        if ($SqlEx->num_rows > 0) {
            while ($fData = $SqlEx->fetch_object()) {
                $fetchData[] = $fData;
            }
            $DATA['Msg'] = 'success';
            $DATA['Data'] = $fetchData;
            $DATA['Code'] = 1;
        } else {
            $DATA['Msg'] = 'Try Again';
            $DATA['Data'] = 0;
            $DATA['Code'] = 0;
        }

        return $DATA;
    }

    public function update($tbl, $data)
    {
        // print_r($data);
        $date = date('D-H-i-s');
        $SQL = "UPDATE $tbl SET date = '$date' WHERE user_id = $data ";
        $SqlEx= $this->conn->query($SQL);


    }
}
