## Main Functionalities
The `Klevu_ThemeV2PowerUp` module will defer quick search power up, postpone Quick Search Power Up and
defer Search Landing Power Up, Postpone Search Landing (`/search`) Power Up.

## Installation details


For information about a module installation in Magento 2, see [Enable or disable modules](https://devdocs.magento.com/guides/v2.4/install-gde/install/cli/install-cli-subcommands-enable.html).

\* In production please use the `--keep-generated` option

- Unzip the zip file in `app/code/Klevu`
- Enable the module by running `php bin/magento module:enable Klevu_ThemeV2PowerUp`
- Apply database updates by running `php bin/magento setup:upgrade`\*
- Flush the cache by running `php bin/magento cache:flush`


## Usage

* You can use this module if you have asked for defer the quick search and search landing page.
* You can inject your own system configuration flag to control through admin configuration.


## Notes
This pseudocode module is not an officially supported and is just an example, developers can install it in <magento-root>/app/code folder.
Recommend testing this on a local/dev/staging site. No guarantee for this code and not able to provide any ongoing updates for this code in the future.

Feel free to make necessary changes in the module namespace at your convenience.
