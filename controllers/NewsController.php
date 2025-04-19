<?php

namespace controllers;

use Exception;
use models\News;
use utils\ViewUtils;

require_once 'utils/ViewUtils.php';
require_once 'models/News.php';

class NewsController
{
    private $ViewUtils;
    private $newsModel;
    public function __construct()
    {
        $this->ViewUtils = new ViewUtils();
        $this->newsModel = new News();
    }

    /**
     * @throws Exception
     */
    public function actionIndex()
    {
        //пагінація
        $page = isset($_GET['page']) && is_numeric($_GET['page']) ? (int)$_GET['page'] : 1;
        $pagination = $this->ViewUtils->pagination($page);

        $news = $this->newsModel->getAll(COUNT_NEWS_ON_PAGE_LIMIT, (int)$pagination['offset']);

        echo $this->ViewUtils->render('news/index',['news' => $news, 'pagination' => $pagination]);
    }

    public function actionView(int $id)
    {
        $news = $this->newsModel->getOne($id);

        echo $this->ViewUtils->render('news/view',['news' => $news]);
    }
}