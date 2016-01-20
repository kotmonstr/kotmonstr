<?php
use yii\helpers\Url;
?>
   
    

<section id="content">
<div class="sub-content">
  <div class="container">
       <center><h3>Блог</h3></center>
    <div class="row">
      <div class="span12">
          <h4 class="bot-0">РЎРїРёСЃРѕРє СЃС‚Р°С‚РµР№</h4>
      </div>
    </div>
    <div class="row"> 
        <div class="thumbnails_4">
            
            <?php foreach($model as $blog): ?>
            <div class="span3">
                <div class="thumbnail thumbnail_4">  
                    <figure><img src="img/page5-img1.jpg" class="img-radius" alt=""></figure>
                    <p class="lead p2"><a href="<?= Url::to('/blog/view',['id'=> $blog->id]); ?>" class="lead"><?= $blog->title ?></a></p>
                    <?= $blog->content ?>
                </div>
            </div>
            
             <?php endforeach; ?>
               
        </div>   
    </div>           
  </div>
</div>
</section>
