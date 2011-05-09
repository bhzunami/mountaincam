<?php
/**
 * Get a web file (HTML, XHTML, XML, image, etc.) from a URL.  Return an
 * array containing the header fields and content.
 */
function get_web_page( $url )
{
    $options = array( 'http' => array(
        'user_agent'    => 'Mozilla/4.0 (compatible; MSIE 6.0; Windows NT 5.0)',    // who am i
        'max_redirects' => 10,          // stop after 10 redirects
        'timeout'       => 120,         // timeout on response
    ) );
    $context = stream_context_create( $options );
    $page    = @file_get_contents( $url, false, $context );
 
    $result  = array( );
    if ( $page != false )
        $result['content'] = $page;
    else if ( !isset( $http_response_header ) )
        return null;    // Bad url, timeout

    // Save the header
    $result['header'] = $http_response_header;

    // Get the *last* HTTP status code
    $nLines = count( $http_response_header );
    for ( $i = $nLines-1; $i >= 0; $i-- )
    {
        $line = $http_response_header[$i];
        if ( strncasecmp( "HTTP", $line, 4 ) == 0 )
        {
            $response = explode( ' ', $line );
            $result['http_code'] = $response[1];
            break;
        }
    }
    return $result;
}

/**
 * Reset the camera to the wished side. Does it in the loop you defined.
 */
function set_camera_position( $side, $repetition, $camAddress){
	for($i = 0; $i<$repetition; $i++){
		get_web_page($camAddress . "/cgi-bin/camctrl.cgi?move=" . $side);
		sleep(2);
	}
}
?>