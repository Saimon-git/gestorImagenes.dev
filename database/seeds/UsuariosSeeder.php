<?php

use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model;
use App\Album;
use App\Foto;
use App\Usuario;

class UsuariosSeeder extends Seeder {

	/**
	 * Run the database seeds.
	 *
	 * @return void
	 */
	public function run()
	{
		for ($i=0; $i < 10; $i++) 
		{ 
			Usuario::create(
				[
					'nombre'=>"usuario$i",
					'email'=>"email$i@mail.com",
					'password'=>bcrypt("pass$i"),
					'pregunta'=>"preg$i",
					'respuesta'=>"resp$i",
				]);
		}
	}

}
