<?php

require_once __DIR__.'/../../bootstrap.php';

/** @var \App\Entity\Post $post */
$post = $entityManager->getRepository(\App\Entity\Post::class)->findAll()[0];

$postComment = new \App\Entity\PostComment();
$postComment->comment = "comment lazy";
$postComment->post = $post;

$post->commentsLazies->add($postComment);
$entityManager->flush();
$entityManager->clear();

/** @var \App\Entity\Post $post */
$post = $entityManager->getRepository(\App\Entity\Post::class)->findAll()[0];
foreach ($post->commentsLazies as $comment) {
    $postComment = $comment; // save last comment
    echo "$comment->comment\n";
}

// Reason for use add or remove methods inside entity
// need manual synchronization in bidirectional relationships...
$entityManager->remove($postComment);
$post->comments->removeElement($postComment); // needed to sync bidirectional objects
$entityManager->flush();

echo "\nmust be false: ". (!$post->comments->contains($postComment) ? 'CORRECT': 'INCORRECT')."\n\n";

$printQueries();