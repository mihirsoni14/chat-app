<?php

namespace App\Livewire;

use App\Models\Post;
use Livewire\Component;

class PostCrud extends Component
{
    public $posts, $title, $content, $post_id;
    public $isEdit = false;

    public function render()
    {
        $this->posts = Post::all();
        return view('livewire.post-crud');
    }

    public function create()
    {
        $this->resetFields();
        $this->isEdit = false;
    }

    public function store()
    {
        $this->validate([
            'title' => 'required',
            'content' => 'required',
        ]);

        Post::create([
            'title' => $this->title,
            'content' => $this->content,
        ]);

        session()->flash('message', 'Post Created Successfully.');
        $this->resetFields();
    }

    public function edit($id)
    {
        $post = Post::find($id);
        $this->post_id = $post->id;
        $this->title = $post->title;
        $this->content = $post->content;
        $this->isEdit = true;
    }

    public function update()
    {
        $this->validate([
            'title' => 'required',
            'content' => 'required',
        ]);

        Post::where('id', $this->post_id)->update([
            'title' => $this->title,
            'content' => $this->content,
        ]);

        session()->flash('message', 'Post Updated Successfully.');
        $this->resetFields();
    }

    public function delete($id)
    {
        Post::find($id)->delete();
        session()->flash('message', 'Post Deleted Successfully.');
    }

    private function resetFields()
    {
        $this->title = '';
        $this->content = '';
        $this->post_id = null;
        $this->isEdit = false;
    }
}
