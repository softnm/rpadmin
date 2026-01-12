<?php
include 'append/topSessionStart.php';

// Schema Start
$page = array();
$page['meta'] = array(
    "title"     => "Data",
    "access"    => "1",
    "table"     => "rptest",
    "export"    => "1",
    "scroller"  => "1",
    "theme"     => "table-striped table-hower",
    "crud"      => array(
                        "c"=>"1",
                        "r"=>"1",
                        "u"=>"1",
                        "d"=>"1"
                    )
);
$page['view'] = array(
    
    "0" => array(
        "thead"=>"Name",
        "col"  =>"name",
        "f"    =>"0",
       
    ),
    
    "1" => array(
        "thead"=>"Mobile",
        "col"  =>"mobile",
        "f"    =>"0",
       
    ),
   
   
);
$page['fields'] = array(


    "0"   =>array(
        "label"  => "SERVICE CENTER NAME",
        "col"    => "name",
        "placeholder" => "Enter Service Center Name",
        "type"   => "text",
        "required" => "1",
        "class"  => "col-md-6"
    ),

    "1"   =>array(
        "label"  => "Mobile",
        "col"    => "mobile",
        "placeholder" => "EnterMobile",
        "mask"   => "1",
        "mask-format" => "9999999999",
        "type"   => "text",
        "required" => "1",
        "class"  => "col-md-6"
    ),
    
     

);
//  Schema End 
include 'append/pageDynamics.php';
?>
