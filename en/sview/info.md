---
layout: post
title: About sView
categories: en
permalink: /en/sview/info/
---

## Introduction
sView is an open-source universal viewer which supports many file types including images, video, audio.
It has been designed for 3D stereoscopic data, but can be used for traditional files without any limitations.
You may learn [sView user tips](/en/sview/usertips) on [this page](/en/sview/usertips).

## 3D Image Viewer
This application displays images and photos in most popular formats including JPEG, PNG, MPO, BMP, EXR, TGA, WebP and others.
Decoding is performed by [FFmpeg framework](http://ffmpeg.org/).
Viewer supports both stereoscopic and flat images controlled by Source Stereo Format option.

<div align='center'><img src='/images/news/sview1508_cubemap.jpg' alt='sView - Image Viewer' /></div>

## 3D Movie Player
This application plays video and audio files.
The list of supported formats is very long thanks to [FFmpeg framework](http://ffmpeg.org/) and includes MKV, WebM, OGM, AVI, FLAC.
Player supports both stereoscopic and flat videos controlled by Source Stereo Format option.
Audio playback is performed by [OpenAL soft library](http://kcat.strangesoft.net/openal.html).

<div align='center'><img src='/images/sview1508_playlist.jpg' alt='sView - Movie Player' /></div>

## Diagnostics
This is small application intended for diagnostics and geometry calibration of stereoscopic device.

## Stereo-device support list (outputs)
* Anaglyph glasses
* Interlaced displays (Zalman, [LG](http://www.lg.com/us/3d-monitors), Envision)
* Shutter glasses (requires [NVIDIA 3D Vision](http://www.nvidia.com/object/3d-vision-main.html) or [AMD HD3D](http://www.amd.com/hd3D) capable device or professional GPU)
* Dual projection systems and Mirror displays
* Others (Oculus Rift prototype, iZ3D displays, Vuzix HMD, 3D TVs)

## Supported stereo formats
* Separate views (two streams stored in single file or from two files)
* Horizontal pair (side by side)
* Over/Under
* Interlaced

## Extra features
* Intuitive on-screen interface
* Panoramas (cubemaps, spherical)
* Image positioning (rotation, zooming, panning)
* Image adjustment (gamma, brightness, saturation)
* Stereo pair image adjustment (vertical, horizontal and angular parallax)

## System requirements
Program requires hardware accelerated _**OpenGL 2.1+ video-card**_ (any non-ancient one).

Supported OS:

* Windows 7 / 8.1 / 10 (64bit)
* Mac OS X 10.6.8 and newer (with 64bit Intel CPU)
* Linux (pre-built binaries are available for Ubuntu on Launchpad, maintainers for other distributions are welcome!)

*sView can be installed on Windows XP (but not on Windows 2000), however this system is no longer supported.*

## Sources
sView is an open source project. You might find complete sources at official [git repository on github](https://github.com/gkv311/sview).
Contributors are welcome - please [contact me](/en/about).

## Reviews
You may find useful the following reviews:

* sView 13.05 review on [dotTech.org](http://dottech.org/110247/windows-review-sview-linux-mac-os-x)

## Feedback
OpenGL drivers' update might resolve many issues with the program and is highly recommended:

* [AMD Catalyst for Radeon graphics](http://www.amd.com/en-us/markets/game/downloads)
* [NVIDIA drivers for GeForce graphics](http://www.geforce.com/drivers)
* [Intel drivers for graphics embedded into CPUs](http://www.intel.com/p/en_US/support)

However the opposite is possible as well - troubles occur right **after drivers update**.
If you have noticed such regressions it is very important to report them in the right place:

* [AMD Issue Reporting Form for AMD Catalyst](http://www.amd.com/report)
* [NVIDIA Bug submissions](http://nvidia-submit.custhelp.com/cgi-bin/nvidia_submit.cfg/php/enduser/std_alp.php)
* [Intel contact form](http://www.intel.com/p/en_US/support/contactsupport)

Please register bugs and feature-requests related to program itself in [sView Bugtracker](https://github.com/gkv311/sview/issues).

## Download
This is _**strongly recommended to remove old sView versions before installing any new one**_.

Visit the [download section](/en/download) and choose sView for your system.
