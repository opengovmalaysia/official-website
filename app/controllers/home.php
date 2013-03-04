<?php
$app->get('/home/:lang', function() use($app)
{
    $app->render('home.html');
});