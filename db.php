<?php
require("variables.php");

$query = $db->query("SELECT COALESCE(adulti.q, 0) + COALESCE(bambini.q, 0) AS coperti FROM (SELECT SUM(r.quantita) q FROM righe r INNER JOIN ordini o ON o.id = r.id_ordine WHERE r.descrizionebreve = 'COPERTO ADULTO' AND o.serata = '".$config['data']."') adulti CROSS JOIN (SELECT SUM(r.quantita) q FROM righe r INNER JOIN ordini o ON o.id = r.id_ordine WHERE r.descrizionebreve = 'COPERTO BAMBINO' AND o.serata = '".$config['data']."') bambini;");
$r['coperti'] = $query->fetch(PDO::FETCH_ASSOC)['coperti'];


foreach ($config['pietanze'] as $pietanza) {
    $query = $db->query("SELECT COALESCE(SUM(r.quantita), 0) q FROM righe r INNER JOIN ordini o ON o.id = r.id_ordine WHERE r.descrizionebreve = '".$pietanza."' AND o.serata = '".$config['data']."'");
    $r['pietanze'][$pietanza] = $query->fetch(PDO::FETCH_ASSOC)['q'];
}

echo json_encode($r);
?>
