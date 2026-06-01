---
layout: post
title: 2025-02-22 sView dropping legacy components
categories: en news
permalink: /en/news/2025-02-22/
tags: frontpage
---

sView 25.02 drops support of legacy platforms and functionality:
- Removed *32-bit Windows* binaries from, only *x64* binaries are provided;
- Removed *FreeImage* and *DevIL* libraries from *Windows* package
  and improved reading of **HDR**/**EXR** images using *FFmpeg*;
- Removed *NPAPI*/*ActiveX* plugin (browsers gradually dropped support for native plugins since 2015-2018);
- DMG packages for macOS now provide *ARM64* binaries instead of *x64*.

Movie Player now supports new *FFmpeg 7.1* API for decoding frame sequence stereoscopic video.

In addition, the building environment has been migrated to use *CMake*.
<!--break-->
