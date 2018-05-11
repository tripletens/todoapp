<?php
	class animal{
		public $legs;
		public function goat($a,$b,$c,$d){
			return $a + $b + $c + $d;
		}
	}
?>
<!DOCTYPE html>
<html>
<head>
	<title>test</title>
</head>
<body>
	<?php
		$animal = new animal();
		$goatlegs = $animal->goat(5,3,4,5);
		echo $goatlegs;
	?>
</body>
</html>