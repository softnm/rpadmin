<?php 

/*
Execute the Function and Get Results Global Function 
*/

function eq($sql){
    global $con;
  
    $result = $con->query($sql)->fetch_assoc();
    return $result;
}

function eqWithoutFa($sql){
    global $con;
    $result = $con->query($sql);
    return $result;
}

/*
Execute to Get The Settings Values
*/

function getSettingsValues($id){
    // GET SETTINGS VALUE ARRAY 
    $result = eq('SELECT `rp_settings`.`id` , `rp_settingstype`.`name` AS "settingType", `rp_settings`.`name` , `rp_settings`.`value`  FROM `rp_settings` INNER JOIN `rp_settingstype` ON `rp_settings`.`type`=`rp_settingstype`.`id` WHERE `rp_settings`.`id` = "'.$id.'" ;');
    return $result["value"];
}

/*
Execute to Get Country Code List 
*/

function getDateDefaultTimeZone(){
    // Settings Default TimeZone Location
    $currentTimeZone = getSettingsValues("9");
    $timeZoneValue = eq('SELECT `rp_timezonelist`.`name` FROM `rp_timezonelist` WHERE `id` = "'.$currentTimeZone.'";');
    return $timeZoneValue['name'];
   
}


?>