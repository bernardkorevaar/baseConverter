
<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width, initial-scale=1">

		<title>Base Converter</title>

		<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css">
  		<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  		<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
  		<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js"></script>
		
	</head>
	<body>

		<div class="jumbotron text-center" style="margin-bottom:0">
  			<h1>Base Converter</h1>
  			<p>Convert your decimal numbers to binary</p> 
		</div>

		<div class="container" style="margin-top:30px">
			<form action="baseConverter.php" method="post">
				
				<label for="from">From (1 to 20):</label>
				<input type="range" class="custom-range" id="from" name="from" min="1" max="20" value="10"><br>
				<label for="to">To (1 to 20):</label>
				<input type="range" class="custom-range" id="to" name="to" min="1" max="20" value="10"><br>

				<label for="input">Input:</label><br>
				<input type="text" class="form-control" id="input" name="input"><br>

				<input type="submit" class="from-control" value="submit">

			</form>

			<?php

				$base_input = $_POST["from"];
				$base_output = $_POST["to"];
				$input = $_POST["input"];
				$input = strtoupper($input);

				function toDecimal($base_in, $in = "0") {
					if ($base_in == 10) {
						$out = $in;
					} else {
						$out = 0;
						if ($in != "0") {
							$length = strlen($in);
							for ($i = $length-1; $i >= 0; $i--) {
								$index = $in[$i];
								if (is_numeric($index)) {
									$val = pow($base_in, $i)*$index;
								} else {
									switch($index) {
										case "A":
											$val = pow($base_in, $i)*10;
											break;
										case "B":
											$val = pow($base_in, $i)*11;
											break;
										case "C":
											$val = pow($base_in, $i)*12;
											break;
										case "D":
											$val = pow($base_in, $i)*13;
											break;
										case "E":
											$val = pow($base_in, $i)*14;
											break;
										case "F":
											$val = pow($base_in, $i)*15;
											break;
										case "G":
											$val = pow($base_in, $i)*16;
											break;
										case "H":
											$val = pow($base_in, $i)*17;
											break;
										case "I":
											$val = pow($base_in, $i)*18;
											break;
										case "J":
											$val = pow($base_in, $i)*19;
											break;
										case "K":
											$val = pow($base_in, $i)*20;
											break;
									}
								}
								$out += $val;
							}
						} else {
							$out = 0;
						}
					}
					return $out;
				}

				// function toBinary($in = 0) {
				// 	if ($in != 0) {
				// 		$check = 0;
				// 		$i = -1;
				// 		while ($in >= $check) {
				// 			$i++;
				// 			$check = pow(2, $i);
				// 		}
				// 		$i--;
				// 		$in -= pow(2, $i);
				// 		$i--;
				// 		$out = 1;
				// 		for ($i; $i >= 0; $i--) {
				// 			$check = pow(2, $i);
				// 			if ($in >= $check) {
				// 				$output .= 1;
				// 			} else {
				// 				$output .= 0;
				// 			}
				// 		}
				// 	} else {
				// 		$out = 0;
				// 	}
				// 	return $out;
				// }

				function convertBase($in = 0, $base_output) {
					if ($in != 0) {
						$check = 0;
						$i = -1;
						while ($in >= $check) {
							$i++;
							$check = pow($base_out, $i);
						}
						$i--;

						$out = "";
						for ($i; $i >= 0; $i--) {
							$c = 1;
							$check = pow($base_out, $i) * $c;
							while ($in >= $check) {
								$c++;
								$check = pow($base_out, $i) * $c;
							}
							$c--;
							$in -= pow($base_out, $i) * $c;
							$out .= $c;
						}
					} else {
						$out = 0;
					}
					return $out;
				}

				$decimal = toDecimal($base_input, $input);
				$output = convertBase($decimal, $base_out);

			?>
			<p>
				Input (Base: <?php echo $base_input; ?>): <?php echo $input; ?><br>
				Decimal (Base: <?php echo $base_output; ?>): <?php echo $output; ?>
			</p>

		</div>

	</body>
</html>