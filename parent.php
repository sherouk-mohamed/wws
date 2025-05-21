<?php
require_once("child.php");
require_once("chat.php");
require_once("db.php");

class ChildNode {
    public Child $data;
    public ?ChildNode $next = null;

    public function __construct(Child $child) {
        $this->data = $child;
    }
}
class ParentUser extends User {
    private $parentId;
    private $children = [];

    public function getParentId(): int {
        return $this->parentId;
    }

    public function loadChildren(): void {
        $stmt = $this->db->conn->prepare(
            "SELECT c.* FROM children c
             JOIN parent_children pc ON c.child_id = pc.child_id
             WHERE pc.parent_id = ?"
        );
        $stmt->bind_param("i", $this->parentId);
        $stmt->execute();
        $result = $stmt->get_result();
        
        while ($row = $result->fetch_assoc()) {
            $this->children[] = $row;
        }
    }

    public function getChildren(): array {
        return $this->children;
    }
}

?>
