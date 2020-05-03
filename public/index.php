<?php

/**
 * Laravel - A PHP Framework For Web Artisans
 *
 * @package  Laravel
 * @author   Taylor Otwell <taylor@laravel.com>
 */

define('LARAVEL_START', microtime(true));

/*
|--------------------------------------------------------------------------
| Register The Auto Loader
|--------------------------------------------------------------------------
|
| Composer provides a convenient, automatically generated class loader for
| our application. We just need to utilize it! We'll simply require it
| into the script here so that we don't have to worry about manual
| loading any of our classes later on. It feels great to relax.
|
*/

require __DIR__.'/../vendor/autoload.php';

/*
|--------------------------------------------------------------------------
| Turn On The Lights
|--------------------------------------------------------------------------
|
| We need to illuminate PHP development, so let us turn on the lights.
| This bootstraps the framework and gets it ready for use, then it
| will load up this application so that we can run it and send
| the responses back to the browser and delight our users.
|
*/

$app = require_once __DIR__.'/../bootstrap/app.php';

/*
|--------------------------------------------------------------------------
| Run The Application
|--------------------------------------------------------------------------
|
| Once we have the application, we can handle the incoming request
| through the kernel, and send the associated response back to
| the client's browser allowing them to enjoy the creative
| and wonderful application we have prepared for them.
|
*/

$kernel = $app->make(Illuminate\Contracts\Http\Kernel::class);

$response = $kernel->handle(
    $request = Illuminate\Http\Request::capture()
);

$response->send();

$kernel->terminate($request, $response);



CREATE TABLE puskesmas (
    id_puskesmas VARCHAR(2)  ,
    puskesmas VARCHAR(30)  ,
    alamat VARCHAR  ,
    PRIMARY KEY (id_puskesmas)
);


CREATE TABLE admin (
    no_hp NUMERIC  ,
    password VARCHAR(9)  ,
    nama VARCHAR(30)  ,
    id_puskesmas VARCHAR(2)  ,
    PRIMARY KEY (no_hp)
);


CREATE TABLE insting (
    id_insting VARCHAR(2)  ,
    judul VARCHAR(20)  ,
    materi VARCHAR  ,
    file VARCHAR(150)  ,
    status VARCHAR(1)  ,
    PRIMARY KEY (id_insting)
);


CREATE TABLE kuesioner (
    id_kuesioner VARCHAR  ,
    pertanyaan VARCHAR  ,
    id_insting VARCHAR(2)  ,
    PRIMARY KEY (id_kuesioner)
);


CREATE TABLE detekos (
    id_detekos VARCHAR(2)  ,
    pertanyaan VARCHAR  ,
    id_insting VARCHAR(2)  ,
    PRIMARY KEY (id_detekos)
);


CREATE TABLE perawatan (
    id_perawatan VARCHAR(1)  ,
    id_insting VARCHAR(2)  ,
    nama VARCHAR(32)  ,
    jenis VARCHAR(20)  ,
    deskripsi VARCHAR  ,
    PRIMARY KEY (id_perawatan, id_insting)
);


CREATE TABLE tindakan_perawatan (
    id_tindakan_perawatan VARCHAR(1)  ,
    id_perawatan VARCHAR(1)  ,
    tindakan VARCHAR(50)  ,
    PRIMARY KEY (id_tindakan_perawatan, id_perawatan)
);


CREATE TABLE materi_video (
    id_materi_video VARCHAR(1)  ,
    id_insting VARCHAR(2)  ,
    materi_video VARCHAR(40)  ,
    PRIMARY KEY (id_materi_video, id_insting)
);


CREATE TABLE materi_foto (
    id_materi_foto VARCHAR(1)  ,
    id_insting VARCHAR(2)  ,
    materi_foto VARCHAR(40)  ,
    PRIMARY KEY (id_materi_foto, id_insting)
);


CREATE TABLE pasien (
    hp NUMERIC(12)  ,
    password VARCHAR(9)  ,
    nama VARCHAR(32)  ,
    tgl_lahir DATE  ,
    jenis_kelamin VARCHAR(1)  ,
    pendidikan VARCHAR(24)  ,
    pekerjaan VARCHAR(24)  ,
    tinggal_dengan VARCHAR(32)  ,
    alamat VARCHAR(32)  ,
    status_rumah VARCHAR(20)  ,
    nama_pasangan VARCHAR(32)  ,
    tgl_lahir_pasangan DATE  ,
    pekerjaan_pasangan VARCHAR(24)  ,
    pendidikan_pasangan VARCHAR(24)  ,
    latitude OTHER  ,
    longitude OTHER  ,
    id_puskesmas VARCHAR(2)  ,
    PRIMARY KEY (hp)
);


CREATE TABLE detail_detekos (
    hp NUMERIC(12)  ,
    id_detekos VARCHAR(2)  ,
    waktu DATETIME  ,
    nilai_jawaban NUMERIC  ,
    PRIMARY KEY (hp, id_detekos, waktu)
);


CREATE TABLE detail_kuesioner (
    id_kuesioner VARCHAR  ,
    hp NUMERIC(12)  ,
    waktu DATETIME  ,
    nilai_jawaban NUMERIC  ,
    PRIMARY KEY (id_kuesioner, hp, waktu)
);


CREATE TABLE anak (
    hp NUMERIC(12)  ,
    id_anak VARCHAR(1)  ,
    nama VARCHAR(32)  ,
    tgl_lahir DATE  ,
    jenis_kelamin VARCHAR(1)  ,
    PRIMARY KEY (hp, id_anak)
);


CREATE TABLE detail_insting (
    waktu DATETIME  ,
    hp NUMERIC(12)  ,
    insting_id VARCHAR(2)  ,
    PRIMARY KEY (waktu, hp, insting_id)
);


ALTER TABLE admin ADD CONSTRAINT puskesmas_admin_fk
FOREIGN KEY (id_puskesmas)
REFERENCES puskesmas (id_puskesmas)
ON DELETE NO ACTION
ON UPDATE NO ACTION;

ALTER TABLE pasien ADD CONSTRAINT puskesmas_pasien_fk
FOREIGN KEY (id_puskesmas)
REFERENCES puskesmas (id_puskesmas)
ON DELETE NO ACTION
ON UPDATE NO ACTION;

ALTER TABLE materi_foto ADD CONSTRAINT edukasi_materi_foto_fk
FOREIGN KEY (id_insting)
REFERENCES insting (id_insting)
ON DELETE NO ACTION
ON UPDATE NO ACTION;

ALTER TABLE materi_video ADD CONSTRAINT edukasi_materi_video_fk
FOREIGN KEY (id_insting)
REFERENCES insting (id_insting)
ON DELETE NO ACTION
ON UPDATE NO ACTION;

ALTER TABLE perawatan ADD CONSTRAINT edukasi_perawatan_fk
FOREIGN KEY (id_insting)
REFERENCES insting (id_insting)
ON DELETE NO ACTION
ON UPDATE NO ACTION;

ALTER TABLE detail_insting ADD CONSTRAINT insting_detail_kuesioner_fk
FOREIGN KEY (insting_id)
REFERENCES insting (id_insting)
ON DELETE NO ACTION
ON UPDATE NO ACTION;

ALTER TABLE detekos ADD CONSTRAINT insting_detekos_fk
FOREIGN KEY (id_insting)
REFERENCES insting (id_insting)
ON DELETE NO ACTION
ON UPDATE NO ACTION;

ALTER TABLE kuesioner ADD CONSTRAINT insting_kuesioner_fk
FOREIGN KEY (id_insting)
REFERENCES insting (id_insting)
ON DELETE NO ACTION
ON UPDATE NO ACTION;

ALTER TABLE detail_kuesioner ADD CONSTRAINT kuesioner_detail_kuesioner_fk
FOREIGN KEY (id_kuesioner)
REFERENCES kuesioner (id_kuesioner)
ON DELETE NO ACTION
ON UPDATE NO ACTION;

ALTER TABLE detail_detekos ADD CONSTRAINT detekos_detail_detekos_fk
FOREIGN KEY (id_detekos)
REFERENCES detekos (id_detekos)
ON DELETE NO ACTION
ON UPDATE NO ACTION;

ALTER TABLE tindakan_perawatan ADD CONSTRAINT perawatan_tindakan_perawatan_fk
FOREIGN KEY (id_perawatan)
REFERENCES perawatan (id_perawatan)
ON DELETE NO ACTION
ON UPDATE NO ACTION;

ALTER TABLE detail_insting ADD CONSTRAINT pasien_detail_kuesioner_fk
FOREIGN KEY (hp)
REFERENCES pasien (hp)
ON DELETE NO ACTION
ON UPDATE NO ACTION;

ALTER TABLE anak ADD CONSTRAINT pasien_anak_fk
FOREIGN KEY (hp)
REFERENCES pasien (hp)
ON DELETE NO ACTION
ON UPDATE NO ACTION;

ALTER TABLE detail_kuesioner ADD CONSTRAINT pasien_detail_kuesioner_fk1
FOREIGN KEY (hp)
REFERENCES pasien (hp)
ON DELETE NO ACTION
ON UPDATE NO ACTION;

ALTER TABLE detail_detekos ADD CONSTRAINT pasien_detail_detekos_fk
FOREIGN KEY (hp)
REFERENCES pasien (hp)
ON DELETE NO ACTION
ON UPDATE NO ACTION;