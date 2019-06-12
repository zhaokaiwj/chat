<!doctype html>
<html>
<head>
    <meta charset="UTF-8">
    <title>Document</title>
</head>
<body>
    <div id="aaa">

    </div>
    <input type="text"><input type="button" id="send" value="SEND">
<script src="/js/jquery-3.2.1.min.js"></script>
<script>
    $(function(){
        var web = new WebSocket("ws://chat.zjdgz.com:9502");
        web.onopen = function(){
            //点击发送
            $('#send').on('click',function(){
                var text = $(this).prev('input').val();
                var info ={'name':"{{$uname}}",'msg':text};
                var aa = JSON.stringify(info);
                web.send(aa);
            })
        };
        web.onmessage = function(res){
            var info = JSON.parse(res.data);
            $("#aaa").append('<span style="color: #ac2925;font-size: 23px;">'+info.name+'</span>:'+info.msg+"<br>");
        }
    })

</script>


</body>
</html>