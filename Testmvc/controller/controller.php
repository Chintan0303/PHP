<?php
session_start();
include_once "model/model.php";

class controller extends model
{

    public function __construct()
    {
        parent::__construct();

        // echo "<pre>";
        // print_r($_SERVER);

        // $arrayOfReq = $_SERVER['REQUEST_URI'];
        $arrayOfReq = explode('/', $_SERVER['REQUEST_URI']);
        // print_r($arrayOfReq) ;

        $basePath = $_SERVER['REQUEST_SCHEME'] . '://' . $_SERVER['SERVER_NAME'] . '/' . $arrayOfReq[1];
        // echo $basePath;
        if (isset($_SERVER['PATH_INFO'])) {

            switch ($_SERVER['PATH_INFO']) {
                case "/login":
                    include_once "view/login.php";
                    if (isset($_POST['submit'])) {
                        array_pop($_POST);
                        // print_r($_POST);

                        if ($_POST['username'] == !"" && $_POST['password'] == !"") {

                            $LoginRes =  $this->login('users', $_POST);
                            print_r($LoginRes);
                            if ($LoginRes['Code'] == 1) {
                                $_SESSION['UserData'] = $LoginRes['Data'][0];
                                // echo"<pre>";
                                // print_r($_SESSION); 
                                header("location:allusers");
                            } else {
                                header("location:login");
                            }
                        }
                    }

                    break;
                case "/form":
                    include_once "view/form.php";
                    if (isset($_REQUEST['submit'])) {
                        array_pop($_POST);
                        // print_r($_POST);
                        $this->insert('users', $_POST);
                    }

                    break;
                case "/allusers":
                    $allUsersData = $this->selectWithWhere('users');
                    include_once "view/allusers.php";

                    break;
                case "/edituser":
                    $allUsersData = $this->selectWithWhere('users', $_GET);
                    // echo "<pre>";
                    // print_r($allUsersData['Data']);
                    // exit;
                    include_once "view/edituser.php";
                    if (isset($_POST['update'])) {
                        array_pop($_POST);
                        // print_r($_POST);
                        // print_r($_GET);
                        // exit;
                        $this->update('users', $_POST, $_GET);
                        header("location:allusers");
                    }
                    break;
                case "/deleteuser":

                    $this->delete('users', $_GET);
                    header("location:allusers");

                    break;

                case "/logout":
                    session_destroy();
                    header('location:login');

                    break;



                default:

                    break;
            }
        } else {
            header("location:form");
        }
    }
}



$controller = new controller;
