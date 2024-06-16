<?php
$prizes = ["大獎", "二等獎", "三等獎", "四等獎", "五等獎"];
$randomPrize = $prizes[array_rand($prizes)];

echo json_encode(['prize' => $randomPrize]);
?>