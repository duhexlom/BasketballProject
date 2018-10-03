<div class="inner">
<?php foreach($model as $news): ?>
    <article class="box post post-excerpt">
        <header>
            <h2><a href="#"><?= $news->title ?></a></h2>  
        </header>
        <div class="info">
            <span class="date">
                <span class="month"><?= date('M', $news->created_at) ?>
                    <span><?= date('Y', $news->created_at) ?></span>
                </span> 
                <span class="day"><?= date('d', $news->created_at) ?></span>
                <span class="year"><?= date('Y', $news->created_at) ?></span>
                <span class="month"><?= date('H:i:s', $news->created_at) ?></span>
            </span>
        </div>
        <a href="#" class="image featured"><img src="<?= $news->getImage()  ?>" alt="" /></a>
        <p><?= $news->description ?></p>
    </article>
    <?php endforeach; ?>
    <div class="pagination">
        <div class="pages">
            <a href="#" class="active">1</a>
            <a href="#">2</a>
            <a href="#">3</a>
            <a href="#">4</a>
            <span>&hellip;</span>
            <a href="#">20</a>
        </div>
        <a href="#" class="button next">Next Page</a>
    </div>
</div>