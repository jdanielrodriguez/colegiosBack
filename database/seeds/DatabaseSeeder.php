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
        // $this->call(UsersTableSeeder::class);
        $this->call(CyclesSeeder::class);
        $this->call(Studying_DaysSeeder::class);
        $this->call(GradesSeeder::class);
        $this->call(SubjectsSeeder::class);
        $this->call(TeachersSeeder::class);
        $this->call(EventsSeeder::class);
        $this->call(TutorsSeeder::class);
        $this->call(StudentsSeeder::class);
        $this->call(UsersSeeder::class);
        $this->call(InscriptionsSeeder::class);
        $this->call(ChargesSeeder::class);
        $this->call(Cycles_Studying_DaysSeeder::class);
        $this->call(Cycles_Studying_Days_GradesSeeder::class);
        $this->call(Inscriptions_Cycles_Studying_DaysSeeder::class);
        $this->call(Cycles_Studying_Days_Grades_SubjectsSeeder::class);
        $this->call(Cycles_Studying_Days_Grades_Subjects_TeachersSeeder::class);
        $this->call(Subjects_StudentsSeeder::class);
        $this->call(AssistanceSeeder::class);
        $this->call(HomeworkSeeder::class);
        $this->call(Tutors_StudentsSeeder::class);
    }
}
