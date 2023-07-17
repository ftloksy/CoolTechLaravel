<!-- display some (five) artcle in a page -->
@foreach ( $artcles as $artcle)
<x-artcle :artcle="$artcle" :type="'short'" />
@endforeach
