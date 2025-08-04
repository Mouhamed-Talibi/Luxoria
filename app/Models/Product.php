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
            'description_title',
            'description',
            'price',
            'stock',
            'category_id',
        ];

        // relationship with category
        public function category() {
            return $this->belongsTo(Category::class);
        }

        // relashionship with parfumDetails
        public function parfumDetails() {
            return $this->hasOne(ParfumDetail::class);
        }

        // relashionship with product_images
        public function images() {
            return $this->hasMany(ProductImage::class);
        }

        // primary image
        public function primaryImage() {
            return $this->hasOne(ProductImage::class)->where('is_primary', true);
        }
    }
