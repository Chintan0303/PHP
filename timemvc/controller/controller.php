<?php     
include_once "model/model.php";
session_start();
class controller extends model
{
    public function __construct()
    {
        
        parent::__construct();

        // echo "<pre>";
        // print_r($_SERVER);

        if (isset($_SERVER['PATH_INFO'])) {
            switch ($_SERVER['PATH_INFO']) {
                
                case '/registration':
                    include_once "view/registration.php";
                    
                    if (isset($_POST['register'])) {
                        echo "<pre>";
                        print_r($_POST);
                        array_pop($_POST);
                        $date = ['date'=> date("D-H-i-s")];
                        print_r($date);
                        $insertdata = array_merge($_POST,$date);
                        print_r($insertdata);
                        
                        
                        $this->insert('users',$insertdata);
                    }
                    
                    break;
                    
                    case '/login':
                        include_once "view/login.php";

                        if (isset($_POST['login'])) {
                           if ($_POST['username'] != "" && $_POST['password'] != " " ) {
                             array_pop($_POST);
                             $LoginRes = $this->login('users',$_POST);
                            //  print_r($LoginRes); 
                            $updateDate = $this->update('users',$LoginRes['Data'][0]->user_id);
                            $_SESSION['userData'] = $LoginRes;
                            header('location:home');


                           } 

                        }

                    break;

                case '/welcome':
                    include_once "view/welcome.php";
                    break;

                case '/home':
                    include_once "view/home.php";
                    break;

                case '/logout':
                    session_destroy();
                    header("location:login");
                    break;
                
                default:
                    
                    break;
            }
        }else{

            header("location:welcome");
        }

    }










}

$controller = new controller;



?>