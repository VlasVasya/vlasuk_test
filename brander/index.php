<?php
error_reporting(-1);
require_once('class/Terminator.php');
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>Тимлид - терминатор Т-70</title>
  <link rel="stylesheet" href="style.css" type="text/css"/>
</head>
<body>
<?php
$terminator= new Terminator();
if (isset($_POST['assessment']) )
{
  $terminator->save($_POST['assessment']);
}
?>
  <form action="index.php" method="post">
    <div> Состояние Т-70 : <strong> <?php echo $terminator->state[(int)$terminator->get_terminator_state()]?> </strong></div>
    <div> Оценка: 0 - Провал, 1 - Успех </div>
    <select name="assessment">
      <?php foreach ($terminator->actions as $k => $assessment) { ?>
          <option value="<?php echo $k; ?>"><?php echo $assessment ?></option>
      <?php } ?>
    </select>
      <div>
          <button type="submit" class="dws-submit">Отправить</button>
      </div>
  </form>
  <div class="block">
    <p> Информация для HR T-1000 - терминатором Т-70 был вынесен выговор
        программисту: <strong> <?php $terminator->rebuke_programmer();?> </strong>
    </p>
  </div>
  <div class="block">
    <p> Информация для Менеджера T-1001 - терминатор Т-70 программиста хвалил: <strong> <?php $terminator->praise_programmer();?> </strong></p>
  </div>
</body>
</html>