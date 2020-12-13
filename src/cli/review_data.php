<?php

require_once __DIR__.'/../../bootstrap.php';

/** @var \App\Entity\Post[] $posts */
$posts = $entityManager->getRepository(\App\Entity\Post::class)->findAll();
foreach ($posts as $post) {
    echo "\n\nPost: {$post->title}\n";
    echo "Author: {$post->author->name}\n";
    foreach ($post->comments as $comment) {
        echo "Comment: {$comment->comment}\n";
    }
    foreach ($post->tags as $tag) {
        echo "Tag: {$tag->name}\n";
    }
}

$printQueries();