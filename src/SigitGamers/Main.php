<?php

declare(strict_types=1);

namespace SigitGamers;

use pocketmine\Server;
use pocketmine\Player;

use pocketmine\plugin\PluginBase;

use pocketmine\command\CommandSender;
use pocketmine\command\Command;

use pocketmine\event\Listener;
use pocketmine\utils\Config;

class Main extends PluginBase implements Listener {
	
	public function onEnable(){
		$this->getLogger()->info("§aPlugin By SigitGamersYTR Aktif!!");
		$this->getConfig();
		$this->saveResource("config.yml");
		$config = new Config($this->getDataFolder() . "config.yml" , Config::YAML);
			$config->set("#122", "###############################################################################################################");
			$config->set("#222", "#                                                                                                             ");
			$config->set("#3", "#    Hub Transfer Settings                                                                                             ");
			$config->set("#4", "#                                                                                                                  ");
			$config->set("#12", "###############################################################################################################");
			$config->set("lobby", "transfer lobby");
			$config->set("#1111", "Subscribe SigitGamers!");
		$this->getServer()->getPluginManager()->registerEvents($this, $this);

		$config->save();

		$this->saveResource("config.yml");
		@mkdir($this->getDataFolder());
	}
	
	public function onCommand(CommandSender $player, Command $cmd, string $label, array $args): bool {
		switch ($cmd->getName()) {
			case "lobby":
			    if ($player instanceof Player){
					$config = new Config($this->getDataFolder() . "config.yml" , Config::YAML);
					$this->getServer()->dispatchCommand($player,($config->get("lobby")));
				}
		}
		return true;
	}
	
}
