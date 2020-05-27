<?php

use App\Tag;
use App\Post;
use App\User;
use App\Category;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class PostsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {   
    $category1 = Category::create([
            'name' => 'news',
    ]);

    $category2 = Category::create([
        'name' => 'Updates',
    ]);

    $category3 = Category::create([
        'name' => 'Design',
    ]);

    $category4 = Category::create([
        'name' => 'Marketing',
    ]);

    $category5 = Category::create([
        'name' => 'Partnership',
    ]);

    $category6 = Category::create([
        'name' => 'Product',
    ]);

    $tag1 =Tag::create([
        'name' => 'Record',
    ]);

    $tag2 =Tag::create([
        'name' => 'Progress',
    ]);

    $tag3 =Tag::create([
        'name' => 'Freebie',
    ]);

    $tag4 =Tag::create([
        'name' => 'Offer',
    ]);

    $tag5 =Tag::create([
        'name' => 'Screenshot',
    ]);

    $tag6 =Tag::create([
        'name' => ' Milestone',
    ]);

    $author1 = User::create([
        'name' => 'John Doe',
        'email' => 'john@test.com',
        'password' => Hash::make('123456789'),
    ]);

    $author2 = User::create([
        'name' => 'Jane Doe',
        'email' => 'jane@test.com',
        'password' => Hash::make('123456789'),
    ]);
    
        $post1 = Post::create([
            'title' => 'We relocated our office to a new designed garage',
            'description' => 'Le passage de Lorem Ipsum standard, utilisé depuis 1500',
            'content' => 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore
                            et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea
                            commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla
                            pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est
                            laborum.',
            'category_id' => $category1->id,
            'user_id' => $author1->id,
            'image' => 'images/1.jpg'

        ]);

        $post2 = Post::create([
            'title' => "This is why it's time to ditch dress codes at work",
            'description' => 'Le passage de Lorem Ipsum standard, utilisé depuis 1500',
            'content' => 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore
                            et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea
                            commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla
                            pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est
                            laborum.',
            'category_id' => $category2->id,
            'user_id' => $author2->id,
            'image' => 'images/2.jpg'

        ]);

        $post3 = Post::create([
            'title' => 'Top 5 brilliant content marketing strategies',
            'description' => 'Le passage de Lorem Ipsum standard, utilisé depuis 1500',
            'content' => 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore
                            et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea
                            commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla
                            pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est
                            laborum.',
            'category_id' => $category3->id,
            'user_id' => $author1->id,
            'image' => 'images/3.jpg'

        ]);

        $post4 = $author1->posts()->create([
            'title' => 'Best practices for minimalist design with example',
            'description' => 'Le passage de Lorem Ipsum standard, utilisé depuis 1500',
            'content' => 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore
                            et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea
                            commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla
                            pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est
                            laborum.',
            'category_id' => $category4->id,
            'image' => 'images/4.jpg'

        ]);

        $post5 = $author2->posts()->create([
            'title' => 'Congratulate and thank to Maryam for joining our team',
            'description' => 'Le passage de Lorem Ipsum standard, utilisé depuis 1500',
            'content' => 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore
                            et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea
                            commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla
                            pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est
                            laborum.',
            'category_id' => $category5->id,
            'image' => 'images/5.jpg'

        ]);

        $post6 = $author1->posts()->create([
            'title' => 'New published books to read by a product designer',
            'description' => 'Le passage de Lorem Ipsum standard, utilisé depuis 1500',
            'content' => 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore
                            et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea
                            commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla
                            pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est
                            laborum.',
            'category_id' => $category6->id,
            'image' => 'images/6.jpg'

        ]);

        $post1->tags()->attach([$tag1->id, $tag2->id]);
        $post2->tags()->attach([$tag2->id, $tag3->id]);
        $post3->tags()->attach([$tag4->id, $tag5->id]);
        $post4->tags()->attach([$tag6->id, $tag1->id]);
        $post5->tags()->attach([$tag2->id, $tag5->id]);
        $post6->tags()->attach([$tag3->id, $tag6->id]);

    }
}
