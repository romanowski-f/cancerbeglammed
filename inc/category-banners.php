<?php
function get_category_banner($category) {

$banner = '';
switch($category) {
	case 'after-surgery': 
		$banner = '<img src="' . get_stylesheet_directory_uri() . '/images/store/banners/after-surgery.jpg' . '">';
	break;
	case 'chemo-radiation-essentials': 
		$banner = '<img src="' . get_stylesheet_directory_uri() . '/images/store/banners/chemo-radiation-essentials.jpg' . '">';
	break;
	case 'beauty-wellness': 
		$banner = '<img src="' . get_stylesheet_directory_uri() . '/images/store/banners/beauty-wellness.jpg' . '">';
	break;
	case 'clothes-that-help-heal': 
		$banner = '<img src="' . get_stylesheet_directory_uri() . '/images/store/banners/clothes-help-heal.jpg' . '">';
	break;
	case 'comfort-thats-cool': 
		$banner = '<img src="' . get_stylesheet_directory_uri() . '/images/store/banners/comfort-thats-cool.jpg' . '">';
	break;
	case 'feel-good-goodies': 
		$banner = '<img src="' . get_stylesheet_directory_uri() . '/images/store/banners/feel-good-goodies.jpg' . '">';
	break;
	case 'menopause-madness-relief': 
		$banner = '<img src="' . get_stylesheet_directory_uri() . '/images/store/banners/menopause-madness-relief.jpg' . '">';
	break;
	case 'wrap-it-up-in-style': 
		$banner = '<img src="' . get_stylesheet_directory_uri() . '/images/store/banners/wrap-it-up-in-style.jpg' . '">';
	break;
	case 'your-breast-life-reimagined': 
		$banner = '<img src="' . get_stylesheet_directory_uri() . '/images/store/banners/your-breast-life-reimagined.jpg' . '" class="mb-4"><h5 class="text-center">Lumpectomies, Mastectomies &amp; Reconstruction</h5>';
	break;
	case 'thoughtful-things': 
		$banner = '<img src="' . get_stylesheet_directory_uri() . '/images/store/banners/thoughtful-things.jpg' . '">';
	break;

	case 'hospital-gowns-pajamas':
	$banner = '<img src="' . get_stylesheet_directory_uri() . '/images/store/banners/hospital-gowns-pajamas.jpg' . '">';
	break;

	default:
		//$title = woocommerce_page_title();
		$banner = '<h1 class="woocommerce-products-header__title page-title">' . woocommerce_page_title(false) . '</h1>';
	break;
}

return $banner;

}













?>