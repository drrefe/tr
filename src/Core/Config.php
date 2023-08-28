<?php

namespace Drrefe\Tr\Core;

use Drrefe\Tr\Tr;
use Exception;

class Config
{
	public ?string $locale = 'tr';
	public bool $apostrophe = true;
	public bool $uppercase = false;

	public function __construct( string $locale = 'tr', bool $apostrophe = true, bool $uppercase = false)
	 {
		$locale = Tr::lowerCase(mb_substr($locale, 0, 2, 'UTF-8'));
		$this->locale = in_array($locale, array('tr', 'en')) ? $locale : null;
		$this->apostrophe = $apostrophe;
		$this->uppercase = $uppercase;
	}
}
