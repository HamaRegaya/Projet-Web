<?php

    class Control{
     

        public static function logout(){
            session_start();
            if(session_destroy()){
                header("Location: login.php");
            }
        }

        public static function login(){
            $databaseObject = new Users();
            if(isset($_POST['sign'])){
                    $username = $_POST['username'];
                    $password = md5($_POST['password']);
                    if($databaseObject->read_user($username, $password)){
                        session_start();
                        $_SESSION['username'] = $username;
                        echo json_encode(array('status'=> 'success'));
                    }else{
                        echo json_encode(array('status'=> 'error', 'loginValid' => 'Wrong username or password!'));
                    }
                    exit();
                }
            

        }
        public static function registration(){
           $databaseObject = new Users();
            $error = array();

            if (isset($_POST['login'])){
                if (empty($_POST['unesrnamePHP'])) {
                    $error['emptyUser'] = 'Please Enter your Name';
              
                  } else{

                      $username = $_POST['unesrnamePHP'];
                    if ( !preg_match('/^[A-Z][A-Za-z0-9_-]{3,20}$/', $username) ) {
                      $error['userValid']  = 'username start with a cap letter!';

                    }
                  }
                  if(empty($_POST['agePHP'])){
                      $error['emptyAge'] = 'Please Enter your Age';

              
                  }else{
                      $age = $_POST['agePHP'];
                    if(!preg_match('/^[0-9][0-9]$/', $age)){
                      $error['ageValid'] = 'Please Enter a Number';

                    }
              
                  }
                  if(empty($_POST['passwordPHP'])){
                      $error['emptyPass'] = 'Please Enter your Password!';
                  }else{
                      $password = md5($_POST['passwordPHP']);
                    if(strlen($_POST['passwordPHP']) < 4){
                      $error['passValid'] = 'password at least 4 chars!';
                                      }
                  }

                  if(empty($error)) {
                    $form_data = array(
                       '0' => $username,
                       '1' => $age,
                       '2' => $password
                    );
                    
                    if($databaseObject->create_user($form_data)){
                       echo json_encode(array('status' => 'error',array('noneUniqeUser'=>'User is taken!')));

                    }else{
                      
                        echo json_encode(array('status'=> 'success'));
                        
                    }
              
                  
                  }else{
                    echo json_encode(array('status'=> 'error', $error));
                    
                }
                exit();
            }
        }

        public static function index(){
            if(!self::session_check()){
                header("Location: login.php");
            }
        }
        public static function settings(){
            session_start();
            if(isset($_GET['settings'])){
            $databaseObject = new Users();
            echo $databaseObject->uesr_data($_SESSION['username']);
            $_GET['settings'] = 0;
            exit();
            }
            if(isset($_POST['set'])){
                $databaseObject = new Users();
                $flag = $databaseObject->update_user($_SESSION['username'], $_POST['username'], 
                $_POST['age'], $_POST['password']);
                if($flag == true){
                    $_SESSION['username'] = $_POST['username'];
                }
               $_POST['set'] = 0;
            }
            if(isset($_POST['del'])){
                $databaseObject = new Users();
                $databaseObject->delete_user($_POST['username']);
                session_destroy();
                $_POST['del'] = 0;
            }
        }
        public static function session_check(){
            session_start();
            $flag = false;
            if(isset($_SESSION["username"])){
                $flag = true;
            }

            return $flag;
        }


    }

?>