<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CategoryPosts extends Model
{
    use HasFactory;
}


/* 
INSERT INTO `gorizontclub`.`category_posts` (`post_id`, `category_id`) VALUES ('1', '1');
INSERT INTO `gorizontclub`.`category_posts` (`post_id`, `category_id`) VALUES ('1', '2');
INSERT INTO `gorizontclub`.`category_posts` (`post_id`, `category_id`) VALUES ('1', '4');
INSERT INTO `gorizontclub`.`category_posts` (`post_id`, `category_id`) VALUES ('2', '1');
INSERT INTO `gorizontclub`.`category_posts` (`post_id`, `category_id`) VALUES ('2', '5');
INSERT INTO `gorizontclub`.`category_posts` (`post_id`, `category_id`) VALUES ('2', '6');
 */