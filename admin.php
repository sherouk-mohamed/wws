<?php 
require_once("user.php");
interface Websuser {
    public function getId(): string; 
}

class teacher extends User implements Webuser {
    public function __construct($userID, $name, $email, $address, $encryptedPassword, $role, $phoneNumber) {
        parent::__construct($userID, $name, $email, $address, $encryptedPassword, $role, $phoneNumber);
    }

    public function getId(): string {
        return $this->getUserID();
    }
}


class parent extends User implements Webuser {
    public function __construct($userID, $name, $email, $address, $encryptedPassword, $role, $phoneNumber) {
        parent::__construct($userID, $name, $email, $address, $encryptedPassword, $role, $phoneNumber);
    }

    public function getId(): string {
        return $this->getUserID();
    }
}


class WebusertNode {
    public Webuser $data;
    public ?WebuserNode $next = null;

    public function __construct(Webuser $Webuser) {
        $this->data = $Webuser ;
    }
}
class admin extends user {
    public ?Webuser $head = null; 
    function generateQRCode(?Webuser $head)
    {

    }
    function approverequest() {

    }
    function rejectrequest()
    {
        
    }
}
?>
