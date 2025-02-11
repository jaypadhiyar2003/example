<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Job extends Model
{
    use HasFactory;
    protected $table = 'job_listing';

    //protected $fillable = ['employer_id','title','salary']; Or given below what to secure from mass assign
    protected $guarded = [];


    public function employer()
    {
        return $this->belongsTo(Employer::class);
    }

    public function tags(){
        return $this->belongsToMany(Tag::class,foreignPivotKey:'job_listing_id'); //foreignPivotkey is defined because we have job_listing_id not job_id
    }
    //before ORM
   /* public  static function all() : array
    {
        return [
            [
                'id' => 1,
                'title' => 'Director',
                'salary' => '$50000'
            ],
            [
                'id' => 2,
                'title' => 'Programmer',
                'salary' => '$10000'
            ],
            [
                'id' => 3,
                'title' => 'Teacher',
                'salary' => '$20000'
            ]
            ];
    }

    public  static function find(int $id) : array
    {
        $job = Arr::first(static::all(),fn($job) => $job['id'] == $id);

        if(!$job){
            abort(404);
        }
        return $job;
    }
        */
}
