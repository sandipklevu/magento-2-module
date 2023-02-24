## Main Functionalities
This will index custom product type with Klevu

## Installation
\* = in production please use the `--keep-generated` option

### Zip file

- Unzip the zip file in `app/code/Klevu`
- Enable the module by running `php bin/magento module:enable Klevu_SyncCustomProductType`
- Apply database updates by running `php bin/magento setup:upgrade`\*
- Flush the cache by running `php bin/magento cache:flush`

## Action

- Open \Klevu\SyncCustomProductType\Plugin\Product\ProductIndividualPlugin.php 
- Change the product type to your own product type
