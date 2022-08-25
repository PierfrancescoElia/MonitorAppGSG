<?php
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Submit
    if ($_POST['password'] == "sr22") { // <- password corretta
        $save['data'] = $_POST['data'];
        $save['pietanze'] = $_POST['pietanze'];
        file_put_contents("config.json", json_encode($save));
        $messaggio = "Dati salvati correttamente! A breve il monitor sarà aggiornato.";
        $error = 0;
    } else {
        $messaggio = "Password non corretta. Le impostazioni non sono state salvate.";
        $error = 1;
    }
}

require("variables.php");

$query = $db->query("SELECT descrizionebreve FROM articoli");
while ($r = $query->fetch(PDO::FETCH_ASSOC)) $pietanze[] = $r['descrizionebreve'];
$query = $db->query("SELECT descrizionebreve FROM ingredienti");
while ($r = $query->fetch(PDO::FETCH_ASSOC)) $ingredienti[] = $r['descrizionebreve'];
?>

<html>
    <head>
        <title>Setup | Monitor Cucina</title>
        <link href="/assets/style.css" rel="stylesheet">
    </head>
    <body style="vertical-align: middle; text-align: center">
        <img src="/assets/img/logo.png" alt="San Rocco" height="150px" style="margin-top: 50px">
        <h2>Setup | Monitor Cucina</h2>

        <?php if (isset($messaggio)) { ?>
            <div style="width: 40%; margin: auto; margin-bottom: 20px; background-color: <?= ($error) ? '#E85252' : '#93EC6F' ?>; padding: 10px;">
                <b><?= ($error) ? 'Errore' : 'Successo' ?>!</b>
                <p><?= $messaggio ?></p>
            </div>
        <?php } ?>
        <form method="POST">
            <table style="margin-left: auto; margin-right: auto;">
                <tr>
                    <td>
                        <p>Seleziona una data&nbsp;</p>
                    </td>
                    <td>
                        <input type="date" name="data" value="<?= $config['data'] ?>" required>
                    </td>
                </tr>
            </table>
            <br><br>
            <table style="margin-left: auto; margin-right: auto;">
                <tr>
                    <td colspan="3">
                        <p align="center">Seleziona le pietanze</p>
                    </td>
                </tr>
                <tr>
                    <td>
                        <select name="pietanze[]">
                            <option value="">---</option>
                            <optgroup label="Pietanze">
                                <?php foreach ($pietanze as $pietanza) echo "<option value='PIET#".$pietanza."' ".(($pietanza == substr($config['pietanze'][0],5)) ? 'selected' : "").">".$pietanza."</option>"; ?>
                            </optgroup>
                            <optgroup label="Ingredienti">
                                <?php foreach ($ingredienti as $ingrediente) echo "<option value='INGR#".$ingrediente."' ".(($ingrediente == substr($config['pietanze'][0],5)) ? 'selected' : "").">".$ingrediente."</option>"; ?>
                            </optgroup>
                        </select>
                    </td>
                    <td>
                        <select name="pietanze[]">
                            <option value="">---</option>
                            <optgroup label="Pietanze">
                                <?php foreach ($pietanze as $pietanza) echo "<option value='PIET#".$pietanza."' ".(($pietanza == substr($config['pietanze'][1],5)) ? 'selected' : "").">".$pietanza."</option>"; ?>
                            </optgroup>
                            <optgroup label="Ingredienti">
                                <?php foreach ($ingredienti as $ingrediente) echo "<option value='INGR#".$ingrediente."' ".(($ingrediente == substr($config['pietanze'][1],5)) ? 'selected' : "").">".$ingrediente."</option>"; ?>
                            </optgroup>
                        </select>
                    </td>
                    <td>
                        <select name="pietanze[]">
                            <option value="">---</option>
                            <optgroup label="Pietanze">
                                <?php foreach ($pietanze as $pietanza) echo "<option value='PIET#".$pietanza."' ".(($pietanza == substr($config['pietanze'][2],5)) ? 'selected' : "").">".$pietanza."</option>"; ?>
                            </optgroup>
                            <optgroup label="Ingredienti">
                                <?php foreach ($ingredienti as $ingrediente) echo "<option value='INGR#".$ingrediente."' ".(($ingrediente == substr($config['pietanze'][2],5)) ? 'selected' : "").">".$ingrediente."</option>"; ?>
                            </optgroup>
                        </select>
                    </td>
                </tr>
                <tr>
                    <td>
                        <select name="pietanze[]">
                            <option value="">---</option>
                            <optgroup label="Pietanze">
                                <?php foreach ($pietanze as $pietanza) echo "<option value='PIET#".$pietanza."' ".(($pietanza == substr($config['pietanze'][3],5)) ? 'selected' : "").">".$pietanza."</option>"; ?>
                            </optgroup>
                            <optgroup label="Ingredienti">
                                <?php foreach ($ingredienti as $ingrediente) echo "<option value='INGR#".$ingrediente."' ".(($ingrediente == substr($config['pietanze'][3],5)) ? 'selected' : "").">".$ingrediente."</option>"; ?>
                            </optgroup>
                        </select>
                    </td>
                    <td>
                        <select name="pietanze[]">
                            <option value="">---</option>
                            <optgroup label="Pietanze">
                                <?php foreach ($pietanze as $pietanza) echo "<option value='PIET#".$pietanza."' ".(($pietanza == substr($config['pietanze'][4],5)) ? 'selected' : "").">".$pietanza."</option>"; ?>
                            </optgroup>
                            <optgroup label="Ingredienti">
                                <?php foreach ($ingredienti as $ingrediente) echo "<option value='INGR#".$ingrediente."' ".(($ingrediente == substr($config['pietanze'][4],5)) ? 'selected' : "").">".$ingrediente."</option>"; ?>
                            </optgroup>
                        </select>
                    </td>
                    <td>
                        <select name="pietanze[]">
                            <option value="">---</option>
                            <optgroup label="Pietanze">
                                <?php foreach ($pietanze as $pietanza) echo "<option value='PIET#".$pietanza."' ".(($pietanza == substr($config['pietanze'][5],5)) ? 'selected' : "").">".$pietanza."</option>"; ?>
                            </optgroup>
                            <optgroup label="Ingredienti">
                                <?php foreach ($ingredienti as $ingrediente) echo "<option value='INGR#".$ingrediente."' ".(($ingrediente == substr($config['pietanze'][5],5)) ? 'selected' : "").">".$ingrediente."</option>"; ?>
                            </optgroup>
                        </select>
                    </td>
                </tr>
                <tr>
                    <td>
                        <select name="pietanze[]">
                            <option value="">---</option>
                            <optgroup label="Pietanze">
                                <?php foreach ($pietanze as $pietanza) echo "<option value='PIET#".$pietanza."' ".(($pietanza == substr($config['pietanze'][6],5)) ? 'selected' : "").">".$pietanza."</option>"; ?>
                            </optgroup>
                            <optgroup label="Ingredienti">
                                <?php foreach ($ingredienti as $ingrediente) echo "<option value='INGR#".$ingrediente."' ".(($ingrediente == substr($config['pietanze'][6],5)) ? 'selected' : "").">".$ingrediente."</option>"; ?>
                            </optgroup>
                        </select>
                    </td>
                    <td>
                        <select name="pietanze[]">
                            <option value="">---</option>
                            <optgroup label="Pietanze">
                                <?php foreach ($pietanze as $pietanza) echo "<option value='PIET#".$pietanza."' ".(($pietanza == substr($config['pietanze'][7],5)) ? 'selected' : "").">".$pietanza."</option>"; ?>
                            </optgroup>
                            <optgroup label="Ingredienti">
                                <?php foreach ($ingredienti as $ingrediente) echo "<option value='INGR#".$ingrediente."' ".(($ingrediente == substr($config['pietanze'][7],5)) ? 'selected' : "").">".$ingrediente."</option>"; ?>
                            </optgroup>
                        </select>
                    </td>
                    <td>
                        <select name="pietanze[]">
                            <option value="">---</option>
                            <optgroup label="Pietanze">
                                <?php foreach ($pietanze as $pietanza) echo "<option value='PIET#".$pietanza."' ".(($pietanza == substr($config['pietanze'][8],5)) ? 'selected' : "").">".$pietanza."</option>"; ?>
                            </optgroup>
                            <optgroup label="Ingredienti">
                                <?php foreach ($ingredienti as $ingrediente) echo "<option value='INGR#".$ingrediente."' ".(($ingrediente == substr($config['pietanze'][8],5)) ? 'selected' : "").">".$ingrediente."</option>"; ?>
                            </optgroup>
                        </select>
                    </td>
                </tr>
            </table>
            <br><br>
            <table style="margin-left: auto; margin-right: auto;">
                <tr>
                    <td>
                        <p>Inserisci la Password&nbsp;</p>
                    </td>
                    <td>
                        <input type="password" name="password" autocomplete="off" required>
                    </td>
                </tr>
                <tr>
                    <td colspan="2">
                        <input style="width: 100%" type="submit" value="Salva">
                    </td>
                </tr>
            </table>

        </form>


    </body>
</html>