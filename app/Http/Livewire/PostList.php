<?php

namespace App\Http\Livewire;

use App\Models\Post;
use Livewire\Component;
use Livewire\WithPagination;

class PostList extends Component
{
    use WithPagination;

    public $sort = 'desc';
    public $search = '';

    protected $queryString = ['sort', 'search']; // Equivalent to #[Url()]

    protected $listeners = ['search' => 'updateSearch']; // Equivalent to #[On('search')]

    public function setSort($sort)
    {
        $this->sort = ($sort === 'desc') ? 'desc' : 'asc';
    }

    public function updateSearch($search)
    {
        $this->search = $search;
    }

    public function getPostsProperty()
    {
        return Post::published()
            ->orderBy('published_at', $this->sort)
            ->where('title', 'like', "%{$this->search}%")
            ->paginate(3);
    }

    public function render()
    {
        return view('livewire.post-list', [
            'posts' => $this->posts,
        ]);
    }
}