<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests;
use App\Http\Controllers\Controller;

class DownloadFileController extends Controller {
   public function downloadRequest(Request $request) {
      $filename = "uploads/".$request->filename;

      $filesize = filesize($filename);

      return json_encode(["size" => $filesize]);
   }
   public function downloadFile(Request $request) {
      $filename = "uploads/".$request->filename;
      $offset = $request->offset;
      $length = $request->length;

      $file = fopen($filename, 'r');

      fseek($file, $offset);

      $data = fread($file, $length);

      return json_encode([
         "content" => base64_encode($data)
      ]);
   }
}