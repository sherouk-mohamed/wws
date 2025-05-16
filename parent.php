<?php
require_once("child.php")
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

 function viewchildattendance($childid)
 {
    $current = $this->head;

    if ($current === null) {
        echo "No children found.\n";
        return;
    }
    echo "Child Attendance:\n";
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