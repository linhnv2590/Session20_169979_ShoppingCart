<?php


namespace App;


class Cart
{
    public $itemsList = null;
    public $totalQuality = 0;
    public $totalPrice = 0;

    public function __construct($oldCart)
    {
        if ($oldCart) {
            $this->itemsList = $oldCart->itemsList;
            $this->totalQuality = $oldCart->totalQuality;
            $this->totalPrice = $oldCart->totalPrice;
        }
    }

    public function addToCart($item, $id)
    {
        $storedItems = [
            'quality' => 0,
            'price' => $item->price,
            'item' => $item
        ];

        if ($this->itemsList) {
            if (array_key_exists($id, $this->itemsList)) {
                $storedItems = $this->itemsList[$id];
            }
        }

        $storedItems['quality']++;

        $storedItems['price'] = $item->price * $storedItems['quality'];

        $this->itemsList[$id] = $storedItems;

        $this->totalQuality++;
        $this->totalPrice += $item->price;
    }

    public function removeItemFromCart($id, $oldCart)
    {
        $currentQuality = $oldCart->itemsList[$id]['quality'];
        $currentPrice = ($oldCart->itemsList[$id]['item']['price']) * $currentQuality;

        unset($this->itemsList[$id]);
        $this->totalQuality -= $currentQuality;
        $this->totalPrice -= $currentPrice;
    }
}