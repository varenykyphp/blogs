<?php

namespace VarenykyBlog\Repositories;

use VarenykyBlog\Models\Blog;
use Varenyky\Repositories\Repository;

class BlogRepository extends Repository
{
    /**
     * To initialize class objects/variable.
     */
    public function __construct(Blog $model)
    {
        $this->model = $model;
    }
}