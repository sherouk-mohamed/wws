<?php 
require_once("event.php");
require_once("interface.php");

class Eventnode {
    public Event $data;
    public ?Eventnode $next = null;

    public function __construct(Event $event) {
        $this->data = $event;
    }
}
class Calender 
{
    public ?Eventnode $head = null;
 private $Calenderid;
}
?>