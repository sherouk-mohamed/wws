<?php 
class User 
{
private string $userID;
private string $encryptedPassword;
public string $name;
public string $email;
public string $role;
public string $address;
public string $phoneNumber;
public function __construct($userID, $name, $email, $address, $encryptedPassword, $role, $phoneNumber) {
    $this->userID = $userID;
    $this->name = $name;
    $this->email = $email;
    $this->encryptedPassword = $encryptedPassword;
    $this->role = $role;
    $this->address = $address;
    $this->phoneNumber = $phoneNumber;
}
    public function getUserID(): string {
        return $this->userID;
    }

    public function getEncryptedPassword() {
        return $this->encryptedPassword;
    }

    public function setEncryptedPassword(string $newPassword): void {
        $this->encryptedPassword = $newPassword;
    }
function logIn($email, $encryptedPassword){

}
function signUp($name, $email,$encryptedPassword, $role){
    
}
function updateProfile($name, $email){
    
}
function changerPassword($name, $email,$encryptedPassword, $role){
    
}

}
?>