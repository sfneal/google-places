# Changelog

All notable changes to `google-places` will be documented in this file

## 0.1.0 - 2020-08-21
- initial release


## 0.2.0 - 2020-09-14
- add support for laravel 8


## 0.3.0 - 2020-10-06
- add support for php 7.0


## 0.3.1 - 2020-10-07
- bump sfneal package versions & phpunit min version


## 0.3.2 - 2020-10-07
- fix sfneal/action package versions


## 0.4.0 - 2020-11-30
- add php8 compatibility


## 0.4.1 - 2020-12-11
- fix php8 compatibility


## 0.4.2 - 2020-12-16
- add improved type hinting


## 0.4.3 - 2020-12-23
- fix changelog


## 0.5.0 - 2021-02-08
- make Extract service for extracting city, state & zip codes from a google place query return
- make Autocomplete service for executing place queries


## 0.6.0 - 2021-02-08
- add ServiceProvider for publishing configs & routes
- add test suite for testing Google Places API functionality as well as Autocomplete & Extract services
- fix issues with return type hinting


## 1.0.0 - 2021-02-08
- initial production release
- updated documentation


## 1.0.1 - 2021-03-30
- fix sfneal/actions & sfneal/controllers version syntax
- fix Travis CI config to enable code coverage uploads


## 1.1.0 - 2021-03-31
- bump sfneal/actions & sfneal/controllers min version to 2.0
- refactor `Autocomplete` & `Extract` into Services namespace
- refactor `PlacesController` into Controllers namespace


## 1.1.1 - 2021-07-13
- refactor test classes into `Feature` & `Unit` namespaces
- refactor `LaravelTest` to `RouteTest`
