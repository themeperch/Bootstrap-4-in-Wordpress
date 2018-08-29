## Welcome to Bootstrap 4 in WordPress 

You can use the [editor on GitHub](https://github.com/themeperch/Bootstrap-4-in-Wordpress/edit/master/index.md) to maintain and preview the content for your website in Markdown files.

Whenever you commit to this repository, GitHub Pages will run [Jekyll](https://jekyllrb.com/) to rebuild the pages in your site, from the content in your Markdown files.

### USAGE

You can get Bootstrap 4 style pagination list item. 
https://getbootstrap.com/docs/4.1/components/pagination/
1. Include wp_link_pages.php in your theme function.php file
2. Use this code snippent to display formatted output of a list of pages.
```<?php
wp_link_pages( array(					
	'nextpagelink'     => __( 'Next', 'text-domain'),
	'previouspagelink' => __( 'Previous', 'text-domain' ),
	'pagelink'         => '%',
	'echo'             => 1
) );
?>
```

For more details see [GitHub Flavored Markdown](https://guides.github.com/features/mastering-markdown/).

### Jekyll Themes

Your Pages site will use the layout and styles from the Jekyll theme you have selected in your [repository settings](https://github.com/themeperch/Bootstrap-4-in-Wordpress/settings). The name of this theme is saved in the Jekyll `_config.yml` configuration file.

### Support or Contact

Having trouble with Pages? Check out our [documentation](https://help.github.com/categories/github-pages-basics/) or [contact support](https://github.com/contact) and we’ll help you sort it out.
