<?php 
class User 
{
    private string $userID;
    private string $encryptedPassword;
    public string $name;
    public string $email;
    public string $role;
    public string $address;
    public string $phoneNumber;
    protected string $lastError = '';
    protected $db;  // Database connection property


    
    public function __construct($db) {
        $this->db = $db;
    }

    public function getUserID(): string {
        return $this->userID;
    }

    public function getEncryptedPassword(): string {
        return $this->encryptedPassword;
    }

    public function setEncryptedPassword(string $newPassword): void {
        $this->encryptedPassword = password_hash($newPassword, PASSWORD_DEFAULT);
    }

    public function getLastError(): string {
        return $this->lastError;
    }

public function login($email, $password, $expectedRole = null) {
    $stmt = $this->db->conn->prepare("SELECT * FROM user WHERE email = ?");
    $stmt->bind_param("s", $email);
    $stmt->execute();
    $result = $stmt->get_result();
    if ($result->num_rows !== 1) {
        $this->lastError = "User does not exist.";
        return false;
    }
    $user = $result->fetch_assoc();
    if (!password_verify($password, $user['encryptedPassword'])) {
        $this->lastError = "Incorrect password.";
        return false;
    }
    if ($expectedRole && $user['role'] !== $expectedRole) {
        $this->lastError = "User is not of type '$expectedRole'.";
        return false;
    }
    // Optionally set user properties here
    return true;
}
   
public function register($db, $role, $childrenIds = null) {
    try {
        // FIX: Do NOT hash again, use the already hashed password
        $stmt = $db->conn->prepare(
            "INSERT INTO user (name, email, encryptedPassword, role, phoneNumber) VALUES (?, ?, ?, ?, ?)"
        );
        $stmt->bind_param("sssss", $this->name, $this->email, $this->encryptedPassword, $role, $this->phoneNumber);
        if (!$stmt->execute()) {
            $this->lastError = "Failed to create user: " . $stmt->error;
            return false;
        }
        $userID = $stmt->insert_id;
        $stmt->close();

        if ($role === 'parent') {
            $stmt = $db->conn->prepare("INSERT INTO parent (userID) VALUES (?)");
            $stmt->bind_param("i", $userID);
            if (!$stmt->execute()) {
                $this->lastError = "Failed to create parent: " . $stmt->error;
                return false;
            }
            $parentId = $stmt->insert_id;
            $stmt->close();

            if ($childrenIds) {
                $childIdsArr = array_filter(array_map('trim', explode(',', $childrenIds)));
                foreach ($childIdsArr as $childId) {
                    $stmt = $db->conn->prepare("INSERT INTO parent_children (parent_id, child_id) VALUES (?, ?)");
                    $stmt->bind_param("ii", $parentId, $childId);
                    if (!$stmt->execute()) {
                        $this->lastError = "Failed to link child $childId to parent";
                        return false;
                    }
                    $stmt->close();
                }
            }
        } elseif ($role === 'teacher') {
            $stmt = $db->conn->prepare("INSERT INTO teacher (userID) VALUES (?)");
            $stmt->bind_param("i", $userID);
            if (!$stmt->execute()) {
                $this->lastError = "Failed to create teacher: " . $stmt->error;
                return false;
            }
            $stmt->close();
        }
        return true;
    } catch (Exception $e) {
        $this->lastError = "Registration failed: " . $e->getMessage();
        return false;
    }
}

    public function updateProfile(string $name, string $email): bool {
        try {
            $stmt = $this->db->conn->prepare(
                "UPDATE users SET name = ?, email = ? WHERE userID = ?"
            );
            $stmt->bind_param("sss", $name, $email, $this->userID);
            return $stmt->execute();
        } catch (Exception $e) {
            $this->lastError = "Profile update failed: " . $e->getMessage();
            return false;
        }
    }

    public function changePassword(string $newPassword): bool {
        try {
            $this->setEncryptedPassword($newPassword);
            $stmt = $this->db->conn->prepare(
                "UPDATE users SET encryptedPassword = ? WHERE userID = ?"
            );
            $stmt->bind_param("ss", $this->encryptedPassword, $this->userID);
            return $stmt->execute();
        } catch (Exception $e) {
            $this->lastError = "Password change failed: " . $e->getMessage();
            return false;
        }
    }
}
?>
