<?php

namespace App\Listeners;

use App\Events\ArticleReadEvent;
use App\Model\Article;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;

class ArticleReadListener
{
    /**
     * Create the event listener.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    /**
     * Handle the event.
     *
     * @param  ArticleReadEvent  $event
     * @return void
     */
    public function handle(ArticleReadEvent $event)
    {
        $article_id = $event->article_id;
        $article = Article::getArticleById($article_id);
        $article->read = $article['read'] + 1;
        $article->save();
    }
}
