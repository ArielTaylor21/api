<? php
echo "<a target = 'blank' href=https://github.com/ArielTaylor21/api.git /a>"

//COVID19api.get data
$arr 

function main () {
	
	$apiCall = 'https://api.covid19api.com/summary';
	// line below stopped working on CSIS server
	// $json_string = file_get_contents($apiCall); 
	$json_string = curl_get_contents($apiCall);
	$obj = json_decode($json_string);
    
    $arr1 = Array();
    $arr2 = Array();
     foreach($obj->Countries as $i){
         array_push($arr1, $i->Countries);
         array_push($arr2, $i->TotalDeath);
     }
     array_multisort($arr2, SORT_DESC, $arr1);

	print_r($arr1);
}
#-----------------------------------------------------------------------------
// read data from a URL into a string
function curl_get_contents($url) {
    $ch = curl_init();
    curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
    curl_setopt($ch, CURLOPT_HEADER, 0);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
    curl_setopt($ch, CURLOPT_URL, $url);
    $data = curl_exec($ch);
    curl_close($ch);
    return $data;
}