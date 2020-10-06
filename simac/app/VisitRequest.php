<?php

namespace App;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class VisitRequest extends Model
{
    use HasFactory;

    protected $fillable = [
        'visitor_id',
        'company_id',
        'department_id',
        'dateTime',
    ];
    public  function visitor()
    {
        return $this->belongsTo(Visitor::class);
    }
    public  function host()
    {
        return $this->belongsTo(Host::class);
    }
    public  function company()
    {
        return $this->belongsTo(Company::class);
    }
    public  function department()
    {
        return $this->belongsTo(Department::class);
    }
}
