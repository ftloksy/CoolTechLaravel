@extends('app')

@section('content')
<!-- url('/') page -->
<h1>Recent Posts</h1>
<p>Here are some of our recent posts:</p>

<x-artcles :artcles="$artcles"/>

<!-- home page some content is about this website -->
<!-- the content is use markdown format -->
<div id="homecontent"></div>

<script>
 let homepageheader = `

# Cool Tech Blog

Get the latest tech news, reviews, and opinion pieces 
at Cool Tech Blog. We cover everything from software 
and hardware reviews to the latest tech trends

## Categories

Our blog has four main categories:

- ***Tech News:*** Stay up to date with the latest happenings in the tech industry.
- ***Software Reviews:*** In-depth reviews of the latest software releases.
- ***Hardware Reviews:*** Detailed analysis of the latest devices on the market.
- ***Opinion Pieces:*** Thought-provoking articles on the biggest issues in the tech industry.
`
  let html = marked.parse(homepageheader);
  document.getElementById("homecontent").innerHTML = html;
</script>
@endsection
