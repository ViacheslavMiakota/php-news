<?php

require_once '../controllers/connect.php';

class UserModel {
    private $db;
    
    public function __construct($db) {
        $this->db = $db;
    }
    
    public function createUser($login, $pass, $name, $avatar, $role) {
        $hashedPassword = md5($pass);
        
        $result = $this->db->prepare("SELECT * FROM `users` WHERE `login` = :login");
        $result->execute(['login' => $login]);
        
        if ($result->rowCount() > 0) {
            return false; // Користувач з таким Email вже зареєстрований
        }
        
        $result = $this->db->prepare("INSERT INTO `users` (`login`, `pass`, `name`, `avatar`, `role`) VALUES (:login, :pass, :name, :avatar, :role)");
        $result->execute(['login' => $login, 'pass' => $hashedPassword, 'name' => $name, 'avatar' => $avatar, 'role' => $role]);
        
        return true; // Реєстрація успішна
    }
    public function getUserByLoginAndPassword($login, $pass)
    {
        $hashedPassword = md5($pass);

        $query = "SELECT * FROM `users` WHERE `login` = :login AND `pass` = :pass";
        $statement = $this->db->prepare($query);
        $statement->execute(['login' => $login, 'pass' => $hashedPassword]);
        return $statement->fetch(PDO::FETCH_ASSOC);
    }
    public function getUserRole($userId) {
        $sql = "SELECT role FROM users WHERE id = :userId";
        $stmt = $this->db->prepare($sql);
        $stmt->bindParam(':userId', $userId, PDO::PARAM_INT);
        $stmt->execute();
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }
    public function getArticlesByUserId($userId) {
        $query = "SELECT * FROM `articles` WHERE `userId` = :userId";
        $statement = $this->db->prepare($query);
        $statement->bindValue(':userId', $userId, PDO::PARAM_INT);
        $statement->execute();

        return $statement->fetchAll(PDO::FETCH_ASSOC);
    }
}
?>


