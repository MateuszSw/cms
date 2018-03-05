<?php
 

function url($module, $params = []) {



    $pars = '';

    if(count($params)) {

        foreach($params as $key => $val) {

            $pars .= '&' . $key . '=' . $val;

        }

    }



    return 'http://localhost/cms/index.php?file=' . $module . $pars;

}

