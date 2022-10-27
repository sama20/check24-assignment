
<?php

use app\components\commons\Helper;

$posts = $params['posts'];
?>


<h1>Home</h1>

<?php
if (is_array($posts) && count($posts) > 0) {
    foreach ($posts as $post) {
?>
        <table>
            <tr>
                <th colspan="2">
                    <a href="./index.php?r=post/detail&id=<?php echo $post->id ?>">
                        
                    </a>
                </th>
            </tr>
            <tr>
                <td colspan="2"><?= Helper::inTheEnd(Helper::decodeHTML($post->description), '...', 1000) ?> <a href="./index.php?r=post/detail&id=<?php echo $post->id ?>">Read More</a></td>
            </tr>
            <tr>
                <th>Author: <?php echo $post->author ?></th>
                <th>Comments: <a href="./index.php?r=post/detail&id=<?php echo $post->id ?>"><?php echo count($post->comments) ?></a></th>
            </tr>
        </table>
        <br>
    <?php
    }
} ?>


