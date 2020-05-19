<?php

// アイコン:http://flat-icon-design.com/?p=453

namespace xtakumatutix\distatus;

use pocketmine\event\Listener;
use pocketmine\event\player\PlayerJoinEvent;
use pocketmine\event\player\PlayerQuitEvent;
use bbo51dog\pmdiscord\Sender;
use bbo51dog\pmdiscord\element\Content;

class EventListener implements Listener 
{
	public function onJoin(PlayerJoinEvent $event)
	{
		$player = $event->getPlayer();
		$name = $player->getName();
    	$date = date("G:i");
        $content = new Content();
        $content->setText(">> Join ".$name." \n Time > ".$date);
        $webhook = Sender::create("")
            ->add($content)
            ->setCustomName("Join")
            ->setCustomAvatar("http://flat-icon-design.com/f/f_object_115/s512_f_object_115_0bg.png");
        Sender::send($webhook);
	}

	public function onQuit(PlayerQuitEvent $event)
	{
		$player = $event->getPlayer();
		$name = $player->getName();
    	$date = date("G:i");
        $content = new Content();
        $content->setText(">> Quit ".$name." \n Time > ".$date);
        $webhook = Sender::create("")
            ->add($content)
            ->setCustomName("Quit")
            ->setCustomAvatar("http://flat-icon-design.com/f/f_object_115/s512_f_object_115_1bg.png");
        Sender::send($webhook);
	}
}