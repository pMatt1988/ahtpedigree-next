<?php

namespace App\Models;

use A17\Twill\Models\Behaviors\HasMedias;
use A17\Twill\Models\Behaviors\HasRevisions;
use A17\Twill\Models\Model;

class Dog extends Model
{
    use HasMedias, HasRevisions;

    protected $fillable = [
        'name',
        'sire_id',
        'dam_id',
        'callname',
        'sex',
        'dob',
        'pretitle',
        'posttitle',
        'reg',
        'color',
        'markings',
        'website',
        'breeder',
        'owner',

    ];


//$table->string('name', 200)->nullable();
//
//$table->integer('sire_id')->nullable();
//$table->integer('dam_id')->nullable();
//
//$table->string('callname', 32)->nullable();
//$table->char('sex')->default('m');
//$table->date('dob')->nullable();
//$table->string('pretitle', 32)->nullable();
//$table->string('posttitle', 32)->nullable();
//$table->string('reg', 64)->nullable();
//$table->string('color', 64)->nullable();
//$table->string('markings', 64)->nullable();
//$table->string('image_url')->nullable();
//$table->string('thumbnail_url')->nullable();
//$table->string('website')->nullable();
//$table->string('breeder')->nullable();
//$table->string('owner')->nullable();

    public $mediasParams = [
        'cover' => [
            'desktop' => [
                [
                    'name' => 'desktop',
                    'ratio' => 16 / 9,
                ],
            ],
            'mobile' => [
                [
                    'name' => 'mobile',
                    'ratio' => 1,
                ],
            ],
            'flexible' => [
                [
                    'name' => 'free',
                    'ratio' => 0,
                ],
                [
                    'name' => 'landscape',
                    'ratio' => 16 / 9,
                ],
                [
                    'name' => 'portrait',
                    'ratio' => 3 / 5,
                ],
            ],
        ],
    ];


    public function sire() {
        $this->belongsTo(Dog::class, 'id', 'sire_id');
    }

    public function dam() {
        $this->hasOne(Dog::class, 'id', 'dam_id');
    }
}
