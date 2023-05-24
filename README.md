# Laravel Package-sopay

[![Latest Version on Packagist](https://img.shields.io/packagist/v/mysoleas/package-sopay.svg?style=flat-square)](https://packagist.org/packages/mysoleas/package-sopay)
[![GitHub Code Style Action Status](https://img.shields.io/github/actions/workflow/status/mysoleas/package-sopay/fix-php-code-style-issues.yml?branch=main&label=code%20style&style=flat-square)](https://github.com/mysoleas/package-sopay/actions?query=workflow%3A"Fix+PHP+code+style+issues"+branch%3Amain)
[![Total Downloads](https://img.shields.io/packagist/dt/mysoleas/package-sopay.svg?style=flat-square)](https://packagist.org/packages/mysoleas/package-sopay)


Package to allow developers using the laravel framework to easily integrate a reliable and secure online payment method into their projects.

## Support us

[<img src="https://app.soleaspay.com/images/sopay.png" width="200px" />](https://soleaspay.com)

We invest a lot of resources in the creation of packages to facilitate the integration of online payments via our [soleaspay platform](https://soleaspay.com) . You can support us by using our package on your laravel application.


## Installation

You can install the package via composer:

```bash
composer require mysoleas/package-sopay
```

You can publish the config file with:

```bash
php artisan vendor:publish --tag="package-sopay-config"
```

You must now add your api-key provided by our soleaspay platform in the configuration file named __package-sopay.php__ located in the config directory of your application.This is the contents of the published config file:

```php
return [
    'x-api-key' => 'your api key'
];
```
You need to include the Packagesopay class in your file using:

```php
use Mysoleas\PackageSopay\PackageSopay;
```

to finish you just have to send the following information :  
* __service__ (orange_money_CM, mtn_mobile_money_CM, bitcoin, paypal, express_union, perfect_money, litecoin, dogecoin) ;
* __wallet__ ;  
* __amount__ ;  
* __currency__ ;  
* __order_id__ ;  


To do this use the function __processPayment(service,wallet,amount,currency,order_id)__ and retrieve the response of the operation. Here is a usage pattern :

```php
<?php

namespace App\Http\Controllers;
use Mysoleas\PackageSopay\PackageSopay;

class TestController extends Controller
{
    public function myControllerMethod() {
        $myClassInstance = new PackageSopay();
        $myClassInstance->processPayment('mtn_mobile_money',328743892,100000,"XAF","123456789");
    }
}
```


You can also get payment links. For this you must send the following information:
* __type__ (billing, tiping) ;  
* __instance__ ;  
* __amount__ ;  
* __currency__ ;  
* __langue__ ; 
* __description__ ; 
* __shopName__ ; 

To do this use the function __getLink(mode, instance, amount, currency, langue, description, shopName)__ and retrieve the response of the operation. Here is a usage pattern :

```php
<?php

namespace App\Http\Controllers;
use Mysoleas\PackageSopay\PackageSopay;

class TestController extends Controller
{
    public function myControllerMethod() {
        $myClassInstance = new PackageSopay();
        $myClassInstance->getLink('billing', 2, 1000, 'XAF', 'fr', 'Purchase of supplies', 'mysoleas')
    }
}
```

## Changelog

Please see [CHANGELOG](CHANGELOG.md) for more information on what has changed recently.


## Security Vulnerabilities

Please review [our security policy](../../security/policy) on how to report security vulnerabilities.

## Credits

- [Mysoleas](https://mysoleas.com)

## License

The MIT License (MIT). Please see [License File](LICENSE.md) for more information.
