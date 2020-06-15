# Magento 2 Add basic ecommerce tracking on site

![phpcs](https://github.com/DominicWatts/GoogleEcommerceTracking/workflows/phpcs/badge.svg)

![PHPCompatibility](https://github.com/DominicWatts/GoogleEcommerceTracking/workflows/PHPCompatibility/badge.svg)

![PHPStan](https://github.com/DominicWatts/GoogleEcommerceTracking/workflows/PHPStan/badge.svg)

Add `ecommerce:addTransaction` and `ecommerce:addItem` on checkout

# Install instructions #

`composer require dominicwatts/googleecommercetracking`

`php bin/magento setup:upgrade`

`php bin/magento setup:di:compile`

# Useage

Complete purchase. Check analytics.