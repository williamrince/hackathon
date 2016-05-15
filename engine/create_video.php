<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);

require_once "Requests-1.6.0/library/Requests.php";
Requests::register_autoloader();

$headers = array("Authorization" => "Secret 5SOYODE4OBGLLMPJ5ZA3PWZYL4");
$data = array(
    "tasks" => array(
        "task_name" => "video.create",
        "preview" => True,
        "export" => False,
        "definition" => "<movie service='craftsman-1.0'>
							<body>
								<widget type='director.theme.tiles'>
									<track type='video'>
										<image filename='http://cdn.tmpo.co/data/2016/03/26/id_492938/492938_620.jpg'>
											<track type='caption'><text>Ini Saran Ahli untuk Melawan Ahok di Pilkada DKI 2017</text></track>
										</image>
										<text duration='4.0'>Gubernur DKI Jakarta Basuki Tjahaja Purnama dinilai\npunya kelemahan dan bisa dikalahkan dalam Pilkada</text>
										<text duration='4.0'>\"Ada cara melawan Ahok, bukan dengan isu SARA, tapi\ndengan menonjolkan kapasitas setara dengan Ahok,\"\nungkap pengamat komunikasi politik, Benny Susetyo</text>
										<text duration='2.0'></text>
										<image filename='http://cdn.tmpo.co/data/2015/11/26/id_458264/458264_620.jpg'>
											<track type='caption'><text>Hanura Resmi Dukung Ahok di Pilgub DKI</text></track>
										</image>
										<text duration='6.0'>Partai Hanura resmi mendeklarasikan dukungan pada\ncalon Gubernur DKI inkumben Basuki Tjahaja Purnama\npada pemilihan kepala daerah serentak 2017 depan</text>
										<text duration='2.0'></text>
										<image filename='http://cdn.tmpo.co/data/2013/02/22/id_168894/168894_620.jpg'>
											<track type='caption'><text>PKS Belum Pasti Dukung Yusril di Pilkada DKI</text></track>
										</image>
										<text duration='8.0'>Partai Keadilan Sejahtera DKI Jakarta belum pasti\nbakal mendukung pengacara Yusril Ihza Mahendra di\nPemilihan Gubernur DKI Jakarta 2017. DPP PKS akan\nberikan keputusan final soal siapa yang didukung</text>
										<text duration='2.0'></text>
										<image filename='http://cdn.tmpo.co/data/2016/03/17/id_490499/490499_620.jpg'>
											<track type='caption'><text>Penggemar Ahok dan Dhani Saling Serang, Diskusi Pilkada DKI Bubar</text></track>
										</image>
										<text duration='8.0'>Diskusi \"Fenomena Pilgub DKI 2017\" diwarnai ricuh\nKekisruhan bermula ketika pendukung Basuki Tjahaja\nPurnama, Immanuel Ebenezer, menyindir bakal calon\nGubernur DKI Jakarta, Ahmad Dhani, yang juga seleb</text>
										<text duration='6.0'>\"Apakah masyarakat Jakarta perlu gubernur musisi?\"\nkata Immanuel dalam diskusi. Pendukung Dhani marah\ndan berteriak meminta pernyataan tersebut dicabut</text>
										<text duration='2.0'></text>
										<image filename='http://cdn.tmpo.co/data/2014/04/04/id_277969/277969_620.jpg'>
											<track type='caption'><text>Gerindra Beri Sinyal Ajak PDIP Koalisi Pilgub DKI</text></track>
										</image>
										<text duration='8.0'>Ketua Dewan Pertimbangan Daerah Gerindra Jakarta\nMuhammad Taufik secara terang-terangan memberikan\nsinyal pada Partai Demokrasi Indonesia Perjuangan\nuntuk berkoalisi dalam Pemilihan Gubernur DKI 2017</text>
									</track>
								</widget>
							</body>
						</movie>"
    )
);

$response = Requests::post("https://dragon.stupeflix.com/v2/create", $headers, json_encode($data));
$taskCreation = json_decode($response->body);

$response = Requests::get("https://dragon.stupeflix.com/v2/status?tasks=" . $taskCreation[0]->key, $headers);
$taskStatusAndResult = json_decode($response->body);

/* $taskStatusAndResult[0]->status can be either "queued", "executing", "success" or "error" */

print_r($taskStatusAndResult);
?>