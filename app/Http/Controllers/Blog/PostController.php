<?php

namespace App\Http\Controllers\Blog;

use App\Tag;
use App\Post;
use App\Category;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class PostController extends Controller
{
    public function showPost(Post $post)
    {
        return view('blog.show')->with('post', $post);
    }

    public function postsByCategories(Category $category) 
    {
        return view('blog.category')->with('category', $category)
                                    ->with('posts', $category->posts()->search()->simplePaginate(2))
                                    ->with('categories', Category::all())
                                    ->with('tags', Tag::all());
    }

    public function postsByTags(Tag $tag) 
    {
        return view('blog.tag')->with('tag', $tag)
                               ->with('posts', $tag->posts()->search()->simplePaginate(2))
                               ->with('categories', Category::all())
                               ->with('tags', Tag::all());
    }
}
