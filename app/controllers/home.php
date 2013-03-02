<?php
$app->get('/home', function() use($app)
{
    $app->render('home.html');
});