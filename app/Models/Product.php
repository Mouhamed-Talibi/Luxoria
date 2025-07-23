<?php

    namespace App\Models;

    use Illuminate\Database\Eloquent\Model;
    use Illuminate\Database\Eloquent\SoftDeletes;

    class Product extends Model
    {
        use SoftDeletes;

        /**
         * fillable properties for mass assignment
         */
        protected $fillable = [
            'name',
            'slug',
            'description',
            'price',
            'stock',
            'category_id',
            'image'
        ];

        // relationship with category
        public function category() {
            return $this->belongsTo(Category::class);
        }
    }
