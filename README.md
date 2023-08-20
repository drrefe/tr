# Tr

A package that makes it easy to use some operations and suffixes specific to the Turkish language.

Note that this package only supports __UTF-8__ encoding.

## PHP Version Support

Currently the required PHP minimum version is PHP __8.0__.

See the `composer.json` for other requirements.

## Installation

Use [composer](https://getcomposer.org) to install Tr into your project:

```sh
composer require drrefe/tr
```

## Usage

Using Turkish Suffixes

Supports `-e`, `-i`, `-in`, `-de`, `-den` suffixes

`Str::suffix(string $suffix, string $text, ?array $config): string`

Example:

```php
use Drrefe\Tr\Tr;

echo Tr::suffix('e', 'Ahmet'); // Ahmet'e
echo Tr::suffix('e', 'Ayşe'); // Ayşe'ye
echo Tr::suffix('i', 'Arda'); // Arda'yı
echo Tr::suffix('i', 'Doğu'); // Doğu'yu
echo Tr::suffix('i', 'Kitap', ['apostrophe' => false]); // Kitabı
echo Tr::suffix('in', 'Ankara'); // Ankara'nın
echo Tr::suffix('in', 'Mehmet'); // Mehmet'in
echo Tr::suffix('in', 'Bölük', ['apostrophe' => false]); // Bölüğün
echo Tr::suffix('in', 'Mehmet', ['locale' => 'en']); // Mehmet's
echo Tr::suffix('in', 'Enes', ['locale' => 'en']); // Enes'
echo Tr::suffix('de', 'İstanbul'); // İstanbul'da
echo Tr::suffix('de', 'Yozgat'); // Yozgat'ta
echo Tr::suffix('den', 'Kitaplık', ['apostrophe' => false]); // Kitaplıktan

```

Example Results:

| $locale| $text | $suffix = 'e' | $suffix = 'i' | $suffix = 'in' | $suffix = 'de' | $suffix = 'den' |
| --- | --- | --- | --- | --- | --- | --- |
| tr | Ahmet | Ahmet'e | Ahmet'i | Ahmet'in | Ahmet'te | Ahmet'ten |
| tr | Hasan | Hasan'a | Hasan'ı | Hasan'ın | Hasan'da | Hasan'dan |
| tr | Ayşe | Ayşe'ye | Ayşe'yi | Ayşe'nin | Ayşe'de | Ayşe'den |
| tr | Arda | Arda'ya | Arda'yı | Arda'nın | Arda'da | Arda'dan |
| tr | Bobo | Bobo'ya | Bobo'yu | Bobo'nun | Bobo'da | Bobo'dan |
| tr | İnönü | İnönü'ye | İnönü'yü | İnönü'nün | İnönü'de | İnönü'den |
| tr | İstanbul | İstanbul'a | İstanbul'u | İstanbul'un | İstanbul'da | İstanbul'dan |
| tr | Ankara | Ankara'ya | Ankara'yı | Ankara'nın | Ankara'da | Ankara'dan |
| tr | İzmir | İzmir'e | İzmir'i | İzmir'in | İzmir'de | İzmir'den |
| tr | Kırklareli | Kırklareli'ne | Kırklareli'ni | Kırklareli'nin | Kırklareli'nde | Kırklareli'nden |
| tr | Yozgat | Yozgat'a | Yozgat'ı | Yozgat'ın | Yozgat'ta | Yozgat'tan |
| tr | Kitap | Kitaba | Kitabı | Kitabın | Kitapta | Kitaptan |
| tr | Stok | Stoka | Stoku | Stokun | Stokta | Stoktan |
| tr | Bölük | Bölüğe | Bölüğü | Bölüğün | Bölükte | Bölükten |
| tr | Araç | Araca | Aracı | Aracın | Araçta | Araçtan |
| tr | Hasat | Hasada | Hasadı | Hasadın | Hasatta | Hasattan |
| en | Mehmet | - | - | Mehmet's | - | - |
| en | Enes | - | - | Enes' | - | - |

Converting Turkish text to lower case

`Str::lowerCase(string $text): string`

Example:

```php
use Drrefe\Tr\Tr;

echo Tr::lowerCase("bU paKetin kullanImı İle gÜvenli bİr Şekilde özeL karAkteRleri dÖnüştÜrebilirsiniz.");

// Output: "bu paketin kullanımı ile güvenli bir şekilde özel karakterleri dönüştürebilirsiniz."
```

Converting Turkish text to upper case

`Str::upperCase(string $text): string`

Example:

```php
use Drrefe\Tr\Tr;

echo Tr::upperCase("bU paKetin kullanImı İle gÜvenli bİr Şekilde özeL karAkteRleri dÖnüştÜrebilirsiniz.");

// Output: "BU PAKETİN KULLANIMI İLE GÜVENLİ BİR ŞEKİLDE ÖZEL KARAKTERLERİ DÖNÜŞTÜREBİLİRSİNİZ."
```

Converting Turkish text to upper case first character

`Str::upperCaseFirst(string $text): string`

Example:

```php
use Drrefe\Tr\Tr;

echo Tr::upperCaseFirst("bU paKetin kullanImı İle gÜvenli bİr Şekilde özeL karAkteRleri dÖnüştÜrebilirsiniz.");

// Output: "Bu paketin kullanımı ile güvenli bir şekilde özel karakterleri dönüştürebilirsiniz."
```

Converting Turkish text to title (upper case first character of words)

`Str::title(string $text): string`

Example:

```php
use Drrefe\Tr\Tr;

echo Tr::title("bU paKetin kullanImı İle gÜvenli bİr Şekilde özeL karAkteRleri dÖnüştÜrebilirsiniz.");

// Output: "Bu Paketin Kullanımı İle Güvenli Bir Şekilde Özel Karakterleri Dönüştürebilirsiniz."
```

## License

Tr package is licensed under MIT.