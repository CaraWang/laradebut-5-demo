<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    protected $guarded = ['id'];
    protected $hidden = [];

    protected $attributes = [
        'brand' => 'Laradebut',
        'type'  => ''
    ];

    protected $casts = [
        'price'    => 'int',
        'discount' => 'float'
    ];

    protected $appends = ['fullName'];

    static private $colors = ['紅', '白', '灰', '藍', '青', '黑'];

    /**
     * 取得折扣後的金額
     */
    public function getPriceAttribute()
    {
        $price = (float)$this->attributes['price'];
        $discount = (float)$this->attributes['discount'];
        return (int)ceil($price * $discount);
    }

    /**
     * 存入正確的折扣數
     */
    public function setDiscountAttribute($value)
    {
        if ($value > 1) {
            $value = 1;
        } elseif ($value < 0.5) {
            $value = 0.5;
        }

        $this->attributes['discount'] = $value;
    }

    /**
     * 取得前台顯示的商品名稱
     */
    public function getFullNameAttribute()
    {
        $result = sprintf(
            '【%s】%s',
            $this->attributes['brand'],
            $this->attributes['name']
        );
        if (mb_strlen($this->attributes['type']) > 0) {
            $result .= '- ' . $this->attributes['type'];
        }

        return $result;
    }

    /**
     * 寫入正確的型號
     */
    public function setTypeAttribute($value)
    {
        if (((int)stripos($value, '色') - 1) !== mb_strlen($value)
            && in_array($value, self::$colors)) {
            $value .= '色';
        }

        $this->attributes['type'] = $value;
    }
}
