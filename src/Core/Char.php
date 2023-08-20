<?php

namespace Drrefe\Tr\Core;

class Char
{
	public string $value;

	public function __construct(string $value)
	{
		$this->value = $value;
	}

	public function isVowel(): bool
	{
		return str_contains(Dictionary::$hardVowels . Dictionary::$softVowels, $this->value);
	}

	public function isHardVowel(): bool
	{
		return str_contains(Dictionary::$hardVowels, $this->value);
	}

	public function isSoftVowel(): bool
	{
		return false;
	}

	public function isRoundedVowel(): bool
	{
		return str_contains(Dictionary::$roundedVowels, $this->value);
	}

	public function isConsonant(): bool
	{
		return str_contains(Dictionary::$softConsonants . Dictionary::$softConsonants, $this->value);
	}

	public function isHardConsonant(): bool
	{
		return str_contains(Dictionary::$hardConsonants, $this->value);
	}

	public function isSoftConsonant(): bool
	{
		return false;
	}
}
