=== Genesis Connect for Woothemes Sensei ===

Contributors: christophherr
Donate link: https://www.christophherr.com/donate/
Tags: automattic sensei, sensei, genesis, genesis connect, studiopress, woocommerce sensei
Requires at least: 4.8
Tested up to: 5.0
Stable tag: 1.2.0
License: GPL-2.0+
License URI: http://www.gnu.org/licenses/gpl-2.0.txt

This plugin integrates the Genesis Framework from StudioPress with the Sensei plugin.

== Description ==
The plugin expands on the [Sensei Documentation](https://docs.woocommerce.com/document/sensei-and-theme-compatibility/) about adding theme compatibility.

You will need the [Sensei](https://woocommerce.com/products/sensei/) plugin and the [Genesis Framework from StudioPress](https://www.studiopress.com) and/or one of its child themes.

In other words, if you are not trying to integrate the Sensei plugin with the Genesis Framework and/or one of its child themes, you don't need or want this plugin.

This plugin will only work (i.e. activate) if the Genesis Framework and its child themes are activated.

Version 1.1.0 forces a content-sidebar layout on course, lesson and question posts to avoid the sidebar showing underneath the main content.

Version 1.2.0 adds the Genesis Layout options to course, lesson and question posts and archives and the module taxonomy allowing better control about the layout options.
For backwards compatibility, the single posts are still set to a content-sidebar layout but this can be overwritten by the Genesis Layout options.

It should not be necessary to remove the formerly forced content-sidebar layout on single posts with

<code>remove_action( 'genesis_meta', 'gcfws_force_content_sidebar_layout_on_cpt_posts' );</code>

in your functions.php anymore. Please use the Genesis Layout options instead.

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

Version 1.1.0 forced a content-sidebar layout on single course, lesson and questions.
Since Version 1.2.0 the Genesis Layout options can be used to alter the appearance.

= Are there any settings? =

You simply activate the plugin and the necessary wrappers are inserted into your Genesis child theme.

Since version 1.2.0, you can choose the layouts of your courses, lessons, questions and modules with the Genesis Layout options.

= How can I change how the plugin works? =

There are no settings and no settings screen. You would have to change the code directly in the source.

== Changelog ==

= 1.2.0 =

* Adds Genesis Layout options to course, lesson, and question posts and archives and the module taxonomy.
* Previously forced content-sidebar layout can be overwritten by the Genesis Layout options.
* Updates Readme.
* More modular code structure.

= 1.1.1 =

* Better Code Standards.
* Removes unnecessary code.
* Updates Readme Urls.

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

= 1.2.0 =

This version adds the Genesis Layout options to course, lesson and question posts and archives and the module taxonomy.
Please refer to the readme.txt for more information.

= 1.1.1 =

This version removes unnecessary code, follows WordPress Coding Standards better and updates links in the Readme.

= 1.1.0 =

This version adds a version check for Woothemes Sensei to use the appropriate array when removing the standard Sensei wrappers.
Version 1.1.0 also forces a content-sidebar layout on single course, lesston and question posts to avoid the sidebar showing underneath the main content.
Please refer to the readme.txt if you want to remove this feature.
Woothemes Sensei has to be already active before the plugin will activate.

= 1.0.3 =

This version corrects an oversight in the original code
that caused issues with Cobalt Apps' Dynamik theme.

= 1.0.2 =

This version adds a POT file for translations.

= 1.0.1 =

This version loads the textdomain to enable translations.
