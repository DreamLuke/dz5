<?php

require('./Request.php');
$request = new Request;
if($request->isPost()) {
	$request->required('title');
	$request->max('title', 255);
	$request->min('title', 3);

	// $request->required('annotation');
	$request->max('annotation', 500);

	// $request->required('content');
	$request->max('content', 30000);

	$request->required('email');
	$request->email('email');
	
	$request->views('views');
	
	$request->required('date');
	$request->isActualDate('date');

	$request->required('publish_in_index');
	$request->publishOnMain('publish_in_index');

	$request->category('category');
	// $request->categoryArray('category', [1, 2, 3]);

	$isValid = $request->isValid();
	$errors = $request->getErrors();
}
   
?>

<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
</head>
<body>

<br>
<div class="container">
    <div class="row">

        <form style="width: 100%" method="post">
            <div class="form-group row">
                <label for="title" class="col-md-2 col-form-label">Заголовок</label>
                <div class="col-md-10">
                    <input
                            type="text"
                            class="form-control  <?php echo ($errors['title'][0] ? 'is-invalid' : '' ); ?>"
                            id="title"
                            name="title"
                            value="<?php $request->saveValue('title') ?>"
                    >
                    <div class="invalid-feedback">
                        <?php echo ($errors['title'] ? $errors['title'][0] : '' ); ?>
                    </div>
                </div>
            </div>

            <div class="form-group row">
                <label for="annotation" class="col-md-2 col-form-label">Аннтация</label>
                <div class="col-md-10">
                    <textarea
                            name="annotation"
                            id="annotation"
                            class="form-control  <?php echo ($errors['annotation'][0] ? 'is-invalid' : '' ); ?>"
                            cols="30"
                            rows="10"><?php $request->saveValue('annotation') ?></textarea>
                    <div class="invalid-feedback">
                        <?php echo ($errors['annotation'] ? $errors['annotation'][0] : '' ); ?>
                    </div>
                </div>
            </div>

            <div class="form-group row">
                <label for="content" class="col-md-2 col-form-label">Текст новости</label>
                <div class="col-md-10">
                    <textarea
                            name="content"
                            id="content"
                            class="form-control  <?php echo ($errors['content'][0] ? 'is-invalid' : '' ); ?>"
                            cols="30"
                            rows="10"><?php $request->saveValue('content') ?></textarea>
                    <div class="invalid-feedback">
                        <?php echo ($errors['content'] ? $errors['content'][0] : '' ); ?>
                    </div>
                </div>
            </div>

            <div class="form-group row">
                <label for="email" class="col-md-2 col-form-label">Email  автора для связи</label>
                <div class="col-md-10">
                    <input
                            type="email"
                            class="form-control  <?php echo ($errors['email'][0] ? 'is-invalid' : '' ); ?>"
                            id="email"
                            name="email"
                            value="<?php $request->saveValue('email') ?>"
                    >
                    <div class="invalid-feedback">
                        <?php echo ($errors['email'] ? $errors['email'][0] : '' ); ?>
                    </div>
                </div>
            </div>

            <div class="form-group row">
                <label for="views" class="col-md-2 col-form-label">Кол-во просмотров</label>
                <div class="col-md-10">
                    <input
                            type="text"
                            class="form-control  <?php echo ($errors['views'][0] ? 'is-invalid' : '' ); ?>"
                            id="views"
                            name="views"
                            value="<?php $request->saveValue('views') ?>"
                    >
                    <div class="invalid-feedback">
						<?php echo ($errors['views'] ? $errors['views'][0] : '' ); ?>
					</div>
                </div>
            </div>

            <div class="form-group row">
                <label for="date" class="col-md-2 col-form-label">Дата публикации</label>
                <div class="col-md-10">
                    <input
                            type="date"
                            class="form-control  <?php echo ($errors['date'][0] ? 'is-invalid' : '' ); ?>"
                            id="date"
                            name="date"
                            value="<?php $request->saveValue('date') ?>"
                    >
                    <div class="invalid-feedback">
						<?php echo ($errors['date'] ? $errors['date'][0] : '' ); ?>
					</div>
                </div>
            </div>

            <div class="form-group row">
                <label for="is_publish" class="col-md-2 col-form-label">Публичная новость</label>
                <div class="col-md-10">
                    <input
                            type="checkbox"
                            class="form-control"
                            id="is_publish"
                            name="is_publish"
                    >
                    <div class="invalid-feedback"></div>
                </div>
            </div>

            <div class="form-group row">
                <label class="col-md-2 col-form-label">Публиковать на главной</label>
                <div class="col-md-10">
                    <div class="form-check <?php echo ($errors['publish_in_index'][0] ? 'is-invalid' : '' ); ?>">
					
                        <input class="form-check-input" type="radio" name="publish_in_index" id="publish_in_index_yes" value="yes" checked>
                        <label class="form-check-label" for="publish_in_index_yes">
                            Да
                        </label>
                    </div>
                    <div class="form-check echo ($errors['publish_in_index'][0] ? 'is-invalid' : '' ); ?>">
                        <input class="form-check-input" type="radio" name="publish_in_index" id="publish_in_index_no" value="no">
                        <label class="form-check-label" for="publish_in_index_no">
                            Нет
                        </label>
                    </div>
                    <div class="invalid-feedback">
						<?php echo ($errors['publish_in_index'] ? $errors['publish_in_index'][0] : '' ); ?>
					</div>
                </div>
            </div>

            <div class="form-group row">
                <label for="category" class="col-md-2 col-form-label">Категория</label>
                <div class="col-md-10">
                    <select id="category" class="form-control <?php echo ($errors['category'][0] ? 'is-invalid' : '' ); ?>" name="category">
						<?php $selectedValue = $request->saveSelect('category'); ?>
                        <option disabled <?php echo $selectedValue == '' ? 'selected' : ''; ?>>Выберете категорию из списка..</option>
                        <option <?php echo $selectedValue == 1 ? 'selected' : ''; ?> value="1">Спорт</option>
                        <option <?php echo $selectedValue == 2 ? 'selected' : ''; ?> value="2">Культура</option>
                        <option <?php echo $selectedValue == 3 ? 'selected' : ''; ?> value="3">Политика</option>
                    </select>
                    <div class="invalid-feedback">
						<?php echo ($errors['category'] ? $errors['category'][0] : '' ); ?>
					</div>
                </div>
            </div>

            <div class="form-group row">
                <div class="col-md-9">
                    <button type="submit" class="btn btn-primary">Отправить</button>
                </div>
                <div class="col-md-3">
                    <?php if(isset($isValid) && $isValid): ?>
                        <div class="alert alert-success">Форма валидна</div>
                    <?php endif; ?>
                </div>
            </div>
        </form>

    </div>
</div>


