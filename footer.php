<?php
/**
 * The template for displaying the footer
 *
 * Contains the closing of the #content div and all content after.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package amber-ic
 */

?>

	</div><!-- #content -->

	<footer id="colophon" class="site-footer">
		<div class="page-container flex-container">
			<div class="logo">
				<a href="/"><img src="/wp-content/themes/amber-ic/images/logo-color.png" width="150" border="0" alt="AMBER Alert in Indian Country" /></a>
			</div>
			<div class="logo">
				<a href="/"><img src="/wp-content/themes/amber-ic/images/logo-ojpcolor.png" width="100" border="0" alt="OJP" /></a>
			</div>
			<div class="logo" style="padding-top:20px">
				<a href="/"><img src="/wp-content/themes/amber-ic/images/logo-ojjdp.png" width="120" border="0" alt="OJJDP" /></a>
			</div>
			<div class="address">
				AMBER Alert Training & Technical Assistance Program<br />
				P.O. Box 2277<br />
				Appleton, WI 54912-2277<br />
				877-712-6237 (877-71-AMBER)<br />
				askamber@fvtc.edu
			</div>
		</div>
		<div class="site-info">
			<div class="footer-copyright">
				Copyright &copy; <?php echo date("Y");?> AMBER Alert Training and Technical Assistance Program
			</div>
		</div><!-- .site-info -->
	</footer><!-- #colophon -->
</div><!-- #page -->

<?php wp_footer(); ?>

</body>
</html>
