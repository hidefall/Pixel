<?php
/**
 * The header for our theme
 *
 * This is the template that displays all of the <head> section and everything up until <div id="content">
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package Pixel
 */

?>
<!doctype html>
<html <?php language_attributes(); ?>>
<head>
	<meta charset="<?php bloginfo( 'charset' ); ?>">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="profile" href="https://gmpg.org/xfn/11">
	<link href="//db.onlinewebfonts.com/c/7dee4e8052171a216cd2446ea682b742?family=Berthold+Akzidenz+Grotesk+BE" rel="stylesheet" type="text/css"/>
	<?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>
<div id="page" class="site">

<?php if (get_theme_mod('hero_background')) :?>
<div class="header_color_wrapper">
	<header id="masthead" class="site-header" style="background: linear-gradient(
		rgba(51, 51, 51, 0.48),rgba(51, 51, 51, 0.48)), center center no-repeat url('<?php echo get_theme_mod('hero_background');?>');background-size: cover; min-height: 100%; height: 100vh;">
<?php endif;?>
		
		
		<nav class="navbar navbar-expand-md pixel-navigation" role="navigation">
  <div class="container">
	<!-- Brand and toggle get grouped for better mobile display -->
	<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-controls="bs-example-navbar-collapse-1" aria-expanded="false" aria-label="Toggle navigation">
		<span class="navbar-toggler-icon"></span>
	</button>
	<a class="navbar-brand" href="#"><?php the_custom_logo()?></a>
		<?php
		wp_nav_menu( array(
			'theme_location'    => 'primary',
			'depth'             => 1,
			'container'         => 'div',
			'container_class'   => 'collapse navbar-collapse pixel-nav-container',
			'container_id'      => 'bs-example-navbar-collapse-1',
			'menu_class'        => 'nav navbar-nav navbar',
			'fallback_cb'       => 'WP_Bootstrap_Navwalker::fallback',
			'walker'            => new WP_Bootstrap_Navwalker(),
		) );
		?>
	</div>
</nav>
<div class="container hero_content">
			<div class="row">
				<div class="col-md-6 col-md-offset-1 hero_info_text">
				<?php echo(get_theme_mod('hero_background_test'));?>

					<?php if(get_theme_mod('hero_title')) :?><span class="hero_title"><?php echo get_theme_mod('hero_title');?></span><?php endif;?>
					<?php if(get_theme_mod('hero_subtitle')) :?><h1 class="hero_subtitle"><?php echo get_theme_mod('hero_subtitle');?></h1><?php endif;?>
					</div>
					<div class="col-md-6 call_to_action">
						<div>
						<a href="#" class="call_btn btn">Call To Action</a>
						</div>
				</div>
		</div>
	</header><!-- #masthead -->
	</div>

	<div id="content" class="site-content">
