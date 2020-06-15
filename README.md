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

```
<script>
    /* <![CDATA[ */

    ga('ecommerce:addTransaction', {
        'id': '000001234',                                   // Transaction ID. Required
        'affiliation': 'Main WebsiteMain Website Store',     // Affiliation or store name
        'revenue': '44.9800',                                // Grand Total
        'shipping': '5.0000',                                // Shipping
        'tax': '0.0000'                                      // Tax
    });

    ga('ecommerce:addItem', {
        'id': '000001234',                    // Transaction ID. Required
        'name': 'PRODUCT',                    // Product name. Required
        'sku': 'SKU',                         // SKU/code
        'price': '39.9800',                   // Unit price
        'quantity': '1.0000'                  // Quantity
    });
    
    ga('ecommerce:send');
    ga('second.ecommerce:send');


    /* ]]> */
</script>
```