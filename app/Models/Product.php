<?php
 
namespace Models;
 
use \Illuminate\Database\Eloquent\Model;
 
class Product extends Model {
     
    protected $table = 'products';

    protected $fillable = ['download_file_link'];
     
}