<?php

namespace App\Repository\Brand;

interface BrandInterface
{
    public function getAllData();
    public function storeOrUpdate($data);
    public function getById($id);
    public function delete($id);
}
