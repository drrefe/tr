<?php

namespace Drrefe\Tr\Core;

use Drrefe\Tr\Tr;
use Exception;

class Config
{
	public ?string $locale = 'tr';
	public bool $apostrophe = true;
	public bool $uppercase = false;

	public function __construct(array $config)
	{
		if (isset($config['locale'])) {
			if (!is_null($config['locale'])) {
				if (is_string($config['locale'])) {
					$locale = Tr::lowerCase(mb_substr($config['locale'], 0, 2, 'UTF-8'));
					if(in_array($locale, array('tr', 'en'))) {
						$this->locale = $locale;
					} else {
						$this->locale = null;
					}
				} else {
					throw new Exception("apostrophe must be type of string!");
				}
			}
		}

		if (isset($config['apostrophe'])) {
			if (is_bool($config['apostrophe'])) {
				$this->apostrophe = $config['apostrophe'];
			} else {
				throw new Exception("apostrophe must be type of boolean!");
			}
		}

		if (isset($config['uppercase'])) {
			if (is_bool($config['uppercase'])) {
				$this->uppercase = $config['uppercase'];
			} else {
				throw new Exception("uppercase must be type of boolean!");
			}
		}
	}
}
