<?php

namespace Database\Seeders;

use App\Models\Post;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;

class PostSeeder extends Seeder
{
    public function run(): void
    {
        $posts = [
            [
                'name' => 'Bài viết đầu tiên',
                'description' => 'Mô tả ngắn về bài viết đầu tiên',
                'content' => 'Nội dung chi tiết của bài viết đầu tiên',
                'type' => 'post',
                'image' => 'posts/sample1.jpg'
            ],
            [
                'name' => 'Bài viết thứ hai',
                'description' => 'Mô tả ngắn về bài viết thứ hai',
                'content' => 'Nội dung chi tiết của bài viết thứ hai',
                'type' => 'news',
                'image' => 'posts/sample2.jpg'
            ],
            // Thêm các bài viết mẫu khác nếu cần
        ];

        foreach ($posts as $post) {
            Post::create([
                'name' => $post['name'],
                'slug' => Str::slug($post['name']),
                'description' => $post['description'],
                'content' => $post['content'],
                'type' => $post['type'],
                'image' => $post['image']
            ]);
        }
    }
}
