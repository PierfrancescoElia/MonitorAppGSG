<?php
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Submit
    if ($_POST['password'] == "PASSWORD PER CONFERMA") { // <- password corretta
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
                            <?php foreach ($pietanze as $pietanza) echo "<option value='".$pietanza."' ".(($pietanza == $config['pietanze'][0]) ? 'selected' : "").">".$pietanza."</option>"; ?>
                        </select>
                    </td>
                    <td>
                        <select name="pietanze[]">
                            <option value="">---</option>
                            <?php foreach ($pietanze as $pietanza) echo "<option value='".$pietanza."' ".(($pietanza == $config['pietanze'][1]) ? 'selected' : "").">".$pietanza."</option>"; ?>
                        </select>
                    </td>
                    <td>
                        <select name="pietanze[]">
                            <option value="">---</option>
                            <?php foreach ($pietanze as $pietanza) echo "<option value='".$pietanza."' ".(($pietanza == $config['pietanze'][2]) ? 'selected' : "").">".$pietanza."</option>"; ?>
                        </select>
                    </td>
                </tr>
                <tr>
                    <td>
                        <select name="pietanze[]">
                            <option value="">---</option>
                            <?php foreach ($pietanze as $pietanza) echo "<option value='".$pietanza."' ".(($pietanza == $config['pietanze'][3]) ? 'selected' : "").">".$pietanza."</option>"; ?>
                        </select>
                    </td>
                    <td>
                        <select name="pietanze[]">
                            <option value="">---</option>
                            <?php foreach ($pietanze as $pietanza) echo "<option value='".$pietanza."' ".(($pietanza == $config['pietanze'][4]) ? 'selected' : "").">".$pietanza."</option>"; ?>
                        </select>
                    </td>
                    <td>
                        <select name="pietanze[]">
                            <option value="">---</option>
                            <?php foreach ($pietanze as $pietanza) echo "<option value='".$pietanza."' ".(($pietanza == $config['pietanze'][5]) ? 'selected' : "").">".$pietanza."</option>"; ?>
                        </select>
                    </td>
                </tr>
                <tr>
                    <td>
                        <select name="pietanze[]">
                            <option value="">---</option>
                            <?php foreach ($pietanze as $pietanza) echo "<option value='".$pietanza."' ".(($pietanza == $config['pietanze'][6]) ? 'selected' : "").">".$pietanza."</option>"; ?>
                        </select>
                    </td>
                    <td>
                        <select name="pietanze[]">
                            <option value="">---</option>
                            <?php foreach ($pietanze as $pietanza) echo "<option value='".$pietanza."' ".(($pietanza == $config['pietanze'][7]) ? 'selected' : "").">".$pietanza."</option>"; ?>
                        </select>
                    </td>
                    <td>
                        <select name="pietanze[]">
                            <option value="">---</option>
                            <?php foreach ($pietanze as $pietanza) echo "<option value='".$pietanza."' ".(($pietanza == $config['pietanze'][8]) ? 'selected' : "").">".$pietanza."</option>"; ?>
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