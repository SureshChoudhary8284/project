<?php

class RegisterUser {
    public $username;
    public $email;
    public $id;
    // public $storage = 'data.json';
    // public $storage_user;
     public $new_User;

    public function __construct($username, $email, $id) {
        $this->username = $username;
        $this->email = $email;
        $this->id = $id;

        // if(file_exists($this->storage)) {
        //     $this->storage_user = json_decode(file_get_contents($this->storage), true);
        // } else {
        //     $this->storage_user = [];
        // }
        $this->new_User = [
            'username' => $_POST['username'],
            'email' => $_POST['email'],
            'id' => $_POST['id'],
        ];
      
    }

        public function getAllUsers() {
                $jsonFilePath = '/opt/lampp/htdocs/suresh/project/Register/data.json';
                $jsonString = file_get_contents($jsonFilePath);
                $userData = json_decode($jsonString, true) ?? [];

                // Add the new user to the existing data
                $userData[] = $this->new_User;

                // Write the updated data back to the JSON file
                file_put_contents($jsonFilePath, json_encode($userData, JSON_PRETTY_PRINT));
                return true;
                //header("Location:./userlist.php");
            } 
            
}

?>
