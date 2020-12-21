<?php
class Terminator
{

  public $state = ['Хорошем настроении', 'Нормальном Настроении', 'Плохом', 'Состояние «не попадись на глаза»'];
  public $actions = [0, 1];

  public function get_terminator_state(){
    $array = file('state.txt');
    if (count($array) > 0) {
      $last_elem = count($array)-1;
      return $array[ $last_elem ];
    } else {
      return 1;
    }
  }
  public function save($action) {
    $current_state = (int)$this->get_terminator_state();
    if ($action == 0) {
      $current_state = $current_state + 1;
      if ($current_state > count($this->state)-1) {
        $current_state = count($this->state)-1;
      }
    } else {
      $current_state = $current_state - 1;
      if ($current_state <= 0) {
        $current_state = 0;
      }
    }
    file_put_contents('state.txt', $current_state.PHP_EOL, FILE_APPEND | LOCK_EX);
  }

  public function rebuke_programmer() {
     $array = file('state.txt');
     $rebuke_programmer =  array_count_values($array);
     foreach($rebuke_programmer as $kay=>$rebuke){
         if($kay == 3){
           echo $conclusion_rebuke = $rebuke;
         }
     }

  }

  public function praise_programmer() {
    $array = file('state.txt');
    $praise_programmer =  array_count_values($array);
    foreach($praise_programmer as $kay=>$praise){
      if($kay == 0){
        echo $conclusion_praise = $praise;
      }
    }
  }

}




