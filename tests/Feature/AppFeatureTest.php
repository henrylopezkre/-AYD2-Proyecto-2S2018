<?php

namespace Tests\Feature;

use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class AppFeatureTest extends TestCase
{
    /**
     * A basic test example.
     *
     * @return void
     */

     //USER
     public function testGetUserUpdate()
    {
        $this->get('user/updateprofile')
            ->assertStatus(302);
    }

    public function testPostUserUpdate(){
        $data = [
            'fulname' => "Jose Cano",
            'username' => "jcano",
            'email' => "jcano@gmail.com",
            'password' => "hola1234",
            'age' => 18,
            'gender' => true,
            'photo' => "",
            'comment' => "Comentario"
            ];

        $this->call('POST', 'user/update', $data)
            ->assertStatus(302);
    }

     //PUBLICATIONS
    public function testGetPublications()
    {
        $this->get('/')
            ->assertViewIs('publication.index')
            ->assertStatus(200);
    }
    
    public function testPostPublications()
    {
        $data = [
            'route' => "/img/photo.jpg",
            'comment' => "Holasadkjfslkd",
            'user_iduser' => 5
            ];
        $this->call('POST', 'mypublications/insert', $data)
            ->assertStatus(302);
    }

    public function testPostPublicationSearch()
    {
        $data = [
            'hashtag' => "analisis"
            ];
        $this->call('POST', '/', $data)
            ->assertViewIs('publication.index')
            ->assertStatus(200);
    }

    //RANK
    public function testPutRank(){
        $data = [
            'like' => 1,
            'multimedia_idmultimedia' => 43,
            'user_iduser' => 5
            ];

        $this->call('PUT', 'rank/update/5', $data)
            ->assertStatus(302);
    }

    //LIKE/DISLIKE
    public function testGetMoreDislike(){
        $this->get('moredislike')
            ->assertViewIs('publication.index')
            ->assertStatus(200);
    }

    public function testGetMoreLike(){
        $this->get('morelike')
            ->assertViewIs('publication.index')
            ->assertStatus(200);
    }

    //REGISTER
    public function testGetRegister(){
        $this->get('register')
            ->assertViewIs('auth.register')
            ->assertStatus(200);
    }

    public function testPostRegister(){
        $data = [
            'fulname' => "Henry López",
            'username' => "hlopez",
            'email' => "hlopez@gmail.com",
            'password' => "hola1234",
            'age' => 18,
            'gender' => true,
            'photo' => "",
            'comment' => "Comentario"
            ];

        $this->call('POST', 'register', $data)
            ->assertStatus(302);
    }

    //LOGIN
    public function testGetLogin()
    {
        $this->get('login')
            ->assertViewIs('auth.login')
            ->assertStatus(200);
    }

    public function testPostLogin()
    {
        $data = [
            'email' => "hlopez@gmail.com",
            'password' => "hola1234"
            ];
        $this->call('POST', 'login', $data)
            ->assertStatus(302);
    }

    public function testPostLogout()
    {
        $this->post('logout')
            ->assertStatus(302);
    }

}
