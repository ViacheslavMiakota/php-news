<?php

namespace models\News;

use controllers\Database\Database;

class News
{
    private $db;

    public function __construct(Database $database)
    {
        $this->db = $database;
    }

    public function getArticles()
    {
        $query = "SELECT * FROM `articles` ORDER BY `date` DESC";
        $result = $this->db->query($query);

        return $result ?: [];
    }
    public function getArticlesByUserId($userId)
    {
        $query = "SELECT * FROM `articles` WHERE `userId` = :userId ORDER BY `date` DESC";
        $params = array('userId' => $userId);
        $result = $this->db->query($query, $params);

        return $result ?: [];
    }
    public function getArticleById($id)
    {
        $query = "SELECT * FROM `articles` WHERE `id` = :id";
        $result = $this->db->query($query, ['id' => $id]);

        return count($result) ? $result[0] : null;
    }
    public function checkDuplicateArticle($title, $date)
    {
        $query = "SELECT COUNT(*) FROM `articles` WHERE `title` = :title AND DATE(`date`) = :date";
        $params = array('title' => $title, 'date' => $date);
        $stmt = $this->db->prepare($query);
        $stmt->execute($params);
        $result = $stmt->fetchColumn();
        return $result > 0;
    }
    public function deleteArticle($id)
    {
        $sql = "DELETE FROM `articles` WHERE `id` = :id";
        $stmt = $this->db->prepare($sql);
        $stmt->bindParam(':id', $id, \PDO::PARAM_INT);
        return $stmt->execute();
    }
}
