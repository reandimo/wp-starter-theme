## Introduction

When we are about to start developing a theme or plugin in WordPress is easy to get lost or don’t know where to start, or not be aware of the best practices for each case, so this guide intends to set some “rules” or start point, to begin with your project.

We need to keep in mind that when you write code, other devs probably will work on that code as well, so we need to keep all of our projects on the same track (whenever possible).

## Why bother

We know each investor and project is different, and because of this, the goal of this guide is to set some standardization to follow when you’re creating a new WordPress project in Nativo Team.

## File Structure

Wp starter theme comes with the following file structure:

```bash

themes/your-theme-name/           # → Root of the theme
├── includes/                     # → Contains all the controllers for the theme
│   ├── Common_Helper.php         # → General helpers that can be used everywhere in the site
│   ├── Custom.php                # → All custom functions that you can’t classify in separated classes
│   ├── Post_Type.php             # → The Custom Post Type declarations for the theme
│   ├── Queue.php                 # → The queues of scripts and styles should be here
│   ├── Woocommerce_Admin.php     # → Functions related to Woocommerce's admin
│   ├── Woocommerce.php           # → Functions related to Woocommerce's frontend
│   └── WP_Admin.php              # → Functions related to Wordpress's admin
├── resources/                    # → Theme assets
│   ├── fonts                     # → Theme fonts
│   ├── styles                    # → Theme styles
│   ├── scripts                   # → Theme javascript
│   └── images                    # → Theme images
├── public/                       # → Built theme assets (never edit)
├── node_modules/                 # → Folder of the required Node.js packages (never edit)
├── package.json                  # → Node.js dependencies and scripts
├── vendor/                       # → Folder of the required packages from composer [optional] (never edit)
├── composer.json                 # → Composer file with all required packages to install [optional]
├── templates/                    # → Folder for all the templates and parts of the site
├── woocommerce/                  # → Folder to change the woocommerce default templates
│   └── all woocommerce templates*
├── functions.php                 # → File to include all required files in `includes` folder and autoload from composer if required
├── header.php                    # → Theme header
├── footer.php                    # → Theme footer
├── page.php                      # → Generic page of the theme
└── front-page.php                # → Home page of the site/
```

Here we can explain in more detail the code that resides in the **includes** folder, here you can find main classes for every feature related to the theme, these may change depending on the project. The starter theme contains these standard controllers:

- `Common_Helper.php`: contains all the general helpers that can be used everywhere in the site (Frontend and Backend). For example, if you need a function to load a WooCommerce default template, that function should be declared here.
- `Custom.php`: contains all custom functions that you can’t classify in separated classes.
- `Post_Type.php`: contains all the Custom Post Type declarations for the theme.
- `Queue.php`: all the queues of scripts and styles should be here.
- `Woocommerce_Admin.php`: all the functions related to the backend of WooCommerce.
- `Woocommerce.php`: all the functions related to the frontend of WooCommerce.
- `WP_Admin.php`: all the functions related to the backend of WordPress.

If the project requires new functions that do not fit inside any of the default controllers, a new file controller must be created into the `includes` folder and included in **`functions.php`** following the file nomenclature like this:

```php
include_once(THEME_DIR.'/includes/{Controller_File}.php');
```

Be careful if your controller relies on other files, just remember to put it after.

## How to work with assets

Is very important when developing a theme to do maintainable code, this is why packing all the code in just one file (without using a compiler like Gulp or Webpack) is not acceptable. The starter theme uses **[Laravel Mix](https://laravel-mix.com/)** to compile SASS and JS so it's important to remember to compile after you edit any file related, this can be done easily if you track your changes by running `npm run watch` on the root of the theme.

All the pages in the website must have their own script and style file, let’s see the following example

We have 2 pages in our website: Home and Shop; so our file structure should look like this:

```bash
themes/your-theme-name/           # → Root of the theme
├── resources/                    # → Theme assets
│   ├── fonts                     # → Theme fonts
│   ├── styles                    # → Theme styles [sass files]
│   │   ├── components
│   │   │    └── *components styles*
│   │   ├── pages
│   │   │    ├── home.scss        # → Home styles
│   │   │    └── shop.scss        # → Shop styles
│   │   └── general.scss          # → [Optional] Theme general styles
│   ├── scripts                   # → Theme javascript
│   │   ├── components
│   │   │    └── *components javascript*
│   │   └── pages
│   │        ├── home.js          # → Home javascript
│   │        └── shop.js          # → Shop javascript
│   └── images                    # → Theme images
```

Following that structure, all the JS files should be declared as classes and initialized inside the file. Let’s see the `home.js`  and `shop.js` example.

```jsx
import $ from "jquery";

var HomePage = function(){

    // object
    var _ = this;

    // view
    _.$page = $('[data-page="home"]');

    // init
    _.init = function () {
        console.log('init home.js')
    }

    if (_.$page.length) {
        _.init();
    }

};

// Initialize the page with a custom JS selector
var pageHome = new HomePage();
```

```jsx
import $ from "jquery";

var ShopPage = function (sel) {
	// object
	var _ = this;

	// view
	_.$page = $(sel);

	// init
	this.init = function () {

  }
	// ---

	// only initialize the file if the page is loaded
	if (_.$page.length) {
		this.init();
	}
};

// Initialize the page with a custom JS selector
let pageShop = new ShopPage('.page-template-shop');
```

The use of classes inside the JS is mandatory to prevent code execution on other pages on the site, all the JS and CSS files will be compiled with **Laravel Mix** to create 4 new files used by the theme:

```bash
└── public/                       # → Theme assets
    ├── css                       # → Theme styles folder
    │   ├── frontend.css          # → Compiled frontend related styles
    │   └── admin.css             # → Compiled admin related styles
    └── js                        # → Theme javascript folder
        ├── frontend.js           # → Compiled frontend related javascript
        └── admin.js              # → Compiled frontend related javascript
```

The most important thing to remember is to keep modules/pages separated; this process should be repeated for each page and compiled after editing.

## Frontend Development

All the frontend development should be done with Bootstrap 5, the starter theme already comes with it as a node module.

## Required Plugins for the Theme

If your theme requires specific plugins to work is a good practice to code it in your theme, to do this the starter theme comes with TGM to manage plugin dependencies. You can read more about how to include plugins [here](http://tgmpluginactivation.com/configuration/). Inside the `TGM.php` controller, you can find some examples of how to include plugin dependencies.

The use of TGM is not mandatory if the WordPress setup is using [Roots/Bedrock](https://github.com/roots/bedrock), in this case, composer is recommended for plugin dependencies.

## ****Dependency management with Node.js****

****Node.js**** is the dependency management tool for JS modules, if we need to include a js module for our theme/app, you can do this in the root of the wp-starter-theme.

## ****Dependency management with Composer****

Composer is the dependency management tool by excellency for PHP, when we need to include an external library for our theme/app, you can do this in the root of the wp-starter-theme.

## WordPress Unit Testing

Unit testing is important in the development process but for WordPress, we need WordPress-specific tools to run those tests, the starter theme comes with Brain Monkey, which is a PHP agnostic Unit testing tool that comes with some WordPress-specific tools. 

Here you can read more about it and why this is important in the process: 

[https://wordpress.stackexchange.com/questions/164121/testing-hooks-callback/164138#164138](https://wordpress.stackexchange.com/questions/164121/testing-hooks-callback/164138#164138)

https://github.com/Brain-WP/BrainMonkey: Brain Monkey is a tests utility for PHP which provides tools for WordPress sites.

## Quick Tweaks

- Change investor logo and background color on the `wp-login.php` page: just go to `theme-name/resources/styles/admin/wp-login.scss` and edit the CSS as you need.

## WordPress Development Resources

Below is a WordPress resource list to keep in mind for planning your project. Isn’t mandatory to use any of them but is good to know what tools are out there.

### Plugins

- [WP Rocket](https://wp-rocket.me/): the best cache plugin.
- [Advanced Custom Fields](https://wordpress.org/plugins/advanced-custom-fields/): create custom fields and page settings easily.
- [Advanced Cron Manager](https://es.wordpress.org/plugins/advanced-cron-manager/): View, pause, delete, edit and add WP Cron events.
- [Yoast SEO](https://wordpress.org/plugins/wordpress-seo/): Manage SEO.
- [Query Monitor](https://wordpress.org/plugins/query-monitor/): Developer tools to debug your Theme/Plugin.

### Other Theme Starters

- [Underscore](https://underscores.me/): Basic starter theme with a recommended structure to start a theme.
- [Understrap](https://understrap.com/): Starter theme with bootstrap 4. Good option to create a theme as a child using the parent Bootstrap styles.
- [Sage](https://github.com/roots/sage): an outstanding option to start a WP theme from scratch with modern development flow.

### Theme Tools

- [TGM](http://tgmpluginactivation.com/configuration/): Manage plugin dependencies for themes and plugins.
- [Laravel Mix](https://laravel-mix.com/): An elegant wrapper around Webpack

### Environments Tools

- [Roots/Bedrock](https://docs.roots.io/bedrock/master/installation/#what-is-bedrock): WordPress boilerplate with a modern file structure.

### Server Tools

- **Webmin**: a free server stack and GUI for ubuntu that helps you manage everything from domains, web engines(nginx or apache) and comes with PHP.
