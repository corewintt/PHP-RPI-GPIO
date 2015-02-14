<!DOCTYPE html>
<html>
<head>
    <link rel="stylesheet" href="css/reset.css" type="text/css">
    <link rel="stylesheet" href="css/styler.css" type="text/css">

    <script type="text/javascript" src="js/jquery.js"></script>

    <title>SpyGlass V.1</title>

</head>

<body style="background:darkslategrey">

<div style="width: 1007px;margin: 10px auto">

    <div id="control_area">
        <div >
            <a href="/commands.php?command=up" class="ajax_command"
               style="left: 117px;top:75px"></a>
            <a href="/commands.php?command=down" class="ajax_command"
               style="left: 117px;top:162px"></a>
            <a href="/commands.php?command=left" class="ajax_command"
               style="left: 72px;top: 118px;"></a>
            <a href="/commands.php?command=right" class="ajax_command"
               style="left: 162px;top: 118px;"></a>
            <img src="/images/control_osnova.png">
        </div>
        <div class="clearFix"></div>
    </div>
    <div style="position: relative;width: 1007px;margin: 0px auto" >
        <img id="streamimage" class="x-rotated-180" src="/stream/" height="714px"
             style="position: absolute;left: 27px;top:5px"/>
        <img src="images/playlist_big-razvorot.png" style="position: absolute;"/>
    </div>
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
