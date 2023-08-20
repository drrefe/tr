<?php
/*
 * @package Drrefe\Tr
 *
 */

namespace Drrefe\Tr;

use Drrefe\Tr\Core\SuffixHandler;

class Tr
{
	/**
	 * Turkish safe lower case string (strtolower)
	 * 
	 * @param string $text
	 * @return string
	 */
	public static function lowerCase(string $text): string
	{
		return mb_strtolower(str_replace(['İ', 'I'], ['i', 'ı'], $text), "UTF-8");
	}

	/**
	 * Turkish safe upper case string (strtoupper)
	 * 
	 * @param string $text
	 * @return string
	 */
	public static function upperCase(string $text): string
	{
		return mb_strtoupper(str_replace(['i', 'ı'], ['İ', 'I'], $text), "UTF-8");
	}

	/**
	 * Turkish safe upper case first string (ucfirst)
	 * 
	 * @param string $text
	 * @return string
	 */
	public static function upperCaseFirst(string $text): string
	{
		return self::upperCase(mb_substr($text, 0, 1, "UTF-8")) . self::lowerCase(mb_substr($text, 1, null, "UTF-8"));
	}

	/**
	 * Turkish safe title string (ucwords)
	 * 
	 * @param string $text
	 * @return string
	 */
	public static function title(string $text): string
	{
		return str_replace('i̇', 'i', ltrim(mb_convert_case(str_replace(array('i', 'I'), array('İ', 'ı'), $text), MB_CASE_TITLE, 'UTF-8')));
	}

	/**
	 * Turkish suffixes
	 * 
	 * @param string $suffix 'e'|'i'|'in'|'de'|'den'
	 * @param string $text
	 * @param array $config ['locale' => string, 'apostrophe' => bool, 'uppercase' => bool]
	 * @return string
	 */
	public static function suffix(string $suffix, string $text, array $config = array()): string
	{
		$suffixHandler = new SuffixHandler($suffix, $config);
		return $suffixHandler->handle($text);
	}
}
