Magento | Collect In store
============================
Make it impossible for product or a category of product to be availiable only for Collect in Store.

Can be used with [Collect In Store Checkout Shipping Option](https://www.magentocommerce.com/magento-connect/collect-in-store-checkout-shipping-option.html)

Description
-----------
This small extension makes it impossible to set a product or a Category of products in Magento 
to be marked as 'Collect in store' only.

- Adds a new attribute on products
- Adds a new attribute on categories

How to use
-------------
Copy the files to appropriate locations on your Magento installation or use modman.

Override all your shipping methods you use on your website.
http://stackoverflow.com/questions/31064408/magento-override-shipping-methods

and add a custom **processAdditionalValidation function**

```php
    public function proccessAdditionalValidation(Mage_Shipping_Model_Rate_Request $request)
    {
        //get all items in the cart
        $items = $request->getAllItems();
        // Loop all products in cart
        foreach ($items as $item) {
            // Get product Details 
            $product = $item->getProduct();
            $product= Mage::getModel('catalog/product')->load($product->getId());
            // if product has been set for collection only,
            // disable Table Rate shipping method
            if($product->getData('collect_in_store_only') == 1){
                return false;
            }
            // Get the Category the product belogs
            $categoryIds = $product->getCategoryIds();
            foreach ($categoryIds as $catId) {
                // Get category Details
                $category = Mage::getModel('catalog/category')->load($catId);
                // if product belongs to a category that has been set for collection only,
                // disable Table Rate shipping method
                if($category->getData('collect_in_store_only') == 1){
                    return false;
                }
            }
        }
        
        return true;
    }
```

**Warning**
------------

```php
By default the extension will Override your Tablerate Shipping class and will add that function.
app/code/local/Mage/Shipping/Model/Carrier/Tablerate.php
```

Remove that file is you are not using Tablerate shipping and override any shipping methods you are using.


Compatibility
-------------
- Magento >= 1.4

Support
-------
If you have any issues with this extension, open an issue on GitHub (see URL above)

Contribution
------------
Any contributions are highly appreciated. The best way to contribute code is to open a
[pull request on GitHub](https://help.github.com/articles/using-pull-requests).

Developer
---------
Dimitris Stoikidis  
jstoikidis@gmail.com
[@St0iK](https://twitter.com/St0iK)

Licence
-------
[OSL - Open Software Licence 3.0](http://opensource.org/licenses/osl-3.0.php)

Copyright
---------
(c) 2016 Dimitris Stoikidis