<?php


namespace App\Models;

use Jenssegers\Date\Date;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

class Post extends Model
{
	protected $fillable = [
        'marca','title', 'body', 'iframe', 'excerpt', 'published_at', 'category_id', 'user_id'
    ];

    protected $dates = ['published_at'];

    protected static function boot()
    {
        parent::boot();

        static::deleting(function($post){
            $post->tags()->detach();
            $post->photos->each->delete();
        });
    }

    public function getRouteKeyName()
    {
        return 'url';
    }

    public function category()
    {
    	return $this->belongsTo(Category::class);
    }

    public function tags()
    {
    	return $this->belongsToMany(Tag::class);
    }

    public function photos()
    {
        return $this->hasMany(Photo::class);
    }

    public function owner()
    {
        return $this->belongsTo(User::class, 'user_id');
    }

    public function scopePublished($query)
    {
        $query->with(['owner', 'category', 'tags', 'photos'])
                ->whereNotNull('published_at')
                ->where('published_at', '<=', Carbon::now() )
                ->latest('published_at');
    }

    public function scopeAllowed($query)
    {
        if( auth()->user()->can('view', $this) )
        {
            return $query;
        }

        return $query->where('user_id', auth()->id());
    }

    public function scopeByYearAndMonth($query)
    {
        return $query->selectRaw('year(published_at) year')
            ->selectRaw('month(published_at) month')
            ->selectRaw('monthname(published_at) monthname')
            ->selectRaw('count(*) posts')
            ->groupBy('year', 'month', 'monthname')
            ->orderBy('published_at');
    }

    public function isPublished()
    {
        return ! is_null($this->published_at) && $this->published_at < today();
    }

    public static function create(array $attributes = [])
    {
        $attributes['user_id'] = auth()->id();

        $post = static::query()->create($attributes);

        $post->generateUrl();

        return $post;
    }

    public function generateUrl()
    {
        $url = Str::slug($this->title);

        if ($this->whereUrl($url)->exists())
        {
            $url = "{$url}-{$this->id}";
        }

        $this->url = $url;

        $this->save();
    }

    public function setPublishedAtAttribute($published_at)
    {
        $this->attributes['published_at'] = $published_at ? Carbon::parse($published_at) : null;
    }

    public function setCategoryIdAttribute($category)
    {
        $this->attributes['category_id'] = Category::find($category)
                                ? $category
                                : Category::create(['name' => $category])->id;
    }

    public function syncTags($tags)
    {
        $tagIds = collect($tags)->map(function($tag){
            return Tag::find($tag) ? $tag : Tag::create(['name' => $tag])->id;
        });

        return $this->tags()->sync($tagIds);
    }

    public function viewType($home = '')
    {
       if ($this->photos->count() === 1):
           return 'posts.photo';
       elseif($this->photos->count() > 1):
           return $home === 'home' ? 'posts.carousel-preview': 'posts.carousel';
       elseif($this->iframe):
           return 'posts.iframe';
       else:
            return 'posts.text';
       endif;
    }
    public $search = '';

    public function updatingSearch()
    {
        $this->resetPage();
    }
    
    public function render()
    {
        return view('livewire.show-posts', [
            'posts' => Post::where('title', 'like', '%'.$this->search.'%')->paginate(10),
        ]);
    }

    public static function search($query)
    {
         return  Post::where('title', 'like', '%'.$query.'%')
                ->orWhere('body', 'like', '%'.$query.'%');
    }

    public function getCreatedAtAttribute($date)
    {
        return new Date($date);
    }
}


