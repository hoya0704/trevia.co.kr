<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN"
"http://www.w3.org/TR/html4/loose.dtd">
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=euc-kr">
<title>Ʈ�����</title>
<script type="text/javascript">
function resizeIframe(){

           var iframe = document.getElementById( 'inneriframe' );
           var divContents = document.getElementById("contents");
           var height = divContents.clientHeight;
           /* ���߱� ȣ�� */
           //var iframeUrl = 'http://rndloung.bccard.com/app/loung/view/common/cross_resize.jsp?height='+height;
           /* ��� ȣ�� */
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

<iframe id="inneriframe" src=""  width="0" height="0" title="Ʈ�����"></iframe>
<script type="text/javascript">
resizeIframe();    //�̺κ��� ��ũ��Ʈ�� ������ �ε��Ŀ� ȣ��ɼ� �ֵ��� ó��
</script>

</body>
</html>
