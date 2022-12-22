<?php

trait database
{
    public $conn = " ";
    public function __construct()
    {

        $this->conn =  new mysqli('localhost', 'root', '12345', 'testmvc');
        // if ($this->conn){
        //     echo "success";
        // }else{
        //     echo "connection error";
        // }

    }
}

class model
{
    use database;

    public function insert($tbl, $data)
    {
        // print_r($data);
        $col = "";
        $val = "";
        foreach ($data as $key => $value) {
            $col .= $key . ",";
            $val .= "'" . $value . "',";
            // echo "key = $key";
            // echo "value = $value";
        }
        $col = rtrim($col, ",");
        $val = rtrim($val, ",");
        // echo $col;
        // echo "<br>";
        // echo $val;
        // echo "<br>";

        $SQL = "INSERT INTO $tbl ( $col )  VALUES ( $val )";
        // echo $SQL;
        $SqlEx = $this->conn->query($SQL);
        // print_r($SqlEx);
        if ($SqlEx > 0) {
            $DATA['Msg'] = 'Success';
            $DATA['Data'] = 1;
            $DATA['Code'] = 1;
        } else {
            $DATA['Msg'] = 'Try Again';
            $DATA['Data'] = 0;
            $DATA['Code'] = 0;
        }
        return $DATA;
    }

    public function selectWithWhere($tbl, $where = "")
    {
        $SQL = "SELECT * FROM $tbl ";
        if ($where != "") {
            $SQL .= " WHERE ";

            foreach ($where as $key => $value) {
                $SQL .= " $key = '$value' ";
            }
        }
        // echo $SQL;
        $SqlEx = $this->conn->query($SQL);
        // print_r($SqlEx);
        if ($SqlEx->num_rows > 0) {
            while ($fData = $SqlEx->fetch_object()) {
                $fetchData[] = $fData;
            }
            $DATA['Msg'] = "Success";
            $DATA['Data'] = $fetchData;
            $DATA['Code'] = 1;
        } else {
            $DATA['Msg'] = "Try Again";
            $DATA['Data'] = 0;
            $DATA['Code'] = 0;
        }

        return $DATA;
        // echo "<pre>";
        // print_r($fetchData);



    }

    public function update($tbl, $updateData, $whr)
    {
        $SQL = "UPDATE $tbl SET ";

        foreach ($updateData as $key => $value) {
            $SQL .= "$key = '$value',";
        }
        $SQL = rtrim($SQL, ',');
        foreach ($whr as $key => $value) {
            $SQL .= " WHERE ";
            $SQL .= " $key = $value";
        }
        $SqlEx = $this->conn->query($SQL);
        //  print_r($SqlEx);
        if ($SqlEx > 0) {
            $DATA['Msg'] = "Success";
            $DATA['Data'] = 1;
            $DATA['Code'] = 1;
        } else {
            $DATA['Msg'] = "Try Again";
            $DATA['Data'] = 0;
            $DATA['Code'] = 0;
        }

        return $DATA;
    }

    public function delete($tbl,$whr){

        $SQL = "DELETE FROM $tbl WHERE ";
        foreach ($whr as $key => $value) {
            $SQL .= " $key = $value ";
        }
        $SqlEx = $this->conn->query($SQL);
    }

    public function login($tbl,$loginData){
       $SQL = "SELECT * FROM $tbl WHERE ";

       foreach ($loginData as $key => $value) {
        $SQL .= " $key = '$value' AND";
       }
        $SQL = rtrim($SQL,'AND');
        $SqlEx= $this->conn->query($SQL);
        // print_r($SqlEx);
        // exit; 
        if ($SqlEx->num_rows > 0) {
            while ($fData = $SqlEx->fetch_object()) {
                $fetchData [] =$fData; 
            }
            $DATA['Msg'] = 'Success';
            $DATA['Data'] = $fetchData;
            $DATA['Code'] = 1;
        }else {
            $DATA['Msg'] = 'Try Again';
            $DATA['Data'] = 0;
            $DATA['Code'] = 0;
            
        }
        return $DATA;



    }



}
