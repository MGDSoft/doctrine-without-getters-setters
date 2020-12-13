<?php

require_once __DIR__.'/../../bootstrap.php';

$author = new \App\Entity\Author();
$author->name = "name";
$entityManager->persist($author);

$post = new \App\Entity\Post();
$post->title = "title";
$post->author = $author;
$entityManager->persist($post);

$postComment = new \App\Entity\PostComment();
$postComment->comment = "comment";
$postComment->post = $post;
$entityManager->persist($postComment);

$postComment = new \App\Entity\PostComment();
$postComment->comment = "comment 2";
$postComment->post = $post;
$entityManager->persist($postComment);

$postComment = new \App\Entity\PostComment();
$postComment->comment = "comment 3";
$postComment->post = $post;
$entityManager->persist($postComment);

$tag = new \App\Entity\Tag();
$tag->name = "tag 1";
$entityManager->persist($tag);

$tag = new \App\Entity\Tag();
$tag->name = "tag 2";
$entityManager->persist($tag);

$entityManager->flush();

$printQueries();