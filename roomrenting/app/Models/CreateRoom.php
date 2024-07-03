<?php
 
namespace App\Models;
 
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
 
class CreateRoom extends Model
{
    use HasFactory;
    protected $table = 'createroom';
    protected $fillable = [
        'title',
        'price',
        'product_code',
        'description'
    ];
}