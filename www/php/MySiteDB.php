<?php
$localhost = "localhost";
$db = "parking";
$user = "root";
$password = "";

$link = mysqli_connect($localhost, $user, $password) or
        trigger_error(mysql_error(),E_USER_ERROR);
        //trigger_error ������� �� �������� ��������� �� ������. ������ �������� - ��������� �� ������
        //� ��������� ����, � ������ ������ ������������ ������� mysql_error(), ������ - �������� ��� //������(����� ������ ������������ �������� ��������� E_USER_ERROR, ������ 256)
        //��������� ������ ���������� ��� ����, ����� MySQL ����������� ���������.
        //��������� ������� mysqli_query(): ������������� ���������� � �������� � ������ SQL

mysqli_query($link, "SET NAMES utf8;") or die(mysql_error());
mysqli_query($link, "SET CHARACTER SET utf8;") or die(mysql_error());

        //����� ���� ������ �� ������� localhost
mysqli_select_db($link, $db);
?>