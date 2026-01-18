<?php
include 'append/topSessionStart.php';

// Schema Start
$page = array();
$page['meta'] = array(
    "title"     => "TIME ZONE SETTINGS",
    "access"    => "1",
    "table"     => "rp_timezonelist",
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
        "thead"=>"TIMEZONE NAME",
        "col"  =>"name",
        "f"    =>"0"
       
    ),
    
   
   
);
$page['fields'] = array(

  
    "0"   =>array(
        "label"  => "TimeZone Name",
        "col"    => "name",
        "placeholder" => "Enter TimeZone",
        "type"   => "text",
        "required" => "1",
        "class"  => "col-md-12"
    )
     

);
//  Schema End 
include 'append/pageDynamics.php';
?>