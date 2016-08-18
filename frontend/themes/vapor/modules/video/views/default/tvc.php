<object width="496" height="288" data="/images/players/FlashMediaPlayback_127.swf" codebase="http://download.macromedia.com/pub/shockwave/cabs/flash/swflash.cab#version=10,1,0,0" classid="clsid:d27cdb6e-ae6d-11cf-96b8-444553540000"><param name="flashvars" value="src=http://90.154.106.194:80/stream/FFA0945BCCDF67161820222426283053/f48a0e7f1d028f5a9fe6ef8e91a21a975s.f4m&amp;autoPlay=false&amp;volume=0.5&amp;scaleMode=letterbox&amp;htmlUrl=http://www.ontvtime.ru/general/tvc.html&amp;lng=ru&amp;time_end=0&amp;width=496&amp;height=288&amp;playPre=0&amp;referer=http%3A%2F%2Fwww.ontvtime.ru%2Fgeneral%2Ftvc.html&amp;rereferer=https%3A%2F%2Fwww.google.com%2F&amp;maxDur=40000&amp;tag=4"><param name="allowfullscreen" value="true"><param name="allowscriptaccess" value="always"><param name="src" value="/images/players/FlashMediaPlayback_127.swf"><embed width="496" height="288" allowscriptaccess="always" allowfullscreen="true" flashvars="src=http://90.154.106.194:80/stream/FFA0945BCCDF67161820222426283053/f48a0e7f1d028f5a9fe6ef8e91a21a975s.f4m&amp;autoPlay=false&amp;volume=0.5&amp;scaleMode=letterbox&amp;htmlUrl=http://www.ontvtime.ru/general/tvc.html&amp;lng=ru&amp;time_end=0&amp;width=496&amp;height=288&amp;playPre=0&amp;referer=http%3A%2F%2Fwww.ontvtime.ru%2Fgeneral%2Ftvc.html&amp;rereferer=https%3A%2F%2Fwww.google.com%2F&amp;maxDur=40000&amp;tag=4" src="/images/players/FlashMediaPlayback_127.swf" type="application/x-shockwave-flash"></object>
<script type="text/javascript">
    <!--
    var gid = 'FFA0945BCCDF67161820222426283053';
    var gid2 = '';
    var width1 = 496;
    var height1 = 288;
    var totalStreams = 2;
    var isRecord = 0;
    var goodQualStr = 'Хорошее&nbsp <a id="changeQual" href="#">Низкое</a>';
    var lowQualStr = '<a id="changeQual" href="#">Хорошее</a>&nbsp Низкое';
    var currQualStr = goodQualStr;
    var doLowPlayer = "";
    var doBigPlayer = "";
    if (width1 == 368) {
        width1 = 490;
        height1 = 384;
        doLowPlayer = "";
        doBigPlayer = "";
    }
    var currPlayerText = doLowPlayer;
    var width2 = 368;
    var height2 = 288;
    var width = width1;
    var height = height1;
    var time1 = "";
    var htmlUrl = window.location.href.toString();
    var time_end = 0;
    var host = "";
    var sid = "";
    var rid = "";
    var aid = "";
    var playPre = "";
    var tag = 0;
    var referer = encodeURIComponent(htmlUrl);
    var rereferer = encodeURIComponent(document.referrer);
    var maxDur = 40000;
    if (navigator.cookieEnabled == false) {
        alert("For watching TV you need to enable cookies.");
    }
    else {
        document.getElementById('silver_wrapp').innerHTML = '<br /><table width="400" height="288" align="center"><tr><td width="60"></td><td>Загружается... Пожалуйста, подождите</td></tr></table>';
    }

    function setPlayer()
    {
        var player, stream, autoPlay;
        if (host == "") {
            host = getCookie("tv");
            if (host == "http://0.0.0.0") {
                host = "127.0.0.1";
            }
        }
        if (playPre == "") {
            playPre = getCookie("playPre");
            if (playPre != '0') {
                playPre = '1';
            }
        }
        //playPre = '1';
        if (aid == "") {
            aid = getCookie("tv4");
        }
        if (host == "stop") {
            document.getElementById('silver_wrapp').innerHTML = '<br /><table width="400" height="288" align="center"><tr><td width="60"></td><td></td></tr></table>';
        }
        if (host == "stop" || aid == '1') {
            playPre = '0';
            clearAds();
            if (host == "stop") {
                return;
            }
        }
        if (time1 == "") {
            time1 = getCookie("tv1");
        }
        if (sid == "") {
            sid = getCookie("tv2");
        }
        if (rid == "") {
            rid = getCookie("tv3");
            if (rid == '1' && gid2 != "") {
                gid = gid2;
            }
        }
        if (currQualStr == goodQualStr) {
            if (window.isIpad) {
                (isRecord) ? stream = "a" + sid + "playlist.m3u8?time=" + time1 : stream = "i" + sid + "playlist.m3u8";
            }
            else {
                (isRecord) ? stream = "a" + sid + ".f4m?time=" + time1 : stream = "f" + sid + ".f4m";
            }
        }
        else if (currQualStr == lowQualStr) {
            if (window.isIpad) {
                (isRecord) ? stream = "b" + sid + "playlist.m3u8?time=" + time1 : stream = "j" + sid + "playlist.m3u8";
            }
            else {
                (isRecord) ? stream = "b" + sid + ".f4m?time=" + time1 : stream = "g" + sid + ".f4m";
            }
        }
        if (isRecord) {
            if (playPre == '1') {
                autoPlay = "false";
            }
            else {
                autoPlay = "true";
            }
        }
        else {
            autoPlay = "false";
        }
        tag = 4;
        var selectQual = '';
        if (totalStreams == 2) {
            selectQual = '<br/><br/><div style="height: 20px;">Качество: <span id="qualStr">' + currQualStr + '</span></div>';
        }
        var srcSwf = '/images/players/FlashMediaPlayback_127.swf';
        document.getElementById('add-old-player').innerHTML = currPlayerText;
        var coeff = 1.0;
        var wi = $(window).width();
        if (wi < width) {
            coeff = wi / width;
            width = width * coeff;
            height = height * coeff;
        }
        if (!window.isIpad) {
            player =    selectQual + '<object width="'+width+'" height="'+height+'" data="' + srcSwf + '" codebase="http://download.macromedia.com/pub/shockwave/cabs/flash/swflash.cab#version=10,1,0,0" classid="clsid:d27cdb6e-ae6d-11cf-96b8-444553540000">'+
                '<param name="flashvars" value="src=http://'+host+'/stream/' + gid + '/' + stream + '&autoPlay=' + autoPlay + '&volume=0.5&scaleMode=letterbox&htmlUrl=' + htmlUrl + '&lng=' + window.lng + '&time_end=' + time_end + '&width=' + width + '&height=' + height + '&playPre=' + playPre + '&referer=' + referer + '&rereferer=' + rereferer + '&maxDur=' + maxDur + '&tag=' + tag +'">'+
                '<param name="allowfullscreen" value="true">'+
                '<param name="allowscriptaccess" value="always">'+
                '<param name="src" value="' + srcSwf + '">' +
                '<embed width="'+width+'" height="'+height+'" allowscriptaccess="always" allowfullscreen="true" flashvars="src=http://'+host+'/stream/' + gid + '/' + stream + '&amp;autoPlay=' + autoPlay + '&amp;volume=0.5&amp;scaleMode=letterbox&amp;htmlUrl=' + htmlUrl + '&amp;lng=' + window.lng + '&amp;time_end=' + time_end + '&amp;width='+width+'&amp;height='+height+'&amp;playPre='+playPre+'&amp;referer='+referer+'&amp;rereferer='+rereferer+'&amp;maxDur='+maxDur+'&amp;tag='+tag+'" src="' + srcSwf + '" type="application/x-shockwave-flash">'+
                '</object>'+
                '<br/>';
            document.getElementById('silver_wrapp').innerHTML = player;
        }
        else {
            if (playPre == '0') {
                player = selectQual + '<video width="'+width+'" height="'+height+'" src=http://'+host+'/stream/' + gid + '/'+stream+' controls preload="none"></video><br/>';
                document.getElementById('silver_wrapp').innerHTML = player;
            }
            else {
                player = selectQual + '<table><tr><td><div id="videoplayer"><video id="vcont" src=http://'+host+'/stream/' + gid + '/'+stream+'></video>' +
                    '<div id="vcont2"></div>' +
                    '<button id="playpause" title="Play/Pause">&#9654;</button>' +
                    '<button id="fullscreen" title="Full screen">[&nbsp;&nbsp;&nbsp;]</button>' +
                    '<div id="contslider"><table><tr><td><input id="seekslider" type="range" min="-600" max="600" value="0" step="1" oninput="updateSeek(value)" onchange="releaseSeek(value)"></td>' +
                    '<td width="5px"></td><td><output for="seekslider" id="currSeek">0</output></td></tr></table></div>' +
                    '</div></td></tr></table><br/>';
                document.getElementById('silver_wrapp').innerHTML = player;
                processHtml5(width, height, referer, rereferer, maxDur, playPre, tag);
            }
        }
        Event.add(document.getElementById('changeQual'), 'click', changePlayerMode);
        return;
    }

    function changePlayerMode(event)
    {
        if (currQualStr == goodQualStr) {
            currQualStr = lowQualStr;
        }
        else {
            currQualStr = goodQualStr;
        }
        setPlayer();

        return false;
    }

    function changePlayerSize(event) {
        if (width == width1) {
            width = width2;
            height = height2;
            currPlayerText = doBigPlayer;
        }
        else {
            width = width1;
            height = height1;
            currPlayerText = doLowPlayer;
        }
        setPlayer();

        return false;
    }

    // -->
</script>