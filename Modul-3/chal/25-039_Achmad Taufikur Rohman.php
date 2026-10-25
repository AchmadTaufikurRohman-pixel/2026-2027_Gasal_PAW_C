<?php
$pasar_buah = array ("Alpukat" => 20,
"Anggur" => 12);

$pasar_sayur = array ("Bawang Bombai" => 0,
"Kubis" => 4, "Wortel" => 23, "Bayam" => 2);

$jenis_buah = array(
	array("Alpukat","buah","20"),
	array("Anggur","buah","12"),
);
$jenis_sayur = array(
	array("Bawang Bombai","sayur","0"),
	array("Kubis","sayur","4"),
	array("Wortel", "sayur","23"),
	array("Bayam", "sayur","2"),
);


echo "<table border='1' cellpadding='3' cellspacing='0'>";
echo "<tr><th>No</th><th>Nama</th><th>Jenis</th><th>Jumlah</th><th>Status</th></tr>";

foreach ($pasar_buah as $key => $value) {
	if ($value == 0) {
		echo "habis";	
	}else if ($value <= 5){
		echo "stok diki";
	}else {
		echo "stok banyak";
	}
};
foreach ($pasar_sayur as $key => $value) {
	if ($value == 0) {
		echo "habis";
	}else if ($value <= 5){
		echo $key . "stok diki";
	}else {
		echo $key . "stok banyak";
	}
}

$hitung = 0;
for ($i = 0; $i < count($jenis_buah); $i++) {
    echo "<tr>";
    for ($j = 0; $j < 3; $j++) {
        echo "<td>" . $jenis_buah[$i][$j] . "</td>";
    }
    echo "</tr>";
};
for ($i = 0; $i < count($jenis_sayur); $i++) {
    echo "<tr>";
    for ($j = 0; $j < 3; $j++) {
        echo "<td>" . $jenis_sayur[$i][$j] . "</td>";
    }
    echo "</tr>";
};

echo "</table>";

echo "Total Buah : ". count($pasar_buah);
echo "<br>";
echo "Total Sayur : ". count($pasar_sayur);
?>
