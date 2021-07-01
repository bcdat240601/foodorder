<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Item extends Model
{
    public $id;
    public $price;
    public $quantity;
    public $name;
    public $subtotal;

    public function getSubTotal(){
        return($this-> quantity)*($this->price);
    }
}

