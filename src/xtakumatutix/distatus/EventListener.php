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
        $webhook = Sender::create("https://discordapp.com/api/webhooks/712400360014086217/N7ckUq7lTqUzbPe8Tefc7rkVTeg-K09EqOE1Rib0N1-wGUb_ArC0AoJFYwe7WPdyxad2")
            ->add($content)
            ->setCustomName("Join")
            ->setCustomAvatar("https://user-images.githubusercontent.com/47268002/82444822-c236a600-9ade-11ea-8cbf-a2725896f7a5.png");
        Sender::send($webhook);
	}

	public function onQuit(PlayerQuitEvent $event)
	{
		$player = $event->getPlayer();
		$name = $player->getName();
    	$date = date("G:i");
        $content = new Content();
        $content->setText(">> Quit ".$name." \n Time > ".$date);
        $webhook = Sender::create("https://discordapp.com/api/webhooks/712400360014086217/N7ckUq7lTqUzbPe8Tefc7rkVTeg-K09EqOE1Rib0N1-wGUb_ArC0AoJFYwe7WPdyxad2")
            ->add($content)
            ->setCustomName("Quit")
            ->setCustomAvatar("https://user-images.githubusercontent.com/47268002/82444815-c1057900-9ade-11ea-8671-1e8587d56b18.png");
        Sender::send($webhook);
	}
}