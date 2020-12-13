<?php

require_once __DIR__.'/../../bootstrap.php';

/** @var \App\Entity\Post $post */
$post = $entityManager->getRepository(\App\Entity\Post::class)->findAll()[0];

$post->title = 'title updated';
$post->author->name = 'name updated';

$entityManager->flush();

$printQueries();