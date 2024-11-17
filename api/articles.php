<?php
// Начальное заполнение db.json, нужно чтоб понять какая структура файла записывается
// $ar = array();
// $o1 = array("id" => 1, "t" => "ta"); $ar['1'] = $o1;
// $o2 = array("id" => 2, "t" => "tb"); $ar['2'] = $o2;
// $j = json_encode($ar);
// file_put_contents('db.json', $j);
// ---------------------------------------------------------------
$f = file_get_contents('db.json');
$articles = json_decode($f, true);
// Файл autoinc хранит последнее id объекта. 
// Если использовать count($articles) - тогда при удалении объекта, последний объект будет перезаписываться
$len = (int)file_get_contents('autoinc.txt');

switch($_SERVER['REQUEST_METHOD']){
    case 'GET':
        if(isset($_GET['id'])){
            if(isset($articles[$_GET['id']])){
                $res = $articles[$_GET['id']];
            } else {
                header($_SERVER['SERVER_PROTOCOL'] . ' 404 Not Found');
            }
        } else {
            $res = array_values($articles);
        }
        break;
    case 'POST':
        $articles[++$len] = array("id" => $len, "t" => $_POST['t'], 'dt' => date('Y-m-d H:i:s'));
        file_put_contents('autoinc.txt', $len);
        $res = $len;
        break;
    case 'PUT':
        $str = file_get_contents('php://input');
        $res = $str;

        $put = json_decode($str, true);
        $res = $put['id'];

        if(isset($articles[$put['id']])){
            $articles[$put['id']]['t'] = $put['t'];
        } else {
            $res = 'articles not found';
        }
        break;
    case 'DELETE':
        if(isset($_GET['id']) && isset($articles[$_GET['id']])){
            unset($articles[$_GET['id']]);
            $res = true;
        } else {
            $res = "can't remove article";
        }
        break;
    default:
        $res = 'incorrect HTTP method';
}
file_put_contents('db.json', json_encode($articles));
echo json_encode($res);