<?php
class Adminlogin
{
    private string $username;
    private string $password;

    public function __construct(string $username, string $password)
    {
        $this->username = $username;
        $this->password = $password;
    }

    public function match(string $userName, string $Password): bool
    {
        if(($this->username == $userName) && ($this->password == $Password)) {
            return true;
        }

        return false;
    }
}
?>