<?php

namespace Drrefe\Tr\Core;

use Drrefe\Tr\Tr;

class Text
{
	public string $original;
	public string $value;
	public ?Char $lastChar;
	public ?Char $lastVowel;

	public function __construct(string $text)
	{
		$this->original = $text;
		$this->value = Tr::lowerCase($text);
		$lastCharString = mb_substr($this->value, -1, 1, "UTF-8");
		$this->lastChar = !empty($lastCharString) ? new Char($lastCharString) : null;
		preg_match_all('/([' . Dictionary::$hardVowels . Dictionary::$softVowels . '])/u', $this->value, $matches, PREG_SET_ORDER);
		$lastVowelString = isset(end($matches)[0]) ? end($matches)[0] : null;
		$this->lastVowel = $lastVowelString ? new Char($lastVowelString) : null;
	}
}
