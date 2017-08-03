<?php

/*
 *
 *  ____            _        _   __  __ _                  __  __ ____
 * |  _ \ ___   ___| | _____| |_|  \/  (_)_ __   ___      |  \/  |  _ \
 * | |_) / _ \ / __| |/ / _ \ __| |\/| | | '_ \ / _ \_____| |\/| | |_) |
 * |  __/ (_) | (__|   <  __/ |_| |  | | | | | |  __/_____| |  | |  __/
 * |_|   \___/ \___|_|\_\___|\__|_|  |_|_|_| |_|\___|     |_|  |_|_|
 *
 * This program is free software: you can redistribute it and/or modify
 * it under the terms of the GNU Lesser General Public License as published by
 * the Free Software Foundation, either version 3 of the License, or
 * (at your option) any later version.
 *
 * @author PocketMine Team
 * @link http://www.pocketmine.net/
 *
 *
*/

declare(strict_types=1);

namespace pocketmine\network\mcpe\protocol;

#include <rules/DataPacket.h>

use pocketmine\network\mcpe\NetworkSession;

class PhotoTransferPacket extends DataPacket{
	const NETWORK_ID = ProtocolInfo::PHOTO_TRANSFER_PACKET;

	/** @var string */
	public $string1;
	/** @var string */
	public $string2;
	/** @var string */
	public $string3;

	public function decodePayload(){
		$this->string1 = $this->getString();
		$this->string2 = $this->getString();
		$this->string3 = $this->getString();
	}

	public function encodePayload(){
		$this->putString($this->string1);
		$this->putString($this->string2);
		$this->putString($this->string3);
	}

	public function handle(NetworkSession $session) : bool{
		return $session->handlePhotoTransfer($this);
	}
}