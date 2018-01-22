<?php
declare(strict_types=1);
session_start();
include $_SERVER["DOCUMENT_ROOT"] . "/includes/connection.php";
$userID = $_SESSION['user_id'];
$postID = $_POST['postID'];
$defaultVote = 0;
$upVote = 1;
$downVote = -1;
$vote_info = $pdo->prepare("SELECT * FROM votes WHERE link_id=:link_id AND user_id=:user_id");
$vote_info->bindParam(':link_id', $postID);
$vote_info->bindParam(':user_id', $userID);
$vote_info->execute();
$vote_info = $vote_info->fetchAll(PDO::FETCH_ASSOC);

try {
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    if (isset($_POST['voteUp'])) {
        if (! $vote_info) {
            $sqlVoteCheck = $pdo->prepare("INSERT INTO votes ( link_id, user_id, value )
                             VALUES ( :link_id, :user_id, :upVote)");
            $sqlVoteCheck->bindParam(':link_id', $postID);
            $sqlVoteCheck->bindParam(':user_id', $userID);
            $sqlVoteCheck->bindParam(':upVote', $upVote);
            $voteCheckResult = $sqlVoteCheck->execute();
            if ($voteCheckResult) {
                header("location: ../feed.php");
                exit;
            }
        } elseif ($vote_info[0]['value'] == $downVote) {
            $sqlVotedChange = $pdo->prepare("UPDATE votes SET value = :upVote WHERE link_id=:link_id AND user_id=:user_id");
            $sqlVotedChange->bindParam(':link_id', $postID);
            $sqlVotedChange->bindParam(':upVote', $upVote);
            $sqlVotedChange->bindParam(':user_id', $userID);
            $sqlVotedChangeResult = $sqlVotedChange->execute();
            if ($sqlVotedChangeResult) {
                header("location: ../feed.php");
                exit;
            }
        } else {
            $sqlRemoveVote = $pdo->prepare("DELETE FROM votes WHERE link_id=:link_id AND user_id=:user_id");
            $sqlRemoveVote->bindParam(':link_id', $postID);
            $sqlRemoveVote->bindParam(':user_id', $userID);
            $sqlRemoveVote->execute();
            header("location: ../feed.php");
            exit;
        }
    }
    if (isset($_POST['voteDown'])) {
        if (! $vote_info) {
            $sqlVoteCheck = $pdo->prepare("INSERT INTO votes ( link_id, user_id, value )
                             VALUES ( :link_id, :user_id, :downVote)");
            $sqlVoteCheck->bindParam(':link_id', $postID);
            $sqlVoteCheck->bindParam(':user_id', $userID);
            $sqlVoteCheck->bindParam(':downVote', $downVote);
            $voteCheckResult = $sqlVoteCheck->execute();
            if ($voteCheckResult) {
                header("location: ../feed.php");
                exit;
            }
        } elseif ($vote_info[0]['value'] == $upVote) {
            $sqlVotedChange = $pdo->prepare("UPDATE votes SET value = :downVote WHERE link_id=:link_id AND user_id=:user_id");
            $sqlVotedChange->bindParam(':link_id', $postID);
            $sqlVotedChange->bindParam(':downVote', $downVote);
            $sqlVotedChange->bindParam(':user_id', $userID);
            $sqlVotedChangeResult = $sqlVotedChange->execute();
            if ($sqlVotedChangeResult) {
                header("location: ../feed.php");
                exit;
            }
        } else {
            $sqlRemoveVote = $pdo->prepare("DELETE FROM votes WHERE link_id=:link_id AND user_id=:user_id");
            $sqlRemoveVote->bindParam(':link_id', $postID);
            $sqlRemoveVote->bindParam(':user_id', $userID);
            $sqlRemoveVote->execute();
            header("location: ../feed.php");
            exit;
        }
    }
} catch (PDOException $e) {
    echo "Database error" . "<br>" . $e->getMessage();
}

  $pdo = null;
