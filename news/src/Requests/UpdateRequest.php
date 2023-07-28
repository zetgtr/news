<?php

namespace News\Requests;


use Carbon\Carbon;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;
use News\Models\News;

class UpdateRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize(): bool
    {
        return true;
    }

    public function all($keys = null)
    {
        $data = parent::all($keys);

        $images = $data['images'];

        $jsonImages = json_encode($images);

        $data['images'] = $jsonImages;

        return $data;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, mixed>
     */
    public function rules(): array
    {
        return [
            'id' => ['required'],
            'category_id' => ['required', 'integer'],
            'category_id.*' => ['exists:categories_news,id'], // проверяет каждый элемент с таблицей categories_news c полем id
            'title' => ['required', 'min:2', 'max:200'],
            'content' => ['required', 'min:2'],
            'description' => ['required'],
            'url' => ['required', Rule::unique(News::class)->ignore($this->id, 'id')],
            'created_at' => ['nullable'],
            'images' => ['sometimes'],
            'seoKeywords' => ['nullable', 'string'],
            'seoTitle' => ['nullable','string'],
            'seoDescription' => ['nullable', 'string'],
            'access' => ['required'],
        ];
    }

    public function getCategoriesIds(): array
    {
        return (array) $this->validated('category_id');
    }

    public function prepareForValidation()
    {
        if (!$this->input('url')) {
            $this->merge([
                'url' => str_slug($this->input('title'))
            ]);
        }
        if ($this->input('created_at')) {
            $this->merge([
                'created_at' => Carbon::createFromFormat('d.m.Y H:i', $this->input('created_at'), 'Europe/Moscow')
            ]);
        }
        $images = [];
        if ($this->file('img')) {
            $news = News::find($this->input('id'));
            $imgArr = json_decode($news->images);
            foreach ($this->file('img') as $image)
            {
                foreach ($imgArr as $img)
                    $filePath = public_path($img);
                if (file_exists($filePath)) {
                    unlink($filePath);
                }
                $file = $image;
                $image = new \Imagick($file->getRealPath());
                $image->setImageFormat('webp');
                $image->setImageCompressionQuality(70);
                $fileName = 'news/' . uniqid() . '.webp';
                $image->writeImage(public_path('storage/' . $fileName));
                $images[] = "/storage/".$fileName;
            }
        }
        $this->merge([
            'images' => $images
        ]);
    }

    public function attributes(): array
    {
        return [
            'description' => 'описание',
            'content' => 'контент'
        ];
    }

    public function messages():array
    {
        return [
            'required' => "Нужно заполнить поле :attribute"
        ];
    }
}
