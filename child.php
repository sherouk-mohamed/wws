<?php
 class child {
    public $child_id;
    public $name;
   public $birth_date;
    public $parent_id;
    public $parentNumber;
    public $qr_code;
    public $age;

        function __construct($db) {
        $this->db = $db;
    }
    

 }
 ?>
