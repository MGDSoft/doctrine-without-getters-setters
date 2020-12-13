<?php

require_once __DIR__.'/../../bootstrap.php';

/** @var \App\Entity\Post $post */
$post = $entityManager->getRepository(\App\Entity\Post::class)->findAll()[0];

$postComment = new \App\Entity\PostComment();
$postComment->comment = "comment";
$postComment->post = $post;

$post->comments->add($postComment);
$entityManager->flush();

// Reason for use add or remove methods inside entity
// need manual synchronization in bidirectional relationships...
$post->comments->removeElement($postComment); // needed to sync bidirectional objects
$entityManager->remove($postComment);
$entityManager->flush();

echo "\nmust be false: ". (!$post->comments->contains($postComment) ? 'CORRECT': 'INCORRECT')."\n\n";

$printQueries();
