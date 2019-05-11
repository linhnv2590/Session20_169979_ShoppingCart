<?php


namespace App;


class Cart
{
    public $itemsList = null;
    public $totalQuantity = 0;
    public $totalPrice = 0;

    public function __construct($oldCart)
    {
        if ($oldCart) {
            $this->itemsList = $oldCart->itemsList;
            $this->totalQuantity = $oldCart->totalQuantity;
            $this->totalPrice = $oldCart->totalPrice;
        }
    }

    public function addToCart($item, $id)
    {
        $storedItems = [
            'quantity' => 0,
            'price' => $item->price,
            'item' => $item
        ];

        if ($this->itemsList) {
            if (array_key_exists($id, $this->itemsList)) {
                $storedItems = $this->itemsList[$id];
            }
        }

        $storedItems['quantity']++;

        $storedItems['price'] = $item->price * $storedItems['quantity'];

        $this->itemsList[$id] = $storedItems;

        $this->totalQuantity++;
        $this->totalPrice += $item->price;
    }

    public function removeItemFromCart($id, $oldCart)
    {
        $currentQuantity = $oldCart->itemsList[$id]['quantity'];
        $currentPrice = ($oldCart->itemsList[$id]['item']['price']) * $currentQuantity;

        unset($this->itemsList[$id]);
        $this->totalQuantity -= $currentQuantity;
        $this->totalPrice -= $currentPrice;
    }
}