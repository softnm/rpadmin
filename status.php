<?php
include 'append/topSessionStart.php';

// Schema Start
$page = array();
$page['meta'] = array(
    "title"     => "STATUS LIST",
    "access"    => "1",
    "table"     => "status",
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
        "thead"=>"STATUS NAME",
        "col"  =>"name",
        "f"    =>"0"
       
    ),
    
   
   
);
$page['fields'] = array(

  
    "0"   =>array(
        "label"  => "Status Name",
        "col"    => "name",
        "placeholder" => "Enter Status Name",
        "type"   => "text",
        "required" => "1",
        "class"  => "col-md-12"
    )
     

);
//  Schema End 
include 'append/pageDynamics.php';
?>
