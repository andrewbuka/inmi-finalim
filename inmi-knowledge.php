<?php
    // template Name: InMi Knowledge;
    $GLOBALS['inmi_custom_title'] = 'InMi-знания: все статьи о биопрепаратах и микробиологических решениях | INMI';
    $GLOBALS['inmi_custom_description'] = 'Собрали в одном разделе практические статьи INMI о биопрепаратах, обработке семян, силосовании, септиках, жироуловителях и адаптации растений.';

    $inmi_knowledge_articles = [
        [
            'url' => '/news-about-septik/',
            'title' => 'Бактерии для септика: как запустить и восстановить работу автономной канализации',
            'category' => 'Экология и очистка стоков',
            'summary' => 'Диагностика сбоев, безопасный запуск биоочистки и поддержка септика после простоя или химической нагрузки.',
        ],
         [
            'url' => '/news-about-silos/',
            'title' => 'Как сохранить питательность силоса: причины порчи, потери сухого вещества и роль бактериальных заквасок',
            'category' => 'Животноводство и корма',
            'summary' => 'Почему силос теряет кормовую ценность, как управлять ферментацией и когда применять бактериальные закваски.',
        ],
        [
            'url' => '/news-about-blueberry/',
            'title' => 'Голубика после посадки: как помочь саженцам адаптироваться и укрепить корневую систему',
            'category' => 'Растениеводство',
            'summary' => 'Факторы приживаемости голубики, развитие корней и место микробного препарата в уходе за Vaccinium.',
        ],
        [
            'url' => '/news-about-soa/',
            'title' => 'Инокуляция сои: зачем обрабатывать семена и как получить эффективные клубеньки',
            'category' => 'Растениеводство',
            'summary' => 'Роль бактерий для сои, условия обработки семян и формирование азотфиксирующего симбиоза.',
        ],       
        [
            'url' => '/news-about-seed/',
            'title' => 'Обработка семян озимой пшеницы биопрепаратами: сроки, технология и типичные ошибки',
            'category' => 'Растениеводство',
            'summary' => 'Практический разбор предпосевной обработки: подготовка семян, выбор срока и оценка результата в поле.',
        ],
        [
            'url' => '/news-about-seed/',
            'title' => 'Жиры в сточных водах: как обслуживать жироуловитель и снизить риск засоров',
            'category' => 'Экология и очистка стоков',
            'summary' => 'Рекомендации для кафе, столовых, пищеблоков и производств по профилактике жировых отложений в канализации.',
        ],
    ];
?>
<?php get_header(); ?>

<section class="s-header-title seo-article-header inmi-knowledge-header">
    <div class="container">
        <div class="seo-article-hero-grid">
            <div class="seo-article-hero-copy">
                <p class="seo-article-kicker">Экспертная библиотека</p>
                <h1>InMi-знания</h1>
                <p class="seo-article-lead">Все практические статьи о микробиологических решениях INMI: от растениеводства и кормов до очистки сточных вод и автономной канализации.</p>
            </div>
            <div class="seo-article-hero-card" aria-label="О разделе InMi-знания">
                <span>В разделе</span>
                <ul>
                    <li><?php echo count($inmi_knowledge_articles); ?> экспертных материалов;</li>
                    <li>практические рекомендации по применению;</li>
                    <li>ссылки на актуальные статьи INMI.</li>
                </ul>
            </div>
        </div>
        <ul class="breadcrambs">
            <li><a href="<?php echo get_page_link(8); ?>">Главная</a></li>
            <li>InMi-знания</li>
        </ul>
    </div>
</section>

<main class="inmi-knowledge-page">
    <div class="container">
        <section class="knowledge-catalog-intro" aria-label="Описание раздела">
            <span>База знаний INMI</span>
            <h2>Подберите материал под вашу задачу</h2>
            <p>Мы собрали статьи в виде удобного каталога: каждая карточка ведёт на отдельный материал и помогает быстро понять, о какой практической проблеме идёт речь.</p>
        </section>

        <section class="knowledge-catalog-grid" aria-label="Список статей InMi-знания">
            <?php foreach ($inmi_knowledge_articles as $index => $article) : ?>
                <article class="knowledge-catalog-card wow fadeInUp lazy" data-wow-duration=".8s" data-wow-delay="<?php echo esc_attr(.08 + ($index * .04)); ?>s">
                    <a href="<?php echo esc_url($article['url']); ?>" aria-label="<?php echo esc_attr($article['title']); ?>">
                        <span class="knowledge-catalog-number"><?php echo esc_html(str_pad($index + 1, 2, '0', STR_PAD_LEFT)); ?></span>
                        <span class="knowledge-catalog-category"><?php echo esc_html($article['category']); ?></span>
                        <h2><?php echo esc_html($article['title']); ?></h2>
                        <p><?php echo esc_html($article['summary']); ?></p>
                        <span class="knowledge-catalog-more">Читать статью <i class="fa fa-long-arrow-right" aria-hidden="true"></i></span>
                    </a>
                </article>
            <?php endforeach; ?>
        </section>
    </div>
</main>

<?php get_footer(); ?>
