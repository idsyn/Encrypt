<%@ page language="java" import="java.util.*" pageEncoding="utf-8"%>
<%
String path = request.getContextPath();
String basePath = request.getScheme()+"://"+request.getServerName()+":"+request.getServerPort()+path+"/";
%>

<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN">
<html>
  <head>
    <base href="<%=basePath%>">
    
    <title>My JSP 'index.jsp' starting page</title>
	<meta http-equiv="pragma" content="no-cache">
	<meta http-equiv="cache-control" content="no-cache">
	<meta http-equiv="expires" content="0">    
	<meta http-equiv="keywords" content="keyword1,keyword2,keyword3">
	<meta http-equiv="description" content="This is my page">
	<!--
	<link rel="stylesheet" type="text/css" href="styles.css">
	-->
  </head>
  
  <body>
    <form action="servlet/Jiam" method="post">
                 加密字符串:27650099-564A-4869-99B3-363F8129C0CD<br>
     <input name="key" type="hidden" id="key" value="27650099-564A-4869-99B3-363F8129C0CD">
                 加密数据:<input name="jmstr" type="text" id="jmstr"><br>
                 解密后的数据：<input name="jiem" type="text" readonly="readonly" id="jiem" value="${jiem }"><br>
     <input type="submit" value="加密再解密">
    </form>
  </body>
</html>
