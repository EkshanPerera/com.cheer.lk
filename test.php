<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <?php include "includes/cssjs.php"; echo $cssjs;?>
    <title>Document</title>
    <script>
    function convert() {	
	var input_str; //store input
	var text_input; //store input after beging trim()med
	var output_html=""; //store output
	var counter;	
	
	input_str=document.getElementById('in_txt').value; //get input and store it in input_str
	text_input=input_str.trim(); //trim() input
	if(text_input.length > 0){
		output_html+="<p>"; //begin by creating paragraph
		for(counter=0; counter < text_input.length; counter++){
			switch (text_input[counter]){
				case '\n':
					if (text_input[counter+1]==='\n'){
						output_html+="</p>\n<p>";
						counter++;
					}
					else output_html+="<br>";			
					break;
				
				case ' ':
					if(text_input[counter-1] != ' ' && text_input[counter-1] != '\t')
						output_html+=" ";														
					break;
					
				case '\t':
					if(text_input[counter-1] != '\t')
						output_html+=" ";
					break;
				
				case '&':
					output_html+="&amp;";
					break;
				
				case '"':
					output_html+="&quot;";
					break;
				
				case '>':
					output_html+="&gt;";
					break;
				
				case '<':
					output_html+="&lt;";
					break;				
				
				default:
					output_html+=text_input[counter];
					
			}
					
		}
		output_html+="</p>"; //finally close paragraph
	}
	document.getElementById('out_html').value = output_html; // display output html	
}

    </script>
</head>
<body>
<html lang="en">
<head>
	<meta charset="utf-8">
	<title>converter_v2</title>
	<link href="css/styles.css" type="text/css" rel="stylesheet" />
</head>
<body>
	<form>
		<p>Input Text Here</p>
		<p><textarea id="in_txt"></textarea></p>
		<p>Press Convert Below to Start Converting!</p>
		<p><textarea id="out_html"></textarea></p>
	</form>	
	<button id="btn" onclick="convert()">Convert!</button>
	<!-- <script src="js/converter.js"></script> -->
    <p>Open bust is well designed to accommodate bra that improve breast’s shape. - The high waist design provides thigh compression shorts with a smooth design that make you look good in any dress or outfit. - It is designed to specially shape the midsection with targeted firm tummy control to emphasize your natural curves.<br>Super soft and stretchy that feels great on skin, beautiful lace decoration and give you a stylish charm.<br>• Imported<br>• Custom Made<br>• 62.4%Nylon 37.6%Spandex<br>• Color: Black &amp; Nude<br>• Adjustable Straps &amp; Widen<br>• Front 3 Hooks &amp; Eye closure<br>• Find your perfect size is most important for your body shapewear!!</p>
    --------------------------------------------------------------------------------------------------------------------------------------------------------------
    <p>High waist tummy control pant<br>Type: thigh slim shorts<br>Main fabric composition: nylon.<br>Main fabric composition: 80 (%)<br>Function: body shaping, hip lifting, belly control, body beauty.<br>Suitable season: Spring, Autumn, Winter, Summer<br>Thickness: thin<br>It is seamless: yes.</p>
<p>• Thigh Slimmer Shapewear, waist cincher panty is made with a spandex blend will not roll down at the stomach and thigh, and power shorts contains light boning to ensure the tight body shape is kept in place. Controlling the panties will smooth the thigh area, you will enjoy your beautiful curve at any time when you wear this erogenous underwear.<br>• Manufactured with high quality materials, 90% nylon/10% spandex. It's very soft, breathable, seamless, and lightweight, no one will notice that you are wearing it, not even yourself!<br>• It helps get your body back to its former post childbirth. It also makes you look instantly slimmer, adding confidence and helping you feel better after have a baby. It can be used as a holiday gift for friends or new mothers who like to take care of their body shape.<br>• This shapewear for women is the best shapewear for weddings, parties, work, reunions, ceremonies, meetings and any time you want to look your best.</p>
---------------------------------------------------------------------------------------------------
<p>High waist tummy control pant<br>Type: thigh slim shorts<br>Main fabric composition: nylon.<br>Main fabric composition: 80 (%)<br>Function: body shaping, hip lifting, belly control, body beauty.<br>Suitable season: Spring, Autumn, Winter, Summer<br>Thickness: thin<br>It is seamless: yes.</p><p> • Thigh Slimmer Shapewear, waist cincher panty is made with a spandex blend will not roll down at the stomach and thigh, and power shorts contains light boning to ensure the tight body shape is kept in place. Controlling the panties will smooth the thigh area, you will enjoy your beautiful curve at any time when you wear this erogenous underwear.<br> • Manufactured with high quality materials, 90% nylon/10% spandex. It's very soft, breathable, seamless, and lightweight, no one will notice that you are wearing it, not even yourself!<br>• It helps get your body back to its former post childbirth. It also makes you look instantly slimmer, adding confidence and helping you feel better after have a baby. It can be used as a holiday gift for friends or new mothers who like to take care of their body shape.<br> • This shapewear for women is the best shapewear for weddings, parties, work, reunions, ceremonies, meetings and any time you want to look your best.</p>
<p>High waist slim Panty <br>Sexy with Steel Bone Shaper Panties, Butt Lifter<br>Shape and Firm Control Problem Areas<br>Look Slimmer and Skinnier Instantly<br>Look Smooth under any Type of Clothing<br>Flatten The Tummy, Control Waistline</p><p><br>the women’s high waisted thigh slimmer panty shaper is a must have for any women and girls wardrobe collection. High-waist design for firm tummy control and slimming while being seamless under your outfit. This compression shaper is a full midsection solution, that will not only will help to slim your stomach, but also serves as a butt lifter</p>
<script language="JavaScript" type="text/JavaScript">
<!--
top:
for (x=8; x>6; x--) {
for (y=2; y<5; y++) {
for (z=3 ;z<8;z++){
document.write(y);
document.write(z);
if (z==5) break top;
}
}
}
-->
</script>

GMLELE1600803700 HOLELE2001094500 AWLELE2101132900 KALELE2001088400 MGLELE2001112300 KALELE2101171600 KALELE2101198500 KALELE2101202700 KALELE2101212600 KALELE2101214700 KALELE2101245100 KBLELE2101231600 MBLELE2101213900 KALELE2101270500 KBLELE2101274900 KALELE2201300000 KALELE2201315700 TRLELE2201313500 TRLELE2201313900 KALELE2201332400 KALELE2201356100 MGLELE2201355800 KALELE2201372400 KALELE2201389000
AWLELE1700825600 KALELE2101198500 KALELE2101212600 KALELE2101214700 KBLELE2101218800 MGLELE2001112300
</body>

</html>
</body>
</html>

