<?php

namespace CommonBundle\Service;

use CommonBundle\Entity\Post;

class PostService
{
    /**
     * Sécurise les données à insérer en BDD
     *
     * @param Post $post
     */
    public function safeInsertedData(Post $post)
    {
        $post->setContent(addslashes(htmlspecialchars($post->getContent())));
        $post->setTitle(addslashes(htmlspecialchars($post->getTitle())));

        return $post;
    }
}