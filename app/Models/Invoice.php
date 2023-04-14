<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * @property int|mixed $quantity
 * @property int|mixed $plan_price
 * @property int|mixed $plan_rrp_price
 * @property int|mixed $discount_code_price
 * @property int|mixed $payable_price
 */
class Invoice extends Model
{
    use HasFactory;
    protected $fillable=['user_id', 'plan_id', 'period_id', 'traffic_id', 'discount_id', 'plan_price', 'plan_rrp_price', 'discount_price', 'payable_price', 'quantity', 'status', 'type'];

    public function plan()      {return $this->belongsTo(Plan::class ,'plan_id');}
    public function period()    {return $this->belongsTo(Period::class ,'period_id');}
    public function traffic()   {return $this->belongsTo(Traffic::class ,'traffic_id');}
    public function discount()  {return $this->belongsTo(Discount::class ,'discount_id');}
    public function accounts()  {return $this->belongsToMany(Account::class, 'account_invoice', 'invoice_id', 'account_id');

    }

    public function discount_code_price()
    {
        return number_format($this->discount_code_price);
    }
    public function payable_price()
    {
        return number_format($this->payable_price);
    }
    public function plan_price()
    {
        return number_format($this->plan_price);
    }
    public function plan_rrp_price()
    {
        return number_format($this->plan_rrp_price);
    }

    #(قیمت چاخان - قیمت واقعی) در تعداد ضرب شود و با قیمت اعمال شده توسط کد تخفیف جمع شود تا مجموع تخفیف ها بدست آید
    public function sum_discount()
    {
        return $this->plan_rrp_price == 0
            ? $this->discount_code_price + 0
            : (($this->plan_rrp_price - $this->plan_price) * $this->quantity) + $this->discount_code_price;
    }

    public function sum_without_discount()
    {
        return $this->plan_rrp_price == 0
            ? $this->plan_price * $this->quantity
            : $this->plan_rrp_price * $this->quantity;
    }

    public function fee()
    {
        return $this->plan_rrp_price == 0
            ? $this->plan_price
            : $this->plan_rrp_price ;
    }

    public function incrementQuantity()
    {
        $this->quantity= $this->quantity + 1;
        $this->calculatePrice();
    }

    public function decrementQuantity()
    {
        $this->quantity= $this->quantity - 1;
        $this->calculatePrice();
    }

    public function applyDiscountCode(Discount $discount)
    {
        $this->discount_id = $discount->id;
        $this->calculatePrice();
    }

    public function calculatePrice()
    {
        is_null($this->discount_id)
              ? $this->payable_price = $this->plan_price * $this->quantity
              : $this->calculatePriceWithDiscountCode();

        $this->save();
    }



    public function calculatePriceWithDiscountCode()
    {
        if (!$this->discount->is_active || $this->discount->hasTheCapacityBeenCompleted())
        {
            return $this->discount_id = null;
        }


        if ($this->discount->type == 'percent') {
            $this->discount_code_price =  (($this->plan_price * $this->quantity) / 100) * ($this->discount->amount);
            $this->payable_price = (($this->plan_price * $this->quantity) / 100) * (100 - $this->discount->amount);

            if ($this->payable_price < 0)
            {
                $this->payable_price = 0;
                $this->discount_code_price = ($this->plan_price * $this->quantity);
            }
        }


        if ($this->discount->type == 'specific') {
            $this->discount_code_price = (($this->plan_price * $this->quantity) - $this->discount->amount);
            $this->payable_price = ($this->plan_price * $this->quantity) - $this->discount->amount;
            if ($this->payable_price < 0)
            {
                $this->payable_price = 0;
                $this->discount_code_price = ($this->plan_price * $this->quantity);
            }
        }
    }
}
