<?PHP 
	session_start();
	
    // load up config file
   // require_once('config.php');	
	
	$_pageTitle   =   strip_tags(trim($_REQUEST['title'])); //quiz title url
	
	if($_Title !=''){
	$_SESSION['createqTitle'] = $_Title;
	}
	
	$_login = $_COOKIE['ppUser'];
	$customer = $_COOKIE['QS_Customer'];
	/*if(!$_login)
	{
	header('location: /survey/login.php?return=/survey/create-a-survey.php');
	}*/
	
	
	
	function force_authentication() {
    global $ipbwi;
  
  if($ipbwi->member->isLoggedIn()) {
  	//do nothing...
  }else{//no session available for current in user
	
    $returnURL = getmyurl('login', $_SERVER['REQUEST_URI']);
    
    //if(strstr($returnURL, 'submit2.php')){
     //   header("Location: " . $returnURL . '&title=' . $_SESSION['createqTitle'] );
   //}else{
		header("Location: " . $returnURL );
    //}

    die;  
  }

  return true;
}
		  
	$_showAd = 'yes';
	$_showTopAd = 'yes';
	
	if ($customer == "1")
	{
        $_showAd = 'no';
		$_showTopAd = 'no';
    }
	//set page title ,metadata,description.
	$_pageTitle = 'Create A survey: Free surveyCreation Tool by ProProfs';
	$meta_content = "Create survey, Create online survey, surveysoftware, Create questionnaire, Online surveysoftware, Create web survey, Web survey, Online survey";
	$meta_desc = "Create a surveyusing full-featured, free surveymaker for work, school or fun. Share online on facebook, blogs, websites &amp; more.";
	
	$_showCreate = 'yes';
    require_once('SSI/comon_header.php');
	
    //$user_name = $db->escape($_login);//login name
	//$user_id = $db->get_var("SELECT user_id FROM users WHERE user_login = '$user_name'");//user id
	// query for find link title,title url	
    //$_SQL = "SELECT link_title, link_id, link_title_url FROM links WHERE link_status != 'discard' AND link_author = '$user_id' ORDER BY link_id";
   // $result = @mysql_query($_SQL);

?>
<link rel="stylesheet" type="text/css" href="/survey/css/create-a-survey.css?v=11" media="screen" />
<!--<link rel="stylesheet" type="text/css" href="../api/fancybox/jquery.fancybox-1.3.1.css" media="screen" />-->
<style>
	/*#loadershow{ height:16px; width:16px;}*/
	
	/**
	.op_first{background: url('/images/icons_create_page_v.png') right no-repeat !important; margin-right:10px; background-position:225px 0px !important;}
	.op_first:hover{background: url('/images/icons_create_page_v.png') right no-repeat !important; margin-right:10px; cursor:pointer; background-position:225px -225px !important;}
	
	.op_second{background: url('/images/icons_create_page_v.png') right no-repeat !important; margin-right:10px; background-position:220px -55px !important;}
	.op_second:hover{background: url('/images/icons_create_page_v.png') right no-repeat !important; margin-right:10px; cursor:pointer; background-position:220px -279px !important;}
	
	.op_third{background: url('/images/icons_create_page_v.png') right no-repeat !important;  background-position:220px -169px !important;}
	.op_third:hover{background: url('/images/icons_create_page_v.png') right no-repeat !important; cursor:pointer; background-position:221px -393px !important;}
	**/
	/*
	.op_third{background: url('/images/icons_create_page_v.png') right no-repeat !important;  background-position:220px -112px !important;}
	.op_third:hover{background: url('/images/icons_create_page_v.png') right no-repeat !important; cursor:pointer; background-position:220px -338px !important;}
	*/
	/**
	.op_five{background: url('/survey/images/survblac.png') right no-repeat; background-position:238px; !important;margin-right: 10px;}
	.op_five:hover{background: url('/survey/images/1345114975_survey.png') right no-repeat; cursor:pointer; background-position:238px; !important;}
	**/
	
	/*
	.op_sevan{background:url('/flashcards/images/1358858816_onebit_39.png?v=1') right no-repeat!important;margin-right:0px; background-position: 245px 10px!important;}
	*/
	/**
	.op_sevan{background: url('/training/images/1358858816_onebit_39.png') right no-repeat !important;  background-position:244px 10px !important;}
	.op_sevan:hover{background: url("/quiz-school/img/kb.png") no-repeat scroll 244px center rgba(0,0,0,0) !important; color:#0000FF !important;}
	
	.pr_head{font-weight:bold; font-size:15px; color:#3B5998; padding-left:10px;}	
	.pr_subhead{font-size:12px; padding-left:10px; line-height:22px;}
	**/
	.image{float:right; margin-top: -43px; padding-left: 10px; padding-right: 10px;}
	.clearboth{clear:both; display:inline;}
	#survey_temp{background: none repeat scroll 0% 0% white; border: 1px solid rgb(238, 238, 238); padding: 0 10px; height: auto; cursor:pointer}
	.clear{clear:both;}
</style>		

<div class="clear"></div>
<div style=" border-bottom: 1px solid #EEEEEE;"></div> 
<!-- Content Start -->
<div id="content" style=" height:auto">
<div class="block">
		<div id="breadcrumb" style="">
            <?php if(empty($userLogin) || !isset($userLogin)){ $breadcrumb_txt = 'PollMaker'; } else { $breadcrumb_txt = 'My Surveys'; } ?>
		    <a href='/survey/' title='<?php echo $breadcrumb_txt ?>'><?php echo $breadcrumb_txt ?></a>&nbsp;&nbsp;&rsaquo;&nbsp;&nbsp;<span>Create A Poll</span>
		</div>
	
<h1 class="title">Create A Poll</h1>
<!--** OLD CODE START (** signifies the comments put to remove old code)
<div class="demo" style="auto; background-color: rgb(248, 248, 248); border:1px solid #EEEEEE; width: 925px; height:auto;">
<!--###############################surveytemplate code#################################################-->
		<!--**<div id="survey_temp">
			<div id="temp_show_detail" style="height: 30px; padding: 20px 0px;" onclick='show_default_temp()'>
				<a id="surv_temp_id" style="cursor:pointer">
					<div style="float: left; margin-top: 5px;"><img id="temp_icon" src="images/template.png" alt="icon"></div>
					<div id="temp_txt" style="float: left; font-size: 23px; margin-left: 13px;">Create using an existing template</div>
				</a>	
			</div>

			<div id="temp_detail" style="display:none">
				<div class="temp_btn_area" style="padding:0 31px 20px">
					<p style="margin-bottom:10px; font-size: 17px;">Use a pre-define surveyfrom our collection.</p>
					<div style="width: 170px;">
						<a id="tmpl_link" href="template/" class="btn_class btn-small primary">Search &amp; Create</a>
						<div id="showloadder_temp" style="margin: 10px 0px; float: right; display:none">
							<img id="imgloader" src="images/blue-loader.gif" alt="loader">
						</div>
					</div>
					<!--<button onclick="show_template_page();" class="btn_class btn-small primary" tabindex="3" style="font-size:14px;">Search &amp; Create</button>-->
				<!--**</div>	
			</div>
		</div>
<!--###############################surveytemplate code end#################################################-->
<!--**<div id="accordion" class="main" style="width:100%; margin:0">
	 <div class="clear"></div>
		<h3><a href="#" style="text-decoration:none;"></a></h3>
	<div>
        <form name="selectQuizType" action="manage/" method="post">
			<div class="show_create_new" style="padding: 15px 10px; height: 34px; cursor:pointer" onclick='show_create_new()'>
				<a id='create_new_sur' style="cursor:pointer">
					<div style="float: left; margin-top: 5px;"><img id="create_new_icon" src="images/down.png" alt="icon"></div>
					<div style="float: left; font-size: 23px; margin-left: 13px;">Create a NEW survey</div>
				</a>
			</div>
            <div id="new_sur" class="caqwrap" style="margin: 20px 10px;">
                <div id="_box_SQ" class="caq_s_gateway selborder" onclick="document.getElementById('quiztype_scored').checked='checked';this.setAttribute('class', 'caq_s_gateway selborder');document.getElementById('_box_PQ').setAttribute('class', 'caq_p_gateway');document.selectQuizType.action='manage/'" style="width:380px; font-size:12px; margin-left:30px;">
                    <label>
					<input checked="checked" name="quiztype" id="quiztype_scored" onclick="document.selectQuizType.action='manage/'" type="radio"> survey</label>
                    <ul>
                        <li>Make online surveys</li>
                        <li>Collect &amp; analyze data</li>
                        <li>Example: Customer Satisfaction survey</li>
                    </ul>
                </div>  				
                
                <div class="clear"></div>
                <!--<hr />-->                                                          
                <!--**<button tabindex="3" class="btn_class btn-small primary" type="submit" onclick="document.getElementById('loadershow').style.display = 'inline';" style="margin-left:30px; font-size:14px;">Continue »</button>  &nbsp; <img id="loadershow" style="display:none;" src="images/blue-loader.gif" border="0">
                           
                                
            </div>
            
            <input name="title" value="" type="hidden">
            
        </form>        
        
       
        <div class="clear"></div>
</div>  
<div class="clear"></div>
	</div>	
</div>
<!--##########################################--surveytemplate end--######################################################-->
<!--** OLD CODE END **-->
<div class="main_container">
    <input type="hidden" id="userLogin" value="<?php echo $userLogin ?>">
    <div id='blockContainer' style="width:100%">
    	<a href="/survey/manage/">
            <div class="scored_div" id="scored_div">
                <div id="scored_quiz" class="disp">Create</div>
				<div>
					<img class="img-width" src="images/survey.png" title="Create a Poll" alt="Create create a Poll" />
				</div>				
				<div class="scored_quiz" onclick="javascript:location.href='/survey/manage/'">
					<a href="/Poll/manage/" title="Poll">
						<span class="scored_heading survey_heading" style="color:#3B5998; text-decoration:none; ">Poll</span>
					</a>		
					<div class="pts">
					<ul>
                        <li>Create branded web Polls</li>
                        <li>Analytics and reporting</li>
                        <li>Add videos, images and graphics</li>
                    </ul>
					</div>
				</div>
            </div>
        </a>
        <!-- anushka start -->
		<a href="/survey/manage/">
           
        </a>
		<!-- anushka end -->
        <a href="/survey/template/">
			<div class="scored_div2" id="template_div">
				<div id="existing_temp" class="disp" style="">Create</div>
				<div>
					<img class="img-width" src="images/survey_template.png" alt="Create a surveyusing Existing Template" title="Create a surveyusing Existing Template" />
				</div>
				<div class="scored_quiz" style="" onclick="javascript:location.href='/survey/template/'">
					<a href="/survey/template/" title="Templates">
						<span class="scored_heading template_heading" style="color:#3B5998;text-decoration:none;">Templates</span>
					</a>
					<p class="scored_text exp_bottom" style=" font-size:13px !important;">Create branded online polls with our ready to use templates</p>
					<span class="scored_example" style="">Example</span>
					<p class="scored_exp_text" style="">Customer Satisfaction Polls</p>                
				</div>
			</div>
        </a>
    <div style="clear:both"></div>
	</div>

<div style="clear:both"></div>
</div>
<div style="clear:both"></div>
<script type="text/javascript">
	/*$('#scored_div').mouseover(function(){
		$('.scored_quiz a .survey_heading').css('color', '#444');
		$('#scored_quiz').show();		
	});
	$('#scored_div').mouseout(function(){
		$('.scored_quiz a .survey_heading').css('color', '#3B5998');
		$('#scored_quiz').hide();		
	});
	$('#template_div').mouseover(function(){
		$('.scored_quiz a .template_heading').css('color', '#444');
		$('#existing_temp').show(); 
	});
	$('#template_div').mouseout(function(){
		$('.scored_quiz a .template_heading').css('color', '#3B5998');
		$('#existing_temp').hide(); 
	});*/
</script>


<!--######################################################################################################################-->
<!--
<div>
  <h2 style="margin-top:30px;font-weight:bold;font-size:16px;">Also At ProProfs</h2>
  
  <div id="op_qm" class="product op_first">
	  <h2 class="pr_head"><a href="/quiz-school/">Create Quizzes</a></h2>
	  <h3 class="pr_subhead">Make tests, exams &amp; quizzes</h3>
  </div>
	  	  
   <div id="op_tm" class="product op_second">
	  <h2 class="pr_head"><a href="/training/">Create Trainings &amp; Courses</a></h2>
	  <h3 class="pr_subhead">Create courses &amp; elearning content</h3>
   </div>
		    
   <div id="op_pm" class="product op_third">
	  <h2 class="pr_head"><a href="/surveys/">Create surveys</a></h2>
	  <h3 class="pr_subhead">Create custom web surveys</h3>
   </div>
   
    <div class="clear"></div>
  
   <div id="op_pm" class="product op_five">
	  <h2 class="pr_head"><a href="/survey/score_surveyinfo.php">Create Scored survey</a></h2>
	  <h3 class="pr_subhead">Create surveys with scoring</h3>
   </div>
   
   <div id="op_pm" class="product op_sevan">
	  <h2 class="pr_head"><a href="http://www.proprofs.com/knowledgebase/">Create Knowledge Base</a></h2>
	  <h3 class="pr_subhead">Create online FAQs and knowledgebases</h3>
   </div>
		    
  <div class="clear"></div>
</div>-->
<div style="font-size: 16px; margin-top: 0px ! important; padding-top:44px;" class="at-proporfs">
	<div style="margin-bottom: 30px;font-size:17px;" class="block at-block">
	Create online Polls that work on any device such as desktops, laptops or smartphones. Build interactive Polls using an easy editor and over 1000 polltemplates. Collect valuable data, opinions, feedback or research. Use insightful reports for making smarter decisions.
	</div>
	<style>
	
	</style>
	<!-- 'at-block' div ends -->
	<div class="block at-block">
		<h2 style="margin-top:30px;font-weight:bold;font-size:16px;">Also At ProProfs</h2>
	  
		<div id="op_qm" class="product op_first">
		  <h2 class="pr_head"><a href="/quiz-school/create-a-quiz.php">Create Quizzes</a></h2>
		  <h3 class="pr_subhead">Make tests, exams &amp; quizzes</h3>
		</div>
			  
		<div id="op_tm" class="product op_second">
		  <h2 class="pr_head" ><a href="/training/create-a-course.php">Create Trainings &amp; Courses</a></h2>
		  <h3 class="pr_subhead">Create courses &amp; elearning content</h3>
	   </div>
				
		<div id="op_pm" class="product op_third">
		  <h2 class="pr_head"><a href="/surveys/create-a-survey.php">Create survey</a></h2>
		  <h3 class="pr_subhead">Create custom web survey</h3>
	   </div>
	  
		<div id="op_pm" class="product op_five">
		  <h2 class="pr_head"><a href="/survey/score_surveyinfo.php">Create Scored survey</a></h2>
		  <h3 class="pr_subhead">Create polls with scoring</h3>
	   </div>
	   
		<div id="op_pm" class="product op_sevan">
          <h2 class="pr_head" ><a href="/knowledgebase/create-a-knowledge-base.php">Create Knowledge Base</a></h2>
          <h3 class="pr_subhead" >Create online FAQs and knowledgebases</h3>
       </div>
       
       <div id="op_pm" class="product op_six">
		  <h2 class="pr_head" ><a href="/flashcards/create-flashcards.php">Create Online Flashcards</a></h2>
		  <h3 class="pr_subhead" >Study or create online flashcards</h3>
	   </div>
				
		<div class="clear"></div>
	</div>
  <!-- 'at-block' div ends -->
</div>	

<div class="clear"></div>
</div>
	
</div>
<!-- Content End -->

<div class="clear"></div>
   
<!--End Code For fancybox-->

<?php // ------------------------------ Olark Script --------------------------------------------------------------------?>
<script data-cfasync="false" type='text/javascript'>/*{literal}<![CDATA[*/
setTimeout(function(){
window.olark||(function(c){var f=window,d=document,l=f.location.protocol=="https:"?"https:":"http:",z=c.name,r="load";var nt=function(){f[z]=function(){(a.s=a.s||[]).push(arguments)};var a=f[z]._={},q=c.methods.length;while(q--){(function(n){f[z][n]=function(){f[z]("call",n,arguments)}})(c.methods[q])}a.l=c.loader;a.i=nt;a.p={0:+new Date};a.P=function(u){a.p[u]=new Date-a.p[0]};function s(){a.P(r);f[z](r)}f.addEventListener?f.addEventListener(r,s,false):f.attachEvent("on"+r,s);var ld=function(){function p(hd){hd="head";return["<",hd,"></",hd,"><",i,' onl' + 'oad="var d=',g,";d.getElementsByTagName('head')[0].",j,"(d.",h,"('script')).",k,"='",l,"//",a.l,"'",'"',"></",i,">"].join("")}var i="body",m=d[i];if(!m){return setTimeout(ld,100)}a.P(1);var j="appendChild",h="createElement",k="src",n=d[h]("div"),v=n[j](d[h](z)),b=d[h]("iframe"),g="document",e="domain",o;n.style.display="none";m.insertBefore(n,m.firstChild).id=z;b.frameBorder="0";b.id=z+"-loader";if(/MSIE[ ]+6/.test(navigator.userAgent)){b.src="javascript:false"}b.allowTransparency="true";v[j](b);try{b.contentWindow[g].open()}catch(w){c[e]=d[e];o="javascript:var d="+g+".open();d.domain='"+d.domain+"';";b[k]=o+"void(0);"}try{var t=b.contentWindow[g];t.write(p());t.close()}catch(x){b[k]=o+'d.write("'+p().replace(/"/g,String.fromCharCode(92)+'"')+'");d.close();'}a.P(2)};ld()};nt()})({loader: "static.olark.com/jsclient/loader0.js",name:"olark",methods:["configure","extend","declare","identify"]});
/* custom configuration goes here (www.olark.com/documentation) */
olark.identify('1495-216-10-6754');},6000);/*]]>{/literal}*/</script>

<noscript><a href="https://www.olark.com/site/1495-216-10-6754/contact" title="Contact us" target="_blank">Questions? Feedback?</a> powered by <a href="http://www.olark.com?welcome" title="Olark live chat software">Olark live chat software</a></noscript>

<?php // ------------------------------ EOf Olark Script ------------------------------------------------------------?>

<!-- live2support codes starts --><!--<div id="l2s_trk" style="z-index:99;"><a href="http://live2support.com" style="font-size:1px;">website chat software</a></div><script type="text/javascript">   var l2slhight=400; var l2slwdth=350; var l2slv=3; var l2slay_hbgc="#0097C2"; var l2sdialogofftxt="Live Chat Offline"; var l2sdialogontxt="Live Chat Online";  var l2senblyr=true; var l2slay_pos="R"; (function () { 	var l2d=document; 	l2d.getElementById('l2s_trk').style.visibility='hidden';var l2scd = l2d.createElement('script');l2scd.type = 'text/javascript'; l2scd.async = true; l2scd.src = ('https:' == l2d.location.protocol ? 'https://' : 'http://') +'//s01.live2support.com/js/lsjs1.php?stid=27355&jqry=Y&l2stxt='; var l2sscr = l2d.getElementsByTagName('script')[0]; l2sscr.parentNode.insertBefore(l2scd, l2sscr); })();  </script>--><!-- live2support codes ends -->


<script >
/*$(document).ready(function () 
{
    if($('#userLogin').val() == '')
    {
        var searchGreen = $('#search-green').searchMeme({
            buttonPlacement: 'right', 
            button: 'green'
        });
    }
});

$(document).ready(function()
{
    $('#global-nav li:has(ul)').hover(function(){
        $(this).find('> ul').stop().slideToggle(400); 
    });
});

$(document).ready(function()
{
    $('#right-panel-link').panelslider({side: 'right', 
                                        clickClose: false, duration: 200 });
                                        
    $('#close-panel-bt').click(function() {
      $.panelslider.close();
      });
     
     $("div:not(#right-panel)").click(function() 
     {
        $.panelslider.close();
     });
});

    */
</script>

<?php

//common SSI, footer script
require_once('SSI/comon_footer.php');
?>