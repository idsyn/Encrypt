<%@ Page Language="C#" AutoEventWireup="true" CodeBehind="index.aspx.cs" Inherits="WebMd5.index" %>

<!DOCTYPE html>

<html xmlns="http://www.w3.org/1999/xhtml">
<head runat="server">
<meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
    <title>c#_des加密/解密</title>
</head>
<body>
    <form id="form1" runat="server">
    <div>
    <table>
        <tr>
            <td>key</td>
            <td>
                <asp:TextBox ID="txtkey" runat="server" Width="429px">DD8E0593-B531-4785-99A7-6CC42325F81E</asp:TextBox></td>
        </tr>
        <tr>
            <td>data</td>
            <td><asp:TextBox ID="txtdata" runat="server" Width="431px"></asp:TextBox></td>
        </tr>
        <tr>
            <td>result</td>
            <td><asp:TextBox ID="txtresult" runat="server" style="margin-right: 0px" Width="428px"></asp:TextBox></td>
        </tr>
        <tr>
            <td><asp:Button ID="btnMd5_1" runat="server" Text="加密" OnClick="btnMd5_1_Click" /></td>
            <td>
                <asp:Button ID="btnMd5" runat="server" Text="解密" OnClick="btnMd5_Click" /></td>
        </tr>
    </table>
    </div>
    </form>
</body>
</html>
