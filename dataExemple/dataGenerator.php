<?php

/**
 *l'objectif de cette classe et de pouvoir créer une base de donnée factice avec
* $Basededonne = new Data
 */
class Data
{
  private $_books = [];
  private $_admins = [];


  //constructeur d'un objet unique : le tableau avec les données
  function __construct(int $booksNumber, int $adminsNumber)
  {


    //création du tableau des livres
    for ($i=1; $i <= $booksNumber ; $i++) {
      $this->_books[$i] = $this->BookGenerator($i,$booksNumber);
    }
    //création du tableau des Admins
    for ($i=1; $i <= $adminsNumber ; $i++) {
      $this->_admins[$i] = $this->AdminGenerator($i);
    }

  }

  //retourne la table des livres
  public function Books()
  {
    return $this->_books;
  }
  public function SelectBook($id)
  {
      $books = $this->Books();
      return $books[$id];
      # code...
  }
   //retourne le tableau associatif des admins
  public function Admins()
  {
    return $this->_admins;
  }
  public function SelectAdmin($id)
  {
      $admins =  $this->Admins;
      return $admins[$id];
      # code...
  }

//retrourne un tableau associatif contenant 1 livre unique
  private function BookGenerator(int $x, $booksNumber)
  {
    return array(
      'id' => $x,
      'title' => ('Harry Potter '. $x) ,
      'author'=> ('J. K. Rowling n°' . $x),
      'category'=> $this->Category($x,$booksNumber),
      'age'=> $this->Age($x,$booksNumber),
      'img' => ('./../img/img'.$x.'.png'),
      'date' => 2000 + $x,
      'description' => 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum',
    );
  }

  //retrourne un tableau associatif contenant 1 administrateur unique
    private function AdminGenerator(int $x)
    {
      return array(
        'id' => $x,
        'name' => ('Monique '. $x) ,
        'password'=> 'pelardon',
      );
    }
    // prends l'id du livre et le nombre total de livres à créer et renvoie la catégorie (string)
    private function Category($x, $booksNumber)
    {//on crée un tableau avec toutes nos catégories
        $cat = [ 'interactif' , 'artistique' , 'éducatif', 'Materialisme dialectique'];
        //on determine le nombre de livres a placer dans chacunes en fonction du nombre total de livres à créer
        //on renvoie la catégorie du livre en fonction de son ID
        return $cat[rand(0, (count($cat) -1))];
    }

// prends l'id du livre et le nombre total de livres à créer et renvoie l'age recommandé' (string)
    public function Age($x, $booksNumber)
    {//on crée un tableau avec toutes nos catégories
        $age = [ '0-3' , '3-7' , '7-11', '11-18'];
        //on determine le nombre de livres a placer dans chacunes des tranches d'age en fonction du nombre total de livres à créer
        $numberOfBoofWeHaveToPlaceInEachAge = intval( $booksNumber / count($age));
        //on renvoie la catégorie du livre en fonction de son ID
        return $age[round( $x / $numberOfBoofWeHaveToPlaceInEachAge)-1];
    }
}




//TESTS

 $data = new Data(5,1);
 var_dump($data);
 var_dump( $data->SelectBook(2));

//Tests validés (du premier coup!!!)
