<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

/**
 * This is the database sql create command.
 * 
 * CREATE TABLE `blog_posts` (
 *  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
 *  `title` varchar(255) NOT NULL,
 *  `content` text NOT NULL,
 *  `creater` varchar(50) NOT NULL,
 *  `created` date NOT NULL DEFAULT (curdate()),
 *  `categories` enum('Tech news','Software reviews','Hardware reviews','Opinion pieces'),
 *  `memberonly` tinyint NOT NULL DEFAULT '0',
 *  PRIMARY KEY (`id`),
 *  INDEX (`created`),
 *  INDEX (`categories`)
 * ) 
 * 
 * CREATE TABLE `blog_tags` (
 *   `id` bigint unsigned NOT NULL AUTO_INCREMENT,
 *   `tag_title` varchar(255) NOT NULL,
 *   PRIMARY KEY (`id`),
 *   UNIQUE (`tag_title`),
 *   INDEX (`tag_title`)
 * ) 
 *  
 * CREATE TABLE `post_tags` (
 *  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
 *  `post_id` bigint unsigned NOT NULL,
 *  `tag_id` bigint unsigned NOT NULL,
 *  PRIMARY KEY (`id`),
 *  UNIQUE (`post_id`,`tag_id`),
 *  INDEX (`tag_id`),
 *  FOREIGN KEY (`post_id`) REFERENCES `blog_posts` (`id`),
 *  FOREIGN KEY (`tag_id`) REFERENCES `blog_tags` (`id`)
 * )
 * 
 * and you can use this comment in shell to create it.
 *
 *   php artisan migrate
 *
 * ref to:  {$project_directory}/database/migrations/2023_03_02_092620_create_blog_posts_table.php
 * ref to:  {$project_directory}/database/migrations/2023_03_02_092650_create_blog_tags_table.php
 * ref to:  {$project_directory}/database/migrations/2023_03_02_092722_create_post_tags_table.php
 * 
 * and you can find the test data in 
 * 
 * {$project_directory}/database/migrations/test_data.sql
 * 
 */

// home page.
Route::get('/', [UserController::class, 'show_home_page']);

// Legal page.
Route::get('/legal', [UserController::class, 'show_legal_page']);

/**
 * When user entry the search form. the input data will post to it.
 * then will redirect to require pages.
 */
Route::post('/gotopage', [UserController::class, 'go_target_page']);

// About Us page.
Route::get('/about-us', [UserController::class, 'show_aboutus_page']);

// When user login, can logout in here.
Route::get('/logout', [UserController::class, 'logout']);

// Search page.
Route::get('/search', [UserController::class, 'show_search_page']);

//  title page. User entry a title in search form then redirect to here.
Route::get('/title/{title}', [UserController::class, 'show_artcles_title_page']);

// Tag page. User entry a tag in search form then redirect to here.
Route::get('/tag/{tag}', [UserController::class, 'show_tag_page']);

// Category page. User can choice a category in menu and list the posts.
Route::get('/category/{category}', [UserController::class, 'show_artcles_page']);

// Show the post follow the id.
Route::get('/artcle/{id}', [UserController::class, 'show_artcle_page']);

// The website can bookmark a page in cookie. the cookie will remember the post's id.
Route::get('/bookmark/{id}', [UserController::class, 'bookmark_page']);

// tags page. User can choice a tag in menu and list the posts.
Route::get('/tags/{tag}', [UserController::class, 'show_artcles_tag']);

// When user login then redirect to here.
Route::get('/dashboard', 
    [UserController::class, 'show_dashboard_page'])->middleware(['auth'])->name('dashboard');

require __DIR__.'/auth.php';

// EOF
