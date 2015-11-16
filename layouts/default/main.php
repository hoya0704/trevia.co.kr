<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN"
"http://www.w3.org/TR/html4/loose.dtd">
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=euc-kr">
<title>트레비아</title>
<script type="text/javascript">
function resizeIframe(){

           var iframe = document.getElementById( 'inneriframe' );
           var divContents = document.getElementById("contents");
           var height = divContents.clientHeight;
           /* 개발기 호출 */
           //var iframeUrl = 'http://rndloung.bccard.com/app/loung/view/common/cross_resize.jsp?height='+height;
           /* 운영기 호출 */
           var iframeUrl = 'http://loung.bccard.com/app/loung/view/common/cross_resize.jsp?height='+height;
           iframe.src = iframeUrl;
}
</script>

</head>

<body>
<div id="contents">
<table width="720"  border="0" cellspacing="0" cellpadding="0">
  <tr>
    <td valign="top"><?php include __KIMS_CONTENT__?></td>
  </tr>
</table>
</div>

<iframe id="inneriframe" src=""  width="0" height="0" title="트레비아"></iframe>
<script type="text/javascript">
resizeIframe();    //이부분의 스크립트가 페이지 로딩후에 호출될수 있도록 처리
</script>

</body>
</html>
