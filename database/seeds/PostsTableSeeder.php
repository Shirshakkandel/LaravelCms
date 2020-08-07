<?php

use App\Category;
use App\Post;
use App\Tag;
use App\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class  PostsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $category1= Category::create([
            'name'=>'News'
        ]);

        $author1= User::create([
            'name'=>'Shirshak kandel',
            'email'=>'shirshak.firebox@gmail.com',
            'password'=>Hash::make('shirshak')
        ]);



        $category2 = Category::create([
            'name'=>'Marketing'
        ]);

        $category3 =Category::create([
            'name'=>'Book summary'
        ]);

        $tag1= Tag::create([
            'name'=>"Job"
        ]);

        $tag2= Tag::create([
            'name'=>"Customer"
        ]);

        $tag3=Tag::create([
            'name'=>"record"
        ]);

        $post1= Post::create([
            'title'=>'Best practices for minimalist design with example',
            'description'=>"Lorem Ipsum is simply dummy text of the printing and typesetting industry. ",
            'content'=>"Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.",
            'category_id'=>$category1->id,
            'image'=>'posts/1.jpg',
            'user_id'=>$author1->id
        ]);

        $post2= $author1->posts()->create([
            'title'=>'Congratulate and thank to Maryam for joining our team',
            'description'=>"Lorem Ipsum is simply dummy text of the printing and typesetting industry. ",
            'content'=>"Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.",
            'category_id'=>$category1->id,
            'image'=>'posts/2.jpg'
        ]);

        $post3= $author1->posts()->create([
            'title'=>'New published books to read by a product designer',
            'description'=>"Lorem Ipsum is simply dummy text of the printing and typesetting industry. ",
            'content'=>"Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.",
            'category_id'=>$category1->id,
            'image'=>'posts/3.jpg'
        ]);

        $post4= $author1->posts()->create([
            'title'=>'This is why it\'s time to ditch dress codes at work',
            'description'=>"Lorem Ipsum is simply dummy text of the printing and typesetting industry.",
            'content'=>"Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.",
            'category_id'=>$category1->id,
            'image'=>'posts/4.jpg'
        ]);

       
            $post1->tags()->attach([$tag1->id, $tag2->id]);
            $post2->tags()->attach([$tag2->id, $tag3->id]);
            $post3->tags()->attach([$tag2->id, $tag3->id]);
            $post4->tags()->attach([$tag2->id, $tag3->id]);
            


    }
}
