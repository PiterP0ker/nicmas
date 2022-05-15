<?php
function getDuration($videoID){
   $apikey = "AIzaSyAAlPE3N8dyOuzY8-f6hYg5vuYmQS6ceLs";
   $dur = file_get_contents("https://www.googleapis.com/youtube/v3/videos?part=contentDetails&id=$videoID&key=$apikey");
   $VidDuration =json_decode($dur, true);
   foreach ($VidDuration['items'] as $vidTime)
   {
       $VidDuration= $vidTime['contentDetails']['duration'];
   }
   preg_match_all('/(\d+)/',$VidDuration,$parts);
   return convertDuration($parts);
}

function convertDuration($parts) {
    $result = '';

    if($parts[0][0]) {
        $result = $result.$parts[0][0];
    }

    if($parts[0][1]) {
        $result = $result.":".$parts[0][1];
    } else {
        $result = "0:".$result;
    }

    if($parts[0][2]) {
        $result = $result.":".$parts[0][2];
    }

    return $result;
}
