<?php

namespace App\Services;
use App\Entity\LogEntires;

class LogUploadService
{
  public function upload($input, $em)
  {
    $openw = fopen($input, "r");
    $array = array();
    while (!feof($openw)) {
      $line = fgets($openw);
      $line = str_replace(" - - [", " ", $line);
      $line = str_replace("] ", " ", $line);
      $line = str_replace("\"", "", $line);
      $line = explode(" ", $line);
      array_push($array, $line); //   $i = 0;
    }
    fclose($openw);
    if (is_array($array)) {
      $size = count(array_values($array));
      for ($i = 0; $i < $size; $i++) {
        $fieldVal1 = $array[$i][0];
        $fieldVal2 = $array[$i][1];
        $fieldVal3 = $array[$i][2];
        $fieldVal4 = $array[$i][3];
        $fieldVal5 = $array[$i][4];
        $fieldVal6 = $array[$i][5];
        $fieldVal7 = $array[$i][6];
        $eme = $em;
        $er = $eme->getRepository(LogEntires::class)->findOneByDate($fieldVal2);
        if (!$er) {
          $values = array();
          $values[] = "('$fieldVal1', '$fieldVal2', '$fieldVal3','$fieldVal4', '$fieldVal5', '$fieldVal6' ,'$fieldVal7')";
          $values = implode(", ", $values);
          $manager = $em;
          $entires = new LogEntires();
          $entires->setServiceName($fieldVal1);
          $entires->setDate($fieldVal2);
          $entires->setGMT($fieldVal3);
          $entires->setMethod($fieldVal4);
          $entires->setEndpoint($fieldVal5);
          $entires->setProtocol($fieldVal6);
          $entires->setRequestStatus($fieldVal7);
          $manager->persist($entires);
          $manager->flush();
        }

      }

    }

    return;
  }
}
