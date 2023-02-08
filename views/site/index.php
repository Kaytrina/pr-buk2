<?php
use app\models\Claim;
use yii\helpers\Url;

/** @var yii\web\View $this */

$this->title = 'Сделаем лучше вместе';
?>

<style>
@font-face {
font-family: customfont;
src: url("../font/Comfortaa-Light.ttf");
}
h1 {
font-family: customfont;
}
</style>

<div class="site-index">
    <h1 class="text-center"><img style='max-height: 45px;' src='\logo\logo.png'/> Добро пожаловать на сайт портала!</h1>
    
    <div class="text-center">         
        <img src="\banners\main_banner2.png" class="img-responsive" style="width: 99%" alt="баннер">  
    </div>
    <br>
    <div class="row justify-content-center">
        <div class="col-lg-5">
            <div class="card">
                <div class="card-body">
                    <h5 class="card-title">НАШИ РЕЗУЛЬТАТЫ</h5>
                    <p id="counter" class="lead col-sm-9">Решено проблем за месяц: </p>
                    <input type="button" value="Разрешите звуковые уведомления" class="btn btn-primary me-md-2"/>
                </div>
            </div>
        </div>
    </div>
  
<?php $claims=Claim::find()->where(['status'=>'подтверждено'])->orderBy(['time'=>SORT_DESC])->limit(4)->all();
    echo "<br><div class='flex-row flex-wrap card-group justify-content-start '>";
    foreach ($claims as $claim){
        echo "<div class='card' >
            <img src='{$claim->photo_after}' 
            data-before='$claim->photo_before' data-after='$claim->photo_after'
            onMouseOver='hover(this)' onMouseOut='back(this)'
                class='card-img-top' style='height: 300px;' alt='image'>
            <div class='card-body'>
            <h5 class='card-title'>{$claim->name}</h5>
            <p >{$claim->discr}</p>";
        
        echo "</div>
</div>";
}
echo "</div>";
?>
  
    
    <!--<div class="d-grid gap-2 d-md-flex justify-content-md-end">
        <input type="button" value="Разрешите звуковые уведомления" class="btn btn-primary me-md-2"/>
    </div>-->
</div>

<script>
var i = 0;
    function uptCounter(){
        $.ajax({
            type: 'GET',
            url:'<?= Url::toRoute('/site/counter')?>',
            dataType: 'text',
            success: function (response) {
                if(i != response){
                    //Уведомление
                    var a = new Audio('/audio/notif.mp3');
                    a.play();
                    i = response; //сравн.счетчика
                }
                $('#counter').html('Решено проблем за месяц: '+ response);
            }
        });
    }
setInterval(uptCounter, 2000);
</script>

<script>

function hover(el){

el.src=el.dataset.before;

}

function back(el){

el.src=el.dataset.after;

}

</script>