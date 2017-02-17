<?php
/**
 * @var common\models\Seance $model
 * @var $reservedPlaces array
 * @var $columnCount int
 * @var $rowCount int
*/
use yii\helpers\Html;

?>

<table>
    <tbody>
    <?php for ($row = 1; $row <= $rowCount; ++$row) : ?>
        <tr>
        <?php for ($column = 1; $column <= $columnCount; ++$column) : ?>
            <td data-row="<?= $row; ?>" data-column="<?= $column; ?>">
            <?php if (isset($reservedPlaces[$row]) && in_array($column, $reservedPlaces[$row])) : ?>
                R
            <?php else : ?>
                <?= Html::a('O', '#', ['class' => 'free-place']); ?>
            <?php endif; ?>
            </td>
        <?php endfor; ?>
        </tr>
    <?php endfor; ?>
    </tbody>
</table>