<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Info extends Model
{
    use HasFactory;
    
    protected $table = "info";
    
    protected $fillable = ['author', 'tel', 'email', 'url', 'description'];
    
    public function getInfo(): array
    {
        return \DB::table($this->table)->select("id", "author", "tel", "enail", "url", "description")->get()->toArray();
    }
}
