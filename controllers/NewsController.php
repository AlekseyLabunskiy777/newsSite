<?php

namespace controllers;

use models\News;
use utils\ViewUtils;

require_once 'utils/ViewUtils.php';
require_once 'models/News.php';

class NewsController
{
    private $view;
    private $newsModel;
    public function __construct()
    {
        $this->view = new ViewUtils();
        $this->newsModel = new News();
    }

    /**
     * @throws \Exception
     */
    public function actionIndex()
    {
        $news = $this->newsModel->getAll();

        echo $this->view->render('news/index',['news' => $news]);
    }
}