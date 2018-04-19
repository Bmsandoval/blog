<html>
<head>
    <title>Try It yourself Online Editor</title>
</head>
<body>


<script type="text/javascript">
    function data_submit()
    {
        document.getElementById('live_html').contentWindow.location.reload(true);
/*        var iframe = document.getElementById('live_html');
        var tmp = iframe.src;
        iframe.src='';
        iframe.src=tmp;*/
    }
</script>
<form action="livehtml" target="live_html" method="post">
    {{ csrf_field() }}
    <table width="100%" cellspacing="0" cellpadding="0" border="1">
        <tr >
            <td> <input type="submit" value="Update HTML" onClick="data_submit();"/></td>
            <td align="center">Output</td>
        </tr>
        <tr>
            <td width="50%" >
                <input type="text" name="content" id="content" rows="35" width="90px" height="550px" cols="77" name="txt_html">
                </input>
            </td>
            <td width="50%" style="border-width:10px;border-style:none;">
                <iframe height="550px" width="100%" src="livehtml" id="live_html" name="live_html"></iframe>
            </td>
    </table>
</form>
</body>

</html>