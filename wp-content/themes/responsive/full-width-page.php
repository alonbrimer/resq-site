<?php

const BASE_URL = 'http://production-resq.rhcloud.com/resq-server/';

// Exit if accessed directly
if( !defined( 'ABSPATH' ) ) {
	exit;
}

/**
 * Full Content Template
 *
Template Name:  Full Width Page (no sidebar)
 *
 * @file           full-width-page.php
 * @package        Responsive
 * @author         Emil Uzelac
 * @copyright      2003 - 2014 CyberChimps
 * @license        license.txt
 * @version        Release: 1.0
 * @filesource     wp-content/themes/responsive/full-width-page.php
 * @link           http://codex.wordpress.org/Theme_Development#Pages_.28page.php.29
 * @since          available since Release 1.0
 */

get_header(); ?>

<div id="content-full" class="grid col-940" ng-controller="mycontroller">

	<?php if( have_posts() ) : ?>

		<?php while( have_posts() ) : the_post(); ?>

			<?php get_template_part( 'loop-header' ); ?>

			<?php responsive_entry_before(); ?>
			<div id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
				<?php responsive_entry_top(); ?>
				<?php get_template_part( 'post-meta-page' ); ?>
                <div ng-controller="mycontroller">
                    <!-- display all post titles in a list -->
                    <ul>
                        <li ng-repeat="post in postdata">{{post.title}}</li>
                    </ul>
                </div>
				<div class="post-entry">
                    <?php
                    $controllerName = null;
                    switch (get_post()->ID){
                        case '10':
                            get_template_part( 'rescalls' );
                            break;

                        case '34':
                            get_template_part( 'users' );
                            break;

                        case '37':
                            get_template_part( 'map' );
                            break;
                        default:
                            break;
                    }?>

					<?php the_content( __( 'Read more &#8250;', 'responsive' ) ); ?>
					<?php wp_link_pages( array( 'before' => '<div class="pagination">' . __( 'Pages:', 'responsive' ), 'after' => '</div>' ) ); ?>
				</div>
				<!-- end of .post-entry -->

				<?php get_template_part( 'post-data' ); ?>

				<?php responsive_entry_bottom(); ?>
			</div><!-- end of #post-<?php the_ID(); ?> -->
			<?php responsive_entry_after(); ?>

			<?php responsive_comments_before(); ?>
			<?php comments_template( '', true ); ?>
			<?php responsive_comments_after(); ?>

		<?php
		endwhile;

		get_template_part( 'loop-nav' );

	else :

		get_template_part( 'loop-no-posts' );

	endif;
	?>

</div><!-- end of #content-full -->

<?php get_footer(); ?>


