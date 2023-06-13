<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Auth\User as Authenticatable;


class modelUmum extends Authenticatable
{
    CONST CONTENT_TYPE_JSON = "JSON";
    CONST ACTION_INSERT     = "INSERT";
    CONST ACTION_UPDATE     = "UPDATE";
    CONST ACTION_DELETE     = "DELETE";

    protected static function booted(){
      static::created(function($query){
        self::validatingHistory($query,function($query){
          $json    = json_encode($query->getAttributes());
          $history = $query->updateHistories()->create([
            "context"            => $json,
            "contextType"        => self::CONTENT_TYPE_JSON,
            "actionType"         => self::ACTION_INSERT,
            "user_id"            => Auth()->user()->id ?? null
          ]);
        });            
      });
      static::updated(function($query){
        self::validatingHistory($query,function($query){
          $originals = $query->getOriginal();
          $dataChanges = ["changed"  => $query->getChanges()];
          foreach ($dataChanges["changed"] as $key => $change) {
            $dataChanges["original"][$key] = $originals[$key];
          }
          $json    = json_encode($dataChanges);
          $history = $query->updateHistories()->create([
            "context"         => $json,
            "contextType"     => self::CONTENT_TYPE_JSON,
            "actionType"      => self::ACTION_UPDATE,
            "user_id"         => Auth()->user()->id  ?? null,
          ]);
        });            
      });
      static::deleted(function($query){
        self::validatingHistory($query,function($query){
          $json    = json_encode($query->getOriginal());
          $history = $query->updateHistories()->create([
            "context"            => $json,
            "contextType"        => self::CONTENT_TYPE_JSON,
            "actionType"         => self::ACTION_DELETE,
            "user_id"            => Auth()->user()->id ?? null,
          ]);
        });              
      });
    }

    private static function validatingHistory($query,$callback){
      if($query->getModel() <> update_history::class){
        $callback($query);
      }
    }

    public function updateHistories(){return $this->morphMany(update_history::class,"reference");}

}
