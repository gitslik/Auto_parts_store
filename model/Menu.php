<?php

class Menu extends DB\SQL\Mapper
{

  public function __construct(DB\SQL $db)
  {
    parent::__construct($db, 'menu');
  }

  static function allMenu()
  {
    global $db;
    $menus = $db->exec('SELECT * FROM menu ORDER BY menu.id DESC');
    return $menus;
  }



  /*
  static function edit($checkbox_button, $background, $text_color, $massage, $size, $id, $store_id, $checkbox_button_active)
  {
    global $db;

    if ((!isset($massage)) && ($massage == '') &&
      (!isset($size)) && ($size == '') &&
      (!isset($id)) && ($id == '') &&
      (!isset($store_id)) && ($store_id == '')
    ) return false;

    if ((isset($checkbox_button)) && $checkbox_button == 'on') {
      $value_check = '1';
    } else {
      $value_check = '0';
    }
    if ((isset($checkbox_button_active)) && $checkbox_button_active == 'on') {
      $checkbox_button_active = '1';
    } else {
      $checkbox_button_active = '0';
    }
    if ($background && $text_color) {
      $value_bg = $background;
      $value_tc = $text_color;
    } else {
      $value_bg = '#c0392b';
      $value_tc = '#ffffff';
    }
    $db->exec("UPDATE tictail_motivate_goals SET massage=?, text_color=?,background=?,tictail_motivate_goals.size=?,count_show=?, activ=?  WHERE tictail_motivate_goals.id=? AND store_id=?",
      array(1 => $massage, 2 => $value_tc, 3 => $value_bg, 4 => $size, 5 => $value_check, 6 => $checkbox_button_active, 7 => $id, 8 => $store_id));
    $result = $db->exec("SELECT * FROM tictail_motivate_goals WHERE tictail_motivate_goals.id=?", $id);
    return $result;
  }

  static function delete($id, $store_id)
  {
    global $db;
    if ((isset($id)) && (!$id == '') && (isset($store_id)) && (!$store_id == '')) {
      $db->exec('DELETE FROM tictail_motivate_goals WHERE tictail_motivate_goals.id=? AND store_id=? ', array(1 => $id, 2 => $store_id));
      return $store_id;
    } else {
      return false;
    }
  }


  static function setUsersInfo($name, $email, $url, $store_id)
  {
    global $db;
    $app_type = "motivate";
    $result = $db->exec("SELECT * FROM tictail_statistic_user WHERE store_id=? AND app_type=?", array(1 => $store_id, 2 => $app_type));
    if (count($result) == 0) {
      $db->exec("INSERT INTO tictail_statistic_user SET store_id=?, name_site=?, email=?, link=?, app_type=?", array(1 => $store_id, 2 => $name, 3 => $email, 4 => $url, 5 => $app_type));
    } else {
      return;
    }
  }


  static function create($checkbox_button, $background, $text_color, $massage, $size, $store_id, $checkbox_button_active)
  {
    global $db;

    if ((!isset($massage)) || ($massage == '') ||
      (!isset($size)) || ($size == '') ||
      (!isset($store_id)) || ($store_id == '')
    ) return false;

    if ((isset($checkbox_button)) && $checkbox_button == 'on') {
      $value_check = '1';
    } else {
      $value_check = '0';
    }
    if ((isset($checkbox_button_active)) && $checkbox_button_active == 'on') {
      $checkbox_button_active = '1';
    } else {
      $checkbox_button_active = '0';
    }
    if ($background && $text_color) {
      $value_bg = $background;
      $value_tc = $text_color;
    } else {
      $value_bg = '#c0392b';
      $value_tc = '#ffffff';
    }
    $db->exec("INSERT INTO tictail_motivate_goals SET massage=?,text_color=?,background=?,tictail_motivate_goals.size=?,tictail_motivate_goals.store_id=?,tictail_motivate_goals.count_show=?,tictail_motivate_goals.activ=?", array(1 => $massage, 2 => $value_tc, 3 => $value_bg, 4 => $size, 5 => $store_id, 6 => $value_check, 7 => $checkbox_button_active));
    return $store_id;
  }

  static function getById($id)
  {
    global $db;
    $motivate = $db->exec('SELECT * FROM tictail_motivate_goals WHERE id=?', $id['id']);
    return $motivate;
  }

  static function status($id, $status)
  {
    global $db;
    if (isset($status) || (!$status == '')) {
      if ((isset($id)) && (!$id == '')) {
        $db->exec("UPDATE tictail_motivate_goals SET tictail_motivate_goals.activ=? WHERE tictail_motivate_goals.id=?", array(1 => $status, 2 => $id['id']));
        $result = $db->exec("SELECT * FROM tictail_motivate_goals WHERE tictail_motivate_goals.id=?", $id['id']);
        return $result;
      } else {
        return false;
      }
    } else {
      return;
    }
  }

  static function get_message_for_display($store_id, $ignore_list)
  {
    global $db;
    if (!$ignore_list) {
      $query = 1;
    } else {
      foreach ($ignore_list as $key => $value) {
        $ignore_list[$key] = (int)$value;
      }
      $query = implode(',', $ignore_list);
    }
    $active = 1;
    $result = $db->exec("SELECT * FROM tictail_motivate_goals WHERE tictail_motivate_goals.activ='" . $active . "' AND tictail_motivate_goals.store_id='" . $store_id . "' AND tictail_motivate_goals.id NOT IN(" . $query . ") ORDER BY tictail_motivate_goals.create_date ASC LIMIT 1");
    return $result;
  }

  static function setTreckView($id, $store_id)
  {
    global $db;
    if ((isset($store_id)) && (!$store_id == '')) {
      if ((isset($id)) && (!$id == '')) {
        $treck_count = $db->exec("SELECT * FROM tictail_motivate_goals WHERE store_id=? AND id=?", array(1 => $store_id, 2 => $id));
        $treck_count = $treck_count[0]['treck_view'] + 1;
        $db->exec("UPDATE tictail_motivate_goals SET treck_view=? WHERE id=? AND store_id=?", array(1 => $treck_count, 2 => $id, 3 => $store_id));
      } else {
        return false;
      }
    } else {
      return;
    }
  }*/
}

?>