<?php

namespace Core;

use Faker\Factory;

class DatabaseSeeder extends Model
{
    private $faker;

    public function __construct()
    {
        parent::__construct();
        $this->faker = Factory::create();
    }

    public function run()
    {
        $this->seedUsers();
        $this->seedCourses();
        $this->seedEnrollments();
        $this->seedCourseTags();
    }

    private function seedUsers()
    {
        $users = [];
        for ($i = 0; $i < 100; $i++) {
            $users[] = [
                'name' => $this->faker->name,
                'email' => $this->faker->unique()->email,
                'password' => password_hash('password', PASSWORD_BCRYPT),
                'role' => $this->faker->randomElement(['student', 'pending_teacher', 'teacher', 'admin']),
                'is_active' => $this->faker->boolean(90), // 90% chance of being active
            ];
        }
        $this->create('users', $users);
    }

    private function seedCourses()
    {
        $teachers = $this->read('users', ['role' => 'teacher']);
        if (empty($teachers)) {
            throw new \Exception("No teachers found in the database. Please seed users first.");
        }

        $categories = $this->read('categories');
        if (empty($categories)) {
            throw new \Exception("No categories found in the database. Please seed categories first.");
        }

        $courses = [];
        for ($i = 0; $i < 100; $i++) {
            $courses[] = [
                'teacher_id' => $this->faker->randomElement($teachers)['id'],
                'title' => $this->faker->sentence,
                'description' => $this->faker->paragraph,
                'content_type' => $this->faker->randomElement(['video', 'document']),
                'content_path' => $this->faker->url,
                'category_id' => $this->faker->randomElement($categories)['id'],
                'rating' => $this->faker->numberBetween(0, 5),
            ];
        }
        $this->create('courses', $courses);
    }

    private function seedEnrollments()
    {
        $students = $this->read('users', ['role' => 'student']);
        if (empty($students)) {
            throw new \Exception("No students found in the database. Please seed users first.");
        }

        $courses = $this->read('courses');
        if (empty($courses)) {
            throw new \Exception("No courses found in the database. Please seed courses first.");
        }

        $enrollments = [];
        for ($i = 0; $i < 100; $i++) {
            $enrollments[] = [
                'course_id' => $this->faker->randomElement($courses)['id'],
                'student_id' => $this->faker->randomElement($students)['id']
            ];
        }
        $this->create('enrollments', $enrollments);
    }

    private function seedCourseTags()
    {
        $courses = $this->read('courses');
        if (empty($courses)) {
            throw new \Exception("No courses found in the database. Please seed courses first.");
        }

        $tags = $this->read('tags');
        if (empty($tags)) {
            throw new \Exception("No tags found in the database. Please seed tags first.");
        }

        $courseTags = [];
        for ($i = 0; $i < 100; $i++) {
            $courseTags[] = [
                'course_id' => $this->faker->randomElement($courses)['id'],
                'tag_id' => $this->faker->randomElement($tags)['id']
            ];
        }
        $this->create('course_tags', $courseTags);
    }
}