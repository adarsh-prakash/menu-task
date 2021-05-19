<?php

function conn(){
  $conn=mysqli_connect('localhost','root','','shrcom');
  if(!$conn){
    die('failed to connect db');
  }

  return $conn;
}

function show_menu(){
  $conn=conn();
  $menus='';
  $menus .= generate_multilevel_menus($conn);

  return $menus;
}

function generate_multilevel_menus($conn , $main_menu_id=NULL){

  $menu='';
  $sql='';

  if(is_null($main_menu_id)){

    $sql="SELECT *FROM 'sub_menu' where 'main_menu_id' IS  NULL";
  }
  else{
    $sql="SELECT *FROM 'sub_menu' where 'main_menu_id' =  $main_menu_id";

  }
  $result= mysqli_query($conn,$sql);

  while ($row= mysqli_fetch_assoc( $result)) {
    if($row['name']){
      $menu .= '<li><a href="'.$row['name'].'">'.$row['main_menu'].'</a>';
    }
    else{
      $menu .= '<li><a href="#">'.$row['main_menu'].'</a>';

    }
    $menu .='<ul class="dropdown">'.generate_multilevel_menus($conn,$row['sub_id']).'</ul>';

    $menu .= '</li>';
  }
  return $menu;
}