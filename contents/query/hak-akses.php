<?php
    //jika rolle kosong maka lempar ke 403
    if(empty($_SESSION['rolle'])){
        header( 'HTTP/1.0 403 Forbidden', TRUE, 403 );

        //redirect ke 403
        die( header( 'location:error403' ) );
    }

?>