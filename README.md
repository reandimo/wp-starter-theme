<p align="center">
  <a href="https://nativo.team/">
    <img alt="Logo" src="https://nativo.team/wp-content/themes/nativo-web/images/logo-sm.png" height="40">
  </a>
</p>
 
<p align="center">
  <strong>WordPress starter theme for Nativo Team projects</strong>
</p> 

## Requirements

Make sure all dependencies have been installed before moving on:

- [WordPress](https://wordpress.org/) >= 5.9
- [PHP](https://secure.php.net/manual/en/install.php) >= 7.4.0
- [Composer](https://getcomposer.org/download/)
- [Node.js](http://nodejs.org/) >= 16

## Setup

Run the following command on the root of the theme [Ex. /wordpress/wp-content/themes/your-theme-name or /app/themes/your-theme-name for [Bedrock](https://docs.roots.io/bedrock/master/installation/#what-is-bedrock)]

1. Run composer install command:
```sh 
composer install
```

2. Run npm install command:
```sh 
npm install
```

3. Activate Webpack Watch to track changes on the scripts/styles files and compile.

```sh 
npm run watch
```

## File Structure

Nativo starter theme comes with the following file structure:

```sh

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
└── front-page.php                # → Home page of the site
```

Here we can explain with more details the code that resides on the **includes** folder, here you can find main classes for every feature related to the theme, these may change depending on the project. The starter theme contains this standard controllers:

- `Common_Helper.php`: contains all the general helpers that can be used everywhere in the site (Frontend and Backend). For example, if you need a function to load the Woocommerce default template, that function should be declared here.
- `Custom.php`: contains all custom functions that you can’t classify in separated classes.
- `Post_Type.php`: contains all the Custom Post Type declarations for the theme.
- `Queue.php`: all the queues of scripts and styles should be here.
- `Woocommerce_Admin.php`: all the functions related to the backend of Woocommerce.
- `Woocommerce.php`: all the functions related to the frontend of Woocommerce.
- `WP_Admin.php`: all the functions related to the backend of Wordpress.

If the project requires new functions that do not fit inside any of the default controllers, a new file controller must be created into the `includes` folder and included in **`functions.php`** following the file nomenclature like this:

```php
include_once(THEME_DIR.'/includes/{Controller_File}.php');
```

Be careful if your controller relies on other files, just remember to put it after.

## How to work with assets

Is very important when developiong a theme to do maintainable code, this is why packing all the code in just one file (without using a compiler like Gulp or Webpack) is not acceptable. The starter theme uses **Laravel Mix** to compile SASS and JS so it's important to remember compile after you edit any file related, this can be done easily if you track your changes running `npm run watch` on the root of the theme.

All the pages in the website must have their own script and style file, let’s see the following example:

We have 2 pages in our website: Home and Shop; so our file structure should looks like:

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
// ---
// Home
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
// ---
// Shop
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

The use of classes inside the JS is mandatory to prevent code execution on other pages in the site, all the JS and CSS files will be compiled with **Laravel Mix** to create 4 new files used by the theme:

```bash
themes/your-theme-name/           # → Root of the theme
└── public/                       # → Theme assets
    ├── css                       # → Theme styles folder
    │   ├── frontend.css          # → Compiled frontend related styles
    │   └── admin.css             # → Compiled admin related styles
    └── js                        # → Theme javascript folder
        ├── frontend.js           # → Compiled frontend related javascript
        └── admin.js              # → Compiled frontend related javascript
```

The most important thing to keep in mind is to keep modules/pages separated and this process should be repeated for each page and compiled after edit.

## The Enqueue of Assets

The starter theme comes with the controller `Queue.php` to enqueue all script and styles of the theme, in this process we must include the scripts only where are needed. For example we have our shop.js that should be only included on the shop page, for this we can do the following login inside our frontend enqueue:

```jsx
if(is_shop()){
    wp_enqueue_script('shop', get_stylesheet_directory_uri() . "/assets/pages/js/shop.js", array('jquery'));
}
```

Of course, sometimes we have scripts that should be executed on all pages, for these cases we can just skip the login and just queue the script in the controller.