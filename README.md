# Module for Magento 2

[![Latest Stable Version](https://img.shields.io/packagist/v/ronangr1/module-flashmessages.svg?style=flat-square)](https://packagist.org/packages/ronangr1/module-flashmessages)
[![License: MIT](https://img.shields.io/github/license/ronangr1/m2-flashmessages.svg?style=flat-square)](./LICENSE)
[![Packagist](https://img.shields.io/packagist/dt/ronangr1/module-flashmessages.svg?style=flat-square)](https://packagist.org/packages/ronangr1/module-flashmessages/stats)
[![Packagist](https://img.shields.io/packagist/dm/ronangr1/module-flashmessages.svg?style=flat-square)](https://packagist.org/packages/ronangr1/module-flashmessages/stats)

This module allows you to replace Magento 2 default messaging with flash messages.

- [Setup](#setup)
    - [Composer installation](#composer-installation)
    - [Setup the module](#setup-the-module)
- [Documentation](#documentation)
- [Support](#support)
- [Authors](#authors)
- [License](#license)

## Setup

Magento 2 Open Source or Commerce edition is required.

This module is compatible with the latest Magento version (2.4.8).

### Installation

```bash
composer require ronangr1/module-flashmessages
```

Then

```bash
bin/magento setup:upgrade
bin/magento setup:di:compile
```

## Documentation

If enabled, the default messaging system is completely removed and replaced by the flash message system.

### How to display a flash message

```javascript
require(['flashManager'], function (flashManager) {
    // You can use the addMessage() function
    flashManager.addMessage([
        {
            type: 'error',
            message: 'Something went wrong while processing.',
        }
    ]);
    
    // Or the enqueueMessage() function
    flashManager.enqueueMessage([
        {
            type: 'warning',
            message: 'Entity saved but something went wrong while processing.',
        }
    ]);
});
```
It already works with ajax call.

### How to change the position of the flash message?

Go to `Store > Configuration > Ronangr1 > Flash Messages > Settings > Position`.

## Support

Raise a new [request](https://github.com/ronangr1/m2-flashmessages/issues) to the issue tracker.

## Authors

- **ronangr1** - *Maintainer* - [![GitHub followers](https://img.shields.io/github/followers/ronangr1.svg?style=social)](https://github.com/ronangr1)
- **Contributors** - *Contributor* - [![GitHub contributors](https://img.shields.io/github/contributors/ronangr1/m2-flashmessages.svg?style=flat-square)](https://github.com/ronangr1/m2-flashmessages/graphs/contributors)

## License

This project is licensed under the MIT License - see the [LICENSE](./LICENSE) details.

***That's all folks!***
