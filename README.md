# PHP Markdown Converter

## Overview

Extremely simple (3 lines of code) markdown converter using [michelf/php-markdown](https://github.com/michelf/php-markdown).

## Usage

The following example is used to serve and automatically display markdown files in /data/public_html.

### Example /etc/nginx/default.d/towersan-0001.conf

In this example the php-markdown-converter has been cloned in /data/public_html and 'composer install' has been run.

```
location / {
	root   /data/public_html;
	index  index.html index.htm index.php;
	autoindex on;

	location ~ [^/]\.php(/|$) {
		fastcgi_split_path_info ^(.+?\.php)(/.*)$;
		if (!-f $document_root$fastcgi_script_name) {
			return 404;
		}

		fastcgi_pass   127.0.0.1:9000;
		fastcgi_index  index.php;
		fastcgi_param  SCRIPT_FILENAME   $document_root$fastcgi_script_name;
		include        fastcgi_params;
	}

	location ~ \.md$ {
		rewrite ^ /php-markdown-converter/app/index.php last;
	}

}
```
