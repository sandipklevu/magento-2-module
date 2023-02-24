## Main Functionalities
The `Klevu_AdditionalAttributes` module enables you to add the Additional attributes to sync with Klevu.

## Installation details


For information about a module installation in Magento 2, see [Enable or disable modules](https://devdocs.magento.com/guides/v2.4/install-gde/install/cli/install-cli-subcommands-enable.html).

\* In production please use the `--keep-generated` option

- Unzip the zip file in `app/code/Klevu`
- Enable the module by running `php bin/magento module:enable Klevu_AdditionalAttributes`
- Apply database updates by running `php bin/magento setup:upgrade`\*
- Flush the cache by running `php bin/magento cache:flush`

 
## Usage

1. Open * [Model/Product/LoadAttribute.php](Model/Product/LoadAttribute.php)

2. Find the below override samples

where `$parent` is parent object in configurable product while `$item` is product object for all the other type of products.

`$product['otherAttributeToIndex']['some_new_attribute'] = 'A Value';`

`$product['imageHover'] = "https://website.com/somehoverurl.png";`

`$product['stock_promotional_label'] = "On Sale";`

3. Make respective changes to the code.


## Notes
This pseudo-code module is not an officially supported and is just an example, developers can install it in <magento-root>/app/code folder.
Recommend testing this on a local/dev/staging site. No guarantee for this code and not able to provide any ongoing updates for this code in the future.

Feel free to make necessary changes in the module namespace at your convenience.

