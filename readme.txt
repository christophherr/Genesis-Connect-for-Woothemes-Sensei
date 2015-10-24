=== Genesis Connect for Woothemes Sensei ===

Contributors: christophherr
Donate link: https://www.christophherr.com/donate/
Tags: woothemes sensei, woothemes, genesis, genesis connect, studiopress
Requires at least: 4.1
Tested up to: 4.4
Stable tag: 1.0.3
License: GPL-2.0+
License URI: http://www.gnu.org/licenses/gpl-2.0.txt

This plugin integrates the Genesis Framework from Studiopress with the Woothemes Sensei plugin.

== Description ==

This plugin uses code taken from https://support.woothemes.com/hc/en-us/articles/204428855-StudioPress-Genesis.

You will need the Woothemes Sensei plugin (http://www.woothemes.com/products/sensei/) 
and the Genesis Framework and/or one of its child themes (http://www.studiopress.com).

In other words, if you are not trying to integrate the Woothemes Sensei plugin with the Genesis Framework 
and/or one of its child themes, this plugin is pretty much useless for you...

This plugin will only work (i.e. activate) with the Genesis Framework and its child themes.

== Installation ==

1. Upload the entire `Genesis-Connect-for-Woothemes-Sensei` folder to your `/wp-content/plugins` directory.
2. Activate the plugin through the 'Plugins' menu in WordPress.

Alternatively, you can

1. Click on 'Add new" in the 'Plugins' menu
2. Type (or copy and paste) the name of this plugin into the search box
3. Click on 'Install Now'

== Frequently Asked Questions ==

= Does this work with any WordPress theme? =

No. This plugin only works with the Genesis Framework and its child themes.

= Does this work with any Genesis child theme? =

Yes and no. Technically, it does, even older (XHTML) themes. However, depending on other factors such as the individual theme's styling and layout, the output may be unexpected, and require some tweaking.

= Are there any settings? =

No. You simply activate the plugin and the necessary wrappers are inserted into your Genesis child theme.

= How can I change how the plugin works? =

There are no settings and no settings screen. You would have to change the code directly in the source 

== Changelog ==

= 1.0.3 =

* Corrected oversight in original code. First closing tag should be `</main>` instead of `</div>`
see: http://cobaltapps.com/forum/forum/main-category/main-forum/81542-woo-sensei?p=82210#post82210

= 1.0.2 =

* POT file added

= 1.0.1 =

* Loading textdomain for i18n

= 1.0 =

* Initial release on Github

== Upgrade Notice ==

= 1.0.3 =

This version corrects an oversight in the original code
that caused issues with Cobalt Apps' Dynamik theme.

= 1.0.2 =

This version adds a POT file for translations.

= 1.0.1 =

This version loads the textdomain to enable translations.
