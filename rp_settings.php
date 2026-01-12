<?php
include 'append/topSessionStart.php';

// Schema Start
$page = array();
$page['meta'] = array(
    "title"     => "APPLICATION SETTINGS DATA",
    "access"    => "1",
    "table"     => "rp_settings",
    "export"    => "1",
    "scroller"  => "1",
    "theme"     => "table-striped table-hower",
    "crud"      => array(
                        "c"=>"1",
                        "r"=>"1",
                        "u"=>"1",
                        "d"=>"0"
                    )
);
$page['view'] = array(
    
    "0" => array(
        "thead"=>"SETTINGS CATEGORY",
        "col"  =>"type",
        "f"    =>"1",
        "ref-table"   => "rp_settingstype",
        "ref-col"     => "name"
       
    ),
    "1" => array(
        "thead"=>"NAME",
        "col"  =>"name",
        "f"    =>"0",
    ),
    "2" => array(
        "thead"=>"VALUE",
        "col"  =>"value",
        "f"    =>"0",
    ),
);
$page['fields'] = array(
    "0"   =>array(
        "label"  => "SETTING VALUE",
        "col"    => "value",
        "placeholder" => "Enter Settings Value",
        "type"   => "textarea",
        "rows" => "10",
        "required" => "1",
        "class"  => "col-md-12"
    )
);
//  Schema End 
include 'append/pageDynamics.php';
?>
