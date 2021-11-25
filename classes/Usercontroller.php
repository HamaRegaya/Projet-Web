<?php
include_once './model/user.php';
    class user
                {
                  public  $firstname;
                  public  $lastname;
                  public  $email;
                  public  $username;
                  public  $password ;
                  public function getFirstname () 
                  {
                    
                    return $this->firstname;
                  }
                 public  function getLastname ()
                  {
                    return $this->lastname;
                  }
                 public function getEmail ()
                  {
                    return $this->email;
                  }
                  public function getUsername ()
                  {
                    return $this->username;
                  }
                  public function getpassword()
                  {
                    return $this->password;
                  }
               
                   public function user ($first,$sec,$third,$forth,$fif)
                   {
                    $this->firstname=$first;
                    $this->lastname=$sec;
                    $this->email=$third;
                    $this->username=$forth;
                    $this->password=$fif;
                   }
                    public static function registration(){
                        $databaseObject = new user();
                         $error = array();
             
                         if (isset($_POST['login'])){
                            $username = $_POST['unesrnamePHP'];
                            $prenom = $_POST['prenomPHP'];
                            $email = $_POST['emailPHP'];
                            $age = $_POST['agePHP'];
                            $password = md5($_POST['passwordPHP']);
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
                                    '1' => $prenom,
                                    '2' => $age,
                                    '2' => $email,
                                    '2' => $password
                                 );
                                 
                                 if($databaseObject->adduser($form_data)){
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
             
                     public function edituser()
                    {

                    }
                     public function deleteuser()
                    {

                    }
                 
                    
                }
  ?>