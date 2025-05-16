<?php
require_once("teacher.php");
require_once("message.php");
require_once("parent.php")
interface Participant {
    public function getId(): int;
}

// Teacher class
class Teacher implements Participant {
    private int $id;
    public function __construct(int $id) {
        $this->id = $id;
    }
    public function getId(): int {
        return $this->id;
    }
}


class ParentUser implements Participant {
    private int $id;
    public function __construct(int $id) {
        $this->id = $id;
    }
    public function getId(): int {
        return $this->id;
    }
}


class ParticipantNode {
    public Participant $data;
    public ?ParticipantNode $next = null;

    public function __construct(Participant $participant) {
        $this->data = $participant;
    }
}

class MessageNode {
    public message $data;
    public ?MessageNode $next = null;

    public function __construct(message $message) {
        $this->data = $message;
    }
}

class chat {
    private $chatid;
    private ?Participant $head = null; 
    private ?message $head = null; 

     function viewparticipant (?ParticipantNode $head)
    {

    }
}
?>