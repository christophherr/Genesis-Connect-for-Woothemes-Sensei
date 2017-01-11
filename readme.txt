=== Genesis Connect for Woothemes Sensei ===

Contributors: christophherr
Donate link: https://www.christophherr.com/donate/
Tags: woothemes sensei, woothemes, genesis, genesis connect, studiopress
Requires at least: 4.1
Tested up to: 4.7.1
Stable tag: 1.1.0
License: GPL-2.0+
License URI: http://www.gnu.org/licenses/gpl-2.0.txt

This plugin integrates the Genesis Framework from Studiopress with the Woothemes Sensei plugin.

== Description ==

The base for this plugin is code taken from [WooThemes Support](https://support.woothemes.com/hc/en-us/articles/204428855-StudioPress-Genesis).

You will need the [WooThemes Sensei](https://woocommerce.com/products/sensei/) plugin and the [Genesis Framework from Studiopress](https://www.studiopress.com) and/or one of its child themes.

In other words, if you are not trying to integrate the Woothemes Sensei plugin with the Genesis Framework and/or one of its child themes, this plugin is pretty much useless for you...

This plugin will only work (i.e. activate) if the Genesis Framework and its child themes and Woothemes Sensei are activated.

Version 1.1.0 forces a content-sidebar layout on course, lesson and question posts to avoid the sidebar showing underneath the main content.

To change this new feature, you have to use a remove_action on the code the plugin is adding.
Add <code>remove_action( 'genesis_meta', 'gcfws_force_content_sidebar_layout' );</code> to your functions.php.
If you want to use a different layout, the [Studiopress Snippets](https://my.studiopress.com/snippets/admin-management/) should help to get you started.  

== Installation ==

1. Upload the entire `Genesis-Connect-for-Woothemes-Sensei` folder to your `/wp-content/plugins` directory.
2. Activate the plugin through the 'Plugins' menu in WordPress.

Alternatively, you can

1. Click on 'Add new' in the 'Plugins' menu
2. Type (or copy and paste) the name of this plugin into the search box
3. Click on 'Install Now'

== Frequently Asked Questions ==

= Does this work with any WordPress theme? =

No. This plugin only works with the Genesis Framework and its child themes.

= Does this work with any Genesis child theme? =

Yes and no. Technically, it does.
However, depending on other factors such as the individual theme's styling and layout, the output may be unexpected, and require some tweaking.
Case in point, if the full-width layout is selected in the Genesis settings, lessons, course and question posts are showing a sidebar underneath the main content.
That´s why a content-sidebar layout is forced on single course, lesson and questions posts since version 1.1.0.
To remove this behaviour, add <code>remove_action( 'genesis_meta', 'gcfws_force_content_sidebar_layout' );</code> to your functions.php.

= Are there any settings? =

No. You simply activate the plugin and the necessary wrappers are inserted into your Genesis child theme.

= How can I change how the plugin works? =

There are no settings and no settings screen. You would have to change the code directly in the source.

== Changelog ==

= 1.1.0 =

* Adds check to only activate if Woothemes Sensei is already active.
* Forces a content-sidebar layout on single course, lesson and question posts. 
  To change this behaviour add <code>remove_action( 'genesis_meta', 'gcfws_force_content_sidebar_layout' );</code> to your functions.php.
* After Woothemes Sensei changed their code base dramatically in the 1.9 update, 
  the previous method of removing the sensei wrappers started to throw error messages.
  This update introduces a version check to use the appropriate array for removing the sensei wrappers.
  

= 1.0.3 =

* Corrected oversight in the original code. First closing tag should be `</main>` instead of `</div>`
see: [Cobalt Apps Forum] (http://cobaltapps.com/forum/forum/main-category/main-forum/81542-woo-sensei?p=82210#post82210)

= 1.0.2 =

* POT file added

= 1.0.1 =

* Loading textdomain for i18n

= 1.0 =

* Initial release on Github

== Upgrade Notice ==

= 1.1.0 = 
This version adds a version check for Woothemes Sensei to use the appropriate array when removing the standard Sensei wrappers.
Version 1.1.0 also forces a content-sidebar layout on single course, lesson and question posts to avoid the sidebar showing underneath the main content. 
Please refer to the readme.txt if you want to remove this feature.
Woothemes Sensei has to be already active before the plugin will activate.

= 1.0.3 =

This version corrects an oversight in the original code
that caused issues with Cobalt Apps' Dynamik theme.

= 1.0.2 =

This version adds a POT file for translations.

= 1.0.1 =

This version loads the textdomain to enable translations.
