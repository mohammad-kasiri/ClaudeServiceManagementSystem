<?php

namespace App\Models;

class Cart
{
    public $plan_id;

    public function __construct($cart)
    {
        if(!property_exists($this, 'plan_id'))
            return redirect()->route('index')->withErrors([
                'cart'  => 'invalid'
            ]);

        $this->plan_id= $cart->plan_id;
        $this->quantity= property_exists($cart, 'quantity')
            ? $cart->quantity
            : 1;

        $this->discount_id= property_exists($cart, 'discount_id')
            ? $cart->discount_id
            : null;



        $this->setPlan();
    }

    private function setPlan()
    {
        $plan = Plan::query()
            ->where('id', $this->plan_id)
            ->with('location')
            ->with('traffic')
            ->with('period')
            ->active()
            ->first();

        if (is_null($plan))
            return redirect()->route('index')->withErrors([
                'cart'  => 'invalid'
            ]);

        $this->plan     = $plan;
        $this->calculatePrice();
    }


    public function applyDiscountCode(Discount $discount)
    {
        $this->discount_id = $discount->id;
        $this->discount   = $discount;
        $this->calculatePrice();
    }

    public function calculatePrice()
    {
        is_null($this->discount_id)
            ? $this->payable_price = $this->plan->price * $this->quantity
            : $this->calculatePriceWithDiscountCode();
    }

    public function calculatePriceWithDiscountCode()
    {
        $this->discount = Discount::query()->where('id', $this->discount_id)->first();

        if (!$this->discount->is_active || $this->discount->hasTheCapacityBeenCompleted())
        {
            return $this->discount_id = null;
        }


        if ($this->discount->type == 'percent') {
            $this->discount_code_price =  (($this->plan->price * $this->quantity) / 100) * ($this->discount->amount);
            $this->payable_price = (($this->plan->price * $this->quantity) / 100) * (100 - $this->discount->amount);

            if ($this->payable_price < 0)
            {
                $this->payable_price = 0;
                $this->discount_code_price = ($this->plan->price * $this->quantity);
            }
        }


        if ($this->discount->type == 'specific') {
            $this->discount_code_price = (($this->plan->price * $this->quantity) - $this->discount->amount);
            $this->payable_price = ($this->plan->price * $this->quantity) - $this->discount->amount;
            if ($this->payable_price < 0)
            {
                $this->payable_price = 0;
                $this->discount_code_price = ($this->plan->price * $this->quantity);
            }
        }
    }

    public function sum_without_discount()
    {
        return $this->plan->rrp_price == 0
            ? $this->plan->price * $this->quantity
            : $this->plan->rrp_price * $this->quantity;
    }

    #(قیمت چاخان - قیمت واقعی) در تعداد ضرب شود و با قیمت اعمال شده توسط کد تخفیف جمع شود تا مجموع تخفیف ها بدست آید
    public function sum_discount()
    {
        if (is_null($this->discount_id))
        {
            return $this->plan->rrp_price
                ? ($this->plan->rrp_price - $this->plan->price) *  $this->quantity
                : 0;
        }

        $this->discount = Discount::query()->where('id', $this->discount_id)->first();
        $total_price= $this->plan->price * $this->quantity;
        $rrp_discount = $this->plan->rrp_price
            ? ($this->plan->rrp_price - $this->plan->price) *  $this->quantity
            : 0;

        if ($this->discount->type == 'percent') {
           return ($total_price / 100) * ($this->discount->amount) + $rrp_discount;
        }

        if ($this->discount->type == 'specific') {
            return $this->discount->amount + $rrp_discount;
        }

    }

    public function fee()
    {
        return $this->plan->rrp_price == 0
            ? $this->plan->price
            : $this->plan->rrp_price ;
    }
}
