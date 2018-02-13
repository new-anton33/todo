<!doctype html>
<html>
<head>
    <meta charset="utf-8">
    <title><? echo SITE_NAME; ?></title>
    <script type="text/javascript" src="/js/jquery-1.12.3.min.js"></script>
    <script type="text/javascript" src="https://cdn.datatables.net/v/dt/dt-1.10.12/datatables.min.js"></script>
    <script type="text/javascript" src="/js/bootstrap.js"></script>
    <script type="text/javascript" src="/js/app.js"></script>
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.12/css/jquery.dataTables.min.css">
    <link rel="stylesheet" href="/css/bootstrap.css">
    <link rel="stylesheet" href="/css/style.css">
</head>

<body>

<div class="head_blog"><a class="head_link" href="/"><? echo SITE_NAME; ?></a>
    <? if(!empty($_SESSION['admin']) && $_SESSION['admin'] == 1){
        echo '<a style="float: right;" href="/auth/logout" id="login">Admin (Выйти)</a>';
    } else {
        echo '<a style="float: right;" href="#" id="login">Войти</a>';
    }
    ?>


</div>

<div id="modalLogin" class="modal fade">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                <h4 class="modal-title">Авторизация</h4>
            </div>
            <div class="modal-body">

                <form action="/auth/login" method="post">

                    <input class="form-control" name="login" placeholder="Login" value="" type="text"/>

                    <input class="form-control" name="password" placeholder="Password" value="" type="text"/>

                    <input class="btn btn-success" name="submit" type="submit" value="Войти"/>

                </form>

            </div>
            <!-- Футер модального окна -->
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">Закрыть</button>
            </div>
        </div>
    </div>
</div>


