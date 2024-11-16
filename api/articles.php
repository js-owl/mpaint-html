<?php
// $ar = array();
// $o1 = array("id" => 1, "t" => "ta"); $ar['1'] = $o1;
// $o2 = array("id" => 2, "t" => "tb"); $ar['2'] = $o2;
// $j = json_encode($ar);
// file_put_contents('db.txt', $j);
// ---------------------------------------------------------------
$f = file_get_contents('db.txt');
$articles = json_decode($f, true);

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
}
echo json_encode($res);

// switch($_SERVER['REQUEST_METHOD']){
//     case 'GET':
//         if(isset($_GET['id'])){
//             if(isset($articles[$_GET['id']])){
//                 $res = $articles[$_GET['id']];
//             } else {
//                 header($_SERVER['SERVER_PROTOCOL'] . ' 404 Not Found');
//             }
//         } else {
//             $res = array_values($articles);
//         }
//         break;
//     case 'POST':
//         echo "3<br>";
//         // $articles[++$articlesAI] = [
//         //     'id' => $articlesAI,
//         //     'title' => $_POST['title'],
//         //     'content' => $_POST['content'],
//         //     'dt' => date('Y-m-d H:i:s')
//         // ];
//         $o2 = array("id"=>2, "title"=>"tb", "content"=>"cb");
//         $articles["2"] = $o2;
//         print_r ($articles);

//         // file_put_contents('data/ai', $articlesAI);
//         // $res = $articlesAI;
//         break;
//     case 'PUT':
//         $str = file_get_contents('php://input');
//         $res = $str;

//         $put = json_decode($str, true);
//         $res = $put['id'];

//         if(isset($articles[$put['id']])){
//             $articles[$put['id']]['title'] = $put['title'];
//             $articles[$put['id']]['content'] = $put['content'];
//         } else {
//             $res = 'articles not found';
//         }
//         break;
//     case 'DELETE':
//         if(isset($_GET['id']) && isset($articles[$_GET['id']])){
//             unset($articles[$_GET['id']]);
//             $res = true;
//         } else {
//             $res = "can't remove articl";
//         }
//         break;
//     default:
//         $res = 'incorrect HTTP method';
// }
// file_put_contents('data/articles.txt', json_encode($articles));
// echo json_encode($res);