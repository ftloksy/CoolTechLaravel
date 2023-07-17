@extends('app')

@section('content')
<!-- search page -->
<h1>Search</h1>

<h3 style="color:red;">{{ $error }}</h3>
<!-- search form -->
<form action="/gotopage" method="POST">
  {{ csrf_field() }}
  <label>Post ID:</label>
  <input type="number" name="postid" />
  <button type="submit" name="submitid" value="1" >Search by Id</button><br/>
  <label>Title (like) :</label>
  <input type="text" name="posttitle"/>
  <button type="submit" name="submittitle" value="1" >Search by Title</button><br/>
  <label>Tag (like) :</label>
  <input type="text" name="posttag"/>
  <button type="submit" name="submittag" value="1" >Search by Tag</button><br/>
</form>
@endsection


