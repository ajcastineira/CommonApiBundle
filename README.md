# CommonApiBundle

Provides some missing out-of-box features for RESTful API services based on Symfony.

[![Scrutinizer Quality Score](https://img.shields.io/scrutinizer/g/fre5h/CommonApiBundle.svg?style=flat-square)](https://scrutinizer-ci.com/g/fre5h/CommonApiBundle/)
[![Build Status](https://img.shields.io/travis/fre5h/CommonApiBundle.svg?style=flat-square)](https://travis-ci.org/fre5h/CommonApiBundle)
[![CodeCov](https://img.shields.io/codecov/c/github/fre5h/CommonApiBundle.svg?style=flat-square)](https://codecov.io/github/fre5h/CommonApiBundle)
[![License](https://img.shields.io/packagist/l/fresh/common-api-bundle.svg?style=flat-square)](https://packagist.org/packages/fresh/common-api-bundle)
[![Latest Stable Version](https://img.shields.io/packagist/v/fresh/common-api-bundle.svg?style=flat-square)](https://packagist.org/packages/fresh/common-api-bundle)
[![Total Downloads](https://img.shields.io/packagist/dt/fresh/common-api-bundle.svg?style=flat-square)](https://packagist.org/packages/fresh/common-api-bundle)
[![Dependency Status](https://img.shields.io/versioneye/d/php/fresh:common-api-bundle.svg?style=flat-square)](https://www.versioneye.com/user/projects/57c2e80e69d94900419c9ec3)
[![SensioLabsInsight](https://img.shields.io/sensiolabs/i/8da90969-be40-4f0b-812c-435fbca7ce16.svg?style=flat-square)](https://insight.sensiolabs.com/projects/8da90969-be40-4f0b-812c-435fbca7ce16)
[![Gitter](https://img.shields.io/badge/gitter-join%20chat-brightgreen.svg?style=flat-square)](https://gitter.im/fre5h/CommonApiBundle)

[![knpbundles.com](http://knpbundles.com/fre5h/CommonApiBundle/badge-short)](http://knpbundles.com/fre5h/CommonApiBundle)

## Requirements

* PHP 5.5.9 *and later*
* Symfony 2.8.6 *and later*

## Features

* Correct `boolean` form type for RESTful API context.

## Installation

### Install via Composer

```php composer.phar require fresh/common-api-bundle='~1.0'```

## Using

### BooleanType

Suppose that you have `Settings` entity which stores information about type of notifications which should be enabled.
Then PUT method of your API could receive something like this `json` body.

```json
{
    "settings": {
        "email_notifications": true,
        "sms_notifications": false
    }
}
```

On practise some clients don't send only `true` and `false` values. Some clients can send values like this: 

```json
{
    "settings": {
        "option_a": "false",
        "option_b": "0",
        "option_c": 0,
        "option_d": ""
    }
}
```

If you are using standard built-in [Symfony CheckboxType](http://symfony.com/doc/current/reference/forms/types/checkbox.html),
then some of these values can be treated as `true`. Because in the context of web form if checkbox has non-empty value then it treated as checked.

This form type is useful only if you are using `Symfony Form Component` in your application.
If you don't use *Symfony forms* for building your RESTful web service, then this form type will be useless.

## Contributing

See [CONTRIBUTING](https://github.com/fre5h/CommonApiBundle/blob/master/.github/CONTRIBUTING.md) file.
