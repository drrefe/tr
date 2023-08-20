<?php
require_once '../vendor/autoload.php';

use Drrefe\Tr\Tr;

$rows = [
	['locale' => 'tr', 'text' => 'Ahmet', 'apostrophe' => true],
	['locale' => 'tr', 'text' => 'Hasan', 'apostrophe' => true],
	['locale' => 'tr', 'text' => 'Ayşe', 'apostrophe' => true],
	['locale' => 'tr', 'text' => 'Arda', 'apostrophe' => true],
	['locale' => 'tr', 'text' => 'Bobo', 'apostrophe' => true],
	['locale' => 'tr', 'text' => 'İnönü', 'apostrophe' => true],
	['locale' => 'tr', 'text' => 'İstanbul', 'apostrophe' => true],
	['locale' => 'tr', 'text' => 'Ankara', 'apostrophe' => true],
	['locale' => 'tr', 'text' => 'İzmir', 'apostrophe' => true],
	['locale' => 'tr', 'text' => 'Kırklareli', 'apostrophe' => true],
	['locale' => 'tr', 'text' => 'Yozgat', 'apostrophe' => true],
	['locale' => 'tr', 'text' => 'Kitap', 'apostrophe' => false],
	['locale' => 'tr', 'text' => 'Stok', 'apostrophe' => false],
	['locale' => 'tr', 'text' => 'Bölük', 'apostrophe' => false],
	['locale' => 'tr', 'text' => 'Araç', 'apostrophe' => false],
	['locale' => 'tr', 'text' => 'Hasat', 'apostrophe' => false],
	['locale' => 'en', 'text' => 'Mehmet', 'apostrophe' => true],
	['locale' => 'en', 'text' => 'Enes', 'apostrophe' => true],
];

?>

<!DOCTYPE html>
<html lang="tr">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Drrefe\Tr Test</title>
	<style>
		table {
			border-collapse: collapse;
		}

		th,
		td {
			border: 1px solid;
			padding: 2px 5px;
			text-align: left;
		}

		.bold {
			font-weight: bold;
		}
	</style>
</head>
<body>
	<table>
		<thead>
			<tr>
				<th>$locale</th>
				<th>$text</th>
				<th>$suffix = 'e'</th>
				<th>$suffix = 'i'</th>
				<th>$suffix = 'in'</th>
				<th>$suffix = 'de'</th>
				<th>$suffix = 'den'</th>
			</tr>
		</thead>
		<tbody>
			<?php foreach ($rows as $row) : ?>
				<tr>
					<td><?php echo $row['locale']; ?></td>
					<td class="bold"><?php echo $row['text']; ?></td>
					<td><?php echo $row['locale'] === 'tr' ? Tr::suffix('e',   $row['text'], ['locale' => 'tr', 'apostrophe' => $row['apostrophe']]) : '-';  ?></td>
					<td><?php echo $row['locale'] === 'tr' ? Tr::suffix('i',   $row['text'], ['locale' => 'tr', 'apostrophe' => $row['apostrophe']]) : '-'; ?></td>
					<td><?php echo Tr::suffix('in',  $row['text'], ['locale' => $row['locale'], 'apostrophe' => $row['apostrophe']]); ?></td>
					<td><?php echo $row['locale'] === 'tr' ? Tr::suffix('de',  $row['text'], ['locale' => 'tr', 'apostrophe' => $row['apostrophe']]) : '-'; ?></td>
					<td><?php echo $row['locale'] === 'tr' ? Tr::suffix('den', $row['text'], ['locale' => 'tr', 'apostrophe' => $row['apostrophe']]) : '-'; ?></td>
				</tr>
			<?php endforeach; ?>
		</tbody>
	</table>
</body>
</html>