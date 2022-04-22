<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Category extends Model
{
    use HasFactory;
    
    protected $table = "categories";
    
    protected $fillable = [
        'title', 'description'
    ];
    
    //protected $guarded = ['id'];
    
    protected $casts = [
        'is_active' => 'boolean'
    ];
    
    public function scopeActive($query) 
    {
        return $query->where('is_active', true);
    }
    
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
    
    //Relation
    public function news(): hasMany
    {
        return $this->hasMany(News::class, 'category_id', 'id');
    }
}
