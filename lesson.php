<?php
require_once("Homework.php");
class HomeworkNode {
    public homework $data;
    public ?homeworkNode $next = null;

    public function __construct(Homework $homework) {
        $this->data = $child;
    }
}
class lesson {
    private $lessonid;
    public $title;
    public $lessondescription ; 
    public $subject;
    public ?HomeworkNode $head = null; 
     public function getLessonId() {
        return $this->lessonid;
    }
    public function setLessonId($lessonid) {
        $this->lessonid = $lessonid;
    }
}
?>
