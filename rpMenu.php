<?php
include 'append/topSessionStart.php';

// Schema Start
$page = array();
$page['meta'] = array(
    "title"     => "Menu Settings",
    "access"    => "1",
    "table"     => "rp_menu",
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
        "thead"=>"CATEGORY",
        "col"  =>"catid",
        "f"    =>"1",
        "ref-table"   => "rp_menucategory",
        "ref-col"     => "name"
       
    ),
    
    "1" => array(
        "thead"=>"ICON",
        "col"  =>"icon",
        "f"    =>"0",
    ),
    "2" => array(
        "thead"=>"NAME",
        "col"  =>"name",
        "f"    =>"0",
    ),
    "3" => array(
        "thead"=>"FILE NAME",
        "col"  =>"file",
        "f"    =>"0",
    ),
   
   
);
$page['fields'] = array(


    "0"   =>array(
        "label"  => "CATEGORY",
        "col"    => "catid",
        "placeholder" => "Select Category Name",
        "type"   => "select",
        "f"      => "1",
        "ref-table"   => "rp_menucategory",
        "ref-col"     => "name",
        "class"  => "col-md-12" 
    ),

    "1"   =>array(
        "label"  => "ICON SVG",
        "col"    => "icon",
        "placeholder" => "Enter Icon SVG",
        "type"   => "textarea",
        "required" => "1",
        "class"  => "col-md-12"
    ),
    "2"   =>array(
        "label"  => "MENU NAME",
        "col"    => "name",
        "placeholder" => "Enter Menu Name",
        "type"   => "text",
        "required" => "1",
        "class"  => "col-md-6"
    ),
    "3" => array(
        "label"  => "FILE NAME",
        "col"    => "file",
        "placeholder" => "Enter File Name",
        "type"   => "text",
        "required" => "1",
        "class"  => "col-md-6"
    ),
    
     

);
//  Schema End 
include 'append/pageDynamics.php';
?>
