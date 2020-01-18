<?php

namespace App\Models;

use Barryvdh\LaravelIdeHelper\Eloquent;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Carbon;

/**
 * Task model.
 *
 * @mixin Eloquent
 *
 * @property int $id Task id
 * @property string $title Title
 * @property string $description Description
 * @property string $status Status
 * @property string $author Author
 * @property Carbon|null $created_at
 * @property Carbon|null $updated_at
 */
class Task extends Model
{
    protected $table = 'tasks';
    
    public const ID = 'id';
    public const TITLE = 'title';
    public const DESCRIPTION = 'description';
    public const STATUS = 'status';
    public const AUTHOR = 'author';
    
    protected $fillable = [
      self::TITLE,
      self::DESCRIPTION,
      self::STATUS,
      self::AUTHOR,
    ];
}