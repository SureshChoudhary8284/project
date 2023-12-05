<?php

class RegisterUser {
    private $username;
    private $email;
    private $password; 
    private $storage='data.json';
    private $storage_user;
    private $new_user;

    public function __construct($username, $email, $password) {
        $this->username = $username;
        $this->email = $email;
        $this->password =$password;
         
        $this-> storage_user =json_decode(file_get_contents($this->storage), true);
        $this-> new_user=[
        'username' => $this->username,
        'email' => $this->email,
        'password' => $this->password,
        ];
        $this->insertUser();
    }
    public function insertUser(){
        array_push($this->storage_user, $this->new_user);
        if(file_put_contents($this->storage,json_encode($this->storage_user,JSON_PRETTY_PRINT))){
             return true;
         }
            else{
                return false;
            }
        }
  }

?>
