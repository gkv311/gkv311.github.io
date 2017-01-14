---
layout: post
title: Новости
categories: ru
permalink: /ru/news/
---

{% for post in site.posts %}
  {% if post.categories contains 'ru' %}
  <h2 class='indent'><a href="{{ post.url }}">{{ post.title }}</a></h2>
  <summary>{{ post.excerpt }}</summary>
  {% endif %}
{% endfor %}
