<?php

namespace Database\Seeders;

use App\Models\Tag;
use App\Models\Post;
use App\Models\Category;
use App\Models\Trademark;
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
        Trademark::truncate();
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
//marcas
        $trademark = new Trademark;
        $trademark->brand = "Hewlett-Packard";
        $trademark->website = "www.hp.com";
        $trademark->support = "018000930309";
        $trademark->save();

        $trademark = new Trademark;
        $trademark->brand = "Apple";
        $trademark->website = "www.apple.com.co";
        $trademark->support = "018000930309";
        $trademark->save();

        $trademark = new Trademark;
        $trademark->brand = "Samsung";
        $trademark->website = "www.samsung.com";
        $trademark->support = "018000930309";
        $trademark->save();

        $post = new Post;
        $post->trademark_id = 1;
        $post->title = "HP Pavilion Laptop.";
        $post->serial = "133";
        $post->url = Str::slug($post->title);
        $post->body = "<p>Quisque congue lacus mattis massa luctus, nec hendrerit purus aliquet. Ut ac elementum urna. Pellentesque suscipit metus et egestas congue. 
        Duis eu pellentesque turpis, ut maximus metus. Sed ultrices tellus vitae rutrum congue. Fusce luctus augue id nisl suscipit, vel sollicitudin orci egestas.</p>";
        $post->published_at = Carbon::now()->subDays(4);
        $post->category_id = 1;
        $post->user_id = 1;
        $post->save();

        $post->tags()->attach(Tag::create(['name' => 'CT-P001']));
        $post->tags()->attach(Tag::create(['name' => 'Contaduria']));

		$post = new Post;
        $post->trademark_id = 1;
        $post->serial = "123456789";
        $post->title = "Teclado Genius";
        $post->url = Str::slug($post->title);
        $post->body = "<p>Quisque congue lacus mattis massa luctus, nec hendrerit purus aliquet. Ut ac elementum urna. 
        Pellentesque suscipit metus et egestas congue. Duis eu pellentesque turpis, ut maximus metus. Sed ultrices tellus vitae rutrum congue.</p>";
        $post->published_at = Carbon::now()->subDays(3);
        $post->category_id = 5;
        $post->user_id = 3;
        $post->save();

        $post->tags()->attach(Tag::create(['name' => 'AU-004']));

        $post = new Post;
        $post->trademark_id = 1;
        $post->title = "Mouse Gs.";
        $post->serial = "132";
        $post->url = Str::slug($post->title);
        $post->body = "<p>Sed sit amet aliquet erat. Integer nec mi convallis, condimentum odio quis, pharetra tellus. Donec mollis libero in volutpat luctus. </p>
        <p> Cras laoreet pulvinar dapibus. </p><p>Nulla laoreet odio at nunc semper vestibulum. </p>";
        $post->published_at = Carbon::now()->subDays(8);
        $post->category_id = 4;
        $post->user_id = 3;
        $post->employee_id = 1;
        $post->employee_debtor_since = Carbon::now()->subDays(10);
        $post->assigns_user_id = 1;
        $post->save();

        $post->tags()->attach(Tag::create(['name' => 'AU-005']));

        $post = new Post;
        $post->trademark_id = 1;
        $post->serial = "132446";
        $post->title = "CPU.";
        $post->url = Str::slug($post->title);
        $post->body = "<p>Donec hendrerit magna vitae metus viverra tincidunt. Cras dolor lacus, placerat sed nulla in, egestas pharetra neque. </p>
        <p>Sed sit amet aliquet erat. Integer nec mi convallis, condimentum odio quis, pharetra tellus. </p>";
        $post->published_at = Carbon::now()->subDays(1);
        $post->category_id = 7;
        $post->user_id = 3;
        $post->employee_id = 1;
        $post->employee_debtor_since = Carbon::now();
        $post->assigns_user_id = 1;
        $post->save();

        $post->tags()->attach(Tag::create(['name' => 'AU-001']));

        $post = new Post;
        $post->title = "Monitor.";
        $post->serial = "13288";
        $post->trademark_id = 1;
        $post->url = Str::slug($post->title);
        $post->body = "<p>Nunc a enim interdum lectus accumsan sagittis. Ut mauris diam, efficitur vitae malesuada ut, tempus et mi. </p>";
        $post->published_at = Carbon::now()->subDays(1);
        $post->category_id = 2;
        $post->user_id = 3;
        $post->employee_id = 1;
        $post->employee_debtor_since = Carbon::now()->subDays(1);
        $post->assigns_user_id = 1;
        $post->save();

        $post->tags()->attach(Tag::create(['name' => 'AU-002']));
        $post->tags()->attach(Tag::create(['name' => 'AtencionUsuario']));

        $post = new Post;
        $post->title = "Pavilion Laptop.";
        $post->serial = "13277";
        $post->trademark_id = 1;
        $post->url = Str::slug($post->title);
        $post->body = "<p>Quisque congue lacus mattis massa luctus, nec hendrerit purus aliquet. Ut ac elementum urna. Pellentesque suscipit metus et egestas congue. 
        Duis eu pellentesque turpis, ut maximus metus. Sed ultrices tellus vitae rutrum congue. Fusce luctus augue id nisl suscipit, vel sollicitudin orci egestas.</p>";
        $post->published_at = Carbon::now()->subDays(4);
        $post->category_id = 1;
        $post->user_id = 2;
        $post->employee_id = 2;
        $post->employee_debtor_since = Carbon::now()->subDays(1);
        $post->assigns_user_id = 1;
        $post->save();

    }
}
