<?php

namespace AzelCH\NoFallDamage;

use pocketmine\Server;
use pocketmine\player\Player;
use pocketmine\plugin\PluginBase;
use pocketmine\event\Listener;
use pocketmine\event\entity\EntityDamageEvent;
use pocketmine\utils\Config;

class Main extends PluginBase implements Listener{
  
  public function onEnable(): void{
    $this->saveResource("config.yml");
    $this->getLogger()->info("§aPlugin Enabled");
    $this->getServer()->getPluginManager()->registerEvents($this, $this);
  }
  
  public function onDisable(): void{
    $this->getLogger()->info("§cPlugin Disabled");
  }
  
  public function entityDamage(EntityDamageEvent $ev){
    if($this->getConfig()->get("enable") == true){
      if($ev->getCause()===EntityDamageEvent::CAUSE_FALL)
        $ev->cancel();
    }
  }
}
