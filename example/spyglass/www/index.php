<!DOCTYPE html>
<html>
<head>
	<link rel="stylesheet" href="css/reset.css" type="text/css">
    <link rel="stylesheet" href="css/styler.css" type="text/css">

    <script type="text/javascript" src="js/jquery.js"></script>

	<title>SpyGlass V.1</title>
</head>

<body style="background:darkslategrey">

<div>
    <img src="/images/control_osnova.png">
    
    
</div>

<div style="position: relative;width: 1007px;margin: 0px auto">
    <img id="streamimage" class="x-rotated-180" src="/stream/" height="700px" style="position: absolute;left: 37px;top:10px"/>
    <img src="images/playlist_big-razvorot.png" style="position: absolute;" />
</div>


<p style="text-align:center">

</p>

<table width="100%">
    <tr>
        <td style="text-align:center">
            <a href="/commands.php" class="ajax_command">up</a>
        </td>
        <td style="text-align:center">
            <a href="/commands.php" class="ajax_command">down</a>
        </td>
    </tr>
    <table>


        <script type="text/javascript">

            $(document).ready(function(){
                $('.ajax_command').click(function(){
                    var obj = jQuery(this);
                    var url = obj.attr('href');
                    console.log(obj);
                    $.ajax({
                        url: url,
                        type: "POST",
                        data: data


                    });

                    return false;
                })
            });


        </script>
</body>
</html>
