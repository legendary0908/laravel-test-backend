<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests;
use App\Http\Controllers\Controller;

class UploadFileController extends Controller {
   public function index() {
      return json_encode(["message" => "hello world"]);
   }
   public function showUploadFile(Request $request) {
      $name = $request->filename;
      $offset = $request->offset;
      $data = base64_decode($request->content);
      // $data = $request->content;

      $filepath = "uploads/".$name;
      $filemode = "r+";
      if ( !file_exists($filepath) ) {
         $filemode = "w";
      }

      $file = fopen("uploads/".$name, $filemode); // Open the file for reading and writing

      // Move the file pointer to the specific position
      fseek($file, $offset); // Move to the 10th byte in the file

      // Write data at the specific position
      fwrite($file, $data);

      // Close the file
      fclose($file);

      return json_encode([
         "message" => "success"
      ]);
   }
}