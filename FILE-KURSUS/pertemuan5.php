<!DOCTYPE html>
<html>
	<head>
		<title>Pertemuan Ke 5 (PHP bag 1)</title>
	</head>
	<body>
		<?php
			//echo "<h2>Hello World!!!</h2>";
			//comment
			/*
			*comment
			*/
			//variable
			$data1	= 123;	//int
			$data1	= 'Kata Bijak';	//string
			$data1	= null;
			$data1	= array('kambing', 'kucing', 'kerbau');
			//object

			//operator
			// +, -, /, *, %
			// <, <=, >, >=, !=, <>, ==, ===
			// &&, ||

			$x = 11;
			$y = 10;

			//print ($x * $y);

			//echo 'Saya $x' . "sedang $x" . "NGODING";

			//decision
			/*
			if ($x == 10) {
				echo 'Nilai x adalah 10';
			} elseif ($y == 10) {
				echo 'Nilai y adalah 10';
			} else {
				echo 'Kondisi tidak terpenuhi';
			}
			

			switch ($x) {
				case '11':
					echo 'Benar nilai $x adalah 11';
					break;
				
				default:
					echo 'Tidak terpenuhi';
					break;
			}
			

			//looping...
			for ($i=0; $i < 50; $i++) { 
				echo "<br>Nilai i adalah $i";
			}

			while ($i >= 10) {
				echo "<br>Nilai i adalah $i";
				$i--;
			}

			do{
				echo "<br>Nilai i adalah $i";
				$i++;
			} while($i < 30)
			
			function penjumlahan($a, $b)
			{
				return ($a + $b);
			}

			function penjumlahan2($a, $b)
			{
				echo $a + $b;
			}
			
			echo penjumlahan(200,100);
			echo "<br>";
			penjumlahan2(100,349);
			*/
			//konsep array
			$buah = array('Jambu', 'apel', 'Salak');
			$buah[] = 'Mangga';
			//var_dump($buah);
			//echo $buah[0];	//jambu
			$peoples = array(
				array(
					'nama' => 'Bowo Kris',
					'jk' => 'laki-laki',
					'alamat' => 'Karawang'
					),
				array(
					'nama' => 'Agus',
					'jk' => 'laki-laki',
					'alamat' => 'Jakarta'
					)
				);

			//echo $peoples[1]['nama'];	//bowo Kris
			//$i = 0;
			foreach ($peoples as $row) {
				echo $row['nama'];
				//$i++;
			}

			echo "tanggal saat ini = " . date("Y-m-d H:i:s");



		?>
	</body>
</html>