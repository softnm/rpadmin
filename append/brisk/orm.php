<?php
include "collection.php";

/* JSON READER */

$createPageMarkup ="";
$gScript ="";

if(isset($_GET['deleteAutomate'])){

    if($page['meta']['crud']['d']==1){

        

        $result = $con->query("DELETE FROM `".$page['meta']['table']."` WHERE `id` = '".$_GET['deleteAutomate']."';");

        if($result){
            header('Location:'.basename(parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH)));
        }

    }

}


// Add

if(isset($_GET['addAutomate'])){

    if($page['meta']['crud']['c']=="1"){
        // Check The NUmber Of Fields
        $createPageMarkup = '<form method="POST" action="#" enctype="multipart/form-data" class="row g-3" ><div class="row">';
        for($i = 0 ; $i <sizeof($page['fields']) ; $i++){

                 if($page['fields'][$i]['type'] == "text"){

                    $createPageMarkup .='<div class="'.$page['fields'][$i]['class'].'" >';
                    //Working Start

                    if(isset($page['fields'][$i]['mask'])){

                        $requiredContent="";
                        if($page['fields'][$i]['required']== '1'){$requiredContent .= 'required=""';}
                        
                        $createPageMarkup .= '                
                        <div class="form-group mb-4">
                        <label for="id'.$page['fields'][$i]['col'].'">'.$page['fields'][$i]['label'].'</label>
                        <input type="'.$page['fields'][$i]['type'].'" class="form-control" name="'.$page['fields'][$i]['col'].'"  placeholder="'.$page['fields'][$i]['placeholder'].'" id="id'.$page['fields'][$i]['col'].'" '.$requiredContent.' />
                        </div>               
                        ';
                        

                        // Working Stop
                    $createPageMarkup .='</div>';

                        $gScript .='<script>$("#id'.$page['fields'][$i]['col'].'").inputmask({mask:"'.$page['fields'][$i]['mask-format'].'"});</script>';

                    }else{


                    $requiredContent="";
                    if($page['fields'][$i]['required']== '1'){$requiredContent .= 'required=""';}
                    
                    $createPageMarkup .= '                
                    <div class="form-group mb-4">
                    <label for="id'.$page['fields'][$i]['col'].'">'.$page['fields'][$i]['label'].'</label>
                    <input type="'.$page['fields'][$i]['type'].'" class="form-control" name="'.$page['fields'][$i]['col'].'"  placeholder="'.$page['fields'][$i]['placeholder'].'" id="id'.$page['fields'][$i]['col'].'" '.$requiredContent.' />
                    </div>               
                    ';

                    // Working Stop
                    $createPageMarkup .='</div>';

                    }
                    

            }elseif($page['fields'][$i]['type'] == "number"){
                    
                $createPageMarkup .='<div class="'.$page['fields'][$i]['class'].'" >';
                    
                    //Working Start
                    $requiredContent="";
                    if($page['fields'][$i]['required']== '1'){$requiredContent .= 'required=""';}
                    
                    $createPageMarkup .= '                
                    <div class="form-group mb-4">
                    <label for="id'.$page['fields'][$i]['col'].'">'.$page['fields'][$i]['label'].'</label>
                    <input type="'.$page['fields'][$i]['type'].'" class="form-control" name="'.$page['fields'][$i]['col'].'"  placeholder="'.$page['fields'][$i]['placeholder'].'" id="id'.$page['fields'][$i]['col'].'" '.$requiredContent.' />
                    </div>               
                    ';
                    // Working Stop

                    $createPageMarkup .='</div>';

            }elseif($page['fields'][$i]['type'] == "email"){

                $createPageMarkup .='<div class="'.$page['fields'][$i]['class'].'" >';
                     //Working Start
                     $requiredContent="";
                     if($page['fields'][$i]['required']== '1'){$requiredContent .= 'required=""';}
                     
                     $createPageMarkup .= '                
                     <div class="form-group mb-4">
                     <label for="id'.$page['fields'][$i]['col'].'">'.$page['fields'][$i]['label'].'</label>
                     <input type="'.$page['fields'][$i]['type'].'" class="form-control" name="'.$page['fields'][$i]['col'].'"  placeholder="'.$page['fields'][$i]['placeholder'].'" id="id'.$page['fields'][$i]['col'].'" '.$requiredContent.' />
                     </div>               
                     ';
                     // Working Stop
                    $createPageMarkup .='</div>';

            }elseif($page['fields'][$i]['type'] == "radio"){
                
                $createPageMarkup .='<div class="'.$page['fields'][$i]['class'].'" >';
                    $createPageMarkup .= '';
                    $createPageMarkup .='</div>';

            }elseif($page['fields'][$i]['type'] == "select"){
                
                $createPageMarkup .='<div class="'.$page['fields'][$i]['class'].'" >';
                    

                $requiredContent="";
                if($page['fields'][$i]['required']== '1'){$requiredContent .= 'required=""';}
                
                
                //Check Selectbox Have Foreign Exchange 
                $optionsMarkup="";
                if($page['fields'][$i]['f'] == "1"){

                    $optionsMarkup .= foreginOptionGen($page['fields'][$i]['ref-col'],$page['fields'][$i]['ref-table']);

                    // $query = "SELECT * FROM ".$page['fields'][$i]['ref-table']." WHERE 1;";
                    // $result = $con->query($query);
                    // while($rowOptions = $result->fetch_assoc()){
                    //     $optionsMarkup .= '<option value="'.$rowOptions['id'].'">'.$rowOptions[$page['fields'][$i]['ref-col']].'</option';
                    // }

                }else{
                    
                    for($j=0; $j < sizeof($page['fields'][$i]['options']) ; $j++ ){

                    $optionsMarkup .= '<option value="'.$page['fields'][$i]['options'][$j]['value'].'" >'.$page['fields'][$i]['options'][$j]['name'].'</option>';

                }
                }

                $createPageMarkup .= '                
                <div class="form-group mb-4">
                <label for="id'.$page['fields'][$i]['col'].'">'.$page['fields'][$i]['label'].'</label>

                <select class="form-control  basic" name="'.$page['fields'][$i]['col'].'" id="id'.$page['fields'][$i]['col'].'" '.$requiredContent.'>

                    <option selected >"'.$page['fields'][$i]['placeholder'].'"</option>
                    '.$optionsMarkup.'
                    
                   
                </select>

              
                </div>               
                ';
                // Working Stop
                $createPageMarkup .='</div>';



            }elseif($page['fields'][$i]['type'] == "checkbox"){
                
                $createPageMarkup .='<div class="'.$page['fields'][$i]['class'].'" >';
                    $createPageMarkup .= '/';
                    $createPageMarkup .='</div>';

            }elseif($page['fields'][$i]['type'] == "file"){
                
                $createPageMarkup .='<div class="'.$page['fields'][$i]['class'].'" >';
                    
                    //Working Start
                    $requiredContent="";
                    if($page['fields'][$i]['required']== '1'){$requiredContent .= 'required=""';}
                    
                    $createPageMarkup .= '                
                    <div class="form-group mb-4">
                    <label for="id'.$page['fields'][$i]['col'].'">'.$page['fields'][$i]['label'].'</label>
                    <input type="'.$page['fields'][$i]['type'].'" class="form-control" name="'.$page['fields'][$i]['col'].'" id="id'.$page['fields'][$i]['col'].'" '.$requiredContent.' />
                    </div>               
                    ';
                    // Working Stop

                    $createPageMarkup .='</div>';

            }elseif($page['fields'][$i]['type'] == "date"){
                
                $createPageMarkup .='<div class="'.$page['fields'][$i]['class'].'" >';
               
                $requiredContent="";
                if($page['fields'][$i]['required']== '1'){$requiredContent .= 'required=""';}
                
                $createPageMarkup .= '                
                <div class="form-group mb-4">
                <label for="id'.$page['fields'][$i]['col'].'">'.$page['fields'][$i]['label'].'</label>
                <input type="'.$page['fields'][$i]['type'].'" class="form-control" name="'.$page['fields'][$i]['col'].'"  placeholder="'.$page['fields'][$i]['placeholder'].'" id="id'.$page['fields'][$i]['col'].'" '.$requiredContent.' />
                </div>               
                ';

                $gScript .='<script>var id'.$page['fields'][$i]['col'].'= flatpickr(document.getElementById("id'.$page['fields'][$i]['col'].'"));</script>';
                    $createPageMarkup .='</div>';

            }elseif($page['fields'][$i]['type'] == "time"){

                $createPageMarkup .='<div class="'.$page['fields'][$i]['class'].'" >';
               
                $requiredContent="";
                if($page['fields'][$i]['required']== '1'){$requiredContent .= 'required=""';}
                
                $createPageMarkup .= '                
                <div class="form-group mb-4">
                <label for="id'.$page['fields'][$i]['col'].'">'.$page['fields'][$i]['label'].'</label>
                <input type="'.$page['fields'][$i]['type'].'" class="form-control" name="'.$page['fields'][$i]['col'].'"  placeholder="'.$page['fields'][$i]['placeholder'].'" id="id'.$page['fields'][$i]['col'].'" '.$requiredContent.' />
                </div>               
                ';

                $gScript .='<script>var id'.$page['fields'][$i]['col'].'= flatpickr(document.getElementById("id'.$page['fields'][$i]['col'].'") {
                    enableTime: true,
                    noCalendar: true,
                    dateFormat: "H:i",
                    defaultDate: "00:00"
                });</script>';
                    $createPageMarkup .='</div>';

            }elseif($page['fields'][$i]['type'] == "textarea"){
                    
                $createPageMarkup .='<div class="'.$page['fields'][$i]['class'].'" >';
                    
                    //Working Start
                    $requiredContent="";
                    if($page['fields'][$i]['required']== '1'){$requiredContent .= 'required=""';}
                    
                    $createPageMarkup .= '                
                    <div class="form-group mb-4">
                    <label for="id'.$page['fields'][$i]['col'].'">'.$page['fields'][$i]['label'].'</label>
                    <textarea class="form-control" name="'.$page['fields'][$i]['col'].'" 
                    rows="'.$page['fields'][$i]['rows'].'"
                    cols="'.$page['fields'][$i]['cols'].'"
                    placeholder="'.$page['fields'][$i]['placeholder'].'" id="id'.$page['fields'][$i]['col'].'" '.$requiredContent.'></textarea>
                    </div>               
                    ';
                    // Working Stop

                    $createPageMarkup .='</div>';

            }

        }
        $createPageMarkup .= '</div>';
        $createPageMarkup .= '<input type="submit" name="subAddAutomate" class=" btn btn-primary btn-block" value="Add New Entry" />';
        $createPageMarkup .= '</form>';
        
    }

}



// Save Data Add 

if(isset($_POST['subAddAutomate'])){
    
    if($page['meta']['crud']['c']==1){
        // Check The NUmber Of Fields
        $queryVar = '';
        $queryName = '';

        print_r($_POST);

        for($i = 0 ; $i <sizeof($page['fields']) ; $i++){

            if($page['fields'][$i]['type'] == "text"){

                if($i == count($page['fields'])-1 ){
                    $queryVar  .= "'".$_POST[$page['fields'][$i]['col']]."'";
                    $queryName .= "`".$page['fields'][$i]['col']."`";
                }else{
                    $queryVar .= "'".$_POST[$page['fields'][$i]['col']]."',";
                    $queryName .= "`".$page['fields'][$i]['col']."`,";
                }

            }elseif($page['fields'][$i]['type'] == "number"){
                    
                
                if($i == count($page['fields'])-1 ){
                    $queryVar  .= "'".$_POST[$page['fields'][$i]['col']]."'";
                    $queryName .= "`".$page['fields'][$i]['col']."`";
                }else{
                    $queryVar .= "'".$_POST[$page['fields'][$i]['col']]."',";
                    $queryName .= "`".$page['fields'][$i]['col']."`,";
                }

            }elseif($page['fields'][$i]['type'] == "email"){

                
                if($i == count($page['fields'])-1 ){
                    $queryVar  .= "'".$_POST[$page['fields'][$i]['col']]."'";
                    $queryName .= "`".$page['fields'][$i]['col']."`";
                }else{
                    $queryVar .= "'".$_POST[$page['fields'][$i]['col']]."',";
                    $queryName .= "`".$page['fields'][$i]['col']."`,";
                }

            }elseif($page['fields'][$i]['type'] == "radio"){
                
                
                if($i == count($page['fields'])-1 ){
                    $queryVar  .= "'".$_POST[$page['fields'][$i]['col']]."'";
                    $queryName .= "`".$page['fields'][$i]['col']."`";
                }else{
                    $queryVar .= "'".$_POST[$page['fields'][$i]['col']]."',";
                    $queryName .= "`".$page['fields'][$i]['col']."`,";
                }

            }elseif($page['fields'][$i]['type'] == "select"){
                
               
                
                if($i == count($page['fields'])-1 ){
                    $queryVar  .= "'".$_POST[$page['fields'][$i]['col']]."'";
                    $queryName .= "`".$page['fields'][$i]['col']."`";
                }else{
                    $queryVar .= "'".$_POST[$page['fields'][$i]['col']]."',";
                    $queryName .= "`".$page['fields'][$i]['col']."`,";
                }


            }elseif($page['fields'][$i]['type'] == "checkbox"){
              
                
                if($i == count($page['fields'])-1 ){
                    $queryVar  .= "'".$_POST[$page['fields'][$i]['col']]."'";
                    $queryName .= "`".$page['fields'][$i]['col']."`";
                }else{
                    $queryVar .= "'".$_POST[$page['fields'][$i]['col']]."',";
                    $queryName .= "`".$page['fields'][$i]['col']."`,";
                }

            }elseif($page['fields'][$i]['type'] == "file"){
                
                 //echo '<script>alert('.$_POST[$page['fields'][$i]['col']].$page['fields'][$i]['server-path'].');</script>';                 
                 

                 $destination_img=imageUpload($_FILES[$page['fields'][$i]['col']],$page['fields'][$i]['server-path']);


                if($i == count($page['fields'])-1 ){
                    $queryVar  .= "'".$destination_img."'";
                    $queryName .= "`".$page['fields'][$i]['col']."`";
                }else{
                    $queryVar .= "'".$destination_img."',";
                    $queryName .= "`".$page['fields'][$i]['col']."`,";
                }

            }elseif($page['fields'][$i]['type'] == "date"){
                
                if($i == count($page['fields'])-1 ){
                    $queryVar  .= "'".$_POST[$page['fields'][$i]['col']]."'";
                    $queryName .= "`".$page['fields'][$i]['col']."`";
                }else{
                    $queryVar .= "'".$_POST[$page['fields'][$i]['col']]."',";
                    $queryName .= "`".$page['fields'][$i]['col']."`,";
                }

            }elseif($page['fields'][$i]['type'] == "time"){


                
                
                if($i == count($page['fields'])-1 ){
                    $queryVar  .= "'".$_POST[$page['fields'][$i]['col']]."'";
                    $queryName .= "`".$page['fields'][$i]['col']."`";
                }else{
                    $queryVar .= "'".$_POST[$page['fields'][$i]['col']]."',";
                    $queryName .= "`".$page['fields'][$i]['col']."`,";
                }

            }elseif($page['fields'][$i]['type'] == "textarea"){
                    
                
                if($i == count($page['fields'])-1 ){
                    $queryVar  .= "'".$_POST[$page['fields'][$i]['col']]."'";
                    $queryName .= "`".$page['fields'][$i]['col']."`";
                }else{
                    $queryVar .= "'".$_POST[$page['fields'][$i]['col']]."',";
                    $queryName .= "`".$page['fields'][$i]['col']."`,";
                }

            }

            



        }
        
       

      echo  $exe = "INSERT INTO ".$page['meta']['table']."(".$queryName.") VALUES (".$queryVar.");";

            //echo '<script>alert("'.$exe.'");</script>';

            $result = $con->query($exe);
            if($result){
               header('Location:'.basename(parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH)));
            }
        
    }

}




if(isset($_GET['editAutomate'])){

      if($page['meta']['crud']['u']== "1" ){

        $eid = $_GET['editAutomate'];

        $edata = LoadDataEdit($eid,$page['meta']['table']);
            // Check The NUmber Of Fields
        $createPageMarkup = '<form action="#" method="POST"  enctype="multipart/form-data" class="row g-3" ><div class="row">';
        for($i = 0 ; $i <sizeof($page['fields']) ; $i++){

            if($page['fields'][$i]['type'] == "text"){

                    $createPageMarkup .='<div class="'.$page['fields'][$i]['class'].'" >';
                    //Working Start

                    if(isset($page['fields'][$i]['mask'])){

                        $requiredContent="";
                        if($page['fields'][$i]['required']== '1'){$requiredContent .= 'required=""';}
                        
                        $createPageMarkup .= '                
                        <div class="form-group mb-4">
                        <label for="id'.$page['fields'][$i]['col'].'">'.$page['fields'][$i]['label'].'</label>
                        <input type="'.$page['fields'][$i]['type'].'" class="form-control" name="'.$page['fields'][$i]['col'].'"  placeholder="'.$page['fields'][$i]['placeholder'].'" id="id'.$page['fields'][$i]['col'].'" '.$requiredContent.' value="'.$edata[$page['fields'][$i]['col']].'" />
                        </div>               
                        ';
                        
                        $createPageMarkup .='</div>';

                        $gScript .='<script>$("#id'.$page['fields'][$i]['col'].'").inputmask({mask:"'.$page['fields'][$i]['mask-format'].'"});</script>';

                    }else{


                    $requiredContent="";
                    if($page['fields'][$i]['required']== '1'){$requiredContent .= 'required=""';}
                    
                    $createPageMarkup .= '                
                    <div class="form-group mb-4">
                    <label for="id'.$page['fields'][$i]['col'].'">'.$page['fields'][$i]['label'].'</label>
                    <input type="'.$page['fields'][$i]['type'].'" class="form-control" name="'.$page['fields'][$i]['col'].'"  placeholder="'.$page['fields'][$i]['placeholder'].'" id="id'.$page['fields'][$i]['col'].'" '.$requiredContent.' value="'.$edata[$page['fields'][$i]['col']].'" /></div>               
                    ';

                    $createPageMarkup .='</div>';

                    }
                    // Working Stop
                    //$createPageMarkup .='</div>';

            }elseif($page['fields'][$i]['type'] == "number"){
                    
                $createPageMarkup .='<div class="'.$page['fields'][$i]['class'].'" >';
                    
                    //Working Start
                    $requiredContent="";
                    if($page['fields'][$i]['required']== '1'){$requiredContent .= 'required=""';}
                    
                    $createPageMarkup .= '                
                    <div class="form-group mb-4">
                    <label for="id'.$page['fields'][$i]['col'].'">'.$page['fields'][$i]['label'].'</label>
                    <input type="'.$page['fields'][$i]['type'].'" class="form-control" name="'.$page['fields'][$i]['col'].'"  placeholder="'.$page['fields'][$i]['placeholder'].'" id="id'.$page['fields'][$i]['col'].'" '.$requiredContent.' value="'.$edata[$page['fields'][$i]['col']].'" />
                    </div>               
                    ';
                    // Working Stop

                    $createPageMarkup .='</div>';

            }elseif($page['fields'][$i]['type'] == "email"){

                $createPageMarkup .='<div class="'.$page['fields'][$i]['class'].'" >';
                     //Working Start
                     $requiredContent="";
                     if($page['fields'][$i]['required']== '1'){$requiredContent .= 'required=""';}
                     
                     $createPageMarkup .= '                
                     <div class="form-group mb-4">
                     <label for="id'.$page['fields'][$i]['col'].'">'.$page['fields'][$i]['label'].'</label>
                     <input type="'.$page['fields'][$i]['type'].'" class="form-control" name="'.$page['fields'][$i]['col'].'"  placeholder="'.$page['fields'][$i]['placeholder'].'" id="id'.$page['fields'][$i]['col'].'" '.$requiredContent.' value="'.$edata[$page['fields'][$i]['col']].'" />
                     </div>               
                     ';
                     // Working Stop
                    $createPageMarkup .='</div>';

            }elseif($page['fields'][$i]['type'] == "radio"){
                
                $createPageMarkup .='<div class="'.$page['fields'][$i]['class'].'" >';
                    $createPageMarkup .= '';
                    $createPageMarkup .='</div>';

            }elseif($page['fields'][$i]['type'] == "select"){
                 $eid = $_GET['editAutomate'];

                $edata = LoadDataEdit($eid,$page['meta']['table']);


                $current_value = $edata[$page['fields'][$i]['col']];
                $selected = "";
                $createPageMarkup .='<div class="'.$page['fields'][$i]['class'].'" >';
                    

                $requiredContent="";

                if(isset($page['fields'][$i]['required'])){
                    if($page['fields'][$i]['required']== '1'){
                        $requiredContent .= 'required=""';
                    }
                }
                
                
                //Check Selectbox Have Foreign Exchange 
                $optionsMarkup="";
                if($page['fields'][$i]['f'] == "1"){

                  //  $optionsMarkup .= foreginOptionGen($page['fields'][$i]['ref-col'],$page['fields'][$i]['ref-table']);

                    $query = "SELECT * FROM ".$page['fields'][$i]['ref-table']." WHERE 1;";
                    $result = $con->query($query);
                    while($rowOptions = $result->fetch_assoc()){

                        if($rowOptions['id'] == $current_value){
                            $optionsMarkup .= '<option value="'.$rowOptions['id'].'" selected>'.$rowOptions[$page['fields'][$i]['ref-col']].'</option>';
                            $selected = "1";
                        }else{

                            $optionsMarkup .= '<option value="'.$rowOptions['id'].'">'.$rowOptions[$page['fields'][$i]['ref-col']].'</option>';

                        }

                      
                    }

                }else{

                    
                    
                    for($j=0; $j < sizeof($page['fields'][$i]['options']) ; $j++ ){

                        
                        if($edata[$page['fields'][$i]['col']] == $page['fields'][$i]['options'][$j]['value']){

                             $optionsMarkup .= '<option  value="'.$page['fields'][$i]['options'][$j]['value'].'">'.$page['fields'][$i]['options'][$j]['name'].'</option>';
                            
                            $selected = "1"; 

                            }else{

                              $optionsMarkup .= '<option value="'.$page['fields'][$i]['options'][$j]['value'].'" >'.$page['fields'][$i]['options'][$j]['name'].'</option>';

                            }

                  

                        }
                    }

                if($selected == '1'){

                    $createPageMarkup .= '                
                    <div class="form-group mb-4">
                    <label for="id'.$page['fields'][$i]['col'].'">'.$page['fields'][$i]['label'].'</label>
    
                    <select  name="'.$page['fields'][$i]['col'].'" id="id'.$page['fields'][$i]['col'].'" '.$requiredContent.' class= "form-control basic">
                    
    
                        <option >"'.$page['fields'][$i]['placeholder'].'"</option>
                        '.$optionsMarkup.'
                        
                       
                    </select>
    
                  
                    </div>               
                    ';
                 


                }else{


                    $createPageMarkup .= '                
                    <div class="form-group mb-4">
                    <label for="id'.$page['fields'][$i]['col'].'">'.$page['fields'][$i]['label'].'</label>
    
                    <select  name="'.$page['fields'][$i]['col'].'" id="id'.$page['fields'][$i]['col'].'" '.$requiredContent.' class= "form-control basic">
                    
    
                        <option selected >"'.$page['fields'][$i]['placeholder'].'"</option>
                        '.$optionsMarkup.'
                        
                       
                    </select>
    
                  
                    </div>               
                    ';

                 //  echo "<script>alert('".$optionsMarkup."');</script>";
                   

                }

               // Working Stop
               $createPageMarkup .='</div>';


            }elseif($page['fields'][$i]['type'] == "checkbox"){
                
                $createPageMarkup .='<div class="'.$page['fields'][$i]['class'].'" >';
                    $createPageMarkup .= '';
                    $createPageMarkup .='</div>';

            }elseif($page['fields'][$i]['type'] == "file"){
                
                $createPageMarkup .='<div class="'.$page['fields'][$i]['class'].'" >';
                    
                    //Working Start
                    $requiredContent="";
                    if($page['fields'][$i]['required']== '1'){$requiredContent .= 'required=""';}

                    if($edata[$page['fields'][$i]['col']]){
                        
                        if($page['fields'][$i]['viewtype'] == 'image'){
                            $filetypeData = '<img src="'.$edata[$page['fields'][$i]['col']].'" style="width:300px;height:100%;" />';
                        }elseif($page['fields'][$i]['viewtype'] == 'link'){
                            $filetypeData = '<a href="'.$edata[$page['fields'][$i]['col']].'" target="_blank" style="color:blue;font-size:20px;">File : '.$edata[$page['fields'][$i]['col']].'</a>'; 
                        }
                        $createPageMarkup .= ' 

                        <div class="col-md-12">
                        <div class="form-group mb-4">
                        
                        <label for="for'.$page['fields'][$i]['col'].'">Replace Image : '.$page['fields'][$i]['col'].' </label>
                        <input type="checkbox"   onclick="checkdata'.$page['fields'][$i]['col'].'();" id="for'.$page['fields'][$i]['col'].'" />
                        </div>
                        </div>

                    <div class="form-group mb-4">
                    
                    <script>
                        function checkdata'.$page['fields'][$i]['col'].'(){
                            // Upload Value 
                            let data = document.getElementById(\'upload'.$page['fields'][$i]['col'].'\').value;

                            if(data == 1){
                            
                                document.getElementById(\'id'.$page['fields'][$i]['col'].'\').hidden = false;

                                document.getElementById(\'label'.$page['fields'][$i]['col'].'\').hidden = false;

                                document.getElementById(\'upload'.$page['fields'][$i]['col'].'\').value = 2;
                                document.getElementById(\'image'.$page['fields'][$i]['col'].'\').hidden = true; 

                            }else if(data == 2){

                                document.getElementById(\'id'.$page['fields'][$i]['col'].'\').hidden = true;

                                document.getElementById(\'label'.$page['fields'][$i]['col'].'\').hidden = true;

                                document.getElementById(\'upload'.$page['fields'][$i]['col'].'\').value = 1;
                                document.getElementById(\'image'.$page['fields'][$i]['col'].'\').hidden = false;

                            }
                        }
                    </script>
                    <span id="image'.$page['fields'][$i]['col'].'">
                        '.$filetypeData.'
                    </span>

                    <input type="hidden" name="upload'.$page['fields'][$i]['col'].'" id="upload'.$page['fields'][$i]['col'].'"  value="1" />
                    
                    <input type="hidden" name="stopupload'.$page['fields'][$i]['col'].'" value="'.$edata[$page['fields'][$i]['col']].'"/>
                     
                    

                    <label for="id'.$page['fields'][$i]['col'].'" id="label'.$page['fields'][$i]['col'].'" hidden>'.$page['fields'][$i]['label'].'</label>
                    <input type="file" class="form-control" name="'.$page['fields'][$i]['col'].'" id="id'.$page['fields'][$i]['col'].'"  hidden />
                    </div>               
                    ';

                    }
                    
                    // $createPageMarkup .= '                
                    // <div class="form-group mb-4">
                    // <label for="id'.$page['fields'][$i]['col'].'">'.$page['fields'][$i]['label'].'</label>
                    // <input type="file" class="form-control" name="'.$page['fields'][$i]['col'].'"  '.$requiredContent.'  />
                    // </div>               
                    // ';
                    // Working Stop

                    $createPageMarkup .='</div>';

            }elseif($page['fields'][$i]['type'] == "date"){
                
                $createPageMarkup .='<div class="'.$page['fields'][$i]['class'].'" >';
               
                $requiredContent="";
                if($page['fields'][$i]['required']== '1'){$requiredContent .= 'required=""';}
                
                $createPageMarkup .= '                
                <div class="form-group mb-4">
                <label for="id'.$page['fields'][$i]['col'].'">'.$page['fields'][$i]['label'].'</label>
                <input type="'.$page['fields'][$i]['type'].'" class="form-control" name="'.$page['fields'][$i]['col'].'"  placeholder="'.$page['fields'][$i]['placeholder'].'" id="id'.$page['fields'][$i]['col'].'" '.$requiredContent.' value="'.$edata[$page['fields'][$i]['col']].'" />
                </div>               
                ';

                $gScript .='<script>var id'.$page['fields'][$i]['col'].'= flatpickr(document.getElementById("id'.$page['fields'][$i]['col'].'"));</script>';
                    $createPageMarkup .='</div>';

            }elseif($page['fields'][$i]['type'] == "time"){

                $createPageMarkup .='<div class="'.$page['fields'][$i]['class'].'" >';
               
                $requiredContent="";
                if($page['fields'][$i]['required']== '1'){$requiredContent .= 'required=""';}
                
                $createPageMarkup .= '                
                <div class="form-group mb-4">
                <label for="id'.$page['fields'][$i]['col'].'">'.$page['fields'][$i]['label'].'</label>
                <input type="'.$page['fields'][$i]['type'].'" class="form-control" name="'.$page['fields'][$i]['col'].'"  placeholder="'.$page['fields'][$i]['placeholder'].'" id="id'.$page['fields'][$i]['col'].'" '.$requiredContent.' value="'.$edata[$page['fields'][$i]['col']].'" />
                </div>               
                ';

                $gScript .='<script>var id'.$page['fields'][$i]['col'].'= flatpickr(document.getElementById("id'.$page['fields'][$i]['col'].'") {
                    enableTime: true,
                    noCalendar: true,
                    dateFormat: "H:i",
                    defaultDate: "00:00"
                });</script>';
                    $createPageMarkup .='</div>';

            }elseif($page['fields'][$i]['type'] == "textarea"){
                    
                $createPageMarkup .='<div class="'.$page['fields'][$i]['class'].'" >';
                    
                    //Working Start
                    $requiredContent="";
                    if($page['fields'][$i]['required']== '1'){$requiredContent .= 'required=""';}
                    
                    $createPageMarkup .= '                
                    <div class="form-group mb-4">
                    <label for="id'.$page['fields'][$i]['col'].'">'.$page['fields'][$i]['label'].'</label>
                    <textarea class="form-control" name="'.$page['fields'][$i]['col'].'" 
                    rows="'.$page['fields'][$i]['rows'].'"

                    cols="'.$page['fields'][$i]['cols'].'"
                    placeholder="'.$page['fields'][$i]['placeholder'].'" id="id'.$page['fields'][$i]['col'].'" '.$requiredContent.'>'.$edata[$page['fields'][$i]['col']].'</textarea>
                    </div>               
                    ';
                    // Working Stop

                    $createPageMarkup .='</div>';

            }

        }
        $createPageMarkup .= '</div>';
        //   
        $createPageMarkup .= '
        
        <input type="hidden" name="dataid" value="'.$eid.'" />
        <input type="submit" name="updateAutomate"  class=" btn btn-danger btn-block" value="UPDATE DATA" />';
        $createPageMarkup .= '</form>';

    
        
    }

}


if(isset($_POST['updateAutomate'])){
   
    if($page['meta']['crud']['u']==1){
        // Check The NUmber Of Fields
        $queryVar = '';
        $queryName = '';

       // print_r($_POST);

        for($i = 0 ; $i <sizeof($page['fields']) ; $i++){

            if($page['fields'][$i]['type'] == "text"){

                if($i == count($page['fields'])-1 ){
                    $queryVar .= "`".$page['fields'][$i]['col']."`='".$_POST[$page['fields'][$i]['col']]."'";
                }else{
                    $queryVar .= "`".$page['fields'][$i]['col']."`='".$_POST[$page['fields'][$i]['col']]."',";
                }

            }elseif($page['fields'][$i]['type'] == "number"){
                    
                
                if($i == count($page['fields'])-1 ){
                    $queryVar .= "`".$page['fields'][$i]['col']."`='".$_POST[$page['fields'][$i]['col']]."'";
                }else{
                    $queryVar .= "`".$page['fields'][$i]['col']."`='".$_POST[$page['fields'][$i]['col']]."',";
                }

            }elseif($page['fields'][$i]['type'] == "email"){

                
                if($i == count($page['fields'])-1 ){
                    $queryVar .= "`".$page['fields'][$i]['col']."`='".$_POST[$page['fields'][$i]['col']]."'";
                }else{
                    $queryVar .= "`".$page['fields'][$i]['col']."`='".$_POST[$page['fields'][$i]['col']]."',";
                }

            }elseif($page['fields'][$i]['type'] == "radio"){
                
                
                if($i == count($page['fields'])-1 ){
                    $queryVar .= "`".$page['fields'][$i]['col']."`='".$_POST[$page['fields'][$i]['col']]."'";
                }else{
                    $queryVar .= "`".$page['fields'][$i]['col']."`='".$_POST[$page['fields'][$i]['col']]."',";
                }

            }elseif($page['fields'][$i]['type'] == "select"){
                
               
                
                if($i == count($page['fields'])-1 ){
                    $queryVar .= "`".$page['fields'][$i]['col']."`='".$_POST[$page['fields'][$i]['col']]."'";
                }else{
                    $queryVar .= "`".$page['fields'][$i]['col']."`='".$_POST[$page['fields'][$i]['col']]."',";
                }


            }elseif($page['fields'][$i]['type'] == "checkbox"){
              
                
                if($i == count($page['fields'])-1 ){
                    $queryVar .= "`".$page['fields'][$i]['col']."`='".$_POST[$page['fields'][$i]['col']]."'";
                }else{
                    $queryVar .= "`".$page['fields'][$i]['col']."`='".$_POST[$page['fields'][$i]['col']]."',";
                }

            }elseif($page['fields'][$i]['type'] == "file"){
                
                 //echo '<script>alert('.$_POST[$page['fields'][$i]['col']].$page['fields'][$i]['server-path'].');</script>';                 
                //  print_r($_POST);

                // print_r($_FILES);
                // echo $page['fields'][$i]['col'];
                // echo '</br>';
                // echo $_FILES[$page['fields'][$i]['col']];
                // echo $page['fields'][$i]['server-path'];
                // die();

                //   die();

                
                if($_POST['upload'.$page['fields'][$i]['col']] == 2){

                    // echo 'upload'.$page['fields'][$i]['col'];
                    // echo "<script>console.log('not uploading');</script>";
                    // die(); 
                 $destination_img =imageUpload($_FILES[$page['fields'][$i]['col']],$page['fields'][$i]['server-path']);


                    if($i == count($page['fields'])-1 ){
                        $queryVar .= "`".$page['fields'][$i]['col']."`='".$destination_img."'";
                    }else{
                        $queryVar .= "`".$page['fields'][$i]['col']."`='".$destination_img."',";
                    }
                }elseif($_POST['upload'.$page['fields'][$i]['col']] == 1){

                    if($i == count($page['fields'])-1 ){
                        $queryVar .= "`".$page['fields'][$i]['col']."`='".$_POST['stopupload'.$page['fields'][$i]['col']]."'";
                    }else{
                        $queryVar .= "`".$page['fields'][$i]['col']."`='".$_POST['stopupload'.$page['fields'][$i]['col']]."',";
                    }

                    // echo "<script>console.log('not uploading');</script>";
                    // die();

                }



            }elseif($page['fields'][$i]['type'] == "date"){
                
                
                if($i == count($page['fields'])-1 ){
                    $queryVar .= "`".$page['fields'][$i]['col']."`='".$_POST[$page['fields'][$i]['col']]."'";
                }else{
                    $queryVar .= "`".$page['fields'][$i]['col']."`='".$_POST[$page['fields'][$i]['col']]."',";
                }

            }elseif($page['fields'][$i]['type'] == "time"){


                
                
                
                if($i == count($page['fields'])-1 ){
                    $queryVar .= "`".$page['fields'][$i]['col']."`='".$_POST[$page['fields'][$i]['col']]."'";
                }else{
                    $queryVar .= "`".$page['fields'][$i]['col']."`='".$_POST[$page['fields'][$i]['col']]."',";
                }


            }elseif($page['fields'][$i]['type'] == "textarea"){
                    
                
                
                if($i == count($page['fields'])-1 ){
                    $queryVar .= "`".$page['fields'][$i]['col']."`='".$_POST[$page['fields'][$i]['col']]."'";
                }else{
                    $queryVar .= "`".$page['fields'][$i]['col']."`='".$_POST[$page['fields'][$i]['col']]."',";
                }

            }

            



        }
        
       

        $exe = "UPDATE ".$page['meta']['table']."  SET ".$queryVar." WHERE `id` = '".$_POST['dataid']."' ;";

           // echo '<script>alert("'.$exe.'");</script>';

            $result = $con->query($exe);
            if($result){
              header('Location:'.basename(parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH)));
            }
        
    }

}

function LoadDataEdit($eid,$table){

    global $con;
    $query =  "SELECT * FROM `".$table."` WHERE `id` = '".$eid."';";
    $eData = $con->query($query)->fetch_assoc();
    //"<script>alert('".print_r($eData)."');</script>";
    
    return $eData;


}

function pageRender($page){
    global $con,$baseu;
    //  print_r($page);
    // Start Header Markup 
    
    
    //Table structure

    $iconTableHeaderButton=array(
        '<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-plus-circle"><circle cx="12" cy="12" r="10"></circle><line x1="12" y1="8" x2="12" y2="16"></line><line x1="8" y1="12" x2="16" y2="12"></line></svg>',
        '<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-edit"><path d="M11 4H4a2 2 0 0 0-2 2v14a2 2 0 0 0 2 2h14a2 2 0 0 0 2-2v-7"></path><path d="M18.5 2.5a2.121 2.121 0 0 1 3 3L12 15l-4 1 1-4 9.5-9.5z"></path></svg>',
        '
        <svg xmlns="http://www.w3.org/2000/svg" style="color:red" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-trash-2"><polyline points="3 6 5 6 21 6"></polyline><path d="M19 6v14a2 2 0 0 1-2 2H7a2 2 0 0 1-2-2V6m3 0V4a2 2 0 0 1 2-2h4a2 2 0 0 1 2 2v2"></path><line x1="10" y1="11" x2="10" y2="17"></line><line x1="14" y1="11" x2="14" y2="17"></line></svg>'  
    );


    // Processing Buttons
    $tableButtons="";
    
    if ($page['meta']['crud']['c']=="1") {
        $tableButtons = '<br/><a href="'.$baseu.'?addAutomate"> <button class="btn btn-outline-primary mb-2 float-end" >'.$iconTableHeaderButton['0'].' Add New</button></a>';
    }
    
    
   
    ?>
    
    <?php
    // Thead T foot Inner Content Generater 
    
    $tableThead = "";
    if($page['meta']['crud']['r']=="1"){
        
        for($i=0; $i < count($page['view']) ; $i++){
            //echo "<script>alert();</script>";
            if($page['view'][$i]){
               //cho  $result ="SELECT `".$page['view'][$i]['col']."` FROM ".$page['meta']['table']. ";
                $tableThead .= "<td>".$page['view'][$i]['thead']."</td>";

            }

        }

    }
    
    // Table Main Data

    $tableMainData = "";
    if($page['meta']['crud']['r']=="1"){
        
        $tempCol = "";
        $tempColArr = array();
        for($i=0; $i < count($page['view']) ; $i++){
            if($page['view'][$i]){

                if($i == count($page['view'])-1){  // Check the last Column
                $tempCol .= '`'.$page['view'][$i]['col'].'`';
                }else{
                    $tempCol .= '`'.$page['view'][$i]['col'].'`,';
                }

                array_push($tempColArr,$page['view'][$i]['col']);

            }
        }

       // print_r($tempColArr);

        $result = $con->query("SELECT `id`,".$tempCol." FROM ".$page['meta']['table']." WHERE 1;");

        while($row = $result->fetch_assoc()){
            
            $tableMainData .= '<tr><td class="text-center">';
            
            
            if($page['meta']['crud']['u']=="1"){
                $tableMainData .= '<a  href="'.$baseu.'?editAutomate='.$row['id'].'" class="bs-tooltip" data-toggle="tooltip" data-placement="left" title="Edit" data-original-title="Edit" >'.$iconTableHeaderButton['1'].'</a>';
            }

           
            if($page['meta']['crud']['d']=="1"){             
                $tableMainData .= '<a  href="'.$baseu.'?deleteAutomate='.$row['id'].'" title="Delete" >'.$iconTableHeaderButton['2'].'</a>'; 
            }
           
            $tableMainData .= '</td>';

            // ID
            $tableMainData .= '<td class="text-center">'.$row['id'].'</td>';
            
            // Manually Entering The Data
            for($j=0 ; $j < sizeof($tempColArr); $j++){
                $tableMainData .= '<td>';

                if($page['view'][$j]['f']=="1"){

                    $responseFunction = foreginResolve($page['view'][$j]['ref-col'],$page['view'][$j]['ref-table'],$row[$tempColArr[$j]]);

                    if(!empty($responseFunction)){
                    $tableMainData .= '<span class="badge bg-dark" style="width: 100%;text-align: left;font-weight: 600;font-size: 15px;">';

                    $tableMainData .= $responseFunction;

                    $tableMainData .= '<span class="badge bg-dark"  style="width: 100%;text-align: left;font-weight: 600;font-size: 15px;">';

                    }else{
                        $tableMainData .= 'EMPTY DATA ⭕';
                    }

                 //  echo $result = $con->query("SELECT ".$page['view'][$j]['ref-col']." FROM ".$page['view'][$j]['ref-table']." WHERE  `id`='".$row[$tempColArr[$j]]."';")->fetch_assoc()[$page['view'][$j]['ref-col']];

                    
                }elseif(!empty($page['view'][$j]['type'])){
                    if($page['view'][$j]['type']=='image'){

                    $tableMainData .= '<a href="'.$row[$tempColArr[$j]].'" target="_blank" ><img src="'.$row[$tempColArr[$j]].'" style="width:300px;height:300px" /></a>';

                    }elseif($page['view'][$j]['type']=='link'){

                        $tableMainData .= '<a href="'.$row[$tempColArr[$j]].'" target="_blank" ><u>FILE :<i> <p style="color:blue;">'.$row[$tempColArr[$j]].'" </p></i></u></a>';

                    }
                }
               else{                   
                    $tableMainData .= $row[$tempColArr[$j]];
                }

               

                $tableMainData .= '</td>';   
            }
            
            $tableMainData .= '</tr>';
            
           
        
        
         
        }

       

        

    }

   
                                                
   


    $tableHead = '  
                    <div class="row">

                        <div class="col-md-8">
                        </div>

                        <div class="col-md-4 float-end">
                         '.$tableButtons.'
                        </div>

                    </div>
                     <div class="col-md-12">

                            <div class="table-responsive">




                                    <table id="example" class="table table-striped">
                                    
                                        <thead>
                                            <tr>
                                                <th style="width:100px;">Action</th>                                         
                                                <th class="text-center">#</th>
                                                '.$tableThead.'                                      
                                            </tr>
                                        </thead>
                                        <tbody>
                                            '.$tableMainData.'
                                        </tbody>
                                        <tfoot>
                                            <tr>
                                                <th class="invisible"></th>
                                                <th class="text-center">#</th>
                                                '.$tableThead.'
                                            </tr>
                                        </tfoot>
                                    </table>
                              ';
                    
    //Rendring Done

    echo  $tableHead;
}


function foreginResolve($col,$table,$rowid){
    global $con;
    
    $result = $con->query("SELECT ".$col." FROM ".$table." WHERE  `id`='".$rowid."';")->fetch_assoc();

        if (empty($result) || !isset($result[$col])) {
            return null;
        }elseif(!empty($col)){

            return strval($result[$col]);

        }

        echo "<pre>";
        print_r($result);
        echo $col; 
}

function foreginOptionGen($col,$table){
                    global $con;
                    $markup ="";

                    //echo "SELECT * FROM ".$table." WHERE 1;";
                    
                    $result = $con->query("SELECT * FROM ".$table." WHERE 1;");
                    while($rowOptions = $result->fetch_assoc()){
                        $markup .= '<option value="'.$rowOptions['id'].'">'.$rowOptions[$col].'</option>';
                    }
                    //echo "<script>alert('".$markup."');</script>";
                    return $markup;

}


// function imageUpload($name,$path){

//     // echo "<script>alert(".$name."~~~~".$path.");</script>";
//     // die();
//     // print_r($name);
//     // echo $name;
//     // echo $path;

//     // die();
//     date_default_timezone_set('Australia/Melbourne');
//     $date = date('mdYhis', time());
//     $fileName=$name['name'];
//     $tmp_Name=$name['tmp_name'];
//     $exptype= pathinfo( $fileName, PATHINFO_EXTENSION );
//     $withoutExt = preg_replace('/\\.[^.\\s]{3,4}$/', '', $fileName);
//     $rand=rand(10000,99999);
//     $encname=$withoutExt.'-'.$rand.'-'.$date;
//     $imgname=$encname.'.'.$exptype;
//     $location=$path.$imgname;
//     //$location=$imgname;
//     move_uploaded_file($tmp_Name,$location);

//     // echo $imgname;

   

//     return $path.$imgname;
       
//   }

function imageUpload(array $file, string $baseTargetDirectory): ?string
{
    // 1. Input Validation and Error Checking
    if (!isset($file['error']) || is_array($file['error'])) {
        error_log("Invalid parameters or multiple file upload error for imageUpload.");
        return null;
    }

    switch ($file['error']) {
        case UPLOAD_ERR_OK:
            break;
        case UPLOAD_ERR_NO_FILE:
            error_log("No file sent during upload.");
            return null;
        case UPLOAD_ERR_INI_SIZE:
        case UPLOAD_ERR_FORM_SIZE:
            error_log("Exceeded filesize limit for upload.");
            return null;
        default:
            error_log("Unknown upload error: " . $file['error']);
            return null;
    }

    // 2. Determine the Date-wise Target Directory
    // Use the server's default timezone for the date components
    $year = date('Y');
    $month = date('m');
    $day = date('d');

    // Construct the full dynamic target directory path
    // Ensure the base directory is properly formatted
    $baseTargetDirectory = rtrim($baseTargetDirectory, '/') . '/';
    $dynamicTargetDirectory = "{$baseTargetDirectory}{$year}/{$month}/{$day}/";

    // 3. Ensure the Full Target Directory Exists and is Writable
    if (!is_dir($dynamicTargetDirectory)) {
        // Create directory recursively if it doesn't exist.
        // Permissions 0755 are generally safe for web servers.
        if (!mkdir($dynamicTargetDirectory, 0755, true)) {
            error_log("Failed to create upload directory: " . $dynamicTargetDirectory);
            return null;
        }
    } elseif (!is_writable($dynamicTargetDirectory)) {
        error_log("Upload directory is not writable: " . $dynamicTargetDirectory);
        return null;
    }

    // 4. Generate a Unique and Secure File Name
    $originalFileName = $file['name'];
    $fileExtension = strtolower(pathinfo($originalFileName, PATHINFO_EXTENSION));
    $fileNameWithoutExt = pathinfo($originalFileName, PATHINFO_FILENAME);

    // Define allowed extensions for security
    $allowedExtensions = ['jpg', 'jpeg', 'png', 'gif', 'pdf', 'doc', 'docx', 'xlsx', 'xls']; // Customize as needed

    if (!in_array($fileExtension, $allowedExtensions)) {
        error_log("File type '." . $fileExtension . "' not allowed for upload: " . $originalFileName);
        return null;
    }

    // Sanitize the original filename to remove problematic characters
    $sanitizedFileName = preg_replace('/[^a-zA-Z0-9_-]/', '_', $fileNameWithoutExt);
    $sanitizedFileName = trim($sanitizedFileName, '_');

    // Use the server's default timezone for the timestamp in the filename
    $timestamp = date('mdYHis', time());
    $rand = rand(10000, 99999);

    // Construct the new unique filename (e.g., originalfilename-random-timestamp.ext)
    $uniqueIdentifier = !empty($sanitizedFileName) ?
                        "{$sanitizedFileName}-{$rand}-{$timestamp}" :
                        "file-{$rand}-{$timestamp}"; // Fallback if filename is empty

    $newFileName = "{$uniqueIdentifier}.{$fileExtension}";
    $destinationPath = $dynamicTargetDirectory . $newFileName;

    // 5. Move the Uploaded File
    if (move_uploaded_file($file['tmp_name'], $destinationPath)) {
        // Return the full path of the uploaded file
        return $destinationPath;
    } else {
        error_log("Failed to move uploaded file from " . $file['tmp_name'] . " to " . $destinationPath);
        return null;
    }
}


?>