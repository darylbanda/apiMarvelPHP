
<?php
   const API_URL = 'https://whenisthenextmcufilm.com/api';
   #inicializamos la api
   $ch = curl_init(API_URL);
   //queremos recibir la peticion y no mostrarla por pantalla
   curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
    //ejecutamos la peticiony capturamos la respuesta
   $response = curl_exec($ch);
   //cerramos la peticion
   curl_close($ch);
   //decodificamos la respuesta
   $data = json_decode($response, true);
   //obtenemos el titulo de la pelicula
   //cerramos la conexion


?>
<?php $date=new DateTime($data['release_date']); ?>
<?php $date2=new DateTime($data['following_production']['release_date']); ?>

<head>
    <title>La proxima pelicula de marvel</title>
    <meta name="description" content="la proxima pelicula de marvel"/>
    <meta name="viewport" content="width=device-width, initial-scale=1"/>

    <!-- Centered viewport -->
<link
  rel="stylesheet"
  href="https://cdn.jsdelivr.net/npm/@picocss/pico@2/css/pico.classless.min.css"
>
</head>

<main>
    <pre style="font-size: 10px;overflow:scroll;height: 200px;"><?= var_dump($data); ?></pre>
    <h1>Proxima pelicula de marvel</h1>
    <hgroup>
    <h2><?= $data['title'] ?> Se estrena en <?= $data['days_until'] ?> dias</h2>
    <p>Fecha de estreno: <?= $date->format('d/m/Y') ?></p>
    
    
    </hgroup>
    
    <section>
        <img 
        src="<?= $data['poster_url'] ?>" width="300" alt="Poster de <?= $data['title'] ?>"
        style="border-radius: 8px;"
        >
    </section>
    <hgroup>
        <h2> <?= $data['following_production']['title'] ?> Se estrena en <?= $data['following_production']['days_until'] ?> dias</h2>
        <p>Fecha de estreno: <?= $date2->format('d/m/Y') ?></p>
    </hgroup>
    <section>
        <img src="<?= $data['following_production']['poster_url'] ?>" width="300" alt="Poster de <?= $data['following_production']['title'] ?>"
        style="border-radius: 8px;"
        >

    </section>


</main>
<style>
    :root{
        color-scheme:light dark;
    }

    body,main{
        display: grid;
        place-content: center;
    }
    section{
        display: flex;
        justify-content: center;
    }
    hgroup{
        display: flex;
        flex-direction: column;
        justify-content: center;
    }
    img{
        margin: 0 auto;
    }
</style>