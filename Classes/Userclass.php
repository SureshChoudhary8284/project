<?php

class User {
    private $username;
    private $email;
    private $password; 
    private $storage='user.json';
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

        if($this->checkFilevalue()){
            $this->insertUser();
        }
    }
    
    public function checkFilevalue(){
        if(empty($this->username) || empty($this->email) || empty( $this->password)) {
       // $this->error="all field are required please try again";
        return false;
        }
        return true;
    }
    public function usernameExits(){
        foreach($this->storage_user as $user){
            if($this->username == $user['username']){
        return true;
            }
        }
    
    }
    public function insertUser(){
        if($this->usernameExits()==false){
        array_push($this->storage_user, $this->new_user);
        if(file_put_contents($this->storage,json_encode($this->storage_user,JSON_PRETTY_PRINT))){
             return true;
         }
            else{
                return false;
            }
        }
   
  }
}
?>
