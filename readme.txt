=== Nuovo Wordpress Theme ===
Contributers: Jacob Martella
Tags: black, blue, green, orange, purple, red, yellow, dark, two-columns, right-sidebar, responsive-layout, custom-background, custom-header, custom-menus, featured-images, theme-options
Requires at least: 3.9.1
Tested up to: 3.3
Stable tag: 0.1

== Description ==
With today's technology, being able to have a website that looks good across desktop, tablet and mobile devices. Nuovo allows you to have just that with minimal work on your part. This theme is design to give your views a great experience no matter what device they use to access the internet. It also allows you to display your social media links as well as display your own customizable Twitter feed in the sidebar. Finally, this theme is designed with photos in mind, maximizing the use of the featured photos. It is recommended that you try to use a featured photo for each of your posts. Finally, the theme allows easy customization with a theme options page that allows you to change the color theme, add links to you social media pages and to customize how your homepage looks. It also includes a user style sheets that overrides all of the other style sheets from the theme editor screen in the Wordpress admin.

= License =
GNU General Public License
http://www.gnu.org/licenses/gpl-2.0.html

== Installation ==
= Via WordPress Admin =
1. From your sites admin, go to Themes > Install Themes
2. In the search box, type 'Nuovo' and press enter
3. Locate the entry for 'Nuovo' (there should be only one) and click the 'Install' link
4. When installation is finished, click the 'Activate' link

= Manual Install =
1. Unzip this file.
2. Using an FTP client (I recommend FireZilla), upload the 'nuovo' file to your Wordpress theme folder. Make sure the file you upload simply says 'Nuovo' with no numbers after it. Otherwise, it won't work.
3. Go into your Wordpress Admin, navigate to 'Appearance > Themes'
4. Find the Nuovo listing on this page and click 'Activate'

== Features/How To ==

= Twitter Widget =
In order for the Twitter widget to work, you will need to enter your Twitter name and Twitter handle as well as four Twitter API developer keys in the theme options page. The four keys can be found on the Twitter API Developer page (https://apps.twitter.com/ or click the link on the options page) by creating a new "app". After creating the app, you'll have two of the four keys (API Key and API Secret). You'll then have to create an access token and from that enter the access token and access token secret into the theme options. After that, add the "Nuovo Twitter Widget" to the sidebar and enter how many Twitter posts you want to display. Note: You can only have one Twitter widget running on your site.

= User Stylesheet =
The User stylesheet might be the easiest feature in the theme. Just like any old stylesheet, all you need to do is type in the id or class and type the attributes you want to change. Everything put in there will override the other style sheets.

= Homepage Setup =
Setting up the homepage may look daunting, but it's not that bad. All you really need to do is define a category for the first three category post areas as well as how many posts per category area. It's recommended to have the posts per area a multiple of three so each row is full. You don't have to necessarily pick a category for the featured post slider; however, I recommend creating either a "featured" or "top stories" category to display the posts you want everyone to see. Also, you don't have to display a fourth category area or the latest posts, but if you do, make sure to define how many of each you wish to display.

= Featured Photos =
Nuovo has a lot of support for featured photos. The requested size for all featured photos is 630 pixels by 315 pixels, or a 2:1 ratio.

= Photos =
To look good in the mobile version, it's recommended to keep any photos in your posts to a maximum width of 280 pixels.

= Menus =
Nuovo comes with up to two customizable menus. The primary menu is the one listed as "Main Menu" and should be the first one used. If you need or want to use the secondary menu, "Top Menu", check that box off in the theme options and register that menu the way you would any other menu on the Menu page in the Wordpress admin. 

= Header =
Nuovo supports custom headers the size of 530px by 150px. To upload your header, go to the header page of the Wordpress admin.

= Background =
Nuovo also supports custom backgrounds as well. It can either be a photo background or color background. To upload or change the background, go to the header page of the Wordpress admin. Currently, backgrounds won't "scroll" with the page in the tablet or mobile versions.

= Favicon =
Currently, to have your own favicon, you'll have to do it manually. First, upload a 16px by 16px .ico image to either the images folder in the them folder via an FTP client or using the media uploader provided by Wordpress (recommended). Copy the URL to the image and edit the header.php file (the one with just header.php beneath it) and find the line that reads "<link rel="icon" href="/nuovo/demo/wp-content/themes/nuovo/images/nuovologo.ico">" and replace the href part with the URL to your photo.

== Changelog ==

= RC 1 =
A bit of an initial release for others to test and debug the theme. Will be erased once version 1.0 is released.
