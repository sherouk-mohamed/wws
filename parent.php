<?php
require_once("child.php");
require_once("chat.php");
class ChildNode {
    public Child $data;
    public ?ChildNode $next = null;

    public function __construct(Child $child) {
        $this->data = $child;
    }
}
class parent extends user  
{
    private ?ChildNode $head = null; 
 private $encryptedpasswordinfo;
 private $parentQrcode;
public function getEncryptedpasswordinfo(): string {
    return $this->encryptedpasswordinfo;
}

public function setEncryptedpasswordinfo(string $encryptedpasswordinfo): void {
    $this->encryptedpasswordinfo = $encryptedpasswordinfo;
}

public function getParentQrcode(): string {
    return $this->parentQrcode;
}

public function setParentQrcode(string $parentQrcode): void {
    $this->parentQrcode = $parentQrcode;
}
 function viewchildattendance($childid)
 {
   
 }
 function requestpayment()
 {

 }
 function viewnotifactions()
 {

 }
 function viewscehdule()
 {

 }
 function viewactivites()
 {

 }
} 
?>
