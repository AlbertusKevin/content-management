<?php

namespace App\Flow;

use App\Repository\ContentTopicRepository;

class ContentTopicFlow
{
    private $content_topic_repo;

    public function __construct()
    {
        $this->content_topic_repo = new ContentTopicRepository();
    }

    public function get()
    {
        $data = $this->content_topic_repo->get();
        return $data;
    }
}
