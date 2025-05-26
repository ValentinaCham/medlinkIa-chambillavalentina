<?php

namespace App;

class GildedRose
{
    public $name;
    public $quality;
    public $sellIn;

    public function __construct($name, $quality, $sellIn)
    {
        $this->name = $name;
        $this->quality = $quality;
        $this->sellIn = $sellIn;
    }

    public static function of($name, $quality, $sellIn) {
        return new static($name, $quality, $sellIn);
    }

    public function tick()
    {
        $this->updateQuality();
        $this->updateSellIn();
        
        if ($this->sellIn < 0) {
            $this->handleExpired();
        }
    }

    protected function updateQuality()
    {
        switch ($this->name) {
            case 'Aged Brie':
                $this->increaseQuality();
                break;
            case 'Backstage passes to a TAFKAL80ETC concert':
                $this->updateBackstagePassQuality();
                break;
            case 'Sulfuras, Hand of Ragnaros':
                break;
            default:
                $this->decreaseQuality($this->isConjured() ? 2 : 1);
                break;
        }
    }

    protected function updateSellIn()
    {
        if ($this->name != 'Sulfuras, Hand of Ragnaros') {
            $this->sellIn--;
        }
    }

    protected function handleExpired()
    {
        switch ($this->name) {
            case 'Aged Brie':
                $this->increaseQuality();
                break;
            case 'Backstage passes to a TAFKAL80ETC concert':
                $this->quality = 0;
                break;
            case 'Sulfuras, Hand of Ragnaros':
                break;
            default:
                $this->decreaseQuality($this->isConjured() ? 2 : 1);
                break;
        }
    }

    protected function updateBackstagePassQuality()
    {
        $this->increaseQuality();
        
        if ($this->sellIn < 11) {
            $this->increaseQuality();
        }
        
        if ($this->sellIn < 6) {
            $this->increaseQuality();
        }
    }

    protected function increaseQuality()
    {
        if ($this->quality < 50) {
            $this->quality++;
        }
    }

    protected function decreaseQuality($amount = 1)
    {
        $this->quality = max(0, $this->quality - $amount);
    }

    protected function isConjured()
    {
        return strpos($this->name, 'Conjured') === 0;
    }
}
