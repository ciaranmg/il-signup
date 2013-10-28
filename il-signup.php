<?php
#   /* 
#     Plugin Name: IL e-letter Signup Box 
#     Plugin URI: http://www.ciaranmcgrath.com 
#     Description: Plugin for inserting email signup boxes into content using shortcodes 
#     Author: Ciaran McGrath
#     Version: 1.0 
#     Author URI: http://twitter.com/ciaranmg 
#   */  


add_shortcode('ilsignup', 'il_signup');

$ILmyfiles=get_option('siteurl').'/wp-content/plugins/il-signup/';


function il_signup($atts, $content){
	global $post, $ILmyfiles;
	
	$source=$atts['source'];
	$tyemail=$atts['tyemail'];
	$tyurl=$atts['tyurl'];
	$size="";
	
	if($content) {
		$message="<p>$content</p>";
		$size="large";
	}
	
	if($atts['listname']){
		$listname=$atts['listname'];	
	} else {
		$listname="ILPOSTCA";
	}
	
	if($atts['tysubject']){
		$tysubject=$atts['tysubject'];
	} else {
		$tysubject="Welcome to International Living Postcards";
	}
	
	if($atts['align']) {
		$align=$atts['align'];
	} else {
		$align="center";
	}
	
	if($atts['btntext']){
		$btntext=$atts['btntext'];
	} else {
		$btntext="Send My Free Report";
	}
	
	$coregClass="";
	if($atts['coregdata'] && $atts['coregcopy']) $coregClass = ' coreg ';
	
	$signupBox="<div id=\"ILSignup\" class=\"$align $size $coregClass\">$message<p>Enter your email address below</p>";
	
	$signupBox.='<FORM ID="ILSignupForm" NAME="form1" METHOD="post" ACTION="http://process.signupapp.com" target="_blank">
	<INPUT TYPE="hidden" NAME="sourceId" VALUE="'.$source.'" />
	<INPUT TYPE="hidden" NAME="listCode" VALUE="'.$listname.'" />
	<INPUT TYPE="hidden" NAME="redirect" VALUE="'.$tyurl.'" />
	<INPUT TYPE="hidden" NAME="email_page" VALUE="'.$tyemail.'" />';
	
	if($atts['coregdata'] && $atts['coregcopy']){
		$signupBox.='<input type="hidden" name="coreg[]" value="" id="ilSignupCoreg">';
	}
	
	$signupBox.='<INPUT TYPE="hidden" NAME="email_from" VALUE="International Living <webeditor@internationalliving.com>" />
	<INPUT TYPE="hidden" NAME="email_subject" VALUE="'.$tysubject.'" />
	<INPUT ID="emailAddress" NAME="emailAddress" TYPE="text" /><br />
	<INPUT class="ctabutton" TYPE="submit" VALUE="'.$btntext.'" />';
	
	if($atts['coregdata'] && $atts['coregcopy']){
		$signupBox.='<p style="margin-bottom: 4px; padding-top: 6px; font-size: 90%;"><input type="checkbox" name="ilSignupCoregChk" id="ilSignupCoregChk" value="null" >' .$atts['coregcopy'] .'</p>';
	}
	
	$signupBox .='</FORM>';
	
	if($atts['coregdata'] && $atts['coregcopy']){
		$signupBox .="<script>
						jQuery('#ilSignupCoregChk').click(function(){
							if(jQuery(this).is(':checked')){
								var coregInfo = '".$atts['coregdata'] ."';
								jQuery('#ilSignupCoreg').val(coregInfo);
							}else{
								jQuery('#ilSignupCoreg').val('');
							}
						});
					</script>";
	}
	
	$signupBox.="</div>";
	return $signupBox;

}

function il_signup_css() {
	global $ILmyfiles;
	echo '<link type="text/css" rel="stylesheet" href="'.$ILmyfiles. 'il-signup.css" />' . "\n";
}

add_action('wp_head', 'il_signup_css');

?>