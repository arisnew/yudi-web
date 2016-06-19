<?php
//konsep oop di php
/**
* contoh class mobil
*/
class Mobil
{
	//properti
	public $warna = 'Merah';
	private $speed	= 0;
	
	//methode
	function __construct()
	{
		//konstruktor

	}

	public function starter()
	{
		echo '<br>Mobil nyala....';
	}

	public function get_speed()
	{
		echo "Kecepatan mobil saat ini = " . $this->speed;
	}

	public function set_speed($kec = 0)
	{
		if($kec >= 10){
			$this->speed = $kec;
			echo "Kecepatan mobil menjadi " . $this->speed . ' Km/Jam<br>';
		} else {
			echo "Tidak bisa mengubah kecepatan..!!!";
		}
	}
}

//penggunaan
$avanza = new Mobil();

echo 'Apa warna mobil avanza?<br>';
echo $avanza->warna;
echo '<br>Cat ulang menjadi putih..<br>';
$avanza->warna = 'Putih';
echo 'Apa warna mobil avanza?<br>';
echo $avanza->warna;

//objek baru
$jeep = new Mobil();
echo '<br>Apa warna mobil Jeep?<br>';
echo $jeep->warna;
$jeep->starter();
echo "<br>Berapa kecepatanm mobil sekarang?<br>";
//echo $jeep->speed;
$jeep->get_speed();
$jeep->set_speed(100);

$avanza->get_speed();