<?php
namespace App\Http\Actions;

class Node {

  // Методи викликаються в залежності від дії в адмінці.
  // Якшо створюється новий розділ - викликається метод create()
  // Якщо оновлюється - update() відповідно
  // Можна перевіряти $node_id або $model_name, або обидва аргументи і виконувати якусь операцію.

  public static function create($node_id, $model_name)
  {
    // ...
  }

  public static function update($node_id, $model_name)
  {
    // ...
  }

}
