<?php
$isValid = true;
$errors = [];
if ($_SERVER['REQUEST_METHOD'] === "POST") {
    $title = trim($_POST['title']);
    $annotation = trim($_POST['annotation']);
    $content = trim($_POST['content']);
    $email = trim($_POST['email']);
    $views = trim($_POST['views']);
    // $date = trim($_POST['date']);
    $publish_in_index = trim($_POST['publish_in_index']);
    $category = trim($_POST['category']);

    if (empty($title)) {
        $isValid = false;
        $errors['title'] = 'Заголовок обязателен для заполнения';
    }
    if (mb_strlen($title) > 255) {
        $isValid = false;
        $errors['title'] = 'Поле заголовок не должно превышать 255 символов';
    }
    if (mb_strlen($title) < 3) {
        $isValid = false;
        $errors['title'] = 'Поле заголовок должно содеражть не меньше 3 символов';
    }
    if (mb_strlen($annotation) > 500) {
        $isValid = false;
        $errors['annotation'] = 'Поле аннотация не должно превышать 500 символов';
    }
    if (mb_strlen($content) > 30000) {
        $isValid = false;
        $errors['content'] = 'Поле текст новости не должно превышать 30000 символов';
    }
    if (!filter_var($email, FILTER_VALIDATE_EMAIL))  {
        $isValid = false;
        $errors['email'] = 'Поле email заполнено неверно';
    }
    if (!filter_var($views, FILTER_VALIDATE_INT) || 
        $views < 0 || $views > PHP_INT_MAX*2) {
        $isValid = false;
        $errors['views'] = 'Число просмотров указано неверно';
    }
    $today = date('Y-m-d');
    $publicationDate = $_POST['date'];
    if($publicationDate < $today) {
        $isValid = false;
        $errors['date'] = 'Дата публикации не должна быть раньше текущей даты';
    }
    if(!$_POST['publish_in_index'] == 'yes' && !$_POST['publish_in_index'] == 'no') {
        $isValid = false;
        $errors['publish_in_index'] = 'Необходимо выбрать: публиковать на главной или нет';
    }
    /*if($category == '') {
        $isValid = false;
        $errors['category'] = 'Выберие категорию';
    }*/

    echo json_encode([
        'status' => $isValid,
        'errors' => $errors,
    ]);
}
?>
