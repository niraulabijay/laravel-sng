<?php
/**
 * Created by PhpStorm.
 * User: Bijay
 * Date: 11/5/2020
 * Time: 9:54 PM
 */

namespace App\Repositories\roomType;


interface RoomTypeInterface
{
    public function findBySlug($slug);

    public function findById($id);

    public function getByIds($ids = []);

    public function getAllActiveRoomTypes();

    public function createRoomType($request);

    public function updateRoomType($roomType, $request);

}
