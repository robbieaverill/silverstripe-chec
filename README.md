# Chec integration for Silverstripe 4

[![Build Status](https://travis-ci.org/robbieaverill/silverstripe-chec.svg?branch=master)](https://travis-ci.org/robbieaverill/silverstripe-chec)
[![Scrutinizer Code Quality](https://scrutinizer-ci.com/g/robbieaverill/silverstripe-chec/badges/quality-score.png?b=master)](https://scrutinizer-ci.com/g/robbieaverill/silverstripe-chec/?branch=master)
[![codecov](https://codecov.io/gh/robbieaverill/silverstripe-chec/branch/master/graph/badge.svg)](https://codecov.io/gh/robbieaverill/silverstripe-chec)


## Introduction

This module adds a `[BuyNow][/BuyNow]` shortcode to the Silverstripe CMS which can integrate with
[Chec Platform](https://chec.io) in order to display a "buy now" button for your Chec products, with an
integrated checkout window.

This project is a fork of [fspringveldt/silverstripe-checio-integration](https://github.com/fspringveldt/silverstripe-checio-integration)
which should be used for SilverStripe 3.x projects.

## Requirements

* PHP ^7.3
* Silverstripe CMS ^4.5

## Installation

```
composer require robbieaverill/silverstripe-chec
```

### Loading the Chec JavaScript

This extension automatically tries to load the Chec JavaScript file, but for some reason should your active template
block requirements, `ChecExtension::getJavaScript()` fetches and loads this JavaScript content inline for you.

Placing this before the closing body tag (e.g. `$ChecJavaScript</body>`) in either your `app` or
`themes/templates/Page.ss` ensures that it always gets loaded.

## Usage

The below short code should be placed in your the content section of your CMS page editor window:

```
[BuyNowButton,permalink="<your product permalink>"]<your button text>[/BuyNowButton]
```

Replace `<your product permalink>` with your Chec product permalink and `<your button text>` with the text you want
displayed in your button/link. You may also add a `class="..."` attribute to the permalink to control the classes
added to the button when it is rendered.

## Maintainer

Robbie Averill <robbie@chec.io>

## License

This module is licensed under the [BSD-3-Clause license](LICENSE). The project is a fork of
[fspringveldt/silverstripe-checio-integration](https://github.com/fspringveldt/silverstripe-checio-integration),
and the original license has been retained in accordance.
