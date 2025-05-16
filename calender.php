<?php 
require_once("event.php");
require_once("implementation.php");

class Eventnode {
    public Event $data;
    public ?Eventnode $next = null;

    public function __construct(Event $event) {
        $this->data = $event;
    }
}
class Calender implements implementation 
{
    public ?Eventnode $head = null;
 private $Calenderid;
    public function getCalenderid() {
        return $this->Calenderid;
    }

   
    public function setCalenderid($Calenderid): void {
        $this->Calenderid = $Calenderid;
    }
}
?>
