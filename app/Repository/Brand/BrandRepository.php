<?php

namespace App\Repository\Brand;

use App\Models\Brand;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\Redis;

class BrandRepository implements BrandInterface
{
    public function getAllData()
    {
        return Cache::remember("brands", 60, function(){
            return Brand::latest()->get();
        });
        
    }

    public function storeOrUpdate($data)
    {
        $id = @$data['id']?:null;
        return Brand::updateOrCreate(['id' => $id], $data);
    }

    public function getById($id)
    {
        return Brand::findOrFail($id);
    }

    public function delete($id)
    {
        return Brand::findOrFail($id)->delete();
    }
}
