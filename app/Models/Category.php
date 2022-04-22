<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    use HasFactory;
    
    protected $table = "categories";
    
    public function getCategories(): array
    {
        //return \DB::select("select id, title, description from {$this->table}");
        return \DB::table($this->table)->select("id", "title", "description")->get()->toArray();
    }
    
    public function getCategoryById(int $id): mixed 
    {
        //return \DB::selectOne("select id, title, description from {$this->table} where id = :id, ['id' => $id]");
        return \DB::table($this->table)->find($id);
    }
}
