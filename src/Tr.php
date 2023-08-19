<?php

namespace Drrefe\Tr;

class Tr
{
	/**
	 * Turkish safe upper case string (strtoupper)
	 * 
	 * @param string $value
	 * @return string
	 */
	public static function upperCase(string $value): string
	{
		return mb_strtoupper(str_replace(['i', 'ı'], ['İ', 'I'], $value), "UTF-8");
	}

	/**
	 * Turkish safe lower case string (strtolower)
	 * 
	 * @param string $value
	 * @return string
	 */
	public static function lowerCase(string $value): string
	{
		return mb_strtolower(str_replace(['İ', 'I'], ['i', 'ı'], $value), "UTF-8");
	}

	/**
	 * Turkish safe title string (ucfirst)
	 * 
	 * @param string $value
	 * @return string
	 */
	public static function title(string $value): string
	{
		return str_replace('i̇', 'i', ltrim(mb_convert_case(str_replace(array('i', 'I'), array('İ', 'ı'), $value), MB_CASE_TITLE, 'UTF-8')));
	}
}
