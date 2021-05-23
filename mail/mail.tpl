{use class="Yii"}
{use class="yii\helpers\Url"}
{use class="panix\engine\Html"}

{if $model.username}
    <h3>Имя: {$model.username}</h3>
{/if}
{if $model.phone}
    <h2>{Html::tel($model.phone)}</h2>
{/if}
