<?php

namespace App\Http\Controllers;

use Faker\Factory;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;

class Controller extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;
    
    
    public function categoryList (): array
    {
       $categ = ["SPORT", "MUSIC", "MOVIE", "SHOW", "WORLD"];


        $categories = [];
        for($i=0; $i < 5; $i++){
            $id = $i +1;
            $categories[] = [
                'id' => $id,
                'category' => $categ[$i]
            ];
        }
        
        return $categories;
    }

    
    
    public function getNews(?int $id = null, ?int $idi = null): array
    {
        $faker = Factory::create();
        $categories = $this->categoryList();
        $statusList = ["DRAFT", "ACTIVE", "BLOCKED"];
        if($id) {
            return [
                'id' => $id,
                'title' => $faker->jobTitle(),
                'category' => $categories[mt_rand(0,4)]['category'],
                'author' => $faker->userName(),
                'image' => $faker->imageUrl(250, 170),
                'status' => $statusList[mt_rand(0,2)],
                'description' => $faker->text(100)
            ];
        }
        
        $data = [];
        for($i=0; $i < 9; $i++){
            $rand = mt_rand(0,4);
            $cat = $idi ? $idi-1 : $rand;
            $id = $i +1;
            $data[] = [
                'id' => $id,
                'title' => $faker->jobTitle(),
                'catid' => $categories[$cat]['id'],
                'category' => $categories[$cat]['category'],
                'author' => $faker->userName(),
                'image' => $faker->imageUrl(250, 170),
                'status' => $statusList[mt_rand(0,2)],
                'description' => $faker->text(100)
            ];
        }
        return $data;
    }
}



