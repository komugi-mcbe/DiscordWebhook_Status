<?php

// アイコン:http://flat-icon-design.com/?p=400

namespace xtakumatutix\distatus;

use pocketmine\plugin\PluginBase;
use pocketmine\Player;
use pocketmine\utils\Config;
use xtakumatutix\distatus\EventListener;
use bbo51dog\pmdiscord\Sender;
use bbo51dog\pmdiscord\element\Content;

Class Main extends PluginBase 
{
    public function onEnable() 
    {
        $this->getLogger()->notice("起動メッセージを送信しました - ver.".$this->getDescription()->getVersion());
        $this->getServer()->getPluginManager()->registerEvents(new EventListener($this), $this);
        $this->config = new Config($this->getDataFolder() . "config.yml", Config::YAML, [
            'token' => 'https://discordapp.com/api/webhooks/00000/xxxxx'
        ]);
        $token = $this->config->get('token');
        $date = date("G:i");
        $content = new Content();
        $content->setText(">> Open \n Time > ".$date);
        $webhook = Sender::create($token)
            ->add($content)
            ->setCustomName("ServerOpen")
            ->setCustomAvatar("https://user-images.githubusercontent.com/47268002/82444806-bea31f00-9ade-11ea-9181-0e6b5a3fe254.png");
        Sender::send($webhook);
    }

    public function onDisable()
    {
        $this->getLogger()->notice("停止メッセージを送信しました");
        $token = $this->config->get('token');
        $date = date("G:i");
        $content = new Content();
        $content->setText(">> Stop \n Time > ".$date);
        $webhook = Sender::create($token)
            ->add($content)
            ->setCustomName("ServerStop")
            ->setCustomAvatar("https://user-images.githubusercontent.com/47268002/82444811-bfd44c00-9ade-11ea-9feb-27d78310903e.png");
        Sender::send($webhook); 
    }
}