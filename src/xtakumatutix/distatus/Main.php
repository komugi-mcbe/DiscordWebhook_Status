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
            ->setCustomAvatar("https://user-images.githubusercontent.com/47268002/82444806-bea31f00-9ade-11ea-9181-0e6b5a3fe254.png");
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
            ->setCustomAvatar("https://user-images.githubusercontent.com/47268002/82444811-bfd44c00-9ade-11ea-9feb-27d78310903e.png");
        Sender::send($webhook); 	
    }
}
