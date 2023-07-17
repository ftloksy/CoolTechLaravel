<?php

namespace App\Http\Controllers;
 
use Illuminate\View\View;
use Illuminate\Http\Request;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Cookie;
 
/**
 * UserController Component class.
 * When User request a webpage. the route web.php
 * will call a method to reponse the visiter
 *
 * @author Frankie Chow
 */
class UserController extends Controller
{

  /**
   * get artcles by tags and sort by posts's id.
   * 
   * @access private
   * @param $tag Artice's tag.
   * @return object
   */ 
  private function get_artcles_posts_by_tag(String $tag): object
  {
    return DB::table('blog_tags')
      ->join('post_tags', 'blog_tags.id', '=', 'post_tags.tag_id')
      ->join('blog_posts', 'post_tags.post_id', '=', 'blog_posts.id')
      ->where('tag_title', $tag )
      ->orderby('blog_posts.id', 'desc')
      ->get();
  }
  
  /**
   * Count how many artcles have this $tag and sort the post's id.
   * 
   * @access private
   * @param $tag Artice's tag.
   * @return int
   */  
  private function count_artcles_by_tag(String $tag): int
  {
    return DB::table('blog_tags')
      ->join('post_tags', 'blog_tags.id', '=', 'post_tags.tag_id')
      ->join('blog_posts', 'post_tags.post_id', '=', 'blog_posts.id')
      ->where('tag_title', $tag )
      ->orderby('blog_posts.id', 'desc')
      ->count();
  }
  
  /**
   * get artcle post by category by $category
   * If assign "All" to $category, It return all posts. 
   * 
   * @access private
   * @param $category Artcle's category.
   * @return object
   */
  private function get_artcles_posts(String $category): object
  {
    if ($category == 'All') {
      return DB::table('blog_posts')
        ->orderby('id', 'desc')
        ->limit(5)
        ->get();
    } else {
      return DB::table('blog_posts')
        ->where('categories', $category)
        ->orderby('id', 'desc')
        ->get();
    }
  }
  
  /**
   * get artcle post by id
   * It just return a data row ( object ) or null.
   * 
   * @access private
   * @param $id Artcle's id.
   * @return object
   */
  private function get_artcle_by_id(String $artcle_id): ?object
  {
    return DB::table('blog_posts')->where('id', $artcle_id)->first();
  }
  
  /**
   * get artcle post have title like the $title
   * It just return a data row ( object ) or null.
   * 
   * @access private
   * @param $title Artcle's title.
   * @return object
   */
  private function get_artcles_by_title_like(String $artcle_title): ?object
  {
    return DB::table('blog_posts')
      ->where('title', 'like', '%' . $artcle_title . '%')
      ->orderby('id', 'desc')
      ->limit(5)
      ->get();
  }
  
  /**
   * Count how many artcles have title like the $title
   * 
   * @access private
   * @param $title e.g. from search form posttitle field.
   * @return int
   */ 
  private function count_artcles_by_title_like(String $artcle_title): int
  {
    return DB::table('blog_posts')
      ->where('title', 'like', '%' . $artcle_title . '%')
      ->orderby('id', 'desc')
      ->count();
  }
  
  /**
   * Count how many artcles have tags like the $tag
   * 
   * @access private
   * @param $tag e.g. from search form posttag field.
   * @return int
   */  
  private function get_artcles_by_tag_like(String $tag): ?object
  {
    return DB::table('blog_tags')
      ->select('blog_posts.id', 'blog_posts.title', 
        'blog_posts.content', 'blog_posts.creater', 
        'blog_posts.created', 'blog_posts.categories', 'blog_posts.memberonly')
      ->join('post_tags', 'blog_tags.id', '=', 'post_tags.tag_id')
      ->join('blog_posts', 'post_tags.post_id', '=', 'blog_posts.id')
      ->groupBy('blog_posts.id')
      ->where('tag_title', 'like',  '%' . $tag . '%')
      ->orderby('blog_posts.id', 'desc')
      ->limit(5)
      ->get();
  }
 
  /**
   * Count how many artcles have tags like the $tag
   * 
   * @access private
   * @param $tag e.g. from search form posttag field.
   * @return int
   */
  private function count_artcles_by_tag_like(String $tag): int
  {
    return DB::table('blog_tags')
      ->join('post_tags', 'blog_tags.id', '=', 'post_tags.tag_id')
      ->join('blog_posts', 'post_tags.post_id', '=', 'blog_posts.id')
      ->where('tag_title', 'like',  '%' . $tag . '%')
      ->orderby('blog_posts.id', 'desc')
      ->count();
  }
  
  /**
   * From database, search all exist tags ( not duplicate ).
   * It will list it in sidebar menu.
   * 
   * @access public
   * @return object
   */
  public function get_tab_table() : object
  {
    return DB::table('blog_tags')
      ->join('post_tags', 'blog_tags.id', '=', 'post_tags.tag_id')
      ->selectRaw('count(tag_title) as countArtcle, tag_title')
      ->groupBy('tag_title')
      ->get();
  }
  
  /**
   * From database, use post's id search it own tag_titles.
   * 
   * @access public
   * @param $id Artcle post's id.
   * @return object
   */
  public function get_post_own_tag(String $id) : object
  {
    return DB::table('blog_tags')
      ->join('post_tags', 'blog_tags.id', '=', 'post_tags.tag_id')
      ->where('post_id', $id)->get();
  }
  
  /**
   * Visiter entry the search form and view call the method.
   * In the search form will have three field and three submit.
   * 
   * If visiter search the posts by id.
   * Visiter will need input the id field and click the submitid submit button. 
   * If visiter search the posts by title ( like ).
   * Visiter will need input the posttitle and click the submittitle submit button.
   * If visiter search the posts by tag ( like ),
   * Visiter will need input the posttag ( like ) and click the submittag button.
   * 
   * When search the posts isn't exist, add the error message to searcherror cookie.
   * 
   * @access public
   * @param $request
   * @return RedirectResqonse
   */
  public function go_target_page(Request $request): RedirectResponse
  {
    if ($request->isMethod('post')) {
      if ($request->input('submitid')) {
        
        $request_post_id = $request->input('postid');
        if ( $this-> get_artcle_by_id($request_post_id) ) {
          return redirect('/artcle/' . $request_post_id);
        } else {
          Cookie::queue(
            Cookie::make('searcherror', 'id: '.  $request_post_id . ' page isn\'t exist.', 5));
          return redirect('/search');
        }
        
      } elseif ($request->input('submittitle')) {      
        $request_post_title = $request->input('posttitle');
        if ( $request_post_title && $this->count_artcles_by_title_like($request_post_title) ) {
          return redirect('/title/' . $request_post_title );
        } else {
          Cookie::queue(
            Cookie::make('searcherror', 'Has not a page title like ' . $request_post_title . ' .', 5));
          return redirect('/search');
        }
            
      } elseif ( $request->input('submittag') ) {
        $request_post_tag = $request->input('posttag');
        if ( $request_post_tag && $this->count_artcles_by_tag_like($request_post_tag) ) {
          return redirect('/tags/' . $request_post_tag );
        } else {
          Cookie::queue(
            Cookie::make('searcherror', 'Has not a page tag like ' . $request_post_tag . ' . ', 5));
          return redirect('/search');
        }
      } else {
            Cookie::queue(
                Cookie::make('searcherror', 'form request has error.', 5));
            return redirect('/search');
      };
    };
    return redirect('/');
  }
  
  /**
   *  User logout.
   *  forget the user login session.
   * 
   * @access public
   * @return RedirectResponse
   */
  public function logout(Request $request): RedirectResponse
  {
    Auth::logout();
    $request->session()->invalidate();
    $request->session()->regenerateToken();
    
    return redirect('/');
  }
 
  /**
   * Show the search page.
   * If the cookie searcherror is set and show it in the page.
   * then forget ( delete ) the cookie
   * 
   * @access public
   * @return view
   */
  public function show_search_page(): view
  {
    if ( Cookie::get('searcherror') ) {
      $searchError = Cookie::get('searcherror');
      Cookie::queue(
        Cookie::forget('searcherror'));
    } else {
      $searchError = '';
    };
    return view('search', ['error' => $searchError ]);
  }
  
  /**
   * When user in search form and search by title.
   * method will find any post's title like user's entry.
   * The posts first paragraph will show in the page.
   * 
   * @access public
   * @param $title from search page's form.
   * @return view
   */
  public function show_artcles_title_page(String $title): view
  {
    if ( $this->count_artcles_by_title_like($title) ) {
      return view('artcles', 
        ['artcles' => $this->get_artcles_by_title_like($title), 'pagetitle' => 'Title Like: ' . $title]);
    } else {
      return view('artcles', ['artcles' => $this->get_artcles_posts('All'), 
        'request_error' => 'Title Like: '. $title . ' has not any page.',
        'pagetitle' => 'Recent Posts']); 
    }
  }
  
  /**
   * When user click the bookmark link.
   * will goto the /bookmark/id and call this method.
   * set the id to bookmark cookie.
   * 
   * @access public
   * @param $id from bookmark link. set the id ( viewing post's id )
   * @return redirect
   */
  public function bookmark_page(String $id) : RedirectResponse
  {
    if ( Cookie::get('bookmark') ) {
      Cookie::queue(
        Cookie::forget('bookmark') );
    }
    Cookie::queue(
      Cookie::make ('bookmark', $id, 60));
    return redirect('/artcle/' . $id );
  }
  
  /**
   * when user choice category from sidebar menu.
   * The pages will show the posts is under the category.
   * The posts first paragraph will show in the page.
   * If request a non-exist category
   *      show a error massage and 5 Recemt Posts.
   * 
   * @access public
   * @param $category from menubar.
   * @return view
   */
  public function show_artcles_page(String $category): View
  {
    switch ($category) {
      case 'all-artcle':
        return view('artcles', 
          ['artcles' => $this->get_artcles_posts('All'), 'pagetitle' => 'Recent Posts']);
      case 'tech-news':
      case 'Tech+news' :
        return view('artcles',
          ['artcles' => $this->get_artcles_posts('Tech news'), 'pagetitle' => 'Category: Tech News']);
      case 'software-reviews':
      case 'Software+reviews':
        return view('artcles',
          ['artcles' => $this->get_artcles_posts('Software reviews'), 'pagetitle' => 'Category: Software Reviews']);
      case 'hardware-reviews':
      case 'Hardware+reviews':
        return view('artcles',
          ['artcles' => $this->get_artcles_posts('Hardware reviews'), 'pagetitle' => 'Category: Hardware Reviews']);
      case 'opinion-pieces':
      case 'Opinion+pieces':
        return view('artcles',
          ['artcles' => $this->get_artcles_posts('Opinion pieces'), 'pagetitle' => 'Category: Opinion Pieces']);
      default:
        return view('artcles', 
          ['artcles' => $this->get_artcles_posts('All'), 'pagetitle' => 'Recent Posts', 
            'request_error' => 'You visit "' . $category . '" category is not exist']);
    }
  }
  
  /**
   * When user in search form and search by tag.
   * method will find any post's tag like user's entry.
   * The posts first paragraph will show in the page.
   * 
   * @access public
   * @param $tag from search page's form.
   * @return view
   */
  public function show_artcles_tag(String $tag): view
  {
    if ( $this->count_artcles_by_tag_like( $tag ) ) {
      return view('artcles', 
        ['artcles' => $this->get_artcles_by_tag_like($tag), 'pagetitle' => 'Tag Like: ' . $tag] );
    } else {
      return view('artcles', ['artcles' => $this->get_artcles_posts('All'), 
      'request_error' => 'Tag Like: ' . $tag . ' has not any page.',
      'pagetitle' => 'Recent Posts'] ); 
    }
  }
  
  /**
   * Show the artcle posts in page by artcle's tag.
   * If blog_posts haven't any page has this tag.
   * show a message to visiter.
   * 
   * @access public
   * @param $tag Artcle's tag.
   * @return view
   */
  public function show_tag_page(String $tag): view
  {
    if ( $this->count_artcles_by_tag( $tag ) ) {
      return view('artcles', 
        ['artcles' => $this->get_artcles_posts_by_tag($tag) , 'pagetitle' => 'Tag: ' . $tag] );
    } else {
      return view('artcles', ['artcles' => $this->get_artcles_posts('All'), 
        'request_error' => 'Tag: '. $tag . ' has not any page.',
        'pagetitle' => 'Recent Posts'] ); 
    }
  }
  
  /**
   * Show the artcle post in page by artcle's id.
   * If this post's id is same at bookmark cookie,
   * tell visiter "This page marked'.
   * 
   * @access public
   * @param $artcle_id Artcle's Id.
   * @return view
   */
  public function show_artcle_page(String $artcle_id): view
  {
    $bookmarked_page = Cookie::get('bookmark');
    if ( $bookmarked_page === $artcle_id ) {
      $msg_bookmark = 'This page marked.';
    } else {
      $msg_bookmark = '';
    }
    $request_artcle = $this->get_artcle_by_id($artcle_id) ;
    if ( $request_artcle ) {
      return view('artcle', ['artcle' => $request_artcle, 'bookmarkmsg' => $msg_bookmark] );
    } else {
      return view('nothasartcle');
    }
  }
  
  /** 
   * Show the home page url('/') 
   * home page will show five Recent Posts.
   * 
   * @access public
   * @return view
   */
  public function show_home_page(): View
  {
    return view('home', ['artcles' => $this->get_artcles_posts('All')]);
  }
  
  // When User login will redirect to this page.
  public function show_dashboard_page(): View
  {
    return view('dashboard');
  }
  
  // Show the Legal page url('/legal')
  public function show_legal_page(): View
  {
    return view('legal');
  }
  
  // Show the About Us page ('/aboutus')
  public function show_aboutus_page(): View
  {
    return view('aboutus');
  }
   
}

// EOF
