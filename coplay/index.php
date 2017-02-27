<?php
error_reporting(E_ALL);

function getFiles(){
    $mp3_files = glob("/var/www/chiaki/mtr/uploader/uploads/*.mp3");
    $m4a_files = glob("/var/www/chiaki/mtr/uploader/uploads/*.m4a");
    return array_merge($mp3_files,$m4a_files);
}

function renderSelect($files,$i){
    $html = "<select id=\"select-" . $i . "\" style=\"display:inline-block\">\n";
    foreach($files as $k => $v){
        $html .= "<option value='" . normalizePath($v) . "'>" . basename($v) . "</option>\n";
    }
    $html .= "</select>\n";
    return $html;
}

function renderSetButtons($i){
    $html = "<button id=\"set-" .  $i . "\" data-select=\"select-" . $i . "\" data-audio=\"audio-" . $i . "\">set</button>\n";
    $html .= "<button id=\"unset-" . $i . "\" data-select=\"select-". $i . "\" data-audio=\"audio-" . $i . "\">unset</button>\n";
    $html .= "<span id=\"setted-" . $i . "\"></span>";
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
<?php echo renderSelect($files,$i)?>
<?php echo renderSetButtons($i) ?>                       
</div>                                  

<?php } ?>
<p><button id="play">play</button>&nbsp;&nbsp;<button id="pause">Pause</button></p>
<div id="slider" style="margin:20px;"></div>
</body>
</html>
