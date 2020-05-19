<?php

namespace xtakumatutix\distatus;

use pocketmine\plugin\PluginBase;
use pocketmine\Player;
use xtakumatutix\distatus\posts\Enable;
use bbo51dog\pmdiscord\Sender;
use bbo51dog\pmdiscord\element\Content;

Class Main extends PluginBase 
{
    public function onEnable() 
    {
    	$date = date("G:i");
        $content = new Content();
        $content->setText(">> Open \n Time > ".$date);
        $webhook = Sender::create("")
            ->add($content)
            ->setCustomName("ServerOpen")
            ->setCustomAvatar("https://raw.githubusercontent.com/komugi-mcbe/DiscordWebhook_Status/master/start.jpg");
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
            ->setCustomAvatar("https://raw.githubusercontent.com/komugi-mcbe/DiscordWebhook_Status/master/stop.jpg");
        Sender::send($webhook); 	
    }
}