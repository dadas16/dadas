<?php
  function my_is_numeric($value)
  {
    return (preg_match ("/^(-){0,1}([0-9]+)(,[0-9][0-9][0-9])*([.][0-9]){0,1}([0-9]*)$/", $value) == 1);
  }
?>