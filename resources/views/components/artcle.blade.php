@php
use App\Http\Controllers\UserController;
@endphp

<!-- 
dispaly single artcle 
In here, has two type:
    1> full : show full complete artcle.
        and categroy and tags about the artcle.
    2> short : show short artcle, just first paragraphs.
        and don't show artcle's categroy and tags.
-->
<div class="artcle">
    
    <x-artcle-header :artcle="$artcle" :type="$type" />
    
    <div id="a{{ $artcle->id }}" class="artcle_content"></div>
    <span><a class="menua" href="{{ url('/bookmark/'. $artcle->id ) }}" >Bookmark this post.</a></span><br/>
    
    @switch($type)
        @case("full")
            <informationlink>
                <span>Category: </span>
                <!-- display the link, when user click the link then goto category page. -->
                <span><a class="menua" href="{{ url('/category/' . urlencode( $artcle->categories ) ) }}">{{ $artcle->categories }}</a></span><br/>
                <span>Tag: </span>
                
                <!-- 
                show this page's all tags
                and display the link, when user click the link then goto tag page. 
                -->
                @foreach ( UserController::get_post_own_tag( $artcle->id ) as $tag )
                    <a class="tags" href="{{ url('/tag/' . $tag->tag_title ) }}">{{ $tag->tag_title }}</a>
                @endforeach
            </informationlink>
            <!-- 
                from database search the artcle's content. 
                the artcle's content is use markdown format.
            -->
            <script>
                <!-- complete display full artcle -->
                let content = {!! json_encode($artcle->content) !!};
                let html = marked.parse(content);
                document.getElementById("a{{ $artcle->id }}").innerHTML = html;
            </script>
            @break
        @case("short")
            <script>
                <!-- Just display first paragraphs -->
               content = {!! json_encode($artcle->content) !!};
               html = marked.parse(content);
               firstParagraph = html.split("</p>")[0];
               document.getElementById("a{{ $artcle->id }}").innerHTML = firstParagraph + "</p>";
            </script>
    @endswitch
      
</div>
