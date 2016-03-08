<?php

if ( in_category('blog') ) {
	include(TEMPLATEPATH.'/single-blog.php');
}
elseif( in_category('services') ) {
	include(TEMPLATEPATH.'/single-services.php');
}
elseif( in_category('portfolio') ) {
	include(TEMPLATEPATH.'/single-portfolio.php');
}
else{
	include(TEMPLATEPATH.'/single-default.php');
}