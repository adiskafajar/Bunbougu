<?php

   use Core\View;

   $curl = curl_init();

   curl_setopt_array($curl, array(
      CURLOPT_URL => "http://api.rajaongkir.com/starter/province",
      CURLOPT_RETURNTRANSFER => true,
      CURLOPT_ENCODING => "",
      CURLOPT_MAXREDIRS => 10,
      CURLOPT_TIMEOUT => 30,
      CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
      CURLOPT_CUSTOMREQUEST => "GET",
      CURLOPT_HTTPHEADER => array(
         "key: 25ef00bf5e51bb45b39037b7e890d04f"
      ),
   ));

   $response = curl_exec($curl);
   $err = curl_error($curl);


   if ($err) {
      echo "cURL Error #:" . $err;
   } else {
      echo $response;
   }

?>

<form class="" action="<?= $this->request("transaction") ?>" method="post">
   <input type="hidden" name="action" value="addTransaction">
   <input type="hidden" name="user_id" value="<?= $this->user ?>">
   <main class="grid xl:grid-cols-2 gap-x-5 xl:container mx-auto px-5 xl:px-40">
      <?= $this->component("cart") ?>
      <?= $this->component("address") ?>
      <?= $this->component("courier") ?>
      <?= $this->component("payment") ?>
      <?= $this->component("button") ?>
   </main>
</form>

<style>

</style>