[![Contributors][contributors-shield]][contributors-url]
[![Forks][forks-shield]][forks-url]
[![Stargazers][stars-shield]][stars-url]
[![Issues][issues-shield]][issues-url]

<!-- PROJECT LOGO -->
<br />
<p align="center">
  <a href="https://github.com/kchafla/Watch-With-Us">
    <img src="https://dawjavi.insjoaquimmir.cat/kchafla/logo.png" alt="Logo">
  </a>

  <h2 align="center">Watch With Us</h2>

  <p align="center">
    Watch With Us tiene un objetivo simple: facilitar que los amigos vean videos juntos, sin importar en qué parte del mundo se encuentren. La idea de Watch With Us es brindarte un lugar genial donde puedas relajarte y divertirte con tus amigos.
    <br />
    <br />
    <a href="https://dawjavi.insjoaquimmir.cat/kchafla/Watch-With-Us/public/">Ver demostración</a>
    ·
    <a href="https://github.com/kchafla/Watch-With-Us/issues">Reportar un error</a>
    ·
    <a href="https://github.com/kchafla/Watch-With-Us/issues">Solicitar función</a>
  </p>
</p>

<!-- TABLE OF CONTENTS -->
<details open="open">
  <summary><h2 style="display: inline-block">Tabla de Contenidos</h2></summary>
  <ol>
    <li>
      <a href="#sobre-el-proyecto">Sobre el proyecto</a>
      <ul>
        <li><a href="#realizado-con">Realizado con </a></li>
      </ul>
    </li>
    <li>
      <a href="#comenzando">Comenzando</a>
      <ul>
        <li><a href="#requisitos-previos">Requisitos previos</a></li>
        <li><a href="#descargar-proyecto">Descargar proyecto</a></li>
        <li><a href="#montar-aplicación">Montar aplicación</a></li>
      </ul>
    </li>
    <li><a href="#recursos">Recursos</a></li>
  </ol>
</details>

<!-- ABOUT THE PROJECT -->
## Sobre el proyecto

[![Product Name Screen Shot][product-screenshot]](https://dawjavi.insjoaquimmir.cat/kchafla/Watch-With-Us/public/)

Watch With Us no es un servicio de transmisión donde un usuario transmite y los demás simplemente miran. En su lugar, todos los usuarios de una sala pueden buscar contenido y seleccionar videos o pistas de audio para que todos se reproduzcan en la sala. 

### Realizado con 

* [Laravel](https://laravel.com)
* [Pusher](https://pusher.com)
* [jQuery](https://jquery.com)

<!-- GETTING STARTED -->
## Comenzando

Para obtener una copia local en funcionamiento, siga estos sencillos pasos.

### Requisitos previos

Para poder utilizar Laravel tienes que tener un servidor [LAMP](https://es.wikipedia.org/wiki/LAMP) o utilizar la herramientra oficial, [Laravel Homestead](https://laravel.com/docs/8.x/homestead). El servidor también tiene que tener activado el protocolo [HTTPS](https://es.wikipedia.org/wiki/Protocolo_seguro_de_transferencia_de_hipertexto) para poder funcionar correctamente.

### Descargar proyecto

La manera recomendada para descargar el proyecto es la siguiente:

1. Descargar el repositorio.
   ```sh
   wget https://github.com/kchafla/Watch-With-Us/archive/refs/heads/master.zip
   ```
2. Descomprimir el paquete descargado.
   ```sh
   unzip master.zip
   ```
3. Entrar en el directorio que se ha creado.
   ```sh
   cd Watch-With-Us-master/
   ```

### Montar aplicación

Una vez descargado todos los archivos del repositorio, tenemos que montar la aplicación. Para facilitar este proceso, hemos creado un script que descarga las dependencias de la aplicación, genera el archivo de configuración y actualiza el permisos de las carpetas para asegurar que todo funcione correctamente.

1. Ejecutar el script.
   ```sh
   ./InstalarAplicacion.sh
   ```

Después de que el script finalize, tienes que modificar el archivo `.env`. Los campos que tienes que modificar son los siguientes:

* `APP_URL`, tiene que apuntar hacia la carpeta `public` del proyecto.
* `DB_DATABASE`, el nombre de la base de datos. `DB_USERNAME`, el usuario con el que conectarse a la base de datos. `DB_PASSWORD`, la contraseña del usuario anterior.
* `MAIL_USERNAME`, un nombre de usuario. `MAIL_PASSWORD`, la clave de la dirección del correo. `MAIL_FROM_ADDRESS`, la dirección de correo que se enviará el correo.
* `PUSHER_APP_ID`, `PUSHER_APP_KEY`, `PUSHER_APP_SECRET` y `PUSHER_APP_CLUSTER` con las claves que proporciona [Pusher](https://pusher.com/).
* `STRIPE_KEY` y `STRIPE_SECRET` con las claves que proporciona [Stripe](https://stripe.com/).

[Ejemplo](https://dawjavi.insjoaquimmir.cat/kchafla/Watch-With-Us/.env) final en la demostración.

2. Una vez modificado el archivo `.env`, hay que crear las tablas en la base de datos.
   ```sh
   php artisan migrate
   ```

Para que funcione correctamente las funcionalidades en tiempo real, hay que modificar la propiedad `authEndpoint` del archivo `resources/js/bootstrap.js`. Esta propiedad tiene que apuntar hacia `broadcasting/auth` que se encuentra en la carpeta `public`. 

[Ejemplo](https://dawjavi.insjoaquimmir.cat/kchafla/Watch-With-Us/resources/js/bootstrap.js) final en la demostración.

3. Despues de modificar el archivo mencionado anteriormente, hay que actualizar los archivos JavaScript del proyecto.
   ```sh
   npm run dev
   ```

Para finalizar, hay que añadir la clave de API de [YouTube Data API](https://developers.google.com/youtube/v3/getting-started) en la variable `key` dentro del archivo `public/js/reproductor.js`. Tambíen hay que añadir la clave API publica de [Stripe](https://stripe.com/docs/keys) en la variable `stripe` dentro del archivo `public/js/stripe.js`.

<!-- ACKNOWLEDGEMENTS -->
## Recursos

* [YouTube Data API](https://developers.google.com/youtube/v3)
* [YouTube IFrame Player API](https://developers.google.com/youtube/iframe_api_reference)
* [Bootstrap](https://getbootstrap.com)
* [CryptoJS](https://cryptojs.gitbook.io/docs/)
* [Moment.js](https://momentjs.com)
* [Stripe](https://stripe.com)

<!-- MARKDOWN LINKS & IMAGES -->
<!-- https://www.markdownguide.org/basic-syntax/#reference-style-links -->
[contributors-shield]: https://img.shields.io/github/contributors/kchafla/Watch-With-Us.svg?style=for-the-badge
[contributors-url]: https://github.com/kchafla/Watch-With-Us/graphs/contributors
[forks-shield]: https://img.shields.io/github/forks/kchafla/Watch-With-Us.svg?style=for-the-badge
[forks-url]: https://github.com/kchafla/Watch-With-Us/network/members
[stars-shield]: https://img.shields.io/github/stars/kchafla/Watch-With-Us.svg?style=for-the-badge
[stars-url]: https://github.com/kchafla/Watch-With-Us/stargazers
[issues-shield]: https://img.shields.io/github/issues/kchafla/Watch-With-Us.svg?style=for-the-badge
[issues-url]: https://github.com/kchafla/Watch-With-Us/issues
[product-screenshot]: https://dawjavi.insjoaquimmir.cat/kchafla/demo.png
