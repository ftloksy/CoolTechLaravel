<!-- 
Every artcle's header.
dispaly header 
In here, has two type:
    1> full : when show full complete artcle.
      the title isn't a link.
    2> short : when show short artcle, 
      the title is a link when user click the link,
      will goto the single artcle page. url('/artcle' .$id )
-->
<div class="artcleheader">
  @switch($type)
    @case("full")
      <h1>{{ $artcle->title }}</h1>
      @break
    @case("short")
      <h3><a class="menua" href="{{ url('/artcle/'. $artcle->id ) }}">{{ $artcle->title }}</a></h2>
  @endswitch
  <span class="artclecreater">{{ $artcle->creater }}</span>
  <span class="artclecreated">{{ $artcle->created }}</span>
</div>
