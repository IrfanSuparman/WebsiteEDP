<?php

$koneksi = mysqli_connect("192.168.85.62", "root", "","websiteedp");


function registrasi($data) {
	global $koneksi;

	$nik = strtolower(stripslashes($data["nik"]));
	$password = mysqli_real_escape_string($koneksi, $data["password"]);


	// cek username sudah ada belum
	$result = mysqli_query($koneksi, "SELECT nik FROM user WHERE nik = '$nik'");

	if (mysqli_fetch_assoc($result)) {
		echo"
			<script>
			alert('Nik Sudah Terdaftar!')
			</script>
		";
		return false;
	}

	// enkripsi password
	$password = password_hash($password, PASSWORD_DEFAULT);

	// tambahkan user ke database
	mysqli_query($koneksi, "INSERT INTO user VALUES('', '$nik', '$password')");

	return mysqli_affected_rows($koneksi);
}