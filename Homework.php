<?php
require_once("implementation.php")
 class Homework implements implementation {
    private Homeworkid ;
    private lessonid;
    private grade;
    private submissonstatus;
public function get Homeworkid {
    return $this->Homeworkid;
}
public function get lessonid {
    return $this->lessonid;
}
public function get grade {
    return $this->grade;
}
public function get submissonstatus {
    return $this->sumbissionstatus;
}
public function set Homeworkid ($homeworkid) : void{
    $this->Homeworkid = $homeworkid;
}
public function set lessonid($lessonid) : void {
     $this->lessonid = $lessonid;
}
public function set grade($grade) : void {
    $this->grade = $grade;
}
public function set submissonstatus($sumbissionstatus) : void {
$this->sumbissionstatus = $sumbissionstatus;
}

}
?>
