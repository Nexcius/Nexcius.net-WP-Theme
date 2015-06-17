<footer class="entry-footer">
<?php 
if(has_category())  {
	echo '<span class="cat-links">' . _e( 'Categories: ', 'nexnet' ) . the_category( ', ' ) . '</span><br />';
}

if(has_tag()) {
	echo '<span class="tag-links">' . the_tags() . '</span><br />';
}
/*
if ( comments_open() ) { 
	echo '<span class="comments-link"><a href="' . get_comments_link() . '">' . sprintf( get_comments_number() . ' ' . __( 'Comments', 'nexnet' ) ) . '</a></span>';
} */
?>
</footer> 