<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;
use Illuminate\Database\Eloquent\SoftDeletes;

class Project extends Model
{
    use HasFactory;
    use SoftDeletes;

    protected $datas = ['deleted_at'];

    protected $fillable = ['title', 'description', 'image', 'git_link', 'external_link', 'publication_date', 'project_type'];

    public function generateSlug($title)
    {
        return Str::slug($title, '-');
    }
}
