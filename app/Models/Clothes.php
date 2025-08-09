<?php

    namespace App\Models;

    use Illuminate\Database\Eloquent\Model;

    class Clothes extends Model
    {
        // fillables
        protected $fillable = [
            'gender',
            'age',
            'brand',
            'size',
        ];

        // relashionship with product table
        public function products() {
            return $this->belongsTo(Product::class);
        }
    }
