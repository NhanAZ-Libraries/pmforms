<?php

declare(strict_types=1);

namespace NhanAZ\PmFormsDevToolsConsumer;

use dktapps\pmforms\CustomForm;
use dktapps\pmforms\CustomFormResponse;
use dktapps\pmforms\MenuForm;
use dktapps\pmforms\MenuOption;
use dktapps\pmforms\ModalForm;
use dktapps\pmforms\element\Input;
use dktapps\pmforms\element\Toggle;
use pocketmine\player\Player;
use pocketmine\plugin\PluginBase;

final class Main extends PluginBase{
	public function openForms(Player $player) : void{
		$player->sendForm(new MenuForm(
			"Menu",
			"Choose an option",
			[new MenuOption("Profile")],
			static function(Player $player, int $selectedOption) : void{}
		));

		$player->sendForm(new ModalForm(
			"Confirm",
			"Continue?",
			static function(Player $player, bool $choice) : void{}
		));

		$player->sendForm(new CustomForm(
			"Profile",
			[
				new Input("name", "Name"),
				new Toggle("public", "Make profile public")
			],
			static function(Player $player, CustomFormResponse $response) : void{
				$response->getString("name");
				$response->getBool("public");
			}
		));
	}
}
