=== Formataway ===
Contributors: bilalakil
Tags: hide, post format
Requires at least: 3.9
Tested up to: 4.3
Stable tag: 1.1.3
License: GPLv2 or later

Formataway lets you exclude selected post formats from your post index page's
main query.

== Description ==

I was creating link posts on http://www.bilalakil.me's Twenty Fourteen happily
until I was nonplussed by the doppelgängers revealed when I added the theme's
also-impressive Euphoria widget to the mix - to display links.

To solve this problem I decided to exclude posts with the link post format from
the post index page's main query, and thus this plugin was born.

The plugin's settings sit neatly on the Settings > Reading page.

You can find this plugin at https://github.com/bilalakil/formataway!

== Screenshots ==

1. All you'll see in the backend from this plugin. Other than the funky name,
   you wouldn't even be able to tell it apart from the WordPress core.

== Changelog ==

= 1.1.2 =
* WordPress v4.2.2 tested and supported!
* Fixed a bug causing a PHP notification when no formats were selected.
* Cleaned up the code a bit (neater spaces and uniform tabs).

= 1.1.0 =
* WordPress v4.0 tested and supported!
* We now append our taxonomy constraint to the list of all other constraints
  instead of simply overriding it. (I knew that was bad at the time, but didn't
  know how to get around it until a friendly person enlightened me:
  http://wordpress.stackexchange.com/questions/155946/#155949).

= 1.0.0 =
* First release, allowing you to specificy what to formataway from the
  Settings > Reading admin screen.
