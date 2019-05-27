<?php

namespace AdminPanel;

use App\Controllers\News;
use App\Models\Author;
use App\MultiException;

class AdminPanel
    extends Base
{

    public function change()
    {
        $news = \App\Models\News::findById($_POST['changeID']);
        $news->text = $_POST['changeTEXT'];
        $news->save();
    }

    public function add()
    {
        try {
            $news = new \App\Models\News();
            $data = ['author_id' => $_POST['AddAuthorId'], 'text' => $_POST['addTEXT']];
            $news->fill($data);
            $news->save();
        } catch (MultiException $e) {
            foreach ($e as $error) {
                \App\Loger::log($error);
            }
            $this->view['errors'] = $e;
        }

    }

    public function delete()
    {
        $news = \App\Models\News::findById($_POST['deleteID']);
        $news->delete();
    }


    public function actionShow()
    {
        $news = \App\Models\News::findAll();
        $authors = Author::findAll();
        $this->view['news1'] = \App\Models\News::findAll();
        $this->view['news2'] = \App\Models\News::findAll();
        $this->view['table1'] = (new AdminDataTable($news,
            function ($news) {
                return $news->id;
            },
            function ($news) {
                return $news->text;
            },
            function ($news) {
                return $news->author->name;
            }))->render();
        $this->view['table2'] = (new AdminDataTable($authors,
            function ($authors) {
                return $authors->id;
            },
        function ($authors) {
            return $authors->name;
        }

            ))->render();
        $this->view['authors'] = \App\Models\Author::findAll();
        $this->view['timer'] = \SebastianBergmann\Timer\Timer::resourceUsage();
        $this->view->display(__DIR__ . '/adminPanelTemplate.php');
    }
}