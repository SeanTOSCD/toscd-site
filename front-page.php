<?php
get_header();
?>

<section class="content-wrap">

	<header class="content-header">
		<?php the_title( '<h1 class="entry-title">', '</h1>' ); ?>
	</header>

	<div class="content-body">
		<?php the_content(); ?></php>
	</div>

</section>

<?php
get_footer();