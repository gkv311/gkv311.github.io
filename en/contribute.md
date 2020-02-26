---
layout: post
title: Help project sView
categories: en
permalink: /en/contribute/
---

There are many way to help the project depending on your skills and abilities!

##<a name="localization">Localization</a>
sView is a graphical application and localization is important to make it user-friendly and available world-wide where Russian is not yet learned at schools.
For the moment, Russian, English, French and German translations are maintained within the project and Korean and Chinese are available thanks to volunteers.

If you like sView and know other languages, found error in existing translation - you might help the project!
All language files are placed in "$sView_Installation_Path/lang/" folder.
For new translation, just copy any existing language "English" -> "Italian" for example
and perform translation for all strings in copied files (each file corresponds to the program module).

<pre>
# Comment
1002="Translated string"
#1003="Not yet translated string. Comment line to see string with [id] in sView."
?1004="Translation to be improved"
</pre>

Files should be in UTF-8 encoding. To test your translation you need to change the language in sView.
You may distribute translation yourself but if you want to put it into official version - please contact me.

During development new strings should have new unique identifiers.
Strings with unavailable or questionable translation are preceded by ?.

##Maintain Linux packages
sView provides binary packages for Ubuntu, but through Launchpad repositories.
There are many other Linux distributives and maintaining packages for them will make sView more available.

##Improve web-site
I'm not a web-master and maintenance of www.sview.ru is burden for me.
The site has been initially based on Drupal framework, but after many years the content has been moved to the format for static generator Jekyll
and managed under own git repository.

You may contribute improvements related to the site - design, content.
Also I would be glad to publish new articles on my site.

##Contribute to sView
sView is a C++ project. The source code is available in [git repository on github](https://github.com/gkv311/sview).
Code::Blocks IDE is used for development on Linux, Windows and OS X.
However there are also Visual Studio projects available for Windows and Makefile for Linux.

You may fix bugs observed during program usage or registered on [Bugtracker](https://github.com/gkv311/sview/issues), or implement new features.

##Contribute to related projects
sView relies on several strong projects, including [FFmpeg](www.ffmpeg.org) for video/audio decoding,
[OpenAL soft](http://kcat.strangesoft.net/openal.html) for audio playback.
Contributions to these projects improves sView as well!

##Advertise sView
Help sView to be more popular:

* Publish information on your site, blog, page.
* Write tutorial for newbies.
* Suggest using sView for your content.

##Make donation
sView is free even for commercial use (as far as you respect the license!).
I'm developing project in my spare time.

However development is not always fun and there are many unavoidable expenses - like hosting the site without ads,
purchaising hardware & software for testing and development purposes.


If you like sView you may say thanks developer by donating.
Please [contact me](/en/about) to find most applicable option.
