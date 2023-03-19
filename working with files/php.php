<?php

function do_good($filename){
  file_put_contents($filename, "Action type; File name; Date\n");
  $parts = array();
  foreach(glob('dcmFiles/*.dcm') as $file){
    if(!is_broken($file)){
      $date = date('d.m.Y H:i:s');
      file_put_contents($filename, 'Validation;'. basename($file). "; $date\n", FILE_APPEND);
    }
    else if (filesize($file)<528153){
      #start of number 5
      $date = date('d.m.Y H:i:s');
      file_put_contents($filename, 'Found part;'. basename($file). "; $date\n", FILE_APPEND);
      #end of number 5 and start of number 6
      $parts[]=$file;
      $f = fopen($file, 'rb');
      fseek($f, 1);
      #echo $file."\t" . fread($f, 3)."\n";
      fclose($f);
      #end of number 6
    }
    else{
      continue;
    }
  }
  #number 7
  restoration($filename, $parts);
}


function is_broken($file){
  $f = fopen($file, 'rb');
  fseek($f, 85);
  $bites = fread($f, 4);
  fclose($f);

  $arr = unpack('C*' ,$bites);
  $true_arr = array(84, 95, 60 ,126);
  for($i=0; $i<4; $i++){
    if($true_arr[$i] != $arr[$i+1]){
      return true;
    }
    else{
      return false;
    }
  }
}

#number 7
function restoration($filename, $parts){
  $queue = array(2, 4, 3, 1, 5, 0);
  $contents = "";
  $out = fopen("result/restored/files/result.png", 'wb');

  foreach($queue as $q){
    $filesize = filesize($parts[$q]);
    $f = fopen($parts[$q], 'rb');
    $contents .= fread($f, $filesize);
    fclose($f);

    $date = date('d.m.Y H:i:s');
    file_put_contents($filename, 'Deleted;'. basename($parts[$q]). "; $date\n", FILE_APPEND);
  }  
  fwrite($out, $contents);
  fclose($out);
}

$filename = 'CSV.csv';
do_good($filename);
?>
