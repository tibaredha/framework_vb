<div class="sheader1l"><p id="lacceuil"><?php echo "";echo $this->msg; echo "";?></p></div><div class="sheader1r"><p id="lsetup"><?php html::NAV();?></p></div>
<div class="sheader2l"><?php echo EDRSFR;?></div>
<div class="sheader2r">MSPRH</div>
<div class="contentl">
<marquee behavior="slide" direction="up" scrollamount="2">
<p><font color="#FF0000">*</font>&nbsp;&nbsp;&nbsp;Les informations rapportées par les certificats de décès permettent l'élaboration </p>
<p><font color="#FF0000">*</font>&nbsp;&nbsp;&nbsp;Des statistiques exhaustives des causes médicales de décès en Algerie</p>
<p><font color="#FF0000">*</font>&nbsp;&nbsp;&nbsp;Dont l'utilisation à pour  but  d'orienter et d'évaluer les actions et les recherches </p>
<p><font color="#FF0000">*</font>&nbsp;&nbsp;&nbsp;Dans le domaine de la santé publique</p>
<p><font color="#FF0000">*</font>&nbsp;&nbsp;&nbsp;Donc la qualité et la précision des certificats de décès doit etre ameliorée</p>
<p><font color="#FF0000">*</font>&nbsp;&nbsp;&nbsp;Compte tenu des évolutions technologiques, le passage à un mode de certification </p>
<p><font color="#FF0000">*</font>&nbsp;&nbsp;&nbsp;Electronique des décès est imperatif</p>
<p><font color="#FF0000">*</font>&nbsp;&nbsp;&nbsp;&nbsp;Deverait permettre d'ameliorer considerablement le circuit du certificat de décès </p>	
</marquee>
<!--
 <span class="import" onclick="show_popup('popup_upload')">Import CSV to MySQL</span>
 <div id="popup_upload">
        <div class="form_upload">
            <span class="close" onclick="close_popup('popup_upload')">x</span>
            <h2>Upload CSV file</h2>
            <form action="import.php" method="post" enctype="multipart/form-data">
                <input type="file" name="csv_file" id="csv_file" class="file_input">
                <input type="submit" value="Upload file" id="upload_btn">
            </form>
        </div>
    </div>	
-->
<?php 
// echo 'max_execution_time = ' . ini_get('max_execution_time') . "\n";
// ini_set("max_execution_time", "10") . "\n";
// echo 'max_execution_time = ' . ini_get('max_execution_time') . "\n";
// ini_restore ( "max_execution_time" );
// echo 'max_execution_time = ' . ini_get('max_execution_time') . "\n";

// print_r(ini_get_all());

// echo 'display_errors = ' . ini_get('display_errors') . "\n";
// echo 'register_globals = ' . ini_get('register_globals') . "\n";
// echo 'post_max_size = ' . ini_get('post_max_size') . "\n";
// echo 'post_max_size+1 = ' . (ini_get('post_max_size')+1) . "\n";
// echo 'post_max_size in bytes = ' . return_bytes(ini_get('post_max_size'));
// if(! ini_set("max_execution_time", "10")) {echo "échec";}else {echo "ok";}



// function uncompress($srcName, $dstName) {
// $string = implode("", gzfile($srcName));
// $fp = fopen($dstName, "w");
// fwrite($fp, $string, strlen($string));
// fclose($fp);
// } 

// function compress($srcName, $dstName)
// {
// $fp = fopen($srcName, "r");
// $data = fread ($fp, filesize($srcName));
// fclose($fp);

// $zp = gzopen($dstName, "w9");
// gzwrite($zp, $data);
// gzclose($zp);
// }

// compress("D:\\framework/views/index/test.php","D:\\framework/views/index/test.rar");
// uncompress("D:\\framework/views/index/test.rar","D:\\framework/views/index/test2.php");


?>



</div>	
<div class="content"><img id="image" src="<?php echo URL;?>public/images/accueil.jpg"></div>
<div class="contentr"><img id="image" src="<?php echo URL;?>public/images/<?php echo logod;?>"></div>	
<div class="scontentl2"><?php echo EDRSUS;?></div>		
<div class="scontentl3"><?php html::rsc();?></div>
<div class="scontentr1"><?php echo "";echo dsp; echo "";?></div>		

