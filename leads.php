<?php

// header("Refresh: 5");
include 'append/topSessionStart.php';

// Schema Start
$page = array();
$page['meta'] = array(
    "title"     => "BOOKING MANAGMENT £ 📍 ",
    "access"    => "1",
    "table"     => "leads",
    "export"    => "1",
    "scroller"  => "1",
    "theme"     => "table-striped table-hower",
    "crud"      => array(
                        "c"=>"0",
                        "r"=>"1",
                        "u"=>"1",
                        "d"=>"0"
                    )
);
$page['view'] = array(
    
    "0" => array(
        "thead"=>"Service Category Name",
        "col"  =>"sid",
        "f"    =>"1",
        "ref-table"   => "services",
        "ref-col"     => "name"
    ),
    
    "1" => array(
        "thead"=>"STATUS",
        "col"  =>"status",
        "f"    =>"1",
        "ref-table"   => "status",
        "ref-col"     => "name"
    ),
    
    "2" => array(
        "thead"=>"FROM LOCATION",
        "col"  =>"from_loc",
        "f"    =>"0",
       
    ),
    
     "3" => array(
        "thead"=>"TO LOCATION",
        "col"  =>"to_loc",
        "f"    =>"0",
       
    ),
     "4" => array(
        "thead"=>"VEHICLE TYPE",
        "col"  =>"vehicle",
        "f"    =>"0",
       
    ),
     "5" => array(
        "thead"=>"PICKUP TIME",
        "col"  =>"booking_time",
        "f"    =>"0",
       
    ),
     "6" => array(
        "thead"=>"CUSTOMER NAME",
        "col"  =>"name",
        "f"    =>"0",
       
    ),
     "7" => array(
        "thead"=>"CUSTOMER EMAIL",
        "col"  =>"email",
        "f"    =>"0",
       
    ),

     "8" => array(
        "thead"=>"CUSTOMER MOBILE",
        "col"  =>"mobile",
        "f"    =>"0",
       
    ),
    
    "9" => array(
        "thead"=>"CUSTOMER MOBILE",
        "col"  =>"mobile",
        "f"    =>"0",
       
    ),
    
   

    "10" => array(
        "thead"=>"CUSTOMER FIRST CALL REMARKS",
        "col"  =>"remark1",
        "f"    =>"0",
       
    ),
    
    "11" => array(
        "thead"=>"WIZ INTERNAL NOTES",
        "col"  =>"remark2",
        "f"    =>"0",
       
    ),
    
    "12" => array(
        "thead"=>"DELIEVERY PARTNER NOTES",
        "col"  =>"remark3",
        "f"    =>"0",
       
    ),
    
    "13" => array(
        "thead"=>"CUSTOMER FINAL CLOSE REMARKS",
        "col"  =>"remark4",
        "f"    =>"0",
       
    ),
    
     "14" => array(
        "thead"=>"AMONT £",
        "col"  =>"amount",
        "f"    =>"0",
       
    ),
     "15" => array(
        "thead"=>"DELIEVERY PARTNER NAME",
        "col"  =>"delivery_partner",
         "f"    =>"1",
        "ref-table"   => "delivery_partner",
        "ref-col"     => "name"
       
    ),
     "16" => array(
        "thead"=>"DELIEVERY PARTNER MOBILE",
        "col"  =>"delivery_partner",
         "f"    =>"1",
        "ref-table"   => "delivery_partner",
        "ref-col"     => "mobile"
       
    ),
    
     "17" => array(
        "thead"=>"PORTAL TRANSFERED CALL",
        "col"  =>"portal",
         "f"    =>"1",
        "ref-table"   => "portal",
        "ref-col"     => "name"
       
    ),
    
    
    "18" => array(
        "thead"=>"LAST UPDATE TIMESTAMP",
        "col"  =>"timestamp",
        "f"    =>"0",
        
    ),


    
   
   
);
$page['fields'] = array(

     
     "0"   =>array(
        "label"  => "BOOKING STATUS",
        "col"    => "status",
        "placeholder" => "CHANGE STATUS",
        "type"   => "select",
        "f"      => "1",
      "ref-table"   => "status",
        "ref-col"     => "name",
        "class"  => "col-md-3" 
    ),
     
     "1"   =>array(
        "label"  => "DELIVERY PARTNER",
        "col"    => "delivery_partner",
        "placeholder" => "Select DELIVERY PARTNER",
        "type"   => "select",
        "f"      => "1",
      "ref-table"   => "delivery_partner",
        "ref-col"     => "name",
        "class"  => "col-md-3" 
    ),
    
    "2"   =>array(
        "label"  => "PORTAL TRANSFERED CALL",
        "col"    => "portal",
        "placeholder" => "TRANSFER CALL TO PORTAL",
        "type"   => "select",
        "f"      => "1",
      "ref-table"   => "portal",
        "ref-col"     => "name",
        "class"  => "col-md-3" 
    ),

    "3"   =>array(
        "label"  => "AMONT £",
        "col"    => "amount",
        "placeholder" => "Enter Amount",
        "type"   => "number",
        "required" => "1",
        "class"  => "col-md-3"
    ),

    "4"   =>array(
        "label"  => "CUSTOMER FIRST CALL REMARKS",
        "col"    => "remark1",
        "placeholder" => "Enter Remarks First Time Call to Customer When Taking Confirmation from customer",
        "type"   => "textarea",
        "required" => "1",
        "rows" => "4",
        "class"  => "col-md-6"
    ),
    
    
     "5"   =>array(
        "label"  => "WIZ INTERNAL NOTES",
        "col"    => "remark2",
        "placeholder" => "Enter Remarks For Internal Notes like e.g. Transfered this call to Another Service provider and Job id is #27 , Or describe the Internal issue happening for delievery",
        "type"   => "textarea",
        "required" => "1",
        "rows" => "4",
        "class"  => "col-md-6"
    ),
    
    
     "6"   =>array(
        "label"  => "DELIEVERY PARTNER NOTES",
        "col"    => "remark3",
        "placeholder" => "Enter Remarks Releated to Delievery Partner e.g. Driver stuck in Rain , Tyre Puncture etc",
        "type"   => "textarea",
        "required" => "1",
        "rows" => "4",
        "class"  => "col-md-6"
    ),
    
    
       "7"   =>array(
        "label"  => "CUSTOMER FINAL CLOSE REMARKS",
        "col"    => "remark4",
        "placeholder" => "Enter Remarks Review From Customer Final Happy Calling That Customer is Satisfied",
        "type"   => "textarea",
        "required" => "1",
        "rows" => "4",
        "class"  => "col-md-6"
    ),
    
    "8"   =>array(
        "label"  => "CUSTOMER NAME",
        "col"    => "name",
        "placeholder" => "Customer Name",
        "type"   => "text",
        "required" => "1",
        "class"  => "col-md-4"
    ),
    
    "9"   =>array(
        "label"  => "MOBILE NUMBER",
        "col"    => "mobile",
        "placeholder" => "Customer Mobile",
        "type"   => "text",
        "required" => "1",
        "class"  => "col-md-4"
    ),
    
    "10"   =>array(
        "label"  => "CUSTOMER EMAIL",
        "col"    => "email",
        "placeholder" => "Customer Email",
        "type"   => "text",
        "required" => "1",
        "class"  => "col-md-4"
    ),
    
    
   
    
    

);
//  Schema End 
include 'append/pageDynamics.php';
?>
