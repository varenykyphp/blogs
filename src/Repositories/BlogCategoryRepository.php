<?php

namespace VarenykyBlog\Repositories;

use VarenykyBlog\Models\BlogCategory;
use Varenyky\Repositories\Repository;

class BlogCategoryRepository extends Repository
{
    /**
     * To initialize class objects/variable.
     */
    public function __construct(BlogCategory $model)
    {
        $this->model = $model;
    }
}