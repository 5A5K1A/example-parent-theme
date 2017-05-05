<?php

class Control_Develop {

    public function __construct() {

        $method = getValue('method');
        if( empty($method) ) {
            echo <<<EOHTML
    <p>
        <a href="/?control=develop&method=stijldocument" class="btn btn-default">bekijk het stijldocument</a>
    </p>

EOHTML;
        }

        // load template
        require_once( $method.'.php' );
        exit;
    }
}