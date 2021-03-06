<?php

$path = "'" . getcwd()."\DataFolder\data_out.csv" . "'";

require "db_initialize.php";

$query = "
COPY(
  SELECT 
  outages.nodeid, 
  outages.ipaddr, 
  outages.serviceid, 
  outages.iflostservice, 
  outages.ifregainedservice, 
  node.nodelabel,
  node.nodeid,
  node.nodesysoid
FROM 
  public.outages, 
  public.node
WHERE 
  outages.nodeid = node.nodeid
ORDER BY
  outages.nodeid ASC) 
TO $path With CSV HEADER;
";
$result = pg_query($query) or die('Query failed: ' . pg_last_error());

if(file_exists("DataFolder/data_out.csv")){
  
  $myfile = fopen("DataFolder/data_out.csv", "a+") or die("Unable to open file!");
  fwrite($myfile, "System time: ". date('Y-m-d H:i:s')."\n");
  fwrite($myfile, "These data are generated by Electroline Rapid NMS Portal"."\n");
  fwrite($myfile, "2015 Electroline Equipment Inc. All rights reserved."."\n");
  fclose($myfile);
  file_downloading();


}



function file_downloading($file="DataFolder/data_out.csv"){
  if(file_exists($file)) {
    header('Content-Description: File Transfer');
    header('Content-Type: application/octet-stream');
    header('Content-Disposition: attachment; filename='.basename($file));
    header('Content-Transfer-Encoding: binary');
    header('Expires: 0');
    header('Cache-Control: must-revalidate, post-check=0, pre-check=0');
    header('Pragma: public');
    header('Content-Length: ' . filesize($file));
    ob_clean();
    flush();
    readfile($file);
    exit;
  }
}


ini_set('display_errors', 1);
?>