<?php

require_once __DIR__.'/../../bootstrap.php';

/** @var \App\Entity\Tag[] $tags */
$tags = $entityManager->getRepository(\App\Entity\Tag::class)->findAll();

/** @var \App\Entity\Post $post */
$post = $entityManager->getRepository(\App\Entity\Post::class)->findAll()[0];

foreach ($tags as $tag) {
    // Reason for use add or remove methods inside entity
    // because if tag was inserted earlier it will crash
    if (!$post->tags->contains($tag)) {
        $post->tags->addElement($tag);
    }
}

$entityManager->flush();

$printQueries();