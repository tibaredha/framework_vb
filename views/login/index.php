<style>
#inner-grid {
  display: grid;padding: 8px;
  grid-template-columns: 1fr 2fr 1fr  ;
  grid-template-rows: 1fr 1fr 1fr 1fr 1fr 1fr 1fr ;
  grid-gap: 5px;
}

#aa,#bb,#cc {background: yellow; text-align: center;border-radius: 5px;width: 100%;height: 100%;}
#dd {background: #00cc00; text-align: center;border-radius: 5px;width: 100%;height: 100%; color: white;}
#dd:hover {background: red;color: #fff;}

#a {
  background: salmon; 
  padding: 8px;text-align: center;border-radius: 5px;
  grid-column: 2  /2;  grid-row: 2 / 3;
}
#b {
  background: salmon;text-align: center;border-radius: 5px;padding: 8px;
  grid-column: 2  / 3;  grid-row: 3 / 4;
}
#c {
  background: salmon;text-align: center;border-radius: 5px;padding: 8px;
  grid-column: 2  / 3;  grid-row: 4 / 5;
}
#d {
  background: salmon;text-align: center;border-radius: 5px;padding: 8px;
  grid-column: 2  / 3;  grid-row: 5 / 6;
}
</style>



<div class="sheader1l"><?php Session::init();if (isset($_SESSION['errorlogin'])){$sError = '<p id="errorlogin">'.$_SESSION['errorlogin'].'</p>';echo $sError;}else{$sError='<p id="llogin">Gérer un compte </p>';echo $sError;}?></div>
<div class="sheader1r"><p id="llogin"><?php html::NAV();?></p></div>
<div class="sheader2l">Se Connecter <?php //echo EDRSFR;?></div>
<div class="sheader2r">MSPRH</div>
<div class="contentl formaut">

<form action="login/run" method="post">			
<div id="inner-grid">
    <div id="a">
	<?php
	echo '<select id="aa" name="demgraphie">';
	echo '<option value="1">Décès</option>';
	echo '<option value="2">Naissance</option>';
	echo '<option value="3">Bnm</option>';
	echo "</select>";
	?> 
	</div>
    <div id="b">
	<input id="bb"type="text" name="login" onkeyup="javascript:this.value=this.value.toUpperCase();" required="" placeholder="Login"  value="ADMIN"    />
	</div>
    <div id="c">
	<input id="cc"  type="password" name="password" placeholder="Password" value="admin" />
	</div>
    <div id="d"><input id="dd" onclick="playSound()"  type="submit" /> </div>
</div>
</form>

</div>	
<div class="content"><img id="image" src="<?php echo URL;?>public/images/Login.jpg" ></div>
<div class="contentr"><img id="image" src="<?php echo URL;?>public/images/<?php echo logod;?>"></div>	
<div class="scontentl2"><?php echo EDRSUS;?> <?php //echo "Date d'expiration : ".Session::dateexpiration; ?></div>		
<div class="scontentl3"><?php html::rsc();?></div>
<div class="scontentr1"><?php echo dsp; ?></div>		
<script> function playSound() {var sound = document.getElementById("beep");sound.play();}</script>
<audio id="beep" src="<?php echo URL;?>public/beep-23.wav" type="audio/wav"></audio>			
	