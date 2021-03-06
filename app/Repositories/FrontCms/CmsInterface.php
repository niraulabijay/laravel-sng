<?php
/**
 * Created by PhpStorm.
 * User: Bijay
 * Date: 11/1/2020
 * Time: 1:27 PM
 */

namespace App\Repositories\FrontCms;


interface CmsInterface
{
    public function getGlobalPostTypeBySlug($slug);

    public function getGlobalPostByPostType($postType);

    public function getGlobalPostByPostTypeSlug($slug);

    public function getGlobalPostSingleById($id);

    public function getGlobalPostSingleBySlug($postType, $slug);

    public function getGlobalPostMetaByKey($post, $key);

    public function getGlobalPostMultipleByIds($ids = []);
}
