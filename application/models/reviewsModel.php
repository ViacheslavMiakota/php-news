<?php

namespace models;

class Review {
    private $db;

    public function __construct($database) {
        $this->db = $database;
    }

    public function addReview($name, $userId, $articleId, $reviewUser) {
        $sql = "INSERT INTO `reviews` (`name`, `userId`, `articleId`, `reviewUser`) VALUES (:name, :userId, :articleId, :reviewUser)";
        $stmt = $this->db->prepare($sql);
        $stmt->bindParam(':name', $name);
        $stmt->bindParam(':userId', $userId);
        $stmt->bindParam(':articleId', $articleId);
        $stmt->bindParam(':reviewUser', $reviewUser);

        if ($stmt->execute()) {
            return true;
        } else {
            return false;
        }
    }

    public function hasUserReviewedArticle($userId, $articleId) {
        $query = "SELECT * FROM `reviews` WHERE `userId` = :userId AND `articleId` = :articleId";
        $result = $this->db->query($query, ['userId' => $userId, 'articleId' => $articleId]);

        if ($result && count($result) > 0) {
            return true;
        } else {
            return false;
        }
    }
    public function deleteReviewById($id) {
        $query = "DELETE FROM `reviews` WHERE `id` = :id";
        $statement = $this->db->prepare($query);
        $statement->bindValue(':id', $id, \PDO::PARAM_INT);
        $result = $statement->execute();

        return $result;
    }
    public function updateReviewById($id, $reviewUser) {
        $query = "UPDATE `reviews` SET `reviewUser` = :reviewUser WHERE `id` = :id";
        $stmt = $this->db->prepare($query);
        $stmt->bindParam(':reviewUser', $reviewUser, \PDO::PARAM_STR);
        $stmt->bindParam(':id', $id, \PDO::PARAM_INT);
        return $stmt->execute();
    }
    public function getReviewsForArticle($articleId) {
        $query = "SELECT * FROM `reviews` WHERE `articleId` = :articleId";
        $stmt = $this->db->prepare($query);
        $stmt->bindParam(':articleId', $articleId, \PDO::PARAM_INT);
        $stmt->execute();
        $reviews = $stmt->fetchAll(\PDO::FETCH_ASSOC);

        return $reviews;
    }
    public function getReviewById($reviewId) {
        $query = "SELECT * FROM `reviews` WHERE `id` = :reviewId";
        $stmt = $this->db->prepare($query);
        $stmt->bindParam(':reviewId', $reviewId, \PDO::PARAM_INT);
        $stmt->execute();
        $review = $stmt->fetch(\PDO::FETCH_ASSOC);

        return $review;
    }
    
}
