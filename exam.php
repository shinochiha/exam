<?php 

echo "“==>> Selamat datang di Program Input Nilai Ujian <<==”\n";

// Siapkan array
$arrSiswa = [];

// Program input data
do {
	echo "Masukkan Nama Peserta : ";
	$name = ucWords(trim(fgets(STDIN)));
	
	echo "Masukkan Nilai $name : ";
	$nilai = floatval(trim(fgets(STDIN)));

	$confirm = "Nilai $name adalah $nilai \n";
	echo $confirm;

	// Masukkan data ke array
	$arrSiswa[$name] = $nilai;

	echo "Lanjutkan? [Y/N] : ";

	$lanjut = strtoupper(trim(fgets(STDIN)));

	if( $lanjut == "Y" or $lanjut == "YES" or $lanjut == "") {
		$lanjut = true;
	}elseif($lanjut == "N" or $lanjut == "NO") {
		$lanjut = false;
	}else{
		echo "Lanjutkan? [Y/N] : ";
		$lanjut = strtoupper(trim(fgets(STDIN)));
	}
} while( $lanjut );

echo "\nTerimakasih sudah memasukkan nilai-nilai peserta Ujian\n\n";

// Pembatas
$batas = 100;
$a = "";
for ($i=1; $i < $batas ; $i++) { 
	if($i == $batas / 2) {
		$a .= "*";
	}else{
		$a .= "-";
	}
}
echo $a."\n\n";

/**
 * Daftar Siswa Berurutan
 * berdasarkan abjad
 */
ksort($arrSiswa);

foreach ($arrSiswa as $siswa => $value) {
	echo $siswa." mendapat ".$value."\n";
}

/**
 *  Daftar Siswa Lulus
 *  berdasarkan nilai tertinggi
 */
arsort($arrSiswa);
echo "===> Nilai Lulus <===\n";
foreach ($arrSiswa as $siswa => $value) {
	if($value > 5) {
		echo "Nilai ujian $siswa telah mencukupi. Capaian ".$value*10;
		echo "%\n";
	}
}

/**
 *  Daftar Siswa tidak Lulus
 *  berdasarkan nilai terendah
 */
asort($arrSiswa);
echo "===> Nilai Tidak Lulus <===\n";
foreach ($arrSiswa as $siswa => $value) {
	if($value <= 5) {
		echo "Nilai ujian $siswa tidak mencukupi. Capaian ".($value*10)."%\n";
		// echo "%\n";
	}
}

/**
 * Nilai Tertinggi
 */
echo "\n";
arsort($arrSiswa);
$nama = key($arrSiswa);
$value = $arrSiswa[$nama];
echo "Nilai TERTINGGI adalah $nama dengan nilai $value\n";

/**
 * Nilai Terendah
 */
asort($arrSiswa);
$nama = key($arrSiswa);
$value = $arrSiswa[$nama];
echo "Nilai TERENDAH adalah $nama dengan nilai $value\n";
echo "\n";

/**
 * Credit
 */
echo "Program dibuat dengan bahasa PHP oleh @reefebba";
