<?php
require_once 'helpers.php'; // Подключение файла с функцией getUserInfo()

$users = getUserInfo(); // Получение информации о пользователях

echo '<table>
        <tr>
          <th>Id</th>
          <th>ФИО</th>
          <th>Адрес</th>
          <th>Телефон</th>
          <th>E-mail</th>
        </tr>';
foreach ($users as $user) {
    echo '<tr>
            <td>' . $user['id'] . '</td>
            <td>' . $user['fio'] . '</td>
            <td>' . $user['address'] . '</td>
            <td>' . $user['phone'] . '</td>
            <td>' . $user['email'] . '</td>
          </tr>';
}
echo '</table>';


foreach ($users as $user) {
    echo '<div class="table_mobile">
        <div class="table_mobile_container">
        <div сlass="table_items"> Id - ' . $user['id'] . '</div>
        <div сlass="table_items">ФИО - ' . $user['fio'] . '</div>
        <div сlass="table_items">Адресс - ' . $user['address'] . '</div>
        <div сlass="table_items">Телефон - ' . $user['phone'] . '</div>
        <div сlass="table_items">Почта - ' . $user['email'] . '</div>
      </div>
      </div>';
    }

?>