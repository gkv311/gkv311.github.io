---
layout: post
title: News
categories: en
permalink: /en/news/
---

{% for post in site.posts %}
  {% if post.categories contains 'en' %}
  <h2 class='indent'><a href="{{ post.url }}">{{ post.title }}</a></h2>
  <summary>{{ post.excerpt }}</summary>
  {% endif %}
{% endfor %}
