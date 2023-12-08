<?php

class AdminLogin
{
    private string $adminUsername;
    private string $adminPassword;

    public function __construct(string $adminUsername, string $adminPassword)
    {
        $this->adminUsername = $adminUsername;
        $this->adminPassword = $adminPassword;
    }

    public function getAdminUsername(): string
    {
        return $this->adminUsername;
    }

    public function matchAdmin(string $inputUsername, string $inputPassword): bool
    {
        return ($this->adminUsername === $inputUsername) && ($this->adminPassword === $inputPassword);
    }
}

class UserLogin
{
    private $userUsername;
    private $userid;

    public function __construct($userUsername, $userid)
    {
        $this->userUsername = $userUsername;
        $this->userid = $userid;
    }

    public function getUserUsername(): string
    {
        return $this->userUsername;
    }

    public function getUserId()
    {
        return $this->userid;
    }

    public function matchUser($inputUsername, $inputUserId): bool
    {
        $jsonFilePath = '/opt/lampp/htdocs/suresh/project/Register/data.json';
        
        try {
            $jsonString = file_get_contents($jsonFilePath);

            if ($jsonString === false) {
                throw new Exception("Failed to read JSON file.");
            }

            $userData = json_decode($jsonString, true);

            if ($userData === null) {
                throw new Exception("Failed to decode JSON data.");
            }

            foreach ($userData as $user) {
                if ($user['username'] === $inputUsername && $user['id'] == $inputUserId) {
                    return true; // Match found
                }
            }
        } catch (Exception $e) {
            // Handle exceptions, log errors, or take appropriate action
            return false;
        }

        return false; // No match found
    }
}
