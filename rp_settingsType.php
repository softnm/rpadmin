<?php
include 'append/topSessionStart.php';

// Schema Start
$page = array();
$page['meta'] = array(
    "title"     => "SETTINGS TYPE",
    "access"    => "1",
    "table"     => "rp_settingstype",
    "export"    => "1",
    "scroller"  => "1",
    "theme"     => "table-striped table-hower",
    "crud"      => array(
                        "c"=>"0",
                        "r"=>"1",
                        "u"=>"0",
                        "d"=>"0"
                    )
);
$page['view'] = array(
    
    "0" => array(
        "thead"=>"SETTINGS CATEGORY NAME",
        "col"  =>"name",
        "f"    =>"0",
       
    ),
);
$page['fields'] = array(
    "0"   =>array(
        "label"  => "SETTINGS CATEGORY NAME",
        "col"    => "name",
        "placeholder" => "ENter Category Name",
        "type"   => "text",
        "required" => "1",
        "class"  => "col-md-12"
    ),
);
//  Schema End 
include 'append/pageDynamics.php';
?>
