<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class IconCard extends Model
{
	public function getText()
  	  {
  	      $locale = app()->getLocale();
 	       switch ($locale) {
  	          case 'tm':
  	              return $this->text;
  	              break;
 	           case 'ru':
 	               return $this->text_ru ?: $this->text;
	                break;
 	           case 'en':
 	               return $this->text_en ?: $this->text;
 	               break;
 	           default:
 	               return $this->text;
   	     }
  	  }
public function getName()
  	  {
  	      $locale = app()->getLocale();
 	       switch ($locale) {
  	          case 'tm':
  	              return $this->name;
  	              break;
 	           case 'ru':
 	               return $this->name_ru ?: $this->name;
	                break;
 	           case 'en':
 	               return $this->name_en ?: $this->name;
 	               break;
 	           default:
 	               return $this->name;
   	     }
  	  }


	
}
