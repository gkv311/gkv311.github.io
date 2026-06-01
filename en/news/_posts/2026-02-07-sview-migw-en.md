---
layout: post
title: 2026-02-07 sView CI/CD improvements
categories: en news
permalink: /en/news/2026-02-07/
tags: frontpage
---

sView 26.02 migrated to newer versions of third-party libraries, including *FFmpeg 8.0.1*.

The CI/CD scripts for sView have been gradually extended to provide
zero-to-one building workflows for all major dependencies (*FreeType*, *OpenAL Soft*, *FFmpeg*, etc.)
for all supported platforms (*Android ARM64*, *macOS ARM64*, *Windows x64*, *Ubuntu 24.04 x64*).

This should help to update these components more rapidly in future,
and help external contributors and end-users to build sView with modifications.

The Windows package has been switched from outdated *MSVC100* toolchain to *MinGW*,
so that the binaries could be built within the Linux environment,
and will allow to use features from newer C++ versions in the code.
<!--break-->
