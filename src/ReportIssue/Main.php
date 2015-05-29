<?php

namespace ReportIssue;

use pocketmine\Server;
use pocketmine\plugin\PluginBase;
use pocketmine\command\Command;
use pocketmine\command\CommandSender;
use pocketmine\utils\TextFormat;
use pocketmine\Player;

class Main extends PluginBase{
  public function onEnable(){
    $this->getLogger->info(TextFormat::BLUE . "ReportIssue enabled");
  }
  public function onDisable(){
    $this->getLogger->info(TextFormat::RED . "ReportIssue disabled");
  }
  
  public function onCommand(CommandSender $sender, Command $command, $label, array $args){
    if(strtolower($command->getName()) === "report"){
      if($sender->hasPermission("reportissue") || $sender->hasPermission("reportissue.command") || $sender->hasPermission("reportissue.command.report")){
        $player = $sender->getPlayer()->getDisplayName();
        $this->getLogger()->info(TextFormat::YELLOW . "[ReportIssue] " .$player. " needs help!");
        $this->getServer()->broadcastMessage("[ReportIssue] " .$player. " needs help!");
      }else{
        $sender->sendMessage("You don't have permission to do that!");
      }
    }
  }
}
