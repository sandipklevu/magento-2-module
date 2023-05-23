## Main Functionalities
The `Klevu_Moi` module enables you to enable MOI functionality chatbot. This is Magento submodule.

## Installation details


For information about a module installation in Magento 2, see [Enable or disable modules](https://devdocs.magento.com/guides/v2.4/install-gde/install/cli/install-cli-subcommands-enable.html).

\* In production please use the `--keep-generated` option

- Unzip the zip file in `app/code/Klevu`
- Enable the module by running `php bin/magento module:enable Klevu_Moi`
- Apply database updates by running `php bin/magento setup:upgrade`\*
- Flush the cache by running `php bin/magento cache:flush`


## Usage

* Installing this module will enable the chatbot functionality.
* Klevu should have integrated for given storefront


## Notes
This pseudo-code module is not an officially supported and is just an example, developers can install it in <magento-root>/app/code folder.
Recommend testing this on a local/dev/staging site. No guarantee for this code and not able to provide any ongoing updates for this code in the future.

Feel free to make necessary changes in the module namespace at your convenience.
