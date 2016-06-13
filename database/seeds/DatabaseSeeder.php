<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $this->call(CitiesTableSeeder::class);
        $this->call(SubjectsTableSeeder::class);
        $this->call(TermsTableSeeder::class);
        $this->call(ProgramsTableSeeder::class);
    }
}


class ProgramsTableSeeder extends Seeder
{
	public function run()
	{
		App\Models\Program::truncate();
		DB::table('city_program')->truncate();
		DB::table('program_subject')->truncate();
		DB::table('program_term')->truncate();

		$faker = Faker\Factory::create();

		factory(App\Models\Program::class, 100)->create()->each(function ($program) use ($faker){

			// cities
			$city = [$faker->numberBetween(1,500)];
			$program->cities()->sync($city);

			// subjects
			$subjects = [];
			$x = 1;
			while($x < 4) {
			    $subjects[] = $faker->numberBetween(1,10);
			    $x++;
			} 
			$program->subjects()->sync($subjects);

			// terms
			$terms = [];
			$x = 1;
			while($x < 3) {
			    $terms[] = $faker->numberBetween(1,10);
			    $x++;
			} 

			$program->terms()->sync($terms);

		});
	}
}


class CitiesTableSeeder extends Seeder
{
	public function run()
	{
		App\Models\City::truncate();

		factory(App\Models\City::class, 500)->create();
	}
}


class SubjectsTableSeeder extends Seeder{

	public function run()
	{
		App\Models\Subject::truncate();

		$data = [

			['name'=>'Art', 'slug'=>'art'], 
			['name'=>'Art History', 'slug'=>'art-history'], 
			['name'=>'Biology', 'slug'=>'biology'], 
			['name'=>'Economics', 'slug'=>'economics'], 
			['name'=>'Recreation Management', 'slug'=>'recreation-management'], 
			['name'=>'Spanish', 'slug'=>'spanish'], 
			['name'=>'History', 'slug'=>'history'], 
			['name'=>'Life Science', 'slug'=>'life-science'], 
			['name'=>'Ornithology', 'slug'=>'ornithology'], 
			['name'=>'Zoology', 'slug'=>'zoology']

		];

		App\Models\Subject::insert($data);


	}
}

class TermsTableSeeder extends Seeder{

	public function run()
	{
		App\Models\Term::truncate();

		$data = [

			['name'=>'Fall', 'slug'=>'fall'], 
			['name'=>'Winter', 'slug'=>'winter'], 
			['name'=>'Winter Intersession', 'slug'=>'winter-intersession'], 
			['name'=>'Spring', 'slug'=>'spring'], 
			['name'=>'May Term', 'slug'=>'may-term'], 
			['name'=>'Summer', 'slug'=>'summer'], 

		];

		App\Models\Term::insert($data);


	}
}
