PaginatorBundle
===============

Paginator bundle.

## Installation

### Step 1: Download TadckaPaginatorBundle using composer

Add TadckaPaginatorBundle in your composer.json:

```js
{
    "require": {
        "tadcka/paginator-bundle": "dev-master"
    }
}
```

Now tell composer to download the bundle by running the command:

``` bash
$ php composer.phar update tadcka/paginator-bundle
```

### Step 2: Enable the bundle

Enable the bundle in the kernel:

``` php
<?php
// app/AppKernel.php

public function registerBundles()
{
    $bundles = array(
        // ...
        new Tadcka\PaginatorBundle\TadckaPaginatorBundle(),
    );
}
```

How use?

### Step 3: How use?

Create pagination object:

``` php
<?php
$pagination = new \Tadcka\Component\Paginator\Pagination($totalItems, $currentPage, $itemsPerPage);
```

Render html:

``` php
<?php
$paginationHtml = $this->container->get('tadcka_paginator.manager')->getPaginatorHtml($pagination);
```

### Step 4: Configuration

``` yml
tadcka_paginator:
  max_near_pages: 3
  template_class:
    pagination: test
    pagination_links: test_links
    pagination_link: test_link
```


