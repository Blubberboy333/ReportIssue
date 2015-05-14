<?php

namespace ReportIssue;

use pocketmine\command\Command;
use pocketmine\command\CommandSender;
use pocketmine\utils\TextFormat;
use pocketmine\plugin\PluginBase;

class Main extends PluginBase{
  
  public function onEnable(){
    $this->getLogger()->info(TextFormat::BLUE . "ReportIssue enabled");
  }
  public function onDisable(){
    $this->getLogger->info(TextFormat::RED . "ReportIssue disabled");
  }
  
  public function onCommand(CommandSender $sender, Command $command, $label, array $args){
    if(strtolower($command->getName()) === "report"){
      if($sender instanceof Player){
        if($sender->hasPermission("reportissue.command.report")){
          $name = $sender->getDisplayName();
          $sender->sendMessage("[ReportIssue] Your issue has been reported");
          $this->getLogger()->info(TextFormat::RED .$name. " has reported an issue!!!");
        }else{
          $sender->sendMessage("You don't have permission to do that!");
        }
      }else{
        $sender->sendMessage(TextFormat::RED . "Please run that command in-game");
      }
    }
  }
}
