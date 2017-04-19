<?php

use Illuminate\Database\Seeder;

class dumpdata extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $user = new \App\User();
        $user->name = 'a';
        $user->email = 'a@gmail.com';
        $user->password = Hash::make('123456');
        $user->profil = 1;
        $user->save();
        $user1 = $user;

        $user = new \App\User();
        $user->name = 'b';
        $user->email = 'b@gmail.com';
        $user->password = Hash::make('123456');
        $user->profil = 1;
        $user->save();
        $user2 = $user;

        $user = new \App\User();
        $user->name = 'c';
        $user->email = 'c@gmail.com';
        $user->password = Hash::make('123456');
        $user->profil = 1;
        $user->save();

        $user1->befriend($user2);
        $user1->befriend($user);
        $user2->acceptFriendRequest($user1);
        $user->befriend($user2);

        $photo = new \App\Photo();
        $photo->save();
        $post = new \App\Post;
        $post->user_id = $user->id;
        $post->post_id = $photo->id;
        $post->type = 0;
        $post->save();

        $photo = new \App\Photo();
        $photo->save();
        $post = new \App\Post;
        $post->user_id = $user1->id;
        $post->post_id = $photo->id;
        $post->type = 0;
        $post->save();

        $video = new \App\Video();
        $video->save();
        $post = new \App\Post;
        $post->user_id = $user2->id;
        $post->post_id = $video->id;
        $post->type = 1;
        $post->save();

        $video = new \App\Video();
        $video->save();
        $post = new \App\Post();
        $post->user_id = $user->id;
        $post->post_id = $video->id;
        $post->type = 1;
        $post->save();

        $event = new \App\Event();
        $event->title = "Loriandre";
        $event->date = "2014-09-01";
        $event->description = "tres gentille dame";
        $event->save();
        $post = new \App\Post();
        $post->user_id = $user2->id;
        $post->post_id = $event->id;
        $post->type = 2;
        $post->save();

        $event = new \App\Event();
        $event->title = "chassure";
        $event->date = "2014-04-01";
        $event->description = "tres belle chaussure ou shopping";
        $event->save();
        $post = new \App\Post();
        $post->user_id = $user->id;
        $post->post_id = $event->id;
        $post->type = 2;
        $post->save();

        $comment = new \App\Comment();
        $comment->comment = "lol";
        $comment->user_id = 1;
        $comment->post_id = 1;
        $comment->save();

        $comment = new \App\Comment();
        $comment->comment = "lul";
        $comment->user_id = 2;
        $comment->post_id = 1;
        $comment->save();

        $comment = new \App\Comment();
        $comment->comment = "pull";
        $comment->user_id = 2;
        $comment->post_id = 2;
        $comment->save();

        $like = new \App\Like();
        $like->like = 0;
        $like->user_id = 3;
        $like->post_id = 4;
        $like->save();

        $like = new \App\Like();
        $like->like = 0;
        $like->user_id = 2;
        $like->post_id = 3;
        $like->save();

        $like = new \App\Like();
        $like->like = 0;
        $like->user_id = 1;
        $like->post_id = 5;
        $like->save();




    }
}
