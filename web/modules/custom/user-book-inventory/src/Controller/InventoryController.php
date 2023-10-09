<?php

namespace Drupal\user_book_inventory\Controller;
use Drupal\Core\Controller\ControllerBase;
use Symfony\Component\HttpFoundation\JsonResponse;
use Drupal\node\Entity\Node;
use Symfony\Component\HttpFoundation\Request;

class InventoryController  extends ControllerBase{

  public function welcome() {

    $body = "Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, 
when an unknown printer took a galley of type and scrambled it to make a type specimen book. 
It has survived not only five centuries, but also the leap into electronic typesetting,
remaining essentially unchanged. It was popularized in the 1960s with the release of Letraset
sheets containing Lorem Ipsum passages, and more recently with desktop publishing software
like Aldus PageMaker including versions of Lorem Ipsum.";

    return [
      '#markup' => $body
    ];
  }

  public function call_ajax(Request $request) {
        $book_id= \Drupal::request()->getContent();
        $book_id = explode('=', $book_id)[1];
        $user_id = \Drupal::currentUser()->id();
        $connection = \Drupal::service('database');
        $result = $connection->insert('user_book_inventory')
        ->fields([
            'user_id' => $user_id,
            'book_id' => $book_id,
            'is_buy' =>1,
            // 'created' => \Drupal::time()->getRequestTime(),
        ])
        ->execute();
        return new JsonResponse("Book added in your inventory");

    }
    
}