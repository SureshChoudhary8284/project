<?php

class SessionManager
{
    public function isAuthExists(): bool
    {
        return !empty($_SESSION['id']);
    }

    public function setAuthId(int $id): void
    {
        $_SESSION['id'] = $id;
    }

    public function removeAuthId(): void
    {
        unset($_SESSION['id']);
    }

    public function hasAuthUser(): bool
    {
        return !empty($_SESSION['username']);
    }

    public function setAuthUser(string $userName): void
    {
        $_SESSION['username'] = $userName;
    }

    public function getAuthUser(): ?string
    {
        if(!$this->hasAuthUser()) {
            return null;
          }
          return  $_SESSION['username'];
    }

    public function removeAuthUser(): void
    {
        unset($_SESSION['username']);
    }

    public function hasError(): bool
    {
        return !empty($_SESSION['error']);
    }

    public function getError(): ?string
    {
         if(!$this->hasError()) {
           return null;
         }
         return  $_SESSION['error'];
    }

    public function setError(string $error): void
    {
        $_SESSION['error'] = $error;
    }

    public function removeError(): void
    {
        unset($_SESSION['error']);
    }

    public function hasMessage(): bool
    {
        return !empty($_SESSION['message']);
    }

    public function getMessage(): ?string
    {
        if(!$this->hasMessage()) {
            return null;
          }
          return  $_SESSION['message'];
    }

    public function setMessage(string $message): void
    {
        $_SESSION['message'] =$message;
    }

    public function removeMessage(): void
    {
        unset($_SESSION['message']);
    }

}
?>
