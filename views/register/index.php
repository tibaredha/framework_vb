<style>
#inner-grid {
  display: grid;padding: 8px;
  grid-template-columns: 1fr 2fr 1fr  ;
  grid-template-rows: 45px 45px 45px 45px 45px 45px 45px ;
  grid-gap: 5px;
}

#wilayarg,#structurerg,#role,#dd,#ee,#ff,#gg {background: yellow; text-align: center;border-radius: 5px;width: 100%;height: 100%;}
#hh {background: #00cc00; text-align: center;border-radius: 5px;width: 100%;height: 100%; color: white;}
#hh:hover {background: red;color: #fff;}
#gg1 {background: green;text-align: center;border-radius: 5px;  height: 100%;}
#gg2 {background: yellow; text-align: center;border-radius: 5px; float: right;width: 30%; height: 100%;}

#a {
  background: salmon;padding: 8px;text-align: center;border-radius: 5px;
  grid-column: 2  /2;  grid-row: 1 / 2;
}
#b {
  background: salmon;text-align: center;border-radius: 5px;padding: 8px;
  grid-column: 2  / 3;  grid-row: 2 / 3;
}
#c {
  background: salmon;text-align: center;border-radius: 5px;padding: 8px;
  grid-column: 2  / 3;  grid-row: 3 / 4;
}
#d {
  background: salmon;text-align: center;border-radius: 5px;padding: 8px;
  grid-column: 2  / 3;  grid-row: 4 / 5;
}
#e {
  background: salmon;text-align: center;border-radius: 5px;padding: 8px;
  grid-column: 2  / 3;  grid-row: 5 / 6;
}
#f {
  background: salmon;text-align: center;border-radius: 5px;padding: 8px;
  grid-column: 2  / 3;  grid-row: 6 / 7;
}

#g {
  background: green;text-align: center;border-radius: 5px;color:white;padding: 8px;
  grid-column: 2  / 3;  grid-row: 7 / 8;
}
#h {
  background: salmon;text-align: center;border-radius: 5px;padding: 8px;
  grid-column: 2  / 3;  grid-row: 8 / 9;
}
</style>
<div class="sheader1l"><?php Session::init();if (isset($_SESSION['errorregister'])) {$sError = '<p id="errorregister">' . $_SESSION['errorregister'] . '</p>';echo $sError;}else{$sError='<p id="lregister">Gérer un compte </p>';echo $sError;}?></div>
<div class="sheader1r"><p id="lregister"><?php html::NAV();?></p></div>
<div class="sheader2l">Créer un compte </div>
<div class="sheader2r">MSPRH</div><!---->
<div class="contentl formaut"><form class="tabaut"action="<?php echo URL;?>register/Registerrun" method="post">	
<div id="inner-grid">
<div id="a"><?php HTML::WILAYA('wilaya','wilayarg','wilaya','wil','17000','Wilaya') ;?></div>
<div id="b"><?php HTML::structure('structure','structurerg','structure','01','Structure') ?></div>
<div id="c"><?php HTML::ROLE('role','role','role') ;?></div>
<div id="d"><input id="dd" type="email" name="Email" onkeyup="javascript:this.value=this.value.toLowerCase();" required="" placeholder="Email" /></div>
<div id="e"><input id="ee" type="text" name="login" onkeyup="javascript:this.value=this.value.toUpperCase();"  required="" placeholder="Login" /></div>
<div id="f"><input id="ff" type="password" name="password" required="" placeholder="Password"/></div>
<div id="g"><p> Captcha <img id="gg1" src="<?php echo URL;?>views/register/captcha.php" /><input id="gg2"type="text" name="captcha"  value="" placeholder="0000"   /></p></div>
<div id="h"><input id="hh" onclick="playSound()"  type="submit" /></div>
</div>
</form>	
</div>	
<div class="content"><img id="image" src="<?php echo URL;?>public/images/register.jpg"></div>
<div class="contentr"><img id="image" src="<?php echo URL;?>public/images/<?php echo logod;?>"></div>	
<div class="scontentl2"><?php echo EDRSUS;?></div>		
<div class="scontentl3"><?php html::rsc();?></div>
<div class="scontentr1"><?php echo "";echo dsp; echo "";?></div>
<script> function playSound() {var sound = document.getElementById("beep");sound.play();}</script>
<audio id="beep" src="<?php echo URL;?>public/beep-23.wav" type="audio/wav"></audio>	