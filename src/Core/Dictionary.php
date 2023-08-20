<?php
namespace Drrefe\Tr\Core;

class Dictionary
{
	public static $hardVowels = "aàáãâıoòóuùú";
	public static $softVowels = "eêëèéæäâiôöüû";
	public static $roundedVowels = "oôöòóuùúüû";
	public static $hardConsonants = "pçtkfsş";
	public static $softConsonants = "bcdğ";

	public static $specialWordsEI = [
		"kırklareli",
		"eminönü"
	];

	public static $specialWordsDeDen = [
		"kırklareli",
		"eminönü"
	];

	public static $softenLastConsonantExceptions = [
		"stok"
	];

}