<?php

namespace Drrefe\Tr\Tests;

use Drrefe\Tr\Tr;
use PHPUnit\Framework\TestCase;

class TrTest extends TestCase
{

	public function testSuffix()
	{
		$rows = json_decode(file_get_contents(__DIR__ . "/test-rows.json"), true, JSON_UNESCAPED_UNICODE);

		foreach ($rows as $row) {
			$this->assertSame($row["expected_e"],   Tr::suffix("e",   $row["text"], locale: $row["locale"], apostrophe: $row["apostrophe"], uppercase: $row["uppercase"]));
			$this->assertSame($row["expected_i"],   Tr::suffix("i",   $row["text"], locale: $row["locale"], apostrophe: $row["apostrophe"], uppercase: $row["uppercase"]));
			$this->assertSame($row["expected_in"],  Tr::suffix("in",  $row["text"], locale: $row["locale"], apostrophe: $row["apostrophe"], uppercase: $row["uppercase"]));
			$this->assertSame($row["expected_de"],  Tr::suffix("de",  $row["text"], locale: $row["locale"], apostrophe: $row["apostrophe"], uppercase: $row["uppercase"]));
			$this->assertSame($row["expected_den"], Tr::suffix("den", $row["text"], locale: $row["locale"], apostrophe: $row["apostrophe"], uppercase: $row["uppercase"]));
		}
	}
}
