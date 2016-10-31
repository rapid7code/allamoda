=== Quick Featured Images Pro ===
Contributors: Hinjiriyo
Tags: add, assign, associate, attach, attachment, attachments, audio, audios, author, auto, automatic, batch, bulk, categories, category, change, column, control, custom post type, custom post types, custom taxonomies, custom taxonomy, date, dates, default, define, delete, detach, exchange, featured, featured image, featured images, filter, gallery, galleries, image, image size, images, mass, media, mime, multimedia, nextgen, pages, parent page, period, post type, post types, posts, quick, random, rapid, remove, replace, rules, search, set, standard, tag, taxonomies, taxonomy, thumb, thumbnail, thumbnails, thumbs, time, unset, update, user, video, videos
Requires at least: 3.8
Tested up to: 4.2.2
Stable tag: 3.3
License: Commercial Software Licence
License URI: http://www.quickfeaturedimages.com/terms-licence-withdrawal/

Your time-saving Swiss Army Knife for featured images: Set, replace and delete them in bulk, set default images, get overview lists.

== Description ==

= Manage featured images quickly =

The plugin 'Quick Featured Images Pro' helps you bulk managing featured images, setting automatic default featured images to save your time. 

1. It **sets, replaces and removes featured images for hundreds of posts, pages, audios, videos and custom post types in one go**. You can run it over all contens or let it work only to desired contents by using flexible filters.
2. It displays assigned features images in an **additional sortable image column in lists of posts, pages and custom post types** if they support thumbnails. So you get a quick overview about used thumbnails of all posts and pages.
3. It enables you to **define presets for automatic default featured images** for future posts as many as you need. You can set **accurate rules based on post properties**.

See comments under [Reviews](http://www.quickfeaturedimages.com/reviews/).

= Access =

1. You will find the plugin under the own **menu item 'Featured Images'** 
2. You can select an image in the media library with the **action link 'Bulk set as featured image'**. Click on it and you can go on with the plugin.

= Set, replace, remove: Actions =

With Quick Featured Images Pro you can apply time-saving tasks with many featured images: add, exchange and delete them in bulk.

1. **Adding featured images:** You can select an image, or scan for the first post image, or for the first image of WordPress standard galleries, or of NextGen galleries, to set it as the new featured image to hundreds of posts in one go. You can select multiple images to set them randomly as featured images.
2. **Exchanging featured images:** You can replace or update several existing featured images with a selected image in one go.
3. **Deleting featured images:** You can remove a selected featured image or all existing featured images in one go.

= Set, replace, remove: Options =

Based on your selected action you can toggle on and off some options:

1. **overwrite existing featured images** or **keeping them unchanged**. The latter setting is the default.
2. **consider only posts without a featured image**. This will hide posts with featured images in the results list and will speed up the process.
3. **remove first image in the content** after it was set as featured image.

If you want to catch the first image of a post you can switch between:

1. **the first post image** if available in the media library
2. **the first post image from the current site domain**, copy and add it to the media library if not available there
3. **the first external post image**, download it and add it to the media library
4. **the first attached image of a post**
5. **the first image of a WordPress standard gallery**
6. **the first image of a NextGen Gallery**.

If you selected multiple images to set them as featured images in random order you can add these options:

1. **Use each selected image only once**. If there are more posts than selected images the remaining posts will not be changed.
2. **Remove excess featured images** after all selected images are used.

= Set, replace, remove: Filters =

If there would be no filters Quick Featured Images Pro would affect all posts and pages without exception! In most cases this is not desired. 

The implemented filters allow you to narrow down the action to only the posts and pages you want to modify. The built-in filters are:

1. Filter by **post type**: Search by post types. By **default all** posts, pages and custom post types will be affected
2. Filter by **multimedia type**: Search for audio and video files
3. Filter by **status**: Search by several statuses (published, draft, private etc.). By **default all** statuses will be affected
4. Filter by **search**: Search by search term
5. Filter by **time**: Search by time specifications
6. Filter by **author**: Search by author
7. Filter by **custom taxonomy**: Search by terms of registered taxonomies of a plugin or a theme
8. Filter by **featured image size**: Search for small featured images below a given size
9. Filter by **category**: Search posts by category
10. Filter by **tag**: Search posts by tag
11. Filter by **parent page**: Search child pages by parent page

= Automatic Default Featured Images: Rules =

**You can set rules for default featured images of posts easily.** Every time you insert a new post or save an existing post Quick Featured Images Pro will look for a rule to add and to change the preset featured image to the saved post. 

You can define the rules based on

1. always the **first content image** if available in the media library
2. post **categories**
3. post **tags**
4. post **authors**
5. **standard post types** 'Post' and 'Page'
6. all other **custom post types** supporting featured images
7. all other **custom taxonomies** supporting featured images

The rules are easy to set: choose an image, a taxonomy, a value and save the settings. That's it. **You do not need to code.**

You can add, change and delete every rule whenever you want. So you get an **unlimited and precise set of rules** for automatic default featured images in your website.

= Automatic Default Featured Images: Options =

You can switch between 

1. **overwriting existing featured images** or 
2. **keeping them unchanged**. 

The latter setting is the default. The option is used every time a post is saved.

= Additional sortable image column in posts lists =

Quick Featured Images Pro adds a new column in posts lists. The additional column shows the currently assigned featured image of each post. The new column called 'Featured Image' is sortable by the image ID.

With that column you can get a **quick overview about all used images**. You can also see posts with no featured image at a glance.

Under **'Featured Images'** &gt; **'Image Columns'** you can switch on and off the additional image column for every single post type, even custom post types if they support thumbnails.

= Your idea to improve the plugin is welcome =

If you have any new idea for Quick Featured Images Pro post your questions and ideas in the [support forum at wordpress.org](http://www.quickfeaturedimages.com/forums/). I will try to take a look and answer as soon as possible.

= Support =

Support for this plugin will be provided in the form of Product Support. This means that I intend to fix any confirmed bugs, listen to ideas for this plugin and improve the user experience when enhancements are identified and can reasonably be accomodated.

There is no User Support provided for this plugin. If you are having trouble with this plugin in your particular installation of WordPress, I will not be able to help you troubleshoot the problem.

== Installation ==

= Uploading in WordPress Dashboard =

1. Navigate to the 'Add New' in the plugins dashboard
2. Navigate to the 'Upload' area
3. Select `quick-featured-images-pro.zip` from your computer
4. Click 'Install Now'
5. Activate the plugin in the Plugin dashboard
6. Go to 'Featured Images'

= Using FTP =

1. Download `quick-featured-images-pro.zip`
2. Extract the `quick-featured-images-pro` directory to your computer
3. Upload the `quick-featured-images-pro` directory to the `/wp-content/plugins/` directory
4. Activate the plugin in the Plugin dashboard
5. Go to 'Featured Images'

== Changelog ==

= 3.3 =
* Added in image column: Link to the edit page of the displayed image
* Fixed in license activation: undefined variable

= 3.2 =
* Fixed broken activation feature
* Fixed in 'Set, replace, remove': thumbnail IDs of not existing images will be ignored
* Fixed in 'Set, replace, remove': stopping at the more-tag. The plugin ignores the more-tag now and finds content placed after that
* Added option in 'Set, replace, remove': Take the first post image from current site domain
* Removed IFRAME from footer section
* Updated german translation
* Published on 2015-06-28

= 3.1.1 =
* Removed debug code in activation class
* Published on 2015-06-06

= 3.1 =
* Fixed in 'Set, replace, remove': Missing class methods for Bulk Edit
* Fixed in 'Set, replace, remove': Bug which yielded the error message "No matches found" at the Confirmation step
* Fixed in 'Set, replace, remove': Wrong links in the Confirmation list if cache was used
* Fixed in 'Set, replace, remove': Broken bulk assign link at each image in the media library
* Published on 2015-06-04

= 3.0 =
* Added option in 'Set, replace, remove' for selection of multiple images: Use each selected only once
* Added option in 'Set, replace, remove' for selection of multiple images: Remove excess featured images after all selected images are used
* Tested successfully with WordPress 4.2.2
* Updated german translation
* Published on 2015-05-10

= 2.0 =
* Introduced licensing via activation key
* Added option in 'Set, replace, remove': Take first image of NextGen galleries
* Added option in 'Set, replace, remove': Take first external image
* Added option in 'Set, replace, remove': Remove first image in content
* Improved performance of confirmation step by using cached results of preview step
* Updated german translation
* Published on 2015-05-04

= 1.1.0 =
* Added option in 'Set, replace, remove': Take first attached image
* Published on 2015-04-08

= 1.0.0  =
* Initial premium version
* Published on 2015-03-15

== Upgrade Notice ==

= 3.3 =
Added image edit link, fixed undefined variable

= 3.2 =
Fixed broken activation feature, added option 'first post image from current site domain'

= 3.1.1 =
Removed debug code in activation class

= 3.1 =
Fixed bugs

= 3.0 =
New options for multiple image selection

= 2.0 =
Introduced licensing via activation key, added functions for first images, improved performance of confirmation step

= 1.1.0 =
New options: Consider first attached image

= 1.0.0 =
Initial release
