<div class="sheader1l"><p id="lregister">Gérer la pharmacie <?php //echo "";echo $this->msg; echo "";?></p></div><div class="sheader1r"><p id="lregister"><?php html::NAV();?></p></div>
<div class="sheader2l"> Modifier un nouveau médicament</div>
<div class="sheader2r">MSPRH</div>
<?php
echo '<div class="contentl">';?>
<div class="form-style-10">
	<form class="tabaut" method="post" action="<?php echo URL."pha/editSave/".$this->user[0]['id'];?>">
		<div class="section"><span>2</span>DCI</div>
		<div class="inner-wrap"><input  type="text" name="dci" value="<?php echo $this->user[0]['dci'];?>"/></div>
		<div class="section"><span>3</span>PRE</div>
		<div class="inner-wrap"><input  type="text" name="pre" value="<?php echo $this->user[0]['pre'];?>"/></div>
	    </br>
		<div class="inner-wrap"><input  type="submit" /></div>
	
	</form>
	</div>
<?php
echo "</div>";	
?>
<div class="content"><img id="image" src="<?php echo URL;?>public/images/pha.jpg" ></div>
<div class="contentr"><img id="image" src="<?php echo URL;?>public/images/<?php echo logo;?>"></div>			
<div class="scontentl2">Modifier un nouveau médicament</div>		
<div class="scontentl3"><?php html::rsc();?></div>
<div class="scontentr1"><?php echo "";echo dsp; echo "";?></div>		