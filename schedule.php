<?php
require_once("lesson.php");
require_once ("interface");
class LessonNode {
    public lesson $data;
    public ?LessonNode $next = null;

    public function __construct(lesson $lesson) {
        $this->data = $lesson;
    }
}
class schedule {
public scheduleId ; 
public ?LessonNode $head = null; 

}
?>