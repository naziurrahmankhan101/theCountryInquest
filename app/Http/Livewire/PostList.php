<?php

namespace App\Http\Livewire;

use App\Models\Category;
use App\Models\Post;
use Livewire\Component;
use Livewire\WithPagination;

class PostList extends Component
{
    use WithPagination;

    public $sort = 'desc';
    public $search = '';  // Store the search term
    public $category = ''; // Store the category slug from the URL
    public $activeCategory; // Full category object

    protected $queryString = ['sort', 'search', 'category']; // URL binding to maintain state

    public function mount()
    {
        $this->updateCategory();
    }

    // When the search term changes, reset the page
    public function updatingSearch($search)
    {
        $this->search = $search;
        $this->resetPage(); // Reset pagination when the search term is updated
    }

    // Update the category based on the clicked category slug
    public function setCategory($categorySlug)
    {
        $this->category = $categorySlug;
        $this->activeCategory = Category::where('slug', $this->category)->first();
        $this->resetPage(); // Reset pagination when the category is updated
    }

    private function updateCategory()
    {
        if ($this->category) {
            $this->activeCategory = Category::where('slug', $this->category)->first();
        } else {
            $this->activeCategory = null;
        }
    }

    public function getPostsProperty()
    {
        return Post::published()
           ->with('author','categories')
            ->when($this->activeCategory, function ($query) {
                // Filter posts by category slug if category is set
                $query->whereHas('categories', function ($q) {
                    $q->where('slug', $this->category);
                });
            })
            ->when($this->search, function ($query) {
                // Search by post title and body content
                $query->where(function ($q) {
                    $q->where('title', 'like', "%{$this->search}%")
                      ->orWhere('body', 'like', "%{$this->search}%");
                })
                // Search by category slug
                ->orWhereHas('categories', function ($q) {
                    $q->where('slug', 'like', "%{$this->search}%");
                });
            })
            ->orderBy('published_at', $this->sort)
            ->paginate(3);
    }

    public function clearFilters()
    {
        $this->search = '';
        $this->category = '';
        $this->activeCategory = null;
        $this->resetPage(); // Reset pagination when filters are cleared
    }
    public function activeCategory()
    {
        if($this->category === null || $this->category === ''){
            return null;
        }
        return Category::where('slug', $this->category)->first();
    }

    public function render()
    {
        return view('livewire.post-list', [
            'posts' => $this->posts,
        ]);
    }
}
