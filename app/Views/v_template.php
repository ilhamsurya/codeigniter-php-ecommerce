<!DOCTYPE html>
<html>

<head>
    <title>Template</title>
    <link href="//maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
    <script src="//maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
    <script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <!------ Include the above in your HEAD tag ---------->
    <style>
        @media print {
            #printPageButton {
                display: none;
            }
        }
    </style>
    <link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet"
        integrity="sha384-wvfXpqpZZVQGK6TAh5PVlGOfQNHSoD2xbE+QkPxCAFlNEevoEH3Sl0sibVcOQVnN" crossorigin="anonymous">

</head>

<body>
    <table style="width: 100%; height:100%" align="center" border="1">

        <tr height="100">
            <td align="center">HEADER</td>
        </tr>
        <tr height="50">
            <td bgcolor="#f0ffff" align="center"><a href="/home"> HOME</a> |
                <a href="/berita"> BERITA </a> |
                <a href="/mahasiswa"> MAHASISWA </a> |
                <a href="/barang"> BELANJA </a> |
                <a href="/logout"> LOGOUT </a>

            </td>
        </tr>
        <tr height="200">

            <td><?= $this->renderSection('content') ?></td>
        </tr>
        <tr height="100">
            <td>
                <div align="center">FOOTER</div>
            </td>
        </tr>
    </table>
</body>

</html>