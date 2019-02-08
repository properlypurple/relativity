=== Relativity WordPress Theme ===

Contributors: automattic

Tags: translation-ready, custom-background, custom-menu, post-formats, threaded-comments, custom-logo
Requires at least: 4.8
Tested up to: 5.0.3
Stable tag: 2.1
License: GPLv2 or later
License URI: http://www.gnu.org/licenses/gpl-2.0.html

== Demo ==

For a demo of this theme in action, go [here](http://demo.magikpress.com/relativity/)

== Installation ==

1. In your admin panel, go to Appearance > Themes and click the Add New button.
2. Search for 'Relativity'. Click Install.
3. Click Activate to use your new theme right away.

== Frequently Asked Questions ==

= Does this theme support any plugins? =
Relativity includes support for Infinite Scroll, content options, and social menu in Jetpack. It also supports all default Gutenberg blocks

= How to set the circular image in the header? =
It will pull in the admin's gravatar by default. For a custom image, go to customizer and add a custom logo under 'Site Identity'.

= I set a custom logo, and it's not round anymore.
That's intentional, because you might want a different shaped logo. If your image is square, add this css code.
    .custom-logo { 
        border-radius: 50%; 
    }

= I don't want your link in my footer/I want my own copyright information =
That's okay. I don't have a way of changing this in settings, but you can use some css code like this:
    .author-credit {
        font-size: 0;
    }

    .author-credit::after {
        content: "© 2019 YourAwesomeName";
        font-size: 0.875rem;
    }

== Changelog ==

= 2.1 - Feb 2019 =
* Tested with WordPress 5.0+
* Editor styles, yay!
* Removed code supporting older Gutenberg versions
* Fixed some styling issues for the new WordPress editor blocks
* Added in custom colours for the new WordPress editor
* Better readme
* Added new theme support tags
* Updated all links to https
* Updated screenshot, upped kitty quotient
* General cleanup

= 2.0 - Jan 26 2018 =
* Fixed bugs with footer widgets, added two widget areas in Footer
* Added support for more Jetpack features, social menu, content options, author bio.
* Added support for Gutenberg blocks
* Improved styling of posts, footer, header elements.
* Added support for custom logo, moved header image to provide background of header area
* Small bugfixes with display of elements in places.

= 1.1.5 - Dec 17 2015 =
* Fixed annoying transition bugs on Webkit and Blink based browsers

= 1.1.4 - Dec 16 2015 =
* Use travis for automated testing
* Fixed minor annoying bugs

= 1.1.0 - Dec 13 2015 =
* Added option for colour schemes
* Fixed a lot of issues with WordPress coding standards
* Added a widget area in footer ( for social icons and stuff )
* Better styles for some post formats
* Better use of whitespace
* Heavily improved display of featured images
* Various tweaks and fixes

= 1.0.5 - Nov 20 2015 =
* Major design update
* Better code

= 1.0.1 - Jul 15 2015 =
* Fixed default header image not appearing
* Removed extraneous tags
* Updated screenshot
* Fixed bitesized bugs

= 1.0 - Jun 30 2015 ==
* Initial release


== Credits ==

* Based on Underscores http://underscores.me/, (C) 2012-2015 Automattic, Inc., [GPLv2 or later](https://www.gnu.org/licenses/gpl-2.0.html)
* normalize.css http://necolas.github.io/normalize.css/, (C) 2012-2015 Nicolas Gallagher and Jonathan Neal, [MIT](http://opensource.org/licenses/MIT)
* Image in demo under CC0 https://pixabay.com/en/typewriter-retro-vintage-old-498204/
* Cat image in screenshot under CC-by http://flickr.com/photos/titrans/, (C) Quatre Mains
