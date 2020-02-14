<?php
    // Insert a review
    function insertReview($reviewText, $invId, $clientId){
        $db = acmeConnect();
        $sql = 'INSERT INTO reviews (reviewText, invId, clientId) VALUES (:reviewText, :invId, :clientId)';
        $stmt = $db->prepare($sql);
        //store information
        $stmt->bindValue(':reviewText', $reviewText, PDO::PARAM_STR);
        $stmt->bindValue(':invId', $invId, PDO::PARAM_INT);
        $stmt->bindValue(':clientId', $clientId, PDO::PARAM_INT);
        $stmt->execute();
        $rowsChanged = $stmt->rowCount();
        $stmt->closeCursor();
        return $rowsChanged;

    }

    // Get reviews for a specific inventory item
    function getReviews($reviewId){
        $db = acmeConnect();
		$sql = 'SELECT * FROM reviews AS r INNER JOIN inventory AS i ON r.invId = i.invId WHERE r.reviewId = :reviewId';
		$stmt = $db->prepare($sql);
		$stmt->bindValue(':reviewId', $reviewId, PDO::PARAM_INT);
		$stmt->execute();
		$review = $stmt->fetch(PDO::FETCH_ASSOC);
		$stmt->closeCursor();
		return $review;
    }
    
    //Get reviews written by a specific client
    function getReviewClients($clientId){
        $db = acmeConnect();
		$sql = 'SELECT * FROM reviews AS r INNER JOIN inventory AS i ON r.invId = i.invId WHERE r.clientId = :clientId';
		$stmt = $db->prepare($sql);
		$stmt->bindValue(':clientId', $clientId, PDO::PARAM_INT);
		$stmt->execute();
		$reviews = $stmt->fetchAll(PDO::FETCH_ASSOC);
		$stmt->closeCursor();
		return $reviews;
    }

    //Get a specific review
    function getReviewId($invId){
        $db = acmeConnect();
		$sql = 'SELECT * FROM reviews AS r INNER JOIN clients AS c ON r.clientId = c.clientId WHERE r.invId = :invId ORDER BY reviewDate DESC';
		$stmt = $db->prepare($sql);
		$stmt->bindValue(':invId', $invId, PDO::PARAM_INT);
		$stmt->execute();
		$reviews = $stmt->fetchAll(PDO::FETCH_ASSOC);
		$stmt->closeCursor();
	return $reviews;
    }

    // Update a specific review
    function updateReview($reviewId, $reviewText) {
		$db = acmeConnect();
		$sql = 'UPDATE reviews SET reviewText = :reviewText WHERE reviewId = :reviewId';
		$stmt = $db->prepare($sql);
		$stmt->bindValue(':reviewId', $reviewId, PDO::PARAM_INT);
		$stmt->bindValue(':reviewText', $reviewText, PDO::PARAM_STR);
		$stmt->execute();
		$rowsChanged = $stmt->rowCount();
		$stmt->closeCursor();
		return $rowsChanged;
}
    //Delete a specific review
    function deleteReview($reviewId) {
		$db = acmeConnect();
		$sql = 'DELETE FROM reviews WHERE reviewId = :reviewId';
		$stmt = $db->prepare($sql);
		$stmt->bindValue(':reviewId', $reviewId, PDO::PARAM_INT);
		$stmt->execute();
		$rowsChanged = $stmt->rowCount();
		$stmt->closeCursor();
		return $rowsChanged;
}

?>