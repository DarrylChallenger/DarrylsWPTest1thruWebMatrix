kanagata
====================

kanagata WordPress Theme, Copyright 2015 Hiroshi Sawai
kanagata is distributed under the terms of the GNU GPL

the graphics bundled with this theme are created by the theme author and licensed under the GNU GPL.

This program is free software: you can redistribute it and/or modify
it under the terms of the GNU General Public License as published by
the Free Software Foundation, either version 3 of the License, or
(at your option) any later version.

kanagata WordPress Theme incorporates code from Twenty Fourteen WordPress Theme.
License: GNU General Public License v2 or later
License URI: http://www.gnu.org/licenses/gpl-2.0.html

kanagata WordPress Theme incorporates code from Twenty Fifteen WordPress Theme.
License: GPLv2 or later
License URI: http://www.gnu.org/licenses/gpl-2.0.html
Fred WordPress Theme is distributed under the terms of the GNU GPL


third-party resource
====================

kanagata WordPress Theme bundles the following third-party resources:

Bootstrap
--------------------

Bootstrap v3.3.4 (http://getbootstrap.com)
Copyright 2011-2015 Twitter, Inc.
Licensed under MIT (https://github.com/twbs/bootstrap/blob/master/LICENSE)

Font Awesome
--------------------

Font Awesome 4.3.0 by @davegandy - http://fontawesome.io - @fontawesome
License - http://fontawesome.io/license (Font: SIL OFL 1.1, CSS: MIT License)

html5shiv
--------------------

HTML5 Shiv 3.7.3-pre | @afarkas @jdalton @jon_neal @rem | MIT/GPL2 Licensed

bxSlider 4.1.2
--------------------

[jQuery Content Slider | Responsive jQuery Slider | bxSlider](http://bxslider.com)  
License Released under the MIT license - http://opensource.org/licenses/MIT

Lightbox v2.8.1
--------------------

[Lightbox](http://lokeshdhakar.com/projects/lightbox2/)  
The MIT License (MIT)  
Copyright (c) 2015 Lokesh Dhakar


kanagata customize
====================

In addition to the default WordPress functions, this theme is able to customization in the following two way.

1. Appearance > Customize
2. Appearance > Theme Options

### 1. Appearance > Customize

* Site title color  
  Site title color setting  apply to site tile text.
* Logo image  
  You  Can upload logo image. 
* Header right area  
  You can display text, link, image to right area of header. 
* Footer  
  You can customize the following functions.  
    + footer background color
    + copy right
    + align of Footer Menu that can be set at Appearance > Menu

### Appearance > Theme Options

* Sidebar Layout  
  Select sidebar position that is applied to All page.
* Sidebar color
* Specific category list for displaying top page
* Display regular latest post  
  Select whether top page displays regular latest post when specific category list is set.


change log
====================

### Version  1.2.2  

  2015-05-30
  
kanagata first version.  
1.2.2 is first version of kanagata.
  
### Version: 1.2.3

	2015-06-20

I only change two point.

  1. I add translation files ja.po, ja.mo to languages directory.  
  ja.po and ja.mo is Japanese translation file.
  2. I remove language/tmp directory. I forgot to remove this directory at the last time. 
  
### Version 1.2.4

	2015-06-28

I modify php notation from short syntacx array [ to array

  1. functions.php 174
  2. int/kanagata-options-edit.php 179
  
I appreciate the user who pointed out above.


### Version 1.3

This version is major version up. Because of

1. several style is changed(Markup is not changed).
2. Add to customize setting

For compatibility with previous versions, User can select StyleSheet Version at Appearance > Customize.
For compatibility width previous version, User can do several settings at Both Customize And Theme Options.

#### StyleSheet main changes from version 1.2.4

* global menu  
	+ height  
	  form 48px to 40px.
 	+ dropdown list background color at mouse over  
	  form white to light gray.
* extra menu  
	+ height  
	  from 36px to 30px.
	+ dropdown 3rd list position  
	  form right to left.
	* arrow position and direction of sign having sub menu  
	  form right position to left position.  
	  form right direction to left direction.
* side menu  
	+ font size  
	from 16px to 14px.
* heading  
  	* single, archives, page heading  
		- font size  
		  from 24px to 20px.
	* post heading of archives
		- font size  
		  from 30px to 24px.

#### Additional setting in Apperence > Customize

##### Migratetion

Theme Options all settings move to Customizea.
Those settings can set both Customizer and Theme Options.
Theme Option leaves for compatibility.

* Sidebar layout
* Background Color > Sidebar
* Specific category list for displaying top page
  Theme Options following settings is [Specific category list for displaying top page] section in Customize.
	+ Specific category list for displaying top page
	+ Display regular latest post

##### New Customize settings

Add following settings.

* StyleSheet Version
* Site link color
* Link Underline
* Background color

### Version 1.3.1

1.3.0 output custom-style when User selects default color in Customize.
1.3.1 only output custom-style when User choose a non-default value.


### Version 1.3.2

This Update is only bug fix of 1.3.1.

When does not uses color setting in Customize, Invalid style is output to custom-style.
For example, link color at Site Link Color section in Customize has not been used, the following style is output.
 
   a {color:;}

This update is that does not output style to custom-style When does not uses color setting in Customize.

I change following file.

* inc/kanagata-customize-functions.php
* style.css (only change Version: 1.3.1 to Version 1.3.2)
* readme.txt(add 1.3.2 to change log)

### Version 1.3.3

I fix children list of global menu.

When click children list, not display to Linked page and children List is fade out.
( JavaScript is wrong. )

It has been modified to correctly display to Linked page. 

I change following file.

* js/kanagata_toggle_menu.js
* style.css (only change Version: 1.3.2 to Version 1.3.3)
* readme.txt(add 1.3.3 to change log)

### Version 1.3.4

I modify children list of global menu.
Version 1.3.3 modified Javascript is wrong too.
I has been fix in 1.3.4

I change following file.

* js/kanagata_toggle_menu.js
* style.css (only change Version: 1.3.3 to Version 1.3.4)
* readme.txt(add 1.3.4 to change log)

### Version 1.3.5

Comment in kanagata_toggle_menu.js was described in Japanese.
I has been remove japanese comment.

* js/kanagata_toggle_menu.js
* style.css (only change Version: 1.3.4 to Version 1.3.5)
* readme.txt(add 1.3.5 to change log)

### Version 1.3.6

I forgot to remove unnecessary file in languages folder.
I have removed unnecessary file.

### Version 1.4.0

This version is major version up. 
I have do several change.

+ fix bug 
+ add function to customize.
+ organize customize item.
+ change Theme URI in style.css.

#### Bug fix

custom-header width changes from 1170 to 1140 at kanagata-init.php.

#### New function

1. Customize > Logo image section.
  I have add "Display Site Title" setting.
  When user sets logo image, user can choose whether to display site title.
2. Customize > Slide Header Image
  I have slide header image. 
  If user choose Yes, slide header image(Use jquery.bxslider)
3. Customize > Size
  I have add font size setting.
4. Add Lightbox
5. Customize > Select to display post meta.
  I have add whether or not to display post meta in archive.php and single.php.
  
#### Organize customize item

I have use default section as much as possible.
I have moved custom background color to default section colors.

#### Theme URI

I want to change Theme URI in style.css

Before http://www.findxfine.com/kanagata-2/995560376.html
After http://www.info-town.jp/kanagata


### Version 1.4.1

#### Bug fix

I have fixed breadcrumbs in header.php.

kanagata assumes that breadcrumbs user Breadcrumb NavXT plugin.

Now If user does not use plugin Breadcrumb NavXT then display empty div element.
It has improved to not display empty dive element.

#### New function

I add setting to Customize > Size section.

* I have add h4 - h6 font size to Size setting.
* I have add h1 - h6 margin size to Size setting.

### Version 1.4.2

I have fixed left sidebar layout when browse in the mobile device.
When brows in mobile device, sidebar is placed under main content. 

I have fixed $content_width from 848 to 718 in functions.php

### Version 1.4.3

I have improved security. kanagata has enhanced safety.

### Version 1.4.4

I have improve layout when browse in the mobile deveice from 1.4.2.
I have improve code to fit WordPress coding style.

### Version 1.4.5

I have remove function. It is not appropriate as a theme.

### Version 1.4.6

I have fixed sidebar widget and I have improve custom header. 

* Fixed sidebar widget.
* Remove default image at custom header.
  It is displayed only when the user sets a custom header image. 
  Remain default.jpg file in images.


