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
    private string $userUsername;
    private $userid;

    public function __construct(string $userUsername, $userid)
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

    public function matchUser(string $inputUsername, $inputUserId): bool
    {
        $jsonFilePath = '/opt/lampp/htdocs/suresh/project/Register/data.json';
        $jsonString = file_get_contents($jsonFilePath);
        $userData = json_decode($jsonString, true);
        
        foreach ($userData as $user) {
            if ($user['id'] === $inputUserId && $user['username'] === $inputUsername) {
                return true; // Match found
            }
        }

        return false; // No match found
    }
}
?>
