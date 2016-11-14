<?php
if( ! function_exists( "parse_member_status" ) ) :
function parse_member_status( $status ) {
	$status_name = "";
	
	switch( $status ) {
		case "1": 
			$status_name = 	"Activated";
			break;
		case "-1": 
			$status_name = 	"Blocked";
			break;
		default: 
			$status_name = 	"In-Activated";
			break;
	}
	
	return $status_name;
}
endif;
// 

if( ! function_exists( "parse_download" ) ) :
function parse_download( $download ) {
	$download_name = "";

	switch( $download ) {		
		default:
			$download_name = 	"Yes";
			break;
	}

	return $download_name;
}
endif;


if( ! function_exists( "parse_image" ) ) :
function parse_image($image) {
	$html = "";	
	$html .='<img style="width:160px; height:104px;" alt="" src="/uploads/' . $image . '">';
	return $html;
}
endif;


// SUPPORT FUNCTIONS: 

if ( ! function_exists( 'filter_array' ) ) :
function filter_array($array_source, $array_filter_list){
	$result = array();
	foreach($array_filter_list as $key=>$value){
		$result[$value] = $array_source[$value];
	}
	return $result;
}
endif;

if ( ! function_exists( 'strip_tags_array' ) ) :
function strip_tags_array( $params = array() ){
	if(is_array( $params ) ) {
		foreach( $params as $key => $value ){
			if( is_array($value) ){
				$value = strip_tags_array( $value );
			}
			else {
				$value = strip_tags( $value );
			}
			
			$params[ $key ] = $value;
		}
	}
	
	return $params;
}
endif;


if ( ! function_exists( 'strip_empty_array' ) ) :

//strip empty value
function strip_empty_array($params = array(),$except_numeric=1,$trim_array=1){
	//Remove empty object.
	if(is_array($params)){
		//Trim parameters.
		if($trim_array)$params = trim_array($params);
		
		foreach($params as $key => $value){
			if(is_array($value)){
				$value = strip_empty_array($value,$except_numeric,0);
			}
			
			if(empty($value)&&(!is_numeric($value)||!$except_numeric)) 
				unset($params[$key]);
		}
	}
	
	return $params;
}

endif;



if ( ! function_exists( 'trim_array' ) ) :
function trim_array($params = array()){
	if(is_array($params)){
		foreach($params as $key => $value){
			if(is_array($value)){
				$value = trim_array($value);
			}elseif(is_string($value)){
				$value = trim($value);
			}
			
			$params[$key] = $value;
		}
	}
	return $params;
}
endif;



if( !function_exists( 'get_current_url' ) ):
function get_current_url() {
	$pageURL = 'http';
	if ($_SERVER["HTTPS"] == "on") {
		$pageURL .= "s";
	}
	$pageURL .= "://";
	
	if ($_SERVER["SERVER_PORT"] != "80") {
		$pageURL .= $_SERVER["SERVER_NAME"].":".$_SERVER["SERVER_PORT"].$_SERVER["REQUEST_URI"];
	} else {
		$pageURL .= $_SERVER["HTTP_HOST"].$_SERVER["REQUEST_URI"];
	}
	
	
	
	return $pageURL;
}
endif;



if ( ! function_exists( 'save_email_sent' ) ) :
function save_email_sent($guid,$type,$from_email,$from_name,$to_email,$to_name,$subject,$body){
	global $wpdb;
	$data["guid"]=$guid;
	$data["type"]=$type;
	$data["from_email"]=$from_email;
	$data["from_name"]=$from_name;
	$data["to_email"]=$to_email;
	$data["to_name"]=$to_name;
	$data["subject"] = $subject;
	$data["body"] = $body;
	

	$wpdb->insert( $wpdb->prefix . "email_sents", $data);
	$insert_id = $wpdb->insert_id;
	
	return $insert_id;
}
endif;

if ( ! function_exists( 'trim_double_white_space' ) ) :
//remove double white space
function trim_double_white_space($param){
	//return preg_replace('/\s\s+/', ' ', $param);
	return preg_replace('/[ \t\r\n][ \t\r\n]+/', ' ', $param);
}
endif;


if ( ! function_exists( 'trim_complete' ) ) :

//Remove double white space and trim.
function trim_complete($param){
	return trim(trim_double_white_space($param));
}

endif;

if ( ! function_exists( 'trim_complete_array' ) ) :
//trim_complete_array
/**
* Replace double white space and trim for all value of an array.
*/
function trim_complete_array($params = array()){
	if(is_array($params)){
		foreach($params as $key => $value){
			if(is_array($value)){
				$value = trim_complete_array($value);
			}elseif(is_string($value)){
				$value = trim_complete($value);
			}
			
			$params[$key] = $value;
		}
	}
	return $params;
}
endif;



/*
** check a date
** dd.mm.yyyy || mm/dd/yyyy || dd-mm-yyyy || yyyy-mm-dd
*/
if( ! function_exists( "is_valid_date" ) ) :
function is_valid_date($date) {
    if(strlen($date) == 10) {
        $pattern = '/\.|\/|-/i';    // . or / or -
        preg_match($pattern, $date, $char);
       
        $array = preg_split($pattern, $date, -1, PREG_SPLIT_NO_EMPTY);
       
        if(strlen($array[2]) == 4) {
            // dd.mm.yyyy || dd-mm-yyyy
            if($char[0] == "."|| $char[0] == "-") {
                $month = $array[1];
                $day = $array[0];
                $year = $array[2];
            }
            // mm/dd/yyyy    # Common U.S. writing
            if($char[0] == "/") {
                $month = $array[0];
                $day = $array[1];
                $year = $array[2];
            }
        }
        // yyyy-mm-dd    # iso 8601
        if(strlen($array[0]) == 4 && $char[0] == "-") {
            $month = $array[1];
            $day = $array[2];
            $year = $array[0];
        }
        if(checkdate($month, $day, $year)) {    //Validate Gregorian date
            return TRUE;
        } else {
            return FALSE;
        }
    }else {
        return FALSE;    // more or less 10 chars
    }
}
endif;

?>