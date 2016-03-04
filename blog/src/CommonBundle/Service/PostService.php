<?php

namespace CommonBundle\Service;

use CommonBundle\Entity\Post;

class PostService
{
    /**
     * Set les dates
     *
     * @param Post $post
     */
    public function setDates(Post $post, $setDateAdd = false)
    {
        $post->setDateUpdate(new \DateTime());

        if ($setDateAdd) {
            $post->setDateAdd(new \DateTime());
        }

        return $post;
    }

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