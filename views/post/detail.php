<?php $this->render('views/layout/header', []); ?>
<?php $this->render('views/layout/menu', []); ?>
<?php


use app\components\commons\Helper;


$post = $params['post'];
$form = $params['comment'];
?>


<h1>Detail</h1>


<table class="table table-bordered">
    <tr>
        <th colspan="2">
            <?php
            echo Helper::dateFormat($post->date_insert, 'd.m.Y');
            ?> :
            <?php echo $post->title ?>
        </th>
    </tr>
    <tr>
        <td colspan="2"><?= Helper::decodeHTML($post->description); ?></td>
    </tr>
    <tr>
        <th>Author: <?php echo $post->author ?></th>
        <th>Comments: <?php echo count($post->comments) ?></th>
    </tr>
</table>
<br>

<h2>Comments (<?= count($post->comments); ?>)</h2>

<?php
if (is_array($post->comments) && count($post->comments) > 0) {
    $counter = 1;
    foreach ($post->comments as $comment) {
?>

        <table class="table table-striped table-bordered">
            <tr>
                <th width="5%"><?php echo $counter ?>. </th>
                <th width="35%"><?php echo $comment->name ?></th>
                <th width="60%"> said: <?= Helper::dateFormat($comment->date_insert, 'd.m.Y H:s') ?></th>
            </tr>
            <tr>
                <td colspan="4" class="text-justify"><?= Helper::decodeHTML($comment->remark); ?></td>
            </tr>
        </table>

    <?php
        $counter++;
    }
} else {
    ?>
    <div class="alert alert-info" role="alert">No comments were founded.</div>
<?php
}
?>