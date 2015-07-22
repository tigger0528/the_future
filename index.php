<!DOCTYPE html>
<html>
<head>    
<meta charset="utf-8" />
<?php
require_once "config/db_connect.php";
if(isset($_GET['id']) && !empty($_GET['id'])){
	$id=$_GET['id'];
	$description="";
	if(isset($_GET['des']) && !empty($_GET['des'])) {
		$urldescription=$_GET['des'];
		$description=urldecode($_GET['des']);
	}
	$result=mysql_query("select imgtype, imgheight, imgwidth from candidate where id=$id");
	if(mysql_num_rows($result)==1){
		$rowresult=mysql_fetch_row($result);
?>
<meta property="og:title" content="<?php echo $description;?>" />
<meta property="og:description" content="到底是誰？點擊看結果" />
<meta property="og:site_name" content="投家，鬥陣選總統" />
<meta property="og:url" content="http://www.votehome.com.tw/index.php?des=<?php echo $urldescription;?>&id=<?php echo $id;?>" />
<meta property="og:image" content="http://www.votehome.com.tw/image/candidate/<?php echo $id . "m." . $rowresult[0];?>" />
<meta property="og:image:width" content="<?php echo $rowresult[2];?>" />
<meta property="og:image:height" content="<?php echo $rowresult[1];?>" />
<meta property="og:type" content="website"/>
<?php
	}
}
else{
?>
<meta property="og:title" content="投家，鬥陣選總統" />
<meta property="og:description" content="你是否無數次吶喊總統若是XXX，台灣會更好？現在，抓緊你的滑鼠！歷史，從現在開始！！" />
<meta property="og:site_name" content="投家，鬥陣選總統" />
<meta property="og:url" content="http://www.votehome.com.tw/index.php" />
<meta property="og:image" content="http://www.votehome.com.tw/image/indexBG.jpg" />
<meta property="og:type" content="website"/>
<meta property="og:image:width" content="730" />
<meta property="og:image:height" content="344" />
<?php
}
?>
<meta property="fb:app_id" content="1109820955698868" />
<title>投家，鬥陣選總統</title>
<link rel="stylesheet" href="bootstrap/css/bootstrap.min.css" />
<link rel="stylesheet" href="css/index.css" />
</head>
<body>
	<div id="indexContent" class="containerAll">
		<h1>投家, &nbsp;鬥陣選總統</h1>
		<p class="indexSubtitle">
			你是否無數次吶喊總統若是XXX，台灣會更好？<br>
			現在，抓緊你的滑鼠！歷史，從現在開始！！
		</p>
		<p class="indexSubtitle_2">
			先戰鬥！<span>隨機二選一，誰好誰更好，一比就知道</span><br>
			後補票！<span>誰又是最好，在這裡，你的一票說了算</span>
		</p>
		<a class="startBtn" id="fight">開戰！START！</a>
		<div id="indexSideBtn">
			<a id="realtimesituation" data-toggle="modal" data-target="#ModalRealtime">►即時戰況</a>
			<a data-toggle="modal" data-target="#ModalIdea">►團隊理念</a>
			<button id="showResult" data-toggle="modal" data-target="#ModalShowResult" style="display:none"></button>
		</div>
		<div class="indexBG"></div>
		<div class="copyright">Design by NaughtyX</div>
	</div>
	
	
		<div class="modal fade" id="ModalIdea" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
		  <div class="modal-dialog" role="document">
			<div class="modal-content">
				<div class="modal-header">
					<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
					<h4 class="modal-title" id="myModalLabel">團隊與理念</h4>
				</div>
				<div class="modal-body">
					<h4>1、玩家將認識更多優秀的人才</h4>
					<p>遊戲中有自由提名的機制，使人民對於擔任政府要職的想像，從政治人物擴展到各領域的優秀人士，只要人選夠優秀，就有機會被人民看見。</p>
					<h4>2、玩家將重新思考擔任總統需要的特質</h4>
					<p>遊戲的方式是在二者中選一適任者，連續的兩兩配對比較，玩家不只考慮對單一候選人的喜惡，而是思考擔任總統要職需要具備的特質。當人民能夠更理性地思考對總統的選擇，也許能成為改變台灣選舉風氣的契機。</p>
					<h4>3、增進人民理性討論公共議題的風氣，進而凝聚社會共識</h4>
					<p>透過PK戰及投票，彷彿經歷許多次虛擬的、不侷限於黨派的總統大選，降低了平時討論政治議題的敏感度，並且從理性的角度出發，考量較重要的特質、政見與議題。期望延續理性思辨的討論風氣，使人民對公眾議題累積出更多共識。</p>
				</div>
				<div class="modal-footer">
				</div>
			</div>
		  </div>
	    </div>
				
		<div class="modal fade" id="ModalShowResult" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
		  <div class="modal-dialog" role="document">
			<div class="modal-content">
				<div class="modal-header">
					<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
					<h4 class="modal-title" id="myModalLabel">符合特質的候選人是</h4>
				</div>
				<div class="modal-body">
					
				</div>
				<div class="modal-footer">
				</div>
			</div>
		  </div>
	    </div>
		
		<div class="modal fade" id="ModalRealtime" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
		  <div class="modal-dialog" role="document">
			<div class="modal-content">
				<div class="modal-header">
					<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
					<h4 class="modal-title" id="myModalLabel">神聖投票所的即時戰況</h4>
				</div>
				<div class="modal-body">
					<div id="hChartsMap" style="width:550px"></div>
				</div>
				<div class="modal-footer">
				</div>
			</div>
		  </div>
	    </div>		
		
<script type="text/javascript" src="js/jquery-1.11.3.min.js"></script>
<script type="text/javascript" src="bootstrap/js/bootstrap.min.js"></script>
<script type="text/javascript" src="js/highcharts.js"></script>
<script>
request();
$(function(){
	$("#realtimesituation").on('click', function(){
		loadAllList();
	});
	
	$("#fight").on('click', function(){
		location="fightgame.html";
	});
	
});
function request(){ //獲取 url 的參數值，不區分大小寫,如無此參數，返回空字符串.
	var url = location.href;
	//console.log(url);
	var paraString = url.substring(url.indexOf("?")+1,url.length).split("&");
	var paraObj = {}
	for (i=0; j=paraString[i]; i++){
		paraObj[j.substring(0,j.indexOf("=")).toLowerCase()] = j.substring(j.indexOf("=")+1,j.length);
	}
	//console.log(paraObj);

			$.ajax({
				url:"getresult.php",
				data:{
					id:paraObj['id'],
				},
				type:"POST",
				dataType:"json",
				success:function(json){
					if(json.status=='successful'){
						$("#ModalShowResult .modal-body").append('<div class="final"><div class="personImg" style="background:url(image/candidate/'+ paraObj['id'] + '.' + json.imgtype +');background-size:auto 200px;background-repeat: no-repeat;background-position:center;"></div><div class="canName">' + json.name + '</div><div class="canBrief">' + json.brief + '<a href="http://zh.wikipedia.org/zh-tw/'+json.wikiname+'" target="_blank">維基百科</a></div></div>');
						$("#showResult").trigger('click');
						$("#showResult").unbind('click');
					}
					else{
					}
				}
			});
	$('meta[property="og:description"]').attr("content", paraObj['description']);
	//$('meta[property="og:url"]').attr("content", "http://www.votehome.com.tw/index.html?id=" + paraObj['id']);
	$('meta[property="og:image:url"]').attr("content", "http://www.votehome.com.tw/image/candidate/" + paraObj['id'] + "m." + paraObj['imgtype']);
	$('meta[property="og:image:width"]').attr("content", paraObj['width']);
	$('meta[property="og:image:height"]').attr("content", paraObj['height']);
}
function loadAllList(){
	var request_url="loadalllist.php"
	$.ajax({
		url:request_url,
		type:"POST",
		dataType:"json",
		success:function(json){
			//console.log(json.name);
			//console.log(json.number);
			//echart(json.name.reverse(), json.number.reverse());
			$("#hChartsMap").css("height", json.height + "px");
			hcharts(json.name, json.number);
		},
		asyns:true,
		complete:function(){
		}
	});		
}



function hcharts(xdata, ydata) {
    $('#hChartsMap').highcharts({
        chart: {
            type: 'bar'
        },
        title: {
            text: '',
        },
        xAxis: {
            categories: xdata,
			labels:{
				style:{font: '14px futura, cwTeXHei, serif'}
			}
		},
        yAxis: {
			allowDecimals: false,
            min: 0,
            title: {
                text: '票數',
				style:{font: '14px futura, cwTeXHei, serif'}
            }
        },
        legend: {
            reversed: true
        },
		plotOptions: {
            series: {
				stacking: 'normal',
                cursor: 'pointer',
                point: {
                    events: {
                        click: function () {
                            window.open('https://zh.wikipedia.org/wiki/' + this.category);
                        },
                    }
                }
            }
        },
        series: [{
			//allowPointSelect: true,
            name: 'Facebook有效選舉人數',
            data: ydata,
			//color: '#00FF00',
        }]
    });
}	
</script>
</body>
</html>