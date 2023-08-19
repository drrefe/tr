<?php

namespace Drrefe\Tr;

class Tr
{
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
	 * Turkish safe title string (ucfirst)
	 * 
	 * @param string $text
	 * @return string
	 */
	public static function title(string $text): string
	{
		return str_replace('i̇', 'i', ltrim(mb_convert_case(str_replace(array('i', 'I'), array('İ', 'ı'), $text), MB_CASE_TITLE, 'UTF-8')));
	}
}
