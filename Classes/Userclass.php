<?php

class RegisterUser {
    public $username;
    public $email;
    public $id;
     public $new_User;

    public function __construct($username, $email, $id) {
        $this->username = $username;
        $this->email = $email;
        $this->id = $id;

        $this->new_User = [
            'username' => $_POST['username'],
            'email' => $_POST['email'],
            'id' => $_POST['id'],
        ];
      
    }
    public function exist($id){
                $jsonFilePath = '/opt/lampp/htdocs/suresh/project/Register/data.json';
                $jsonString = file_get_contents($jsonFilePath);
                $userData = json_decode($jsonString, true) ?? [];
                foreach ($userData as  $user) {
                    if($user['id']== $id){
                        return true;
                    }
                }
                return false;

             }
    public function getAllUsers() {
                $jsonFilePath = '/opt/lampp/htdocs/suresh/project/Register/data.json';
                $jsonString = file_get_contents($jsonFilePath);
                $userData = json_decode($jsonString, true) ?? [];
                if($user['id'] =$this->id){
                    return true;
                }
                // Add the new user to the existing data
                $userData[] = $this->new_User;
                // Write the updated data back to the JSON file
                file_put_contents($jsonFilePath, json_encode($userData, JSON_PRETTY_PRINT));
                return true;
    
            } 
            
}

?>
