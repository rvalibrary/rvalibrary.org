=== Disable PDF Thumbnails ===
Contributors: jennettefulda
Donate link: https://www.makeworthymedia.com/plugins/
Tags: pdf,thumbnail,thumbnails,disable,image,images
Requires at least: 4.7
Tested up to: 4.7.2
Stable tag: 1.3

Disables WordPress from generating image thumbnails when you upload a PDF.

== Description ==

Disables WordPress from generating image thumbnails when you upload a PDF. This behavior was introduced in WordPress 4.7, so this plugin isn't needed for any version older than that. Not all web hosts support the ability to generate images from PDFs either, so even if you have 4.7 or newer you might not need this.

== Installation ==

1. Upload the folder 'disable-pdf-thumbnails' to the '/wp-content/plugins/' directory.
2. Activate the plugin through the 'Plugins' menu in WordPress.
3. That's it! WordPress will no longer generate thumbnail images for any PDFs you upload.

== Frequently Asked Questions ==

= Why would I want to disable thumbnails from being generated when I upload a PDF? =

1) It makes uploading slower because WordPress has to generate several images after the file is uploaded. In some situations your browser might time out before the process is complete.

2) If your site hosts more than a few dozen PDFs, the image thumbnails will start taking up a notable amount of space in your uploads directory. One full-size thumbnail for a PDF can be as large as 4mb. If you have 25 PDFs on your site, that's 100mb of space. If you have limited disk space on your hosting account, this will bring you closer to hitting your limit. If you make regular backups, they'll start to become significantly larger.

= How can I disable thumbnails for some PDF uploads but not others? =

If you need a thumbnail image for a PDF, deactivate the plugin, upload the PDF, and thumbnails will be generated. Then reactivate the plugin to disable them in the future. Please note, if you run a Regenerate Thumbnails plugin in the future, the thumbnail you created might be deleted.

= Why isn't my site creating thumbnails for PDFs even without this plugin installed? =

According to the development team, for PDF thumbnails to work you have to have a WP_Image_Editor available on your hosting account that supports PDF. https://make.wordpress.org/core/2016/11/15/enhanced-pdf-support-4-7/

== Changelog ==

= 1.0 =
* Original version of the plugin.