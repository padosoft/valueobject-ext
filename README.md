# valueobject-extensions

A collection of value objects based on funeralzone/valueobjects.

## Requirements ##

Requires PHP >=7.1

## Installation ##

Through Composer, obviously:

```
composer require padosoft/valueobject-ext
```

## Purpose ##

This package provides some useful value object helpers for common values (e.g. UUIDs). 
It's for use in conjunction with the [funeralzone/valueobjects](https://github.com/funeralzone/valueobjects) package.

## List of value object helpers ##

### DATETIME
* Date
* Time
* RFC3339 datetime
### STRING
* String
* Nullable String
### INTERNET
* Email
* Nullable Email
* Email With Alias
* Set Of Emails
* Set Of Nullable Emails
* Set Of Emails With Alias
* Domain
* Hostname
* IPAddress
* IPAddress V4
* IPAddress V6
* IPAddress Version
* Uri
* Nullable Uri
* Set Of Uri
* Device
* Device Version
* Device With Unknown
* Device Version With Unknown
### INTERNATIONALIZATION  
* ISO Alpha 2 Country Code
* ISO Alpha 3 Country Code
### PHONE NUMBER
* Phone Number Type
* Phone Number
* Mobile Number  
* Fixed Number  
* Nullble Phone Number
* Nullble Mobile Number  
* Nullble Fixed Number
### MISCELLANEOUS
* Money
* Nullable Money
* UUID
* Generatable UUID
* Array Defined Enum
