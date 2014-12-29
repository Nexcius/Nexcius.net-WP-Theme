<section class="entry-meta">
<span class="author vcard"><?php the_author_posts_link(); ?></span>
<span class="meta-sep"> on </span>
<span class="entry-date"><?php the_time( get_option( 'date_format' ) ); ?></span>
<?php edit_post_link("Edit"); ?>
</section>