<?php

$dbconn = pg_connect("host=localhost dbname=vanguardhe user=postgres password=admin")
or die('Could not connect: ' . pg_last_error());

?>