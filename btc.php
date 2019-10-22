<?php
/*$xpub = 'xpub6CbGKsDvwdjvdB94Epa3TJwvgaaELsfD4TSJ7kgxH1pRygpHKA5kn7C4E389a2V6mpXmXso7geG9yRX1gTonSH942PHkbu91cZN9GwVAYM7';
$url = 'https://api.smartbit.com.au/v1/blockchain/address/'.$xpub;

$fgc = json_decode(file_get_contents($url), true);
echo $fgc["address"]["extkey_next_receiving_address"];*/
$chave = '1HbVoApw4bPMowna57ena6CiBE95GMiV1s';
$url = 'https://api.smartbit.com.au/v1/blockchain/address/'.$chave;
$r = json_decode(file_get_contents($url), true);
var_dump($r['address']['transactions'][0]);