<!DOCTYPE html>
<html>
<head>
    <link rel="stylesheet" href="css/reset.css" type="text/css">
    <link rel="stylesheet" href="css/styler.css" type="text/css">
    <link rel="stylesheet" href="css/style.css" type="text/css">

    <script type="text/javascript" src="js/jquery.js"></script>

    <title>SpyGlass V.1</title>

</head>

<body>

<div id="super_area">
    <div id="control_area">
        <div class="commands vertical">
            <a href="/commands.php?command=up"      class="ajax_command cmd_up"></a>
            <a href="/commands.php?command=down"    class="ajax_command cmd_down"></a>
        </div>
        <div class="commands horizontal">

            <a href="/commands.php?command=startstream"    class="ajax_command cmd_startstream">startstream</a>
            <a href="/commands.php?command=stopstream"    class="ajax_command cmd_stopstream">stopstream</a>


            <a href="/commands.php?command=left"    class="ajax_command cmd_left"></a>
            <a href="/commands.php?command=right"   class="ajax_command cmd_right"></a>
        </div>
        <div class="clearFix"></div>
    </div>
    <img id="streamimage" class="x-rotated-180" src="/stream/" height="480px"/>
    <img id="windows_ru" src="imgs/ramc2rightup.png"/>
    <img id="windows_lu" src="imgs/ramc2leftup.png"/>
    <img id="windows_ld" src="imgs/ramc2leftdown.png"/>
    <img id="windows_rd" src="imgs/ramc2rightdown.png"/>
</div>


<script type="text/javascript">
    $(document).ready(function () {
        $('.ajax_command').click(function () {
            var obj = jQuery(this);
            var url = obj.attr('href');
            console.log(obj);
            $.ajax({
                url: url,
                type: "POST"
            });
            return false;
        })
    });
</script>
</body>
</html>
