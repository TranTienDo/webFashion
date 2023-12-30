<?php
ob_start();
session_start();
require("lib/coreFunction.php");
$f = new CoreFunction();
define("PATH", "http://localhost:8080/TranTienDo_2122110150/index.php?");
include_once("partial/header.php");

?>
<?php
// Hàm để định dạng giá
function formatPrice($price)
{
	return '₫' . number_format($price);
}
?>

<div class="row content">

	<?php
	if (!isset($_GET['page'])) {
		$page = "";
	} else {
		$page = $_GET['page'];
	}
	$route = [
		'' => 'page/home.php',
		'product' => 'product/product.php',
		'cart' => 'cart/cart.php',
		'contact' => 'user/contact.php',
		'registration' => 'user/registration.php',
		'detail' => 'product/detail.php',
		'catProduct' => 'product/catproduct.php',
		'search' => 'product/search.php',
		'login' => 'user/login.php',
		'doLogin' => 'user/doLogin.php',
		'doLogout'=> 'user/doLogout.php',
	];
	foreach ($route as $r => $val) {
		if ($r == $page) {
			require($val);
		}
	}
	ob_end_flush();
	?>

</div>

<?php
include_once("partial/footer.php")

	?>