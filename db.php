<?php
require("variables.php");

//$query = $db->query("SELECT COALESCE(adulti.q, 0) + COALESCE(bambini.q, 0) AS coperti FROM (SELECT SUM(r.quantita) q FROM righe r INNER JOIN ordini o ON o.id = r.id_ordine WHERE r.descrizionebreve = 'COPERTO ADULTO' AND o.serata = '".$config['data']."') adulti CROSS JOIN (SELECT SUM(r.quantita) q FROM righe r INNER JOIN ordini o ON o.id = r.id_ordine WHERE r.descrizionebreve = 'COPERTO BAMBINO' AND o.serata = '".$config['data']."') bambini;");
$query = $db->query("SELECT COALESCE(SUM(o.coperti), 0) AS coperti FROM ordini o WHERE o.serata = '".$config['data']."';");
$r['coperti'] = $query->fetch(PDO::FETCH_ASSOC)['coperti'];


foreach ($config['pietanze'] as $pietanza) {
    if (substr($pietanza, 0, 4) == "PIET") {
        // pietanza - elemento intero
        $query = $db->query("SELECT COALESCE(SUM(r.quantita), 0) q FROM righe r INNER JOIN ordini o ON o.id = r.id_ordine WHERE r.descrizionebreve = '".substr($pietanza,5)."' AND o.serata = '".$config['data']."'");
        $r['pietanze'][$pietanza] = $query->fetch(PDO::FETCH_ASSOC)['q'];
    } elseif (substr($pietanza, 0, 4) == "INGR") {
        // ingrediente
        $query = $db->query("SELECT COALESCE(SUM(r_ing.quantita), 0) q FROM righe_ingredienti r_ing INNER JOIN righe_articoli r_art ON r_art.id = r_ing.id_riga_articolo INNER JOIN righe r ON r.id = r_art.id_riga INNER JOIN ordini o ON o.id = r.id_ordine WHERE r_ing.descrizionebreve = '".substr($pietanza,5)."' AND o.serata = '".$config['data']."'");
        $r['pietanze'][$pietanza] = $query->fetch(PDO::FETCH_ASSOC)['q'];
    } 
}

echo json_encode($r);
?>
