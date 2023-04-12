<?php

namespace App\Http\Livewire\Admin\Blog\Options;

use App\Http\Validators\Admin\Blog\EditValidator;
use App\Models\Article;
use App\Models\ArticleSeo;
use App\Utils\Uploader\ImageUploader;
use Livewire\Component;
use Artesaos\SEOTools\Traits\SEOTools as SEOToolsTrait;
use Livewire\WithFileUploads;

class EditComponent extends Component
{
    use SEOToolsTrait, WithFileUploads;

    public $title;
    public $slug;
    public $content;
    public $image;
    public $reading_time;
    public $seo_description;
    public $article;


    /**
     * Init component
     *
     * @param string $slug
     * @return void
     */
    public function mount($slug)
    {
        // Get article
        $article = Article::where('slug', $slug)->firstOrFail();

        // Fill form
        $this->fill([
            'title'           => $article->title,
            'slug'            => $article->slug,
            'content'         => $article->content,
            'reading_time'    => $article->reading_time,
            'seo_description' => $article->seo ? $article->seo->description : null,
        ]);

        // Set article
        $this->article = $article;
    }


    /**
     * Render component
     *
     * @return Illuminate\View\View
     */
    public function render()
    {
        // Seo
        $this->seo()->setTitle( setSeoTitle(__('messages.t_edit_article'), true) );
        $this->seo()->setDescription( settings('seo')->description );

        return view('livewire.admin.blog.options.edit')->extends('livewire.admin.layout.app')->section('content');
    }


    /**
     * Update article
     *
     * @return void
     */
    public function update()
    {
        try {

            // Validate form
            EditValidator::validate($this);

            // Check if want to change old image
            if ($this->image) {
                
                $image_id = ImageUploader::make($this->image)
                                        ->deleteById($this->article->image_id)
                                        ->folder('blog')
                                        ->handle();

            } else {

                $image_id = $this->article->image_id;

            }

            // Update article
            $this->article->title        = $this->title;
            $this->article->slug         = $this->slug;
            $this->article->content      = $this->content;
            $this->article->image_id     = $image_id;
            $this->article->reading_time = $this->reading_time;
            $this->article->save();

            // Check if seo description exists in request
            if ($this->seo_description) {
                
                // Check if article already has seo
                if ($this->article->seo) {
                    
                    // Update seo
                    $this->article->seo()->update([
                        'title'       => $this->title,
                        'description' => $this->seo_description
                    ]);

                } else {

                    // Create new seo
                    $seo              = new ArticleSeo();
                    $seo->article_id  = $this->article->id;
                    $seo->title       = $this->title;
                    $seo->description = $this->description;
                    $seo->save();

                }

            }

            // Success
            $this->dispatchBrowserEvent('alert',[
                "message" => __('messages.t_toast_operation_success'),
            ]);

        } catch (\Illuminate\Validation\ValidationException $e) {

            // Validation error
            $this->dispatchBrowserEvent('alert',[
                "message" => __('messages.t_toast_form_validation_error'),
                "type"    => "error"
            ]);

            throw $e;

        } catch (\Throwable $th) {

            // Error
            $this->dispatchBrowserEvent('alert',[
                "message" => __('messages.t_toast_something_went_wrong'),
                "type"    => "error"
            ]);

            throw $th;

        }   
    }
    
}
