# MonitorAppGSG
Monitor App per Gestione Stand Gastronomico

# Requisiti
1) Hardware
- Raspberry Pi
- TV / Monitor
2) Software
- Nginx
- PHP (con estensioni php-pdo e php-json)
- unclutter
- x11-xserver-utils

# Installazione
`apt install -y requirements.txt`
- modificare conf nginx per abilitare php
- abilitare mod pdo con `phpenmod pgsql`

# TO DO 
- vedere nel setup.php, se esiste una pietanza con nome uguale ad ingrediente, il select potrebbe non selezionare voce corretta, aggiungere controllo di PIET oppure INGR in modo da essere certi della voce da selezionare.

# Idea
Avere in cucina, un monitor che mostrasse in tempo reale l'andamento di vendita di alcuni (max. 9) pietanze selezionate.

# Per chi è questa soluzione
Per chi vuol avere in tempo reale in cucina un feedback sulle vendite, e quindi in modo che le pietanze con tempi di cottura più lunghi si portassero avanti con la preparazione.

# Perché non ho utilizzato la soluzione fornita con GSG
Perchè è richiesto intervento umano al fine che sia funzionante, e perchè un ordine può essere catalogato come 'Completato' nella sua interezza (cosa che richiede magari 2 ore perchè sia completato) e non può essere marchiata come 'Completata' la singola pietanza, lasciando quindi come 'Da Preparare' delle pietanza che in realtà erano già state preparate.

# Installazione
1) Installare la versione più completa di Raspbian (Raspbian Buster with desktop and recommended software)
2) Installare il software indicato nei requisiti
3) Clonare la repository nella cartella `/var/www/html`
4) rendere il file config.json scrivibile dall'utente responsabile del server web (nginx) e modificare il file `variables.php`
5) Testare collegandosi a `http://<IP_RASP>`
6) Modificare il file `/etc/xdg/lxsession/LXDE-pi/autostart`

```
@lxpanel --profile LXDE-pi
@pcmanfm --desktop --profile LXDE-pi
# CHANGED
#@xscreensaver -no-splash
@point-rpi
 
# BEGIN ADDED

@/usr/bin/chromium-browser --incognito --start-maximized --kiosk http://localhost
@unclutter
@xset s off
@xset s noblank
@xset -dpms
 
# END ADDED
```
7) Riavviare

# Suggerimento
Se il Raspberry non ha la connessione ad internet - quindi non può automaticamente regolare l'ora - impostarla con `sudo date --set '2022/08/21 23:59'`

# Utilizzo
Dalla pagina `setup.php` è possibile impostare quali pietanze mostrare sul monitor e la data della serata da prendere in considerazione. Per salvare i dati, occorre digitare la password che è indicata [qui](https://github.com/PierfrancescoElia/MonitorAppGSG/blob/master/setup.php#L4).
