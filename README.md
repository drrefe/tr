# Tr

A package that makes it easy to use some operations and suffixes specific to the Turkish language.

## PHP Version Support

Currently the required PHP minimum version is PHP __8.0__.

See the `composer.json` for other requirements.

## Installation

Use [composer](https://getcomposer.org) to install Tr into your project:

```sh
composer require drrefe/tr
```

## Usage

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