<?php

// アイコン:http://flat-icon-design.com/?p=400

namespace xtakumatutix\distatus;

use pocketmine\plugin\PluginBase;
use pocketmine\Player;
use xtakumatutix\distatus\EventListener;
use bbo51dog\pmdiscord\Sender;
use bbo51dog\pmdiscord\element\Content;


Class Main extends PluginBase 
{
    public function onEnable() 
    {
    	$this->getServer()->getPluginManager()->registerEvents(new EventListener($this), $this);
    	$date = date("G:i");
        $content = new Content();
        $content->setText(">> Open \n Time > ".$date);
        $webhook = Sender::create("")
            ->add($content)
            ->setCustomName("ServerOpen")
            ->setCustomAvatar("http://flat-icon-design.com/f/f_business_64/s512_f_business_64_2bg.png");
        Sender::send($webhook);
    }

    public function onDisable()
    {
    	$date = date("G:i");
        $content = new Content();
        $content->setText(">> Stop \n Time > ".$date);
        $webhook = Sender::create("")
            ->add($content)
            ->setCustomName("ServerStop")
            ->setCustomAvatar("http://flat-icon-design.com/f/f_business_64/s512_f_business_64_0bg.png");
        Sender::send($webhook); 	
    }
}