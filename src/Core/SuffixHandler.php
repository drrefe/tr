<?php

namespace Drrefe\Tr\Core;

use Drrefe\Tr\Tr;
use Exception;

class SuffixHandler
{
	private string $suffix;
	private Config $config;
	private string $original;
	private Text $text;

	public function __construct(string $suffix, array $config)
	{
		if (!in_array($suffix, array('e', 'i', 'in', 'de', 'den'))) {
			throw new Exception("Suffix is not supported!");
		}
		$this->suffix = $suffix;
		$this->config = new Config($config);
	}

	public function handle(string $text): string
	{
		$this->original = $text;
		$this->text = new Text($text);

		switch ($this->config->locale) {
			case 'en':
				return $this->handleEn();
			case 'tr':
				return $this->handleTr();
		}

		return $this->original;
	}

	private function handleEn(): string
	{
		$resultSuffix = '';
		if ($this->suffix === 'in') {
			$resultSuffix = $this->text->lastChar?->value === 's' ? "'" : "'s";
		}
		return $this->original . ($this->config->uppercase ? Tr::upperCase($resultSuffix) : $resultSuffix);
	}

	private function handleTr(): string
	{
		switch ($this->suffix) {
			case 'e':
			case 'i':
			case 'in':
				return $this->handleEIIn();
			case 'de':
			case 'den':
				return $this->handleDeDen();
		}
		return $this->original;
	}

	private function handleEIIN(): string
	{
		$resultSuffix = $this->config->apostrophe ? "'" : "";
		if ($this->text->lastChar?->isVowel()) {
			switch ($this->suffix) {
				case 'e':
				case 'i':
					$resultSuffix .= in_array($this->text->value, Dictionary::$specialWordsEI) ? 'n' : 'y';
					break;
				case 'in':
					$resultSuffix .= 'n';
					break;
			}
		} else {
			if (!$this->config->apostrophe && $this->text->lastChar?->isHardConsonant()) {
				$this->softenLastChar();
			}
		}
		if ($this->text->lastVowel?->isHardVowel()) {
			switch ($this->suffix) {
				case 'e':
					$resultSuffix .= 'a';
					break;
				case 'i':
					$resultSuffix .= $this->text->lastVowel->isRoundedVowel() ? 'u' : 'ı';
					break;
				case 'in':
					$resultSuffix .= $this->text->lastVowel->isRoundedVowel() ? 'un' : 'ın';
					break;
			}
		} else {
			switch ($this->suffix) {
				case 'e':
					$resultSuffix .= 'e';
					break;
				case 'i':
					$resultSuffix .= $this->text->lastVowel->isRoundedVowel() ? 'ü' : 'i';
					break;
				case 'in':
					$resultSuffix .= $this->text->lastVowel->isRoundedVowel() ? 'ün' : 'in';
					break;
			}
		}
		return $this->original . ($this->config->uppercase ? Tr::upperCase($resultSuffix) : $resultSuffix);
	}

	private function softenLastChar(): void
	{
		$previous = mb_substr($this->original, 0, -1, "UTF-8");
		$lastChar = mb_substr($this->original, -1, 1, "UTF-8");
		$dict = [
			'p' => 'b', 'P' => 'B', 'ç' => 'c', 'Ç' => 'C', 't' => 'd', 'T' => 'D', 'k' => 'ğ', 'K' => 'Ğ'
		];
		if (array_key_exists($lastChar, $dict)) {
			if (!in_array($this->text->value, Dictionary::$softenLastConsonantExceptions)) {
				$this->original = $previous . $dict[$lastChar];
			}
		}
	}

	private function handleDeDen(): string
	{
		$resultSuffix = $this->config->apostrophe ? "'" : "";
		if (in_array($this->text->value, Dictionary::$specialWordsDeDen)) {
			$resultSuffix .= 'n';
		}
		if ($this->text->lastChar?->isHardConsonant()) {
			if (in_array($this->text->value, Dictionary::$specialWordsDeDen)) {
				$resultSuffix .= 'd';
			} else {
				$resultSuffix .= 't';
			}
		} else {
			$resultSuffix .= 'd';
		}
		if ($this->text->lastVowel?->isHardVowel()) {
			switch ($this->suffix) {
				case 'de':
					$resultSuffix .= 'a';
					break;
				case 'den':
					$resultSuffix .= 'an';
					break;
			}
		} else {
			switch ($this->suffix) {
				case 'de':
					$resultSuffix .= 'e';
					break;
				case 'den':
					$resultSuffix .= 'en';
					break;
			}
		}
		return $this->original . ($this->config->uppercase ? Tr::upperCase($resultSuffix) : $resultSuffix);
	}
}
