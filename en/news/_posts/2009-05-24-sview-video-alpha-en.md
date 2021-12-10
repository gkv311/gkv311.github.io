---
layout: post
title: 2009-05-24
categories: en news
permalink: /en/news/2009-05-24/
---

New version of sView is coming soon and *development snapshot* sViewSetup_v.9.5dev25a.exe is available for testing!

This build doesn't have GUI and still in deep development stage.
Video-decoding processed on CPU. OpenGL 2.0 GPU is required.
Remove old sView before installation new version. sView will be associated with 'jps', 'pns', 'avi' and 'wmv' files.

New stereo-device support list:

* Anaglyph (use F1, F2,... for variations)
* Dual output, mirror output
* Interlaced output, autodetection for Zalman and Hyundai monitors, EDimensional onscreen codes, Sharp monitor (launch sView with interlace output and press F3)
* iZ3D monitors, autodetection
* NVIDIA stereo-driver, do not use it (experimental)
* software PageFlip; EDimensional onscreen codes; BlueLine sync code (from Apple code sample, not tested)
* QuadBuffered for professional cards
* Vuzix SDK, VR920
<!--break-->

Changes from previous official release (0.4.3.6a):

* New version scheme, Ubuntu-style
* Improved multi-threading
* Native Unicode support
* AMD64 builds
* Linux support
* Better multi-monitors configurations support
* Autodetection mechanism for some devices
* GLSL (OpenGL Shader Language), speed up rendering
* Audio/Video playback via FFmpeg and OpenAL libraries
* File Drag&Drop
* Removed files count limit
* Go to fullscreen via middle mouse button
* New devices support (Zalman, EDimensional,...)
* Module architecture, another developers could provide own stereo-devices support extensions
* Improved Vista/Window7 support
