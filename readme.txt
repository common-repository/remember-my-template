=== Remember My Template ===
Contributors: stephenharris
Donate link: http://www.stephenharris.info
Requires at least: 3.4
Tested up to: 3.5.2
Stable tag: 0.1
License: GPLv3

Remembers the template that was selected when the theme was last used

== Description ==

**This plug-in requires 3.4+**

WordPress only stores the page template for the theme which was activated when the page was last saved. Effectively, if you switch back and forth between themes WordPress forgets which template it is suppose to use for any particular page. This is problematic if you are showcasing a plug-in and wish to allow the end user to switch between a selection of thems (via [Theme Switcher](http://wordpress.org/plugins/theme-switcher/), for example), and don't want the page templates being reset to 'default'.

This plug-in resolves that problem. Whenever you save a page, the plug-in stores the theme-template pair. If you switch themes and save the page, it also stores that theme-template pair too. On switching between the two themes the appropriate template is 'remembered'.

Obviously for the plug-in to work you'll need to save the appropriate template for the page for each theme you'll be switching between. Currently, this includes the *current theme*.

This plug-in doesn't add any settings - it just works silently in the background, doing its thing.
