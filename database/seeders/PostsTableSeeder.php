<?php

namespace Database\Seeders;

use App\Models\Tag;
use App\Models\Post;
use App\Models\Category;
use Carbon\Carbon;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

class PostsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Storage::disk('public')->deleteDirectory('posts');
    	Post::truncate();
        Category::truncate();
    	Tag::truncate();

        $category = new Category;
        $category->name = "Portátil";
        $category->save();

        $category = new Category;
        $category->name = "Tablet";
        $category->save();

        $category = new Category;
        $category->name = "Monitor";
        $category->save();

        $category = new Category;
        $category->name = "Mouse";
        $category->save();

        $category = new Category;
        $category->name = "Teclado";
        $category->save();

        $category = new Category;
        $category->name = "Smartphone";
        $category->save();

        $category = new Category;
        $category->name = "CPU";
        $category->save();

        $post = new Post;
        $post->marca = "Hewlett-Packard";
        $post->title = "HP Pavilion Laptop.";
        $post->url = Str::slug($post->title);
        $post->body = "<p>Quisque congue lacus mattis massa luctus, nec hendrerit purus aliquet. Ut ac elementum urna. Pellentesque suscipit metus et egestas congue. Duis eu pellentesque turpis, ut maximus metus. Sed ultrices tellus vitae rutrum congue. Fusce luctus augue id nisl suscipit, vel sollicitudin orci egestas.</p> <p> Morbi posuere venenatis ipsum, ac vestibulum quam dignissim efficitur. Ut vitae rutrum augue, in volutpat quam. Cras a viverra ipsum. Aenean ut consequat ex, vitae vulputate nunc. Vestibulum metus nisi, aliquam sed tincidunt sit amet, pretium et augue.</p>";
        $post->published_at = Carbon::now()->subDays(4);
        $post->category_id = 1;
        $post->user_id = 1;
        $post->save();

        $post->tags()->attach(Tag::create(['name' => 'CT-P001']));
        $post->tags()->attach(Tag::create(['name' => 'Contaduria']));

		$post = new Post;
        $post->marca = "Hewlett-Packard";
        $post->title = "Teclado Genius";
        $post->url = Str::slug($post->title);
        $post->body = "<p>Quisque congue lacus mattis massa luctus, nec hendrerit purus aliquet. Ut ac elementum urna. Pellentesque suscipit metus et egestas congue. Duis eu pellentesque turpis, ut maximus metus. Sed ultrices tellus vitae rutrum congue.</p><p> Fusce luctus augue id nisl suscipit, vel sollicitudin orci egestas.</p><p> Morbi posuere venenatis ipsum, ac vestibulum quam dignissim efficitur. Ut vitae rutrum augue, in volutpat quam. Cras a viverra ipsum. Aenean ut consequat ex, vitae vulputate nunc. Vestibulum metus nisi, aliquam sed tincidunt sit amet, pretium et augue.</p>";
        $post->published_at = Carbon::now()->subDays(3);
        $post->category_id = 5;
        $post->user_id = 3;
        $post->save();

        $post->tags()->attach(Tag::create(['name' => 'AU-004']));

        $post = new Post;
        $post->marca = "Hewlett-Packard";
        $post->title = "Mouse Gs.";
        $post->url = Str::slug($post->title);
        $post->body = "<p>Sed sit amet aliquet erat. Integer nec mi convallis, condimentum odio quis, pharetra tellus. Donec mollis libero in volutpat luctus. </p><p> Cras laoreet pulvinar dapibus. </p><p>Nulla laoreet odio at nunc semper vestibulum. </p><p>Sed magna mauris, molestie eu ipsum et, pharetra egestas neque.</p><p>Sed sit amet aliquet erat. Integer nec mi convallis, condimentum odio quis, pharetra tellus. Donec mollis libero in volutpat luctus. </p><p> Cras laoreet pulvinar dapibus. </p><p>Nulla laoreet odio at nunc semper vestibulum. </p><p>Sed magna mauris, molestie eu ipsum et, pharetra egestas neque.</p>";
        $post->published_at = Carbon::now()->subDays(1);
        $post->category_id = 4;
        $post->user_id = 3;
        $post->save();

        $post->tags()->attach(Tag::create(['name' => 'AU-005']));

        $post = new Post;
        $post->marca = "Hewlett-Packard";
        $post->title = "CPU.";
        $post->url = Str::slug($post->title);
        $post->body = "<p>Donec hendrerit magna vitae metus viverra tincidunt. Cras dolor lacus, placerat sed nulla in, egestas pharetra neque. </p><p>Sed sit amet aliquet erat. Integer nec mi convallis, condimentum odio quis, pharetra tellus. </p><p>Donec mollis libero in volutpat luctus. Cras laoreet pulvinar dapibus. Nulla laoreet odio at nunc semper vestibulum. Sed magna mauris, molestie eu ipsum et, pharetra egestas neque. </p>";
        $post->published_at = Carbon::now()->subDays(1);
        $post->category_id = 7;
        $post->user_id = 3;
        $post->save();

        $post->tags()->attach(Tag::create(['name' => 'AU-001']));

        $post = new Post;
        $post->title = "Monitor.";
        $post->marca = "Hewlett-Packard";
        $post->url = Str::slug($post->title);
        $post->body = "<p>Nunc a enim interdum lectus accumsan sagittis. Ut mauris diam, efficitur vitae malesuada ut, tempus et mi. </p><p>Sed eget leo vehicula, dapibus arcu id, viverra erat. Proin auctor non nulla sed mollis. </p><p>Nulla elit leo, tincidunt eu lacus ut, suscipit gravida tortor. Praesent feugiat, neque non pellentesque, velit sem hendrerit arcu, eu viverra ligula eu tortor. Suspendisse et cursus enim. </p><p>Curabitur condimentum, sem quis pharetra hendrerit, leo odio rhoncus felis, sed posuere augue diam feugiat enim. Donec gravida non metus eu pretium. Ut sed sodales dolor, non vehicula enim. </p><p>Nam fringilla blandit sem, eget vestibulum arcu porta sed. Mauris sit amet nulla id ante semper luctus id a enim. Sed ac venenatis dolor. </p><p>Class aptent taciti sociosqu ad litora torquent per conubia nostra, per inceptos himenaeos. Ut ut congue nulla. Aenean elementum gravida convallis. Integer ac neque nisi. Sed ac magna in risus convallis laoreet. Pellentesque in orci ante.</p>";
        $post->published_at = Carbon::now()->subDays(1);
        $post->category_id = 2;
        $post->user_id = 3;
        $post->save();

        $post->tags()->attach(Tag::create(['name' => 'AU-002']));
        $post->tags()->attach(Tag::create(['name' => 'AtencionUsuario']));

        $post = new Post;
        $post->title = "Pavilion Laptop.";
        $post->marca = "Hewlett-Packard";
        $post->url = Str::slug($post->title);
        $post->body = "<p>Quisque congue lacus mattis massa luctus, nec hendrerit purus aliquet. Ut ac elementum urna. Pellentesque suscipit metus et egestas congue. Duis eu pellentesque turpis, ut maximus metus. Sed ultrices tellus vitae rutrum congue. Fusce luctus augue id nisl suscipit, vel sollicitudin orci egestas.</p> <p> Morbi posuere venenatis ipsum, ac vestibulum quam dignissim efficitur. Ut vitae rutrum augue, in volutpat quam. Cras a viverra ipsum. Aenean ut consequat ex, vitae vulputate nunc. Vestibulum metus nisi, aliquam sed tincidunt sit amet, pretium et augue.</p>";
        $post->published_at = Carbon::now()->subDays(4);
        $post->category_id = 1;
        $post->user_id = 2;
        $post->save();

    }
}
