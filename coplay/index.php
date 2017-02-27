<?php
error_reporting(E_ALL);

function getFiles(){
    $mp3_files = glob("/var/www/chiaki/mtr/uploader/uploads/*.mp3");
    $m4a_files = glob("/var/www/chiaki/mtr/uploader/uploads/*.m4a");
    return array_merge($mp3_files,$m4a_files);
}

function setUpSelect($files){
    $html = "";
    foreach($files as $k => $v){
        $html .= "<option value='" . normalizePath($v) . "'>" . basename($v) . "</option>\n";
    }
    return $html;
}

function normalizePath($value){
   return "https://modeverv.aa0.netvolante.jp/chiaki/mtr/uploader/uploads/" . basename($value);
}

$files = getFiles();
?>
<!DOCTYPE html>
<html lang="ja">
<head>
<meta charset="UTF-8">
<link rel="stylesheet" href="//code.jquery.com/ui/1.9.2/themes/base/jquery-ui.css" />
<!--[if lt IE 9]>
<script src="//html5shiv.googlecode.com/svn/trunk/html5.js"></script>
<![endif]-->
<title>Multi Track Player</title>
<script src="//code.jquery.com/jquery-1.8.3.js"></script>
<script src="//code.jquery.com/ui/1.9.2/jquery-ui.js"></script>
<script src="app.js"></script>
</head>
<body>
<h1>Multi Track Player</h1>

<?php for($i=0,$l=8;$i <$l;$i++){ ?>
<div>
<audio id="audio-<?php echo $i?>" src="" controls>
  <p>音声を再生するには、audioタグをサポートしたブラウザが必要です。</p>
</audio>
<select id="select-<?php echo $i ?>" style="display:inline-block">
<?php echo setupSelect($files) ?>
</select>
<button id="set-<?php echo $i ?>" data-select="select-<?php echo $i ?>" data-audio="audio-<?php echo $i ?>">set</button>
<button id="unset-<?php echo $i ?>" data-select="select-<?php echo $i ?>" data-audio="audio-<?php echo $i ?>">unset</button>
<span id="setted-<?php echo $i ?>"></span>
</div>                                  

<?php } ?>
<p><button id="play">play</button>&nbsp;&nbsp;<button id="pause">Pause</button></p>
<div id="slider" style="margin:20px;"></div>
</body>
</html>
