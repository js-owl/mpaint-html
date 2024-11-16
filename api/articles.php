<?php
$ar = array();
$o1 = array("id" => 1, "t" => "ta"); $ar['1'] = $o1;
$o2 = array("id" => 2, "t" => "tb"); $ar['2'] = $o2;
// echo $ar;
// print_r ($ar);
// echo "<br><br>";

switch($_SERVER['REQUEST_METHOD']){
    case 'GET':
        if(isset($_GET['id'])){
            if(isset($ar[$_GET['id']])){
                $res = $ar[$_GET['id']];
            } else {
                header($_SERVER['SERVER_PROTOCOL'] . ' 404 Not Found');
            }
        } else {
            $res = array_values($ar);
        }
        break;
}
echo json_encode($res);
// ---------------------------------------------------------------
$articles = json_decode(file_get_contents('data/articles.txt'), true);
// echo $articles;
// print_r ($articles);
switch($_SERVER['REQUEST_METHOD']){
    case 'GET':
        if(isset($_GET['id'])){
            if(isset($ar[$_GET['id']])){
                $res2 = $articles[$_GET['id']];
            } else {
                header($_SERVER['SERVER_PROTOCOL'] . ' 404 Not Found');
            }
        } else {
            $res2 = array_values($articles);
        }
        break;
}
echo json_encode($res2);

// $fname = "data/articles.txt";
// if(is_file($fname)){
//     $result = file_get_contents($fname);
//     echo "1<br>";
//     echo $result;
// } else {
//     echo 'error';
// }

// $articles = json_decode(file_get_contents('data/articles.txt'), true);
// echo "2<br>";
// print_r ($articles);
// // $articlesAI = (int)file_get_contents('data/ai.txt');


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