<!DOCTYPE html>
<html>
<head>
    <title>Template</title>
</head>
<body>
<table style="width: 100%; height:100%" align="center" border="1">

    <tr height="100">
        <td align="center" >HEADER</td>
    </tr>
    <tr height="50">
        <td bgcolor="#f0ffff" align="center"><a href="/home"> HOME</a> |
            <a href="/berita"> BERITA </a> |
            <a href="/mahasiswa"> MAHASISWA </a>
            </td>
    </tr>
    <tr height="200">
        
        <td><?= $this->renderSection('content') ?></td>
    </tr>
    <tr height="100">
        <td><div align="center">FOOTER</div></td>
    </tr>
</table>
</body>
</html>