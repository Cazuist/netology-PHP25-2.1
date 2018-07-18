<?php
    
    $dataList = file_get_contents("phones.json");

    $decode = json_decode($dataList, true);

    if (json_last_error()) {
        echo 'Ошибка декодирования файла';
        exit;
    }
    
    function getAddress($data) {
        $list = $data['address'];
        $address = [];
        $address['country'] = $list['country'];
        $address['city'] = $list['city'];
        $address['street'] = $list['street'];
        $address['building'] = $list['building'];
        
        foreach ($address as $part => $value ) {
            if (is_null($value)) {
                unset($address[$part]);
            }
        }

        return implode(', ', $address);
    }

    function getPhones($data) {        
        return implode(',<br>', $data['phoneNumber']);       
    }
    
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>Телефонная книжка</title>
  <link rel="stylesheet" href="css/styles.css">  
</head>
<body>    

    <div class="wrapper">
        <table>
            <caption>Информация об абонентах</caption>
            
            <thead>
                <tr>
                    <td class="num">№ п/п</td>
                    <td class="firstName">Имя</td>
                    <td class="lastName">Фамилия</td>
                    <td class="address">Адрес</td>
                    <td class="phoneNumber">Телефоны</td>
                </tr>
            </thead>

            <? foreach ($decode as $person) : ?>
            
                <tr class="table-body">
                    <td></td>
                    <td><?= $person['firstName'] ?></td>
                    <td><?= $person['lastName'] ?></td>
                    <td><?= getAddress($person) ?></td>
                    <td><?= getPhones($person) ?></td>
                </tr>

            <? endforeach ?>
        </table>
    </div>            

</body>
</html>